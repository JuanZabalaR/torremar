<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Reserva;
use App\Models\User;
class Reservas extends Controller{
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
                $session->setFlashdata('msg','La contrasena no corresponde con el usuario');
                return redirect()->back()->withInput();
            }
        }
        else{
            $session->setFlashdata('msg','Datos Invalidos');
            return redirect()->back()->withInput();
        }
    }
}   