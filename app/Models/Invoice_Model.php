<?php

namespace App\Models;

use CodeIgniter\Model;

class Invoice_Model extends Model
{
    protected $table = 'invoice';
    protected $primaryKey = 'id';
    protected $allowedFields = ['student','class','total','discount','paid','balance','status','date','created_date'];
   
    protected $useSoftDeletes = false; // Set to false if you don't want to use soft deletes
}
