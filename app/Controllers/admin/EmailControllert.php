<?php


namespace App\Controllers\admin;
use App\Controllers\BaseController;
use App\Models\UserModel;

class EmailControllert extends BaseController
{
    protected $user; 
    public function __construct() {
      if(session()->get("role") !== ADMIN_ROLE){
       echo "Direct Access is not alled";
       die;
       return;
      }
      $this->user = new UserModel();
 }
    //home function dashboard start from here
    public function index(): string
    {   
        $data['page_title'] = "Email SetUp";
        return view(ADMIN.'email/email',$data);
    }

    
}
