<?php


namespace App\Controllers\admin;

use App\Controllers\BaseController;
use App\Models\UserModel;

class User extends BaseController
{    
    protected $validation;
    protected $usermodel;
    public function __construct() {
        if (session()->get("role") !== ADMIN_ROLE) {
            echo "Direct Access is not allowed";
            die;
        }
       // initilize code here 
       $this->validation = \Config\Services::validation();
       $this->usermodel = new UserModel();
    }

   
    public function index()
    {  
        $data['page_title'] = "Users";

        
        return view('admin/user/add_user',$data);
    }
    public function indsex()
    {  
        $data['page_title'] = "Users";

    

        
        return view('admin/user/add_user',$data);
    }

    public function save_user(){
        
    //   [table.field,ignore_field,ignore_value]
      
        $this->validation->setRules([
            'username' => 'required',
            'email' => 'required|valid_email|is_unique[user.email]',
            'mobile' => 'required|numeric|max_length[11]',
            'password' => 'required|min_length[6]',
            'confirm_password' => 'required|matches[password]',
        ]);

        if (!$this->validate($this->validation->getRules())) {
            return view('admin/user/add_user', ['validation' => $this->validator,'page_title'=>"Users"]);
        }
        $seletecd_role = "";
        $message = "";
        $profile = "";
        $file = $this->request->getFile('image');
        $uploadResult = uploadFile($file, USER_IMAGE_PATH);
        if ($uploadResult['status']) {
           $profile = $uploadResult['fileName'];
        }
        
        $username = (string) $this->request->getPost('username');
        $email = (string) $this->request->getPost('email');
        $mobile = $this->request->getPost('mobile');
        $password = (string) $this->request->getPost('password');
        $seletecd_role = $this->request->getPost('user');
      
        if($seletecd_role == "accoun"){
            $seletecd_role = ACCOUNTANT_USER;
             $message = ACCOUNTANT_ROLE; 
        }else{
            $seletecd_role = SUPPER_USER;
            $message = ADMIN_ROLE;
        }
        
        $user_obj = [
            "username"=>$username,
            "email"=>$email,
            "mobile"=>$mobile,
            "profile"=>$profile,
            "password"=>password_hash($password,PASSWORD_DEFAULT),
        ];
        
        
        //insert success other then error 
       if($this->usermodel->insert($user_obj)){
        $id  =   $this->usermodel->getInsertID();
        // seting permission to the user 
        if(setUserPersmissions($seletecd_role,$id)){
            return redirect()->to(ADMIN.'user_table')->with('success', ' '.$message.' Successfully Created');        
         }
       }

       session()->setFlashdata('error', 'Error Creating User');
       return view('admin/user/add_user', ['page_title'=>"Users"]);
    }
 
public function user_table() {
    $data['page_title'] = "User List";
    $all = $this->usermodel->findAll();
    // $db = db_connect();
    // $newRows = [];

    // foreach ($all as $row) {
    //     // Check if $row is not null and has 'id' key
    //     if (is_array($row) && isset($row['id'])) {
    //         $user_groups = $db->query("SELECT * FROM user_permission t1 INNER JOIN user_group t2 ON t1.user_group = t2.code WHERE t1.user_group IN (3, 2)");
    //         $alldata = $user_groups->getResult();
            
    //         // Check if alldata is not empty
    //         if (!empty($alldata)) {
                
    //             // Check if the first result is not null and has 'id' property
    //             if (isset($alldata[0]->id)) {
    //                 $user_id = $alldata[0]->id;
    //                 $user_data = $this->usermodel->find($user_id);
                    
    //                 // Check if $user_data is not null
    //                 if ($user_data !== null) {
    //                     $newRows[] = $user_data;
    //                 }
    //             }
    //         }
    //     }
    // }


    $data['userlist'] = $all;
    return view(ADMIN . "user/index", $data);
}



  
   public function edit_user($id){
    $data['page_title'] = "User Update";
     $row  =  $this->usermodel->find($id);
     if($row !== null){
        
        $data['user'] = $row;

        return view(ADMIN."user/update_user",$data);
     }
     session()->setFlashdata('error', 'User not found');
     return view(ADMIN.'/user/index',$data);
   }
  
  public function edit_save($id){

       $this->validation->setRules([
            'username' => 'required',
            'email' => 'required|valid_email',
            'mobile' => 'required|numeric|max_length[11]',
        ]);

        if (!$this->validate($this->validation->getRules())) {

          return redirect()->to(ADMIN.'edit_user/'.$id)->with('validation', $this->validator)->with('page_title' ,"Users");
        }     
    
    
        $seletecd_role = "";
       
        $username = (string) $this->request->getPost('username');
        $email = (string) $this->request->getPost('email');
        $mobile = $this->request->getPost('mobile');
        $seletecd_role = $this->request->getPost('user');
      
          $profile = "";
        $file = $this->request->getFile('image');
        $uploadResult = uploadFile($file, USER_IMAGE_PATH);
        if ($uploadResult['status']) {
           $profile = $uploadResult['fileName'];
        } 
      
         if($seletecd_role == "accoun"){
            $seletecd_role = ACCOUNTANT_USER;
             $message = ACCOUNTANT_ROLE; 
        }else{
            $seletecd_role = SUPPER_USER;
            $message = ADMIN_ROLE;
        }
       
        $user_obj = [
            "username"=>$username,
            "email"=>$email,
            "profile"=>$profile,
            "mobile"=>$mobile,
        ];
   
        if($this->usermodel->update($id , $user_obj)){
          if($seletecd_role !== null){  
           if(updateUserPermission($seletecd_role , $id)){
            return redirect()->to(ADMIN.'user_table')->with('success', 'Successfully Role and User Updated');
           }
        }
           return redirect()->to(ADMIN.'user_table')->with('success', 'Successfully  User Updated');
        }

    }


    public function block_user() {
     
        $id = $this->request->getGet("id");
  

        $user = $this->usermodel->find($id);
    
        if ($user) {
           
            $new_status = $user['status'] == '1' ? '0' : '1';
            $stat = $user['status'] == '1' ? 'Blocked' : 'Permitted';
             
            $data = [
                "status" =>  $new_status
            ];  
            $this->usermodel->update($id, $data);
            echo json_encode(['status' => 'success', 'message' => ''.$user['username'].' '.$stat.' successfully.']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'User not found.']);
        }
    }
    

}










?>