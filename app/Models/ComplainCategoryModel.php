<?php

namespace App\Models;

use CodeIgniter\Model;

class ComplainCategoryModel extends Model
{
    protected $table = 'complain_category';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';

    protected $useSoftDeletes = false; 
    protected $allowedFields = ['name', 'created_date'];
}

