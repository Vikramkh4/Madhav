<?php


namespace App\Controllers\admin;
use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\StudentModel;
use App\Models\ComplainModel;

class Home extends BaseController
{
    protected $user; 
    public function __construct() {
      if(session()->get("role") !== ADMIN_ROLE){
       echo "Direct Access is not alled";
       die;
       return;
      }
      $this->user = new UserModel();
      $this->StudentModel = new StudentModel();
 }
    //home function dashboard start from here
    public function index(): string
    {
        $data['page_title'] = "Dashboard";
        $StudentModel = model(StudentModel::class); // Assuming StudentModel is the name of your model
        $ComplainModel = model(ComplainModel::class); // Assuming StudentModel is the name of your model
        

        $data['student_count'] = $StudentModel->countAll(); // Get the count of all students
        $data['complain'] = $ComplainModel->where("status" ,0)->builder()->countAll(); // Get the count of all students
        $data['uncomplain'] = $ComplainModel->where("status" ,1)->builder()->countAll(); // Get the count of all students
        
        return view(ADMIN.'dashboard',$data);
    }

    
}
