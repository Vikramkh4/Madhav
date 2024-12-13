<?php


namespace App\Controllers\student;
use App\Controllers\BaseController;
use App\Models\UserModel;

class Home extends BaseController
{
    protected $user; 
    public function __construct() {
      if(session()->get("role") !== STUDENTS_ROLE){
        echo "Direct Access is not alled";
        return die;
       
      }
      $this->user = new UserModel();
 }
    //home function dashboard start from here
    public function index(): string
    {   $data['page_title'] = "Dashboard";
         $user = $this->user->findAll();
         $count = '';
         $temp = 0;
         foreach($user as $row){
             if($row != 1){
            $count = $temp++;      
             }
         }
         $data['user'] = $count;
        return view(STD.'home',$data);
    }

    
}