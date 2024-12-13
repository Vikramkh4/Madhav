<?php

namespace App\Models;

use CodeIgniter\Model;

class FeetypeModel extends Model
{
    protected $table = 'fees_type';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';

    protected $useSoftDeletes = false;  // Ensure this is set if using soft deletes
    protected $allowedFields = [	'fees_name',	'fees'	,'created_date'	
];



}
