<?php

namespace App\Controllers\student;

use App\Controllers\BaseController;
use App\Models\ComplainModel;
use App\Models\DegreeModel;
use App\Models\SessionModel;
use App\Models\UserModel;
use App\Models\StudentModel;
use App\Models\ComplainCategoryModel;

class AppStudent extends BaseController
{
    protected $validation;
    protected $complain;
    protected $category;

    public function __construct() {
    
        $this->validation = \Config\Services::validation();
        $this->category = new ComplainCategoryModel();
        $this->complain = new ComplainModel();
        $this->DegreeModel = new DegreeModel();
        $this->StudentModel = new StudentModel();
        $this->SessionModel = new SessionModel();
        $this->UserModel = new UserModel();
    }

public function update_studentview($id) {
    $pass = $this->request->getGet("password");
    $data['page_title'] = "Student Update";

    try {
        $user = $this->UserModel->find($id);
        if (!$user) {
            throw new \Exception("User not found");
        }
        $student = $this->StudentModel->where("student_id", $user['id'])->first();
    } catch (\Exception $e) {
        return $this->response->setStatusCode(500)->setBody("Something went wrong: " . $e->getMessage());
    }

    $data['class'] = $this->DegreeModel->findAll();
    $data['session_year'] = $this->SessionModel->findAll();
    $mobile = (string) $this->request->getGet("verify_mobile");

    if ($user && $user['mobile'] === $mobile && $pass == $user['password']) {
        if ($student !== null) {
            $data['user'] = $student;

            return view(STD . "student/update_student", $data);
        } else {
            return $this->response->setStatusCode(404)->setBody("Student not found");
        }
    }

    return $this->response->setStatusCode(404)->setBody("Student not found or invalid credentials");
}

    
public function studentEdit($id)
{
    $email = $this->request->getPost("verify_mobile");
    $pass = $this->request->getPost("password");
    $row = $this->StudentModel->find($id);
    $this->validation->setRules([
        'non_criminal_report' => ['label' => 'No Criminal Report check', 'rules' => 'required'],
        'anti_raggin' => ['label' => 'Anti Ragging check', 'rules' => 'required'],
        'gap_report' => ['label' => 'Gap Report', 'rules' => 'required'],
    ]);

    if (!$this->validate($this->validation->getRules())) {
        return redirect()->back()->with('validation', $this->validator)->withInput();
    }
    try {
        if (!$row) {
            throw new \Exception("Student not found");
        }

        $user = $this->UserModel->find($row['student_id']);
        if (!$user) {
            throw new \Exception("User not found");
        }

        if ($user['mobile'] !== $email && $pass !== $user['password']) {
            return redirect()->back()->with('error', "Something went wrong");
        }
      
            $data = [
                'father_name' => trim($this->request->getPost('father_name')),
                'mother_name' => trim($this->request->getPost('mother_name')),
                'mobile' => trim($this->request->getPost('mobile')),
                'email' => trim($this->request->getPost('email')),
                'abc_id' => trim($this->request->getPost('abc_id')),
                'category' => trim($this->request->getPost('category')),
                'gender' => trim($this->request->getPost('gender')),
                'address' => trim($this->request->getPost('address')),
                'session_year' => trim($this->request->getPost('session_year')),
                'gap_report' => trim($this->request->getPost('gap_report')),
                'whapsup_no' => trim($this->request->getPost('whapsup_no')),
                'father_mobile_no' => trim($this->request->getPost('father_mobile_no')),
                'local_address' => trim($this->request->getPost('local_address')),
                'non_criminal_report' => trim($this->request->getPost('non_criminal_report')),
                'anti_raggin' => trim($this->request->getPost('anti_raggin')),
                'religion' => trim($this->request->getPost('religion')),
                'state' => trim($this->request->getPost('state')),
                'city' => trim($this->request->getPost('city')),
                'college_recipt_no' => trim($this->request->getPost('college_recipt_no')),
                'date_college_recipt' => trim($this->request->getPost('date_college_recipt')),
                'tripal_samgra_id' => trim($this->request->getPost('tripal_samgra_id')),
                'updated_date' => date('Y-m-d')
            ];

    
    // image upload 
    
    
    $uploadResult1 = uploadFile($this->request->getFile("student_photo"), IMAGE_PATH);
    if ($uploadResult1['status']) {
        $data['student_photo'] = $uploadResult1['fileName'];
    }

    $uploadResult2 = uploadFile($this->request->getFile("sign_of_student"), IMAGE_PATH);
    if ($uploadResult2['status']) {
        $data['sign_of_student'] = $uploadResult2['fileName'];
    }
 
    $uploadResult3 = uploadFile($this->request->getFile("allotment_letter"), FILES_PATH);
    if ($uploadResult3['status']) {
        $data['allotment_letter'] = $uploadResult3['fileName'];
    }
 
    $uploadResult4 = uploadFile($this->request->getFile("online_admission_recipet"), FILES_PATH);
    if ($uploadResult4['status']) {
        $data['online_admission_recipet'] = $uploadResult4['fileName'];
    } 
 
    $uploadResult5 = uploadFile($this->request->getFile("college_recipt"), FILES_PATH);
    if ($uploadResult5['status']) {
        $data['college_recipt'] = $uploadResult5['fileName'];
    }
 
    $uploadResult6 = uploadFile($this->request->getFile("10th_result"), FILES_PATH);
    if ($uploadResult6['status']) {
        $data['10th_result'] = $uploadResult6['fileName'];
    }
    
    $uploadResult7 = uploadFile($this->request->getFile("12th_result"), FILES_PATH);
    if ($uploadResult7['status']) {
        $data['12th_result'] = $uploadResult7['fileName'];
    } 
  
    $uploadResult8 = uploadFile($this->request->getFile("snanthak_result_allyear"), FILES_PATH);
    if ($uploadResult8['status']) {
        $data['snanthak_result_allyear'] = $uploadResult8['fileName'];
    } 
   
    $uploadResult9 = uploadFile($this->request->getFile("tc"), FILES_PATH);
    if ($uploadResult9['status']) {
        $data['tc'] = $uploadResult9['fileName'];
    } 
    
    $uploadResult10 = uploadFile($this->request->getFile("migration_certificate"), FILES_PATH);
    if ($uploadResult10['status']) {
        $data['migration_certificate'] = $uploadResult10['fileName'];
    } 
    
    $uploadResult11 = uploadFile($this->request->getFile("adhar_card"), FILES_PATH);
    if ($uploadResult11['status']) {
        $data['adhar_card'] = $uploadResult11['fileName'];
    }
    
       $user_obj = ["email" => trim($this->request->getPost('email'))];

            if ($this->StudentModel->update($id, $data) && $this->UserModel->update($this->request->getPost('student_id'), $user_obj)) {
                return redirect()->back()->with('success', "Successfully  Updated");
            }
    
    } catch (\Exception $e) {
        echo "Something went wrong: " . $e->getMessage();
        die;
    }
}  
  
    
  


}
