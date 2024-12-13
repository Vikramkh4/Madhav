<?php

namespace App\Models;

use CodeIgniter\Model;

class ComplainModel extends Model
{
    protected $table = 'complain';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['name', 'problem', 'category', 'file','comments'];
}
