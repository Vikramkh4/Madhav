<?php

namespace App\Models;

use CodeIgniter\Model;

class NoticeModel extends Model
{
    protected $table = 'notice';
    protected $primaryKey = 'id';
    protected $allowedFields = ['title', 'date', 'notice','class'];
   
    protected $useSoftDeletes = false; // Set to false if you don't want to use soft deletes
}
