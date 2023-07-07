<?php 
namespace App\Models;

use CodeIgniter\Model;

class Bedroom extends Model{
    protected $table      = 'tor_rooms';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'room_id';
    protected $allowedFields = ['room_name','room_adult_cpty','room_image','room_price'];
}