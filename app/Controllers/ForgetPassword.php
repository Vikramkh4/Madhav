<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BannerModel;
use App\Models\ComplainModel;
use App\Models\StudentModel;
use App\Models\NoticeModel;
use App\Models\UserModel;
use App\Models\ComplainCategoryModel;

class ForgetPassword extends BaseController
{
    public function __construct() {
        $this->banner = new BannerModel();
        $this->complain = new ComplainModel();
        $this->notice = new NoticeModel();
        $this->student = new StudentModel();
        $this->UserModel = new UserModel();
        $this->validation = \Config\Services::validation();
    }
    
  public function forget_password() {
      $ket_token = $this->request->getGet('token');
      $user = $this->UserModel->where("forget_password",$ket_token)->first();
    
      if($user && !empty($ket_token)){
      return view("email/forget_passwordform");
      }else{
          echo "someting went wrong";
          die;
      }
      
  } 
    
public function change_password() {
   
    $ket_token = $this->request->getPost('token');
    $new_password = $this->request->getPost('new_password');
    $confirm_password = $this->request->getPost('confirm_password');

 
    $user = $this->UserModel->where('forget_password', $ket_token)->first();

  
    if ($user && !empty($ket_token) && $ket_token == $user['forget_password']) {
       
        if ($new_password === $confirm_password) {
            
            $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

       
            $this->UserModel->update($user['id'], [
                'password' => $hashed_password,
                'forget_password' => null 
            ]);

          
             echo  'Password has been successfully changed.';
             die;
        } else {
          
             echo 'New password and confirm password do not match.';
              die;
        }
    } else {
        echo 'Invalid token or user does not exist.';
        die; 
    }
}
 


  
    
 
}