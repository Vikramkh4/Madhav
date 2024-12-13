<?php


namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BannerModel;
use App\Models\ComplainModel;
use App\Models\StudentModel;
use App\Models\NoticeModel;
use App\Models\SessionModel;
use App\Models\UserModel;
use App\Models\ComplainCategoryModel;

class Api extends BaseController
{
    protected $validation;
    protected $category;
    protected $banner;
    protected $notice;
    protected $UserModel; // Ensure this matches the usage in the constructor

    public function __construct() {
        $this->banner = new BannerModel();
        $this->complain = new ComplainModel();
        $this->notice = new NoticeModel();
        $this->student = new StudentModel();
        $this->SessionModel = new SessionModel();
        $this->UserModel = new UserModel(); // Match the property name used here
        $this->validation = \Config\Services::validation();
    }
    public function get_banner() {
        
        $data  = $this->banner->findAll();
        
        return $this->response->setJSON(['error' => false,'data' => $data]);
    }
    
public function save_banner() {
    $data = ['error' => false, 'data' => []];
    
    // Define validation rules
    $rules = [
        'name' => 'required',
        'image' => [
            'uploaded[image]',
            'mime_in[image,image/jpg,image/jpeg,image/gif,image/png]',
            'max_size[image,2048]'
        ]
    ];

    // Validate the request
    if (!$this->validate($rules)) {
        $data['error'] = true;
        $data['data'] = $this->validator->getErrors();
        return $this->response->setJSON($data);
    }
    $newName = '';
    $file = $this->request->getFile('image');
    if(!empty($file) && isset($file)){
    if ($file->isValid() && !$file->hasMoved()) {
        $newName = $file->getRandomName();
        $file->move('uploads/banner', $newName);
 
    } else {
        $data['error'] = true;
        $data['data'] = ['image' => 'File upload failed.'];
        return $this->response->setJSON($data);
    }
    }
        $name = $this->request->getVar('name');
        $saveData = [
            'name' => $name,
            'image' => $newName
        ];
        if ($this->banner->insert($saveData)) {
            return $this->response->setJSON(['error' => false, 'data' => 'Added successfully']);
        }
    
        return $this->response->setJSON(['error' => true, 'data' => 'Failed to save banner']);
}


  public function get_Complaint(){
     $data =  $this->complain->findAll();
         
     return $this->response->setJSON(['error' => FALSE, 'data' => $data]);
  } 
  
 public function save_complaint() {
        $data = ['error' => false, 'data' => []];
    
        // Define validation rules
        $rules = [
            'name' => 'required',
            
            
            'problem' => 'required',
        ];

        // Validate the request
        if (!$this->validate($rules)) {
            $data['error'] = true;
            $data['data'] = $this->validator->getErrors();
            return $this->response->setJSON($data);
        }

        $name = $this->request->getVar('name');     
        $year = $this->request->getVar('year');     
        $enrollno = $this->request->getVar('enrollno');     
        $branch = $this->request->getVar('branch');     
        $contact = $this->request->getVar('contact');     
        $problem = $this->request->getVar('problem');     
        $category = $this->request->getVar('category');     

        $file = $this->request->getFile('image');
        $newFileName = '';

        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newFileName = $file->getRandomName();
            $file->move('upload/complaint', $newFileName);
        }

        $saveData = [
            'name' => $name,
            'year' => $year,
            'enrollno' => $enrollno,
            'branch' => $branch,
            'contact' => $contact,
            'problem' => $problem,
            'category' => $category,
            'file' => $newFileName
        ];

        if ($this->complain->insert($saveData)) {
            return $this->response->setJSON(['error' => false, 'data' => 'Complaint added successfully']);
        } else {
            return $this->response->setJSON(['error' => true, 'data' => 'Failed to save complaint']);
        }
    }   


