<?php


namespace App\Controllers\accountant;
use App\Controllers\BaseController;
use App\Models\UserModel;

class Home extends BaseController
{
    protected $user; 
    public function __construct() {
      if(session()->get("role") !== ACCOUNTANT_ROLE){
       echo "Direct Access is not alled";
       die;
       return;
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
        return view(ACCO.'home',$data);
    }

    
}