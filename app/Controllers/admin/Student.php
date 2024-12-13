<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;
use App\Models\StudentModel;
use App\Models\SessionModel;
use App\Models\DegreeModel;
use App\Models\Invoice_Model;
use App\Models\UserModel;


class Student extends BaseController
{
    protected $validation;
    protected $student;
     protected $invoice;
    protected $sessionmodel;
    protected  $usermodel;
    public function __construct() {
        if (session()->get("role") !== ADMIN_ROLE) {
            echo "Direct Access is not allowed";
            die;
            return;
        }
        $this->validation = \Config\Services::validation();
        $this->student = new StudentModel();
          $this->invoice =  new Invoice_Model();
          $this->classModel = new DegreeModel();
          $this->usermodel = new UserModel();
          $this->sessionmodel = new SessionModel();
    }

    public function index(): string {
        $data['page_title'] = "Student";
         $data['class'] = $this->classModel->findAll();
         $data['session_year'] = $this->sessionmodel->findAll();
         
        return view(ADMIN . 'student/add_student', $data);
    }

public function save_student() {
$this->validation->setRules([
    'name' => ['label' => 'Name', 'rules' => 'required'],
    'dob' => ['label' => 'Date of Birth', 'rules' => 'required|valid_date'],
    'email' => ['label' => 'Email Address', 'rules' => 'required|valid_email|is_unique[user.email]'],
    'category' => ['label' => 'Category', 'rules' => 'required'],
    'address' => ['label' => 'Address', 'rules' => 'required'],
    'class' => ['label' => 'Class', 'rules' => 'required'],
    'session_year' => ['label' => 'Session Year', 'rules' => 'required'],
    'user_password' => ['label' => 'Password', 'rules' => 'required'],
    'payment_type' => ['label' => 'Payment Type', 'rules' => 'required'],
]);
if (!$this->validate($this->validation->getRules())) {
    return redirect()->to(ADMIN . 'student')->with('validation', $this->validator)->withInput();
}
// Process payment type and payment breakups
$payment_type = $this->request->getPost('payment_type');
$value = $payment_type == "full" ? 0 : 1;
$array = $payment_type == "full" ? [] : $this->request->getPost('payment');
$my_array = [];

if (!empty($array) && is_array($array)) {
    foreach ($array as $i => $payment) {
        $my_array[] = [
            "id" => $i,
            "value" => $payment,
            "pay" => 0,
        ];
    }
}
// 1 means pay and 0 means not paid
try{
$news = new DegreeModel();
$classid  = $this->request->getPost('class');
$myclass = $news->find($classid);
}
catch(\Exception $e){
    $myclass['name'] = NULL;
}
$data = [
    'enrollment_no' => getCollegeId($myclass['name']),
    'name' => trim($this->request->getPost('name')),
    'father_name' => trim($this->request->getPost('father_name')),
    'mother_name' => trim($this->request->getPost('mother_name')),
    'dob' => trim($this->request->getPost('dob')),
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
    'anti_ragging' => trim($this->request->getPost('anti_ragging')),
    'religion' => trim($this->request->getPost('religion')),
    'state' => trim($this->request->getPost('state')),
    'city' => trim($this->request->getPost('city')),
    'class' => trim($this->request->getPost('class')),
    'branch' => trim($this->request->getPost('branch')),
    'college_receipt_no' => trim($this->request->getPost('college_receipt_no')),
    'date_college_receipt' => trim($this->request->getPost('date_college_receipt')),
    'tripal_samgra_id' => trim($this->request->getPost('tripal_samgra_id')),
    'paytype_status' => $value,
    'payment_breakups' => json_encode($my_array), // Ensure it's properly formatted
    'created_date' => date('Y-m-d H:i:s'),
    'updated_date' => date('Y-m-d H:i:s'),
];
    $user_obj = [
            "username"=>trim($this->request->getPost('name')),
            "email"=> trim($this->request->getPost('email')),
            "mobile"=>trim($this->request->getPost('mobile')),
            "password"=>password_hash(((string)$this->request->getPost('user_password')),PASSWORD_DEFAULT),
      ];
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
        $data[' '] = $uploadResult7['fileName'];
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
if ($this->usermodel->insert($user_obj)) {
    $id = $this->usermodel->getInsertID();
    setUserPersmissions(STUDENT_USER, $id);
    $data['student_id'] = $id;
    if ($this->student->insert($data)) {
        $newid = $this->student->getInsertID();
        $total = get_totalAmount($this->request->getPost('class'));
        $newstudent = $this->student->find($newid);
        $feesmanagment = [
            'student' => $newstudent['id'],
            'class' => $newstudent['class'],
            'date' => date('Y-m-d'),
            'total' => $total,
            'discount' => 0.00,
            'paid' => 0,
            'balance' => $total, // Assuming the balance is initially the total amount
            'status' => UNPAID,
            'created_date' => date('Y-m-d')
        ];
        if ($this->invoice->insert($feesmanagment)) {
            return redirect()->to(ADMIN . 'studenttable')->with('success', 'Successfully Created');
        } else {
            // Capture and log any database errors
            $db = \Config\Database::connect();
            $error = $db->error();
            log_message('error', 'DB Error: ' . json_encode($error));
            return redirect()->to(ADMIN . 'studenttable')->with('error', 'Something went wrong with invoice insertion');
        }
    } else {
        // Capture and log any database errors
        $db = \Config\Database::connect();
        $error = $db->error();
        log_message('error', 'DB Error: ' . json_encode($error));
        return redirect()->to(ADMIN . 'studenttable')->with('error', 'Something went wrong with student insertion');
    }
} else {
    // Capture and log any database errors
    $db = \Config\Database::connect();
    $error = $db->error();
    log_message('error', 'DB Error: ' . json_encode($error));
    return redirect()->to(ADMIN . 'studenttable')->with('error', 'Something went wrong with user insertion');
}
}




 
public function student_list() {
        $data['page_title'] = "Student List";
        $data['students'] = $this->student->findAll();
        $sesion = new DegreeModel();
        $data['degree']  =   $sesion->findAll();
        return view(ADMIN . 'student/index', $data);
    }
    

public function student_list_ajax() {
    $studentsQuery = $this->student; 
    if ($this->request->getPost("id") && $_POST['id']) {
        $studentsQuery->where("class", $this->request->getPost("id"));
    }
    $students = $studentsQuery->findAll();
    $data = [];
    foreach ($students as $key => $student) {
        $row = [];
        $row[] = $key + 1;
        $row[] = $student['enrollment_no'];
        $row[] = $student['name'];
        $row[] = $student['father_name'];
        $row[] = $student['mother_name'];
        $row[] = $student['dob'];
        $row[] = $student['mobile'];
        $row[] = $student['email'];
        $row[] = $student['abc_id'];
        $row[] = $student['category'];
        $row[] = $student['gender'];
        $row[] = $student['address'];
        $row[] = '
            <a href="'.site_url(ADMIN . 'update_student/' . $student['id']).'" class="btn btn-primary btn-sm">Edit</a>
            <button type="button" class="btn btn-danger btn-sm delete-button" data-id="'.$student['id'].'">Delete</button>
        ';
        $data[] = $row;
    }

    $output = [
        "recordsTotal" => count($students),
        "recordsFiltered" => count($students),
        "data" => $data,
    ];

    echo json_encode($output);
}


public function update_studentview($id) {
    $data['page_title'] = "Student Update";
    $row = $this->student->find($id);
    $data['class'] = $this->classModel->findAll();
    $data['session_year'] = $this->sessionmodel->findAll();

    if ($row !== null) {
        $data['user'] = $row;

        if (!empty($row['payment_breakups'])) {
            $breakups = $row['payment_breakups'];
            $array = json_decode($breakups, true);
            $newArray = [];

            foreach ($array as $item) {
                $newArray[] = [
                    "id" => $item['id'],
                    "value" => $item['value'],
                    "pay" => $item['pay']
                ];
            }

            $data['payment'] = $newArray;
        } else {
            $data['payment'] = []; // Initialize as empty array if no payment breakups
        }

        return view(ADMIN . "student/update_student", $data);
    }

    session()->setFlashdata('error', 'Student not found');
    return redirect()->to(ADMIN . '/student/index');   
}


public function update_save_student($id) {
   $this->validation->setRules([
        'name' => ['label' => 'Name', 'rules' => 'required'],
        // 'father_name' => ['label' => 'Father\'s Name', 'rules' => 'required'],
        // 'mother_name' => ['label' => 'Mother\'s Name', 'rules' => 'required'],
        'dob' => ['label' => 'Date of Birth', 'rules' => 'required|valid_date'],
         'mobile' => ['label' => 'Mobile Number', 'rules' => 'required|numeric'],
        'email' => ['label' => 'Email Address', 'rules' => 'required|valid_email'],
        'category' => ['label' => 'Category', 'rules' => 'required'],
        // 'address' => ['label' => 'Address', 'rules' => 'required'],
        'class' => ['label' => 'Class', 'rules' => 'required'],
        // 'non_criminal_report' => ['label' => 'No Criminal Report check', 'rules' => 'required'],
        // 'anti_raggin' => ['label' => 'Anti Ragging check', 'rules' => 'required'],
        'session_year' => ['label' => 'Session Year', 'rules' => 'required'],
        // 'gap_report' => ['label' => 'Gap Report', 'rules' => 'required'],
        // 'father_mobile_no' => ['label' => 'Father\'s Mobile Number', 'rules' => 'required'],
        // 'local_address' => ['label' => 'Local Address', 'rules' => 'required'],
         'payment_type' => ['label' => 'Payment Type', 'rules' => 'required'],    
    ]);

    if (!$this->validate($this->validation->getRules())) {
        return redirect()->to(ADMIN . 'update_student/'.$id)->with('validation', $this->validator)->withInput();
    }



      // Process payment type and payment breakups
$payment_type = $this->request->getPost('payment_type');
$value = $payment_type == "full" ? 0 : 1;
$array = $payment_type == "full" ? [] : $this->request->getPost('payment');
$my_array = [];

if (!empty($array) && count($array) > 0) {
    for($i = 0; $i < count($array); $i++) { // Changed <= to <
    if($array[$i] && !empty($array)){
        $my_array[] = [
            "id" => $i, // Removed $i++
            "value" => $array[$i],
            "pay" => 0,
        ];
      }
    }
}

// 1 means paid and 0 means not paid



    $data = [
        // 'enrollment_no' => trim($this->request->getPost('enrollment_no')),
        'name' => trim($this->request->getPost('name')),
        'father_name' => trim($this->request->getPost('father_name')),
        'mother_name' => trim($this->request->getPost('mother_name')),
        'dob' => trim($this->request->getPost('dob')),
        'mobile' => trim($this->request->getPost('mobile')),
        'email' => trim($this->request->getPost('email')),
        'abc_id' => trim($this->request->getPost('abc_id')),
        'category' => trim($this->request->getPost('category')),
        'gender' => trim($this->request->getPost('gender')),
        'address' => trim($this->request->getPost('address')),
        'session_year' => trim($this->request->getPost('session_year')),
        'gap_repor' => trim($this->request->getPost('gap_report')),
        'whapsup_no' => trim($this->request->getPost('whapsup_no')),
        'father_mobile_no' => trim($this->request->getPost('father_mobile_no')),
        'local_address' => trim($this->request->getPost('local_address')),
        'non_criminal_report' => trim($this->request->getPost('non_criminal_report')),
        'anti_raggin' => trim($this->request->getPost('anti_raggin')),
        'religion' => trim($this->request->getPost('religion')),
        'state' => trim($this->request->getPost('state')),
        'city' => trim($this->request->getPost('city')),
        'class' => trim($this->request->getPost('class')),
        'branch' => trim($this->request->getPost('branch')),
         'paytype_status' => $value,
        'payment_breakups' => json_encode($my_array), // Ensure it's properly formatted
        'college_recipt_no' => trim($this->request->getPost('college_recipt_no')),
        'date_college_recipt' => trim($this->request->getPost('date_college_recipt')),
        'tripal_samgra_id' => trim($this->request->getPost('tripal_samgra_id')),
        'updated_date' => date('Y-m-d')
    ];
    
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
    
     $user_obj = [
            "username"=>trim($this->request->getPost('name')),
            "email"=> trim($this->request->getPost('email')),
            "mobile"=>trim($this->request->getPost('mobile')),
      ];
    
    if($this->usermodel->update($this->request->getPost('student_id'),$user_obj)){   
    if ($this->student->update($id, $data)) {
        return redirect()->to(ADMIN . 'studenttable')->with('success', 'Student Updated successfully.');
    } else {
        return redirect()->to(ADMIN . 'studenttable')->with('error', 'Failed to update student.');
    }   
    
    }
    else
    {
        return redirect()->to(ADMIN . 'studenttable')->with('error', 'Failed to update student.');
    }
    
   
}

 
 public function viewstudnet($id){
    $data['page_title'] = "Student View";
    $row = $this->student->find($id);
    $data['class'] = $this->classModel->findAll();
    $data['session_year'] = $this->sessionmodel->findAll();
         
    if ($row !== null) {

        $data['user'] = $row; 
        
        
        return view(ADMIN . "student/view_student", $data);
    }
    
    session()->setFlashdata('error', 'Student not found');
    return redirect()->to(ADMIN . '/student/index'); 
 }  
   
   
   
   public function delete_student($id)
{ 
    if ($this->student->delete($id)) {
        // Deletion was successful
        return $this->response->setJSON(['status' => "success", 'message' => 'Student deleted successfully.']);
    } else {
        // Deletion failed
        return $this->response->setJSON(['status' => "error", 'message' => 'Failed to delete student.']);
    }
}


public function get_totalamount(){
  $id = $this->request->getGet('class_id');
  $total = (float)get_totalAmount($id);
  $formattedTotal = number_format($total, 2); // Format total to 2 decimal places

  $response = array(
    'success' => true,
    'total' => $formattedTotal
  );

  echo json_encode($response);
  exit;
}


}
