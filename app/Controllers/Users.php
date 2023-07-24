<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\User;
use App\Models\Reserva;
use App\Models\Bedroom;
class Users extends Controller{
    // public function __construct()
    // {
    //     $us = new User();
    //     $valid = $us->where('user_session',1)->first();
    //     if($valid != []){
    //         return $this->response->redirect(base_url('login')); 
    //     }
    //     parent::__construct();
    // } 
    public function dashboard(){
        $userModel = new User();
        $bookings = new Reserva();
        $session = session();
        $data['user'] = $userModel->where('user_session',1)->first();
        $books = $bookings->findAll();
        if(isset($books))
            $data['bookings'] = $books;
        $data['header'] = view('template/header',$data);
        $data['footer'] = view('template/footer',$data);
        return view('user/dashboard', $data);
    }
    public function roomsManage(){
        $userModel = new User();
        $bedrooms = new Bedroom ();
        $data['user'] = $userModel->where('user_session',1)->first();
        $data['bedrooms'] = $bedrooms->findAll();
        $data['header'] = view('template/header',$data);
        $data['footer'] = view('template/footer',$data);
        return view('user/roomsManage', $data);
    }
    public function createRoom(){
        $userModel = new User();
        $bedrooms = new Bedroom();
        $data['user'] = $userModel->where('user_session',1)->first();
        // $data['bedrooms'] = $bedrooms;
        $data['header'] = view('template/header',$data);
        $data['footer'] = view('template/footer',$data);
        return view('user/createRoom', $data);
    }
    public function saveRoom(){
        $userModel = new User();
        $bedrooms = new Bedroom();
        $session = session();
        $room_name = $_POST['room_name'];
        $room_price = $_POST['room_price'];
        $adultyCpty = $_POST['room_adult_cpty'];
        $validation = $this->validate([
            'room_name'=>'required|min_length[3]',
            'room_adult_cpty'=>'required|numeric',
            'room_price'=>'required|numeric',
        ]);
        if(!$validation){
            $session = session();
            $session->setFlashdata(['status'=>'error', 'msg'=>'Revise la Informacion']);
            return redirect()->back()->withInput();
        }
        if($image = $this->request->getFile('room_image')){
            $newName = $image->getRandomName();
            $image->move('../public/uploads/',$newName);
            $datos = [
                'room_name'=>$room_name,
                'room_adult_cpty'=>$adultyCpty,
                'room_price'=>$room_price,
                'room_image'=>$newName
            ];
            $bedrooms->insert($datos);
            return $this->response->redirect(site_url('/roomsManage')); //send to the view;
        }
    }
    public function logout(){
        $userModel = new User();
        $bookings = new Reserva();
        $user = $userModel->where('user_session',1)->first();
        $id = $user['user_id'];
        $userModel->whereIn('user_id',[$id])->set(['user_session' => 0])->update();
        return $this->response->redirect(site_url('/')); 
    }
    public function deleteRoom($id=null){
        $session = session();
        $room = new Bedroom();
        $hab = $room->find($id); //Search
        $ruta = ('../public/uploads/'.$hab['room_image']); //Route img
            unlink($ruta); //delete file
        $room->where('room_id',$id)->delete(); //Delete in bd the record
        $session->setFlashdata(['status'=>'success', 'msg'=>'Habitacion Eliminada correctamente']);
        return $this->response->redirect(site_url('/roomsManage')); //send to the view
    }
    public function aprobar($id=null){
        $session = session();
        $reserv = new Reserva();
        $reserv->whereIn('res_id',[$id])->set(['res_approved' => 1])->update();
        $session->setFlashdata(['status'=>'success', 'msg'=>'Reserva Aprovada']);
        return $this->response->redirect(site_url('/dashboard')); //send to the view
    }
    public function rechazar($id=null){
        $session = session();
        $reserv = new Reserva();
        $reserv->whereIn('res_id',[$id])->set(['res_approved' => 2])->update();
        $session->setFlashdata(['status'=>'success', 'msg'=>'Reserva Rechazada']);
        return $this->response->redirect(site_url('/dashboard')); //send to the view
    }

}