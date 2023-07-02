<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\User;
use App\Models\Reserva;
class Users extends Controller{
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
        $bedrooms = new Bedrooms();
        $data['user'] = $userModel->where('user_session',1)->first();
        $data['bedrooms'] = $bedrooms->findAll();
        $data['header'] = view('template/header',$data);
        $data['footer'] = view('template/footer',$data);
        return view('user/roomsManage', $data);
    }
}