private function uploadFile($file, $path) {
    // Assuming upload logic here, returning an array with 'status' and 'fileName'
    if ($file->isValid() && !$file->hasMoved()) {
        $fileName = $file->getRandomName();
        $file->move($path, $fileName);
        return ['status' => true, 'fileName' => $fileName];
    }
    return ['status' => false, 'fileName' => ''];
}



 

public function edit_Complaint() {
        $data = ['error' => false, 'data' => []];

        $rules = [
            'id' => 'required|integer',
            'year' => 'required',
            'name' => 'required',
            'enrollno' => 'required',
            'branch' => 'required',
            'contact' => 'required',
            'problem' => 'required',
             'category' => 'required'
        ];

        if (!$this->validate($rules)) {
            $data['error'] = true;
            $data['data'] = $this->validator->getErrors();
            return $this->response->setJSON($data);
        }

        $id = $this->request->getVar('id');
        $complaint = $this->complain->find($id);
        
        if (!$complaint) {
            return $this->response->setJSON(['error' => true, 'data' => 'Complaint not found']);
        }

        $name = $this->request->getVar('name');     
        $year = $this->request->getVar('year');     
        $enrollno = $this->request->getVar('enrollno');     
        $branch = $this->request->getVar('branch');     
        $contact = $this->request->getVar('contact');     
        $problem = $this->request->getVar('problem');     
        $category = $this->request->getVar('category');

        // Check if a new file is uploaded
        $file = $this->request->getFile('image');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            // Delete old file if exists
            if ($complaint['file']) {
                if (file_exists('upload/complaint/' . $complaint['file'])) {
                    unlink('upload/complaint/' . $complaint['file']);
                }
            }
            // Upload new file
            $newFileName = $file->getRandomName();
            $file->move('upload/complaint', $newFileName);
        } else {
            // Retain the old file name if no new file is uploaded
            $newFileName = $complaint['file'];
        }

        $updateData = [
            'name' => $name,
            'year' => $year,
            'enrollno' => $enrollno,
            'branch' => $branch,
            'contact' => $contact,
            'problem' => $problem,
            'category' => $category,
            'file' => $newFileName
        ];

        if ($this->complain->update($id, $updateData)) {
            return $this->response->setJSON(['error' => false, 'data' => 'Updated successfully']);
        }

        return $this->response->setJSON(['error' => true, 'data' => 'Failed to update complaint']);
    }
    
    
    
public function delete_Complaint() 
{
     $data = ['error' => false, 'data' => []];

        $rules = [
            'id' => 'required|integer'
        ];

        if (!$this->validate($rules)) {
            $data['error'] = true;
            $data['data'] = $this->validator->getErrors();
            return $this->response->setJSON($data);
        }

        $id = $this->request->getVar('id');
        $complaint = $this->complain->find($id);
        
        if (!$complaint) {
            return $this->response->setJSON(['error' => true, 'data' => 'Complaint not found']);
        }

        if ($complaint['file']) {
            if (file_exists('upload/complaint/' . $complaint['file'])) {
                unlink('upload/complaint/' . $complaint['file']);
            }
        }

        if ($this->complain->delete($id)) {
            return $this->response->setJSON(['error' => false, 'data' => 'Deleted successfully']);
        }

        return $this->response->setJSON(['error' => true, 'data' => 'Failed to delete complaint']);
    
}


public function getNotice(){
   $data  =    $this->notice->findAll();
    
    return $this->response->setJSON(['error' => false, 'data' => $data]); 
}

 public function save_notice(){
   $rules = [
            'title' => 'required',
            'date' => 'required',
        ];

        if (!$this->validate($rules)) {
            $data['error'] = true;
            $data['data'] = $this->validator->getErrors();
            return $this->response->setJSON($data);
        }
       $data = [
           'title' => $this->request->getVar('title'),
           'date' => $this->request->getVar('date'),
           'notice' => $this->request->getVar('notice'),
           ] 
        ;
        
        if($this->notice->insert($data)){
          return $this->response->setJSON(['error' => false, 'data' => $data]);   
        }else{
          return $this->response->setJSON(['error' => true, 'data' => []]);  
        }
   }
   
