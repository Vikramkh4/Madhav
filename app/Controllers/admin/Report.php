<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ComplainModel;
use App\Models\StudentModel;
use App\Models\DegreeModel;
use App\Models\ComplainCategoryModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Report extends BaseController
{
    protected $validation;
    protected $complain;
    protected $category;
    protected $student;

    public function __construct() {
        if (session()->get("role") !== ADMIN_ROLE) {
            echo "Direct Access is not allowed";
            die;
        }
        $this->validation = \Config\Services::validation();
        $this->category = new ComplainCategoryModel();
        $this->complain = new ComplainModel();
        $this->student = new StudentModel();
    }

    public function index() {
        $data['page_title'] = "Student Report";
        $data['degree'] = (new DegreeModel())->findAll();
        return view(ADMIN . 'report/index', $data);
    }

    public function get_reportFilter() {
        $key = $this->request->getGet("key");
        $id = $this->request->getGet("id");
        $payment_type = $this->request->getGet("payment_type");

        if ($key !== "215mdsfjd636712") {
            throw new PageNotFoundException("Invalid access key.");
        }

        $builder = $this->student->builder();
        if (!empty($id)) {
            $builder->where("class", $id);
        }
        if ($payment_type !== null && $payment_type !== '') {
            $builder->where("paytype_status", $payment_type);
        }
        $students = $builder->get()->getResultArray();
        $total = [];

        foreach ($students as $row) {
            $studentModel = new \App\Models\UserModel();
            $info = $studentModel->find($row['student_id']);
            $name = $info ? $info['username'] : "NOT_FOUND";

            $total[] = [
                'id' => $row['id'],
                'enrollment_no' => $row['enrollment_no'],
                'student_id' => $name,
                'father_name' => $row['father_name'],
                'mother_name' => $row['mother_name'],
                'dob' => $row['dob'],
                'mobile' => $row['mobile'],
                'email' => $row['email'],
                'abc_id' => $row['abc_id'],
                'category' => $row['category'],
                'gender' => $row['gender'],
                'address' => $row['address'],
            ];
        }

        return $this->response->setJSON([
            'success' => true,
            'data' => $total,
        ]);
    }
}
?>
