<?php

namespace App\Models;

use CodeIgniter\Model;

class SettingModel extends Model
{
    protected $table      = 'setting';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $useSoftDeletes = true;
    protected $allowedFields = ['base_url', 'folder_path', 'name','email','phone','address',"email_host","email_user" ,"email_pass","email_port","email_protocal","email_subject"];





    
}