public function delete_notice() {
   
    $id = $this->request->getVar('id');
 
    if (!empty($id) && is_numeric($id)) {
        try {
           $deleteResult = $this->notice->delete($id);
            if ($deleteResult) {
                return $this->response->setJSON(['error' => false, 'data' => "Deleted Successfully"]);
            } else {
             
                return $this->response->setJSON(['error' => true, 'data' => "No notice found with the given ID"]);
            }
        } catch (\Exception $e) {

            return $this->response->setJSON(['error' => true, 'data' => $e->getMessage()]);
        }
    }
   return $this->response->setJSON(['error' => true, 'data' => "Invalid ID"]);
}

public function update_notice(){
    
      $rules = [
            'title' => 'required',
            'date' => 'required',
        ];

        if (!$this->validate($rules)) {
            $data['error'] = true;
            $data['data'] = $this->validator->getErrors();
            return $this->response->setJSON($data);
        }
        $id  = $this->request->getVar('id');
        if(empty($id) && $id == null){
         return $this->response->setJSON(['error' => true, 'data' => []]);   
        }
       $data = [
           'title' => $this->request->getVar('title'),
           'date' => $this->request->getVar('date'),
           'notice' => $this->request->getVar('notice'),
           ];
        
        if($this->notice->update($id , $data)){
          return $this->response->setJSON(['error' => false, 'data' =>'Updated Successfully']);   
        }else{
          return $this->response->setJSON(['error' => true, 'data' => []]);  
        }
    
    
}



 public function get_login() {
    $email = (string) $this->request->getVar('email');
    $password = (string) $this->request->getVar('password'); 

    $json = [
        'error' => true,
        'data' => 'fail'
    ];

    $validationRules = [
        'email' => 'required|valid_email',
        'password' => 'required'
    ];

    if (!$this->validate($validationRules)) {
        $json['data'] =  $this->validator->getErrors();
        return $this->response->setJSON($json);
    }

    $userModel = new UserModel();
    $user = $userModel->where('email', $email)->first();

    if ($user && $user['status'] == LOGIN_PERMISSION) {
        if (password_verify($password, $user['password'])) {
            $permissionRow = get_Permission($email, $password);
            $permission = $permissionRow['user_group'];

            switch ($permission) {
                case STUDENT_USER:
                    $img = $user['profile'];
                    $session = "";
                    $student = null;

                    try {
                        $student = $this->student->where("student_id", $user['id'])->first(); // Use `first()` to get a single result
                        if ($student) {
                            $s_id = $student['session_year'];
                            $session = $this->SessionModel->find($s_id);
                        }
                    } catch (\Exception $e) {
                        // Handle exception if needed
                    }

                    // Ensure $student and $session data are valid before accessing their properties
                    if ($student && $session) {
                        $user_obj = [
                            "id" => $user['id'] ?? "",
                            "username" => $user['username'] ?? "",
                            "email" => $user['email'] ?? "",
                            "mobile" => $user['mobile'] ?? "",
                            "profile" => base_url(USER_IMAGE_PATH . '/' . $img),
                            "branch" => $student['branch'] ?? "",
                            "session" => $session['session_date'] ?? "",
                            "enrollment" => $student['enrollment_no'] ?? "",
                            "mother" => $student['mother_name'] ?? "",
                            "father" => $student['father_name'] ?? "",
                            "student_image" => base_url(IMAGE_PATH . '/' . ($student['student_photo'] ?? "")),
                            "password" => $user['password'] ?? "",
                            "created_date" => $user['created_date'] ?? "",
                            "updated_date" => $user['updated_date'] ?? "",
                        ];
                        $json['error'] = false;
                        $json['data'] = $user_obj;
                        return $this->response->setJSON($json);
                    } else {
                        $json['data'] = 'Student or session data not found';
                    }
                    break;
                default:
                    $json['data'] = 'Invalid user group';
                    break;
            }
        } else {
            $json['data'] = 'Invalid password';
        }
    } else {
        $json['data'] = 'User not found or no login permission';
    }

    return $this->response->setJSON($json);
}





 public function profile_view(){
  
   
    $validationRules = [
        'id' => 'required'
    ];
    $json = [
        'error' => true,
        'data' => 'fail'
    ];
    if (!$this->validate($validationRules)) {
        $json['data'] =  $this->validator;
         return $this->response->setJSON($json);
    }
    $id  =  $this->request->getVar('id');
    
    $userModel = new UserModel(); 
    $user = $userModel->find($id);
    $info_of_user = getPermissionByUserId($id,'id');
 
    if($info_of_user == STUDENT_USER){ 
    if($user && $user !== null){
     $student_info = $this->student->find($id);
    
    $main['user'] = $user; 
    $main['student'] = $student_info; 
    $json = [
        'error' => false,
        'data' => $main
    ]; 
     
    return  $this->response->setJSON($json); 
    
        
    }else{
        $json['data'] = "User not Found";
       echo  $this->response->setJSON($json);   
    } 
    }else{
       $json['data'] = "Direct Access is not allowed";
       return  $this->response->setJSON($json);     
    }
     
     
 }

