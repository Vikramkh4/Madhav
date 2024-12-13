<?php

namespace App\Controllers\student;

use App\Controllers\BaseController;
use App\Models\Invoice_Model;
use App\Models\StudentModel;
use App\Models\DegreeModel;
use App\Models\FeesGroupModle;
use App\Models\FeetypeModel;
use App\Models\UserModel;
use App\Models\PaymentModel;
use App\Models\SessionModel;

class Fees extends BaseController
{
    protected $validation;
    protected $invoice;
    protected $student;
    protected $filetype;
    protected $PaymentModel;
    public function __construct()
    {
        $this->validation = \Config\Services::validation();
        $this->invoice = new Invoice_Model();
        $this->FeesGroupModle = new FeesGroupModle();
        $this->StudentModel = new StudentModel();
        $this->DegreeModel = new DegreeModel();
        $this->filetype = new FeetypeModel();
        $this->UserModel = new UserModel();
        $this->PaymentModel = new PaymentModel();
        $this->SessionModel = new PaymentModel();
    }
    
    
    
   public function student_pay12($id)
    {
        $pass = $this->request->getGet("password");
        $data['page_title'] = "Student Update";

        try {
            $user = $this->UserModel->find($id);
            if (!$user) {
                throw new \Exception("User not found");
            }
            $student = $this->StudentModel->where("student_id", $user['id'])->first();
            if (!$student) {
                throw new \Exception("Student not found");
            }
        } catch (\Exception $e) {
            return $this->response->setStatusCode(500)->setBody("Something went wrong: " . $e->getMessage());
        }

        $data['class'] = $this->DegreeModel->findAll();
        $data['session_year'] = $this->SessionModel->findAll();
        $mobile = (string)$this->request->getGet("verify_mobile");

        if ($user && $user['mobile'] === $mobile && $pass == $user['password']) {
            try {
                $data['page_title'] = "Fees";
                $data['user'] = $student;

                $class_id = $student['class'];
                $fees_group = $this->FeesGroupModle->where("class", $class_id)->find();

                if (empty($fees_group)) {
                    throw new \Exception('Fees group not found.');
                }

                $feeslist = $fees_group[0]['fees_group'];
                $newarra = explode(",", $feeslist);
                $array = [];
                foreach ($newarra as $fee_id) {
                    $type = $this->filetype->find($fee_id);
                    if ($type) {
                        $array[] = $type;
                    }
                }

                $data['class'] = $fees_group;
                $data['row'] = $array;

                $total = 0;
                foreach ($array as $row) {
                    $total += (float)$row['fees'];
                }

                $and = json_decode($student['payment_breakups'], true);
                if (json_last_error() !== JSON_ERROR_NONE) {
                    throw new \Exception("Error: payment_breakups is not a valid JSON array");
                }

                $payment = [];
                if (is_array($and)) {
                    foreach ($and as $er) {
                        $payment[] = [
                            "id" => $er['id'],
                            "amount" => $er['value'],
                            "status" => $er['pay']
                        ];
                    }
                }

                $data['payment'] = $payment;

                return view(STD . "fees/app_fees_view", $data);

            } catch (\Exception $e) {
                return redirect()->to(ADMIN . 'invoice')->with('error', 'Something went wrong during pay: ' . $e->getMessage());
            }
        }

        return $this->response->setStatusCode(404)->setBody("Student not found or invalid credentials");
    }
 
    
}