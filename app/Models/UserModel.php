<?php 

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'username', 
        'email', 
        'mobile', 
        'password', 
        'status', 
        'profile', 
        'forget_password', 
        'reset_token_expiry', 
        'created_date', 
        'updated_date', 
        'remember_me'
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_date';
    protected $updatedField  = 'updated_date';
}








?>