public function forget_password()
{
   
    $validationRules = [
        'email' => 'required|valid_email'
    ];

    $json = [
        'error' => true,
        'data' => 'fail'
    ];

    // Validate the input
    if (!$this->validate($validationRules)) {
        $json['error'] = true;
        $json['data'] = $this->validator->getError('email'); // Get the error message for the email field
        return $this->response->setJSON($json);
    }

    $email = $this->request->getPost('email');
    $user = $this->UserModel->where('email', $email)->first();

    // Check if user exists
    if ($user ) {
        // Generate a password reset token
        $resetToken = bin2hex(random_bytes(10)); // Generate a secure random token
        $resetTokenExpiry = date('Y-m-d H:i:s', strtotime('+1 hour')); // Set the token expiry time

        // Save the token and expiry to the user record
        $users['forget_password'] = $resetToken;
        $users['reset_token_expiry'] = $resetTokenExpiry;
        
        $this->UserModel->update($user['id'], $users);

        // Send password reset email
        $emailSent = $this->sendResetEmail($user['email'], $resetToken);

        if (!$emailSent['error']) {
            $json['error'] = false;
            $json['data'] = 'Password reset link sent to your email.';
        } else {
            $json['error'] = true;
            $json['data'] = 'Failed to send password reset email. Please try again later.';
        }
    } else {
        $json['error'] = true;
        $json['data'] = 'No account found with this email address.';
    }

    return $this->response->setJSON($json);
}


private function sendResetEmail($email, $resetToken)
{
    try {
        $emailService = \Config\Services::email();
        $data['token'] = $resetToken;
        $email_view = view("email/forget_email", $data);
        $emaildata = getAppDetailsArray(1);
        
        if (empty($emaildata) ||!isset($emaildata['email_user']) ||!isset($emaildata['email_subject'])) {
            throw new \Exception('Failed to get email configuration');
        }
        
        $emailService->setFrom($emaildata['email_user'], $emaildata['email_subject']);
        $emailService->setTo($email);
        $emailService->setSubject('Password Reset Request');
        $emailService->setMessage($email_view);
        
        if (!$emailService->send()) {
            $error = $emailService->printDebugger(['headers', 'ubject', 'body']);
            throw new \Exception('Failed to send email: '. $error);
        }
        
        $json['error'] = false;
        $json['data'] = 'Email sent successfully to your registered Mail';
    } catch (\Exception $e) {
        $json['error'] = true;
        $json['data'] = 'Something went wrong: '. $e->getMessage();
    }
    return $json;
}





    
}

?>
