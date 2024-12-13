<?php


namespace App\Controllers\teacher;
use App\Controllers\BaseController;
use App\Models\UserModel;

class Home extends BaseController
{
    protected $user; 
    public function __construct() {
      if(session()->get("role") !== TEACHER_ROLE){
        echo "Direct Access is not alled";
        return die;
       
      }
      $this->user = new UserModel();
 }
    //home function dashboard start from here
    public function index(): string
    {   $data['page_title'] = "Dashboard";
         
        return view(TECH.'home',$data);
    }

    
}