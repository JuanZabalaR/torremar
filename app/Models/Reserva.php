<?php 
namespace App\Models;

use CodeIgniter\Model;

class Reserva extends Model{
    protected $table      = 'tor_reserve';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'res_id';
    protected $allowedFields = ['res_name','res_entry','res_exit','res_rooms','res_adult','res_approved','res_cost'];
}