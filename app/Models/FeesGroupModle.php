<?php

namespace App\Models;

use CodeIgniter\Model;

class FeesGroupModle extends Model
{
    protected $table      = 'feesgroup';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['fees_name', 'fees_group', 'class','create_date'];

}
