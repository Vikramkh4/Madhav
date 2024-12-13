<?php

namespace App\Controllers\student;

use App\Controllers\BaseController;
use App\Models\ComplainModel;
use App\Models\DegreeModel;
use App\Models\SessionModel;
use App\Models\StudentModel;
use App\Models\ComplainCategoryModel;

class Student extends BaseController
{
    protected $validation;
    protected $complain;
    protected $category;

    public function __construct() {
        if (session()->get("role") !== STUDENTS_ROLE) {
            echo "Direct Access is not allowed";
            die;
        }
        $this->validation = \Config\Services::validation();
        $this->category = new ComplainCategoryModel();
        $this->complain = new ComplainModel();
        $this->DegreeModel = new DegreeModel();
        $this->StudentModel = new StudentModel();
        $this->SessionModel = new SessionModel();
    }

 public function update_studentview($id) {
    $data['page_title'] = "Student Update";
    $row = $this->StudentModel->find($id);
    $data['class'] = $this->DegreeModel->findAll();
         $data['session_year'] = $this->SessionModel->findAll();
         
    if ($row !== null) {
        $data['user'] = $row; // Changed variable name to 'row' for consistency
        
        return view(STD . "student/add_student", $data);
    }
    
    session()->setFlashdata('error', 'Student not found');
    return redirect()->to(STD . '/student/index');   
}

   
    
   
    
    
  


}
