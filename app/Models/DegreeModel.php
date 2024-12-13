<?php

namespace App\Models;

use CodeIgniter\Model;

class DegreeModel extends Model
{
    protected $table = 'degree';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';

    protected $useSoftDeletes = false;  // Ensure this is set if using soft deletes
    protected $allowedFields = ['name', 'short_name', 'create_date', 'years' , 'deleted_at'];
}

