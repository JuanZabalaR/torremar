<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Reserva;
use App\Models\User;
use App\Models\Bedroom;
class Reservas extends Controller{
    // protected $request;
    // public function __construct(){
    //     $this->request = \Config\Services::request();
    // }
    public function index()
    {
        $data['user'] = new User();
        $data['header'] = view('template/header');
        $data['footer'] = view('template/footer');
        return view('home', $data);
    }
    public function contact()
    {
        $data['header'] = view('template/header');
        $data['footer'] = view('template/footer');
        return view('contact', $data);
    }
    public function login()
    {
        $data['header'] = view('template/header');
        $data['footer'] = view('template/footer');
        return view('user/login', $data);
    }
    public function reserve()
    {
        $data['header'] = view('template/header');
        $data['footer'] = view('template/footer');
        return view('reserve', $data);
    }
    public function access(){
        $userModel = new User();
        $session = session();
        $username = $_POST['user_username'];
        $passw = $_POST['user_password'];
        $user = $userModel->where('user_username', $username)->first();
        if($user){
            if($user['user_password'] === $passw){
                $id = $user['user_id'];
                $userModel->whereIn('user_id',[$id])->set(['user_session' => 1])->update();
                return redirect()->to('dashboard');
            }
            else{
                $session->setFlashdata(['status'=>'error', 'msg'=>'La contrasena no corresponde con el usuario']);
                return redirect()->back()->withInput();
            }
        }
        else{
            $session->setFlashdata(['status'=>'error', 'msg'=>'Datos Invalidos']);
            return redirect()->back()->withInput();
        }
    }
    public function search(){   
        $reserva = new Reserva();
        $room = new Bedroom();
        $session = session();
        $entry_date = $_POST['res_entry'];
        $exit_date = $_POST['res_exit'];
        $cpty = $_POST['cpty'];
        $adults = $_POST['adults'];
        $rooms = $room->findAll();
        $data['entry_date'] = $entry_date;
        $data['exit_date'] = $exit_date;
        $query = 'SELECT res_rooms FROM tor_reserve WHERE res_approved = 1 AND "'.$entry_date.'" between res_entry and res_exit';
        $db = \Config\Database::connect();
        $query_result = $db->query($query);
        $ocRoom = $query_result->getResult(); //Get id from Rooms not available
        $roomArr = [];
        if($ocRoom != []){ 
            foreach($ocRoom as $a =>$b){
                $id = $b->res_rooms;
                if(strlen($id) > 1){
                    $multId = explode(",",$id);
                    foreach($multId as $c =>$d){
                        if(!in_array($d, $roomArr))
                            array_push($roomArr,$d);
                    }
                }
                else{
                    if(!in_array($id, $roomArr))
                        array_push($roomArr,$id);
                }
            }
            $newQuery = "";
            foreach($roomArr as $a=>$b){
                $newQuery .= ' AND room_id !="'.$b.'"';
            }
            $query2 = 'SELECT * FROM tor_rooms WHERE room_name IS NOT NULL'.$newQuery;
            $query_result2 = $db->query($query2);
            $data['available'] = $query_result2->getResult();
            $data['header'] = view('template/header');
            $data['footer'] = view('template/footer');
            return view('search',$data);
            // return redirect()->to('search');
                // $session->setFlashdata('msg',json_encode($allRooms));
                // return redirect()->back()->withInput();
        }else{
            $query2 = 'SELECT * FROM tor_rooms WHERE room_name IS NOT NULL';
            $query_result2 = $db->query($query2);
            $data['available'] = $query_result2->getResult();
            $data['header'] = view('template/header');
            $data['footer'] = view('template/footer');
            return view('search',$data);
        }
    }
    public function aboutus(){
        $data['header'] = view('template/header');
        $data['footer'] = view('template/footer');
        return view('aboutus', $data);
    }
    public function roomVal(){
        $room = new Bedroom();
        if ($this->request->isAJAX()) {
            $room_id = service('request')->getPost('value');
            $roomValid = $room->where('room_id',$room_id)->first();
            if($roomValid){
                $error = ['success'=> 'success', 'csrf' => csrf_hash(),'room'=>$roomValid];
            }
            else
                $error = ['success'=> 'error', 'csrf' => csrf_hash()];
            return json_encode($error);
        }
    }
    public function saveReserve(){
        $session = session();
        $reserva = new Reserva();
        $arr = "";
        if(isset($_POST['Bedroom'])){
            $arr = implode(",",$_POST['Bedroom']);
        $name = $_POST['name'];
        $adulty =(int) $_POST['adult'];
        $total = (int)$_POST['total'];
            $datos = [
                'res_name'=>$name,
                'res_rooms'=>$arr,
                'res_adult'=>$adulty,
                'res_cost'=>$total,
                'res_exit'=>$_POST['exit'],
                'res_entry'=>$_POST['entry'],
            ];
            $reserva->insert($datos);
        }
            $session->setFlashdata(['status'=>'success', 'msg'=>'Reserva aprobada correctamente']);
            return $this->response->redirect(site_url('/')); //send to the view;
    }
}   