<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;
use App\Models\StudentModel;
use App\Models\DegreeModel;
use App\Models\FeesGroupModle;
use App\Models\FeetypeModel;
use App\Models\UserModel;
use App\Models\PaymentModel;
use App\Models\Invoice_Model;

class Invoice extends BaseController
{
    protected $validation;
    protected $invoice;
    protected $student;
    protected $filetype;
    protected $PaymentModel;
    public function __construct()
    {
        if (session()->get("role") !== ADMIN_ROLE) {
            echo "Direct Access is not allowed";
            die;
            return;
        }
        $this->validation = \Config\Services::validation();
        $this->invoice =  new Invoice_Model();
        $this->FeesGroupModle =  new FeesGroupModle();
        $this->student =  new StudentModel();
        $this->degree =  new DegreeModel();
        $this->filetype =  new FeetypeModel();
        $this->UserModel =  new UserModel();
        $this->PaymentModel =  new PaymentModel();
        $this->Invoice_Model =  new Invoice_Model();
       
    }
    
    public function index()
    {  
        $data['page_title'] = "Fees List";
        $invoice =  $this->invoice->findAll();  
       
        
        $data['invoice'] = $invoice;
        
        
        return view(ADMIN.'invoice/index',$data);
    }
    
    public function add_invoice()
    {  
        $data['page_title'] = "Add Invoice";
        $data['students'] = $this->student->findAll();
        $data['degrees'] = $this->degree->findAll();
        $data['feestype'] = $this->filetype->findAll();
           
           
           
           
        
        return view(ADMIN.'invoice/add_invoice',$data);
    }
   
   public function save_invoice()
    {
        // Define validation rules
        $this->validation->setRules([
            'student' => 'required',
            'degree' => 'required',
            'date' => 'required|valid_date',
            'total' => 'required|numeric',
            'discount' => 'required|numeric',
            'paid' => 'required|numeric',
            'balance' => 'required|numeric',
            'status' => 'required'
        ]);

        // Check if the form data is valid
        if (!$this->validate($this->validation->getRules())) {
            return redirect()->to(ADMIN . 'add_invoice')->with('validation', $this->validator)->withInput();
        }

        // Get the validated data
        $data = [
            'student' => trim($this->request->getPost("student")),
            'class' => trim($this->request->getPost("degree")),
            'date' => trim($this->request->getPost("date")),
            'total' => trim($this->request->getPost("total")),
            'discount' => trim($this->request->getPost("discount")),
            'paid' => trim($this->request->getPost("paid")),
            'balance' => trim($this->request->getPost("balance")),
            'status' => trim($this->request->getPost("status")),
            'created_date' => date('Y-m-d') 
        ];
      
      
        if ($this->invoice->insert($data)) {
          
            return redirect()->to(ADMIN . 'invoices')->with('success', 'Invoice saved successfully.');
        } else {
     
            return redirect()->to(ADMIN . 'add_invoice')->with('error', 'Failed to save invoice. Please try again.');
        }
    }

public function pay_view($id = null)
{
    if ($id !== null) {
        try {
            $student = $this->student->find($id);
            if (!$student) {
                throw new \Exception('Student not found.');
            }
            
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
            
            $data['class'] =  $fees_group;
            $data['row'] = $array;
            
            $total = 0;
            foreach($array as $row){
               $total = $total + ((float)$row['fees']);
            }
          
            
            $and = json_decode($student['payment_breakups'], true);
            
            if (json_last_error() !== JSON_ERROR_NONE) {
                echo "Error: payment_breakups is not a valid JSON array";
                die;
            }
            
            $payment = [];
            
            if (is_array($and)) {
                if (count($and) > 0) {
                    foreach ($and as $er) {
                        // Assuming $er is an associative array with keys 'id', 'amount', and 'status'
                        $payment[] = [
                            "id" => $er['id'],
                            "amount" => $er['value'],
                            "pay" => $er['pay']
                        ];
                    }
                } 
            }
            
            $data['payment'] = $payment;
           

            return view(ADMIN . 'invoice/fees_views', $data);

        } catch (\Exception $e) {
            return redirect()->to(ADMIN . 'invoice')->with('error', 'Something went wrong during pay: ' . $e->getMessage());
        }
    } else {
        $data['error'] = 'Error: Student ID not provided.';
        return view(ADMIN . 'invoice/index', $data);
    }
}


public function create_pay($id){
    
 $full   = $this->request->getPost("full_payment") ;   
  if($full == "full" && $full != null && !empty($full))
    {
      $this->validation->setRules([
            'full_payment' => ['label' => 'Checkbox', 'rules' => 'required'],
      ]);
     if (!$this->validate($this->validation->getRules())) {
            return redirect()->to(ADMIN . 'pay/'.$id)->with('validation', $this->validator)->withInput();
        }
      $full   = $this->request->getPost("full_payment") ;   
    // full payment
    $student = [];
    $user = [];
 try{
    $student  =  $this->student->find($id);
    $user  =  $this->UserModel->find($student['student_id']); 
    $is_student = getPermissionByUserId($user['id']);

    }catch(\Exception $e){
        echo "Something went wrong";
        die;
    }
    if($is_student === "stud"){
         // is login permission have
         if($user['status'] == LOGIN_PERMISSION){
           // payment type 
           if($student['paytype_status']  == PAYMENT_FULL){
                
                // payment process 
            $old_invoice_data  = $this->Invoice_Model->where("student" , $id)->first();
            $paid_amounts  =    (float) $old_invoice_data['total'];   
            $total_amount = get_totalAmount($student['class']);  
            $payment_isfull = FULL_PAY;
            $remaining_amount = (float) $total_amount - $paid_amounts;  
            if($paid_amounts  == $total_amount){
              
            // Prepare the payment details
            $payment_details = [
                "student_id" => $id,
                "total_amount" => $total_amount,
                "paid_amount" => $paid_amounts,
                "remaining_amount" => $remaining_amount,
                "transaction_id" => "",
                "message" => "Successfully"
            ];
          
            // FULL_PAY
            // UNPAID
            $invoice_details = [
                "paid" =>$paid_amounts ,
                "status" => $payment_isfull,
            ];
               
         if($this->Invoice_Model->update($old_invoice_data['id'] ,$invoice_details)){
             if ($this->PaymentModel->insert($payment_details)) {
                return redirect()->to(ADMIN . 'invoice')->with('success', "Payment is done");
              } 
           }else{
              return redirect()->to(ADMIN . 'invoice')->with('error', "Something went wrong")->withInput();  
            }      
               
               
             }
      // if payment is equals       
             
            }
         }
    }
    return redirect()->to(ADMIN . 'invoice')->with('error',"Someting is wrong or you dont have permission")->withInput(); 
    }    
    else{
      $this->validation->setRules([
            'pay_selected' => ['label' => 'Checkbox', 'rules' => 'required'],
            'pay_id' => ['label' => 'pay id', 'rules' => 'required'],
            'pay_amount' => ['label' => 'Pay Amount', 'rules' => 'required'],
      ]);
        if (!$this->validate($this->validation->getRules())) {
            return redirect()->to(ADMIN . 'pay/'.$id)->with('validation', $this->validator)->withInput();
        }
         $pay_selected   = $this->request->getPost("pay_selected") ;
         $pay_id   = $this->request->getPost("pay_id") ;
         $pay_amount   = $this->request->getPost("pay_amount") ; 
         // Partial Payment
       
        $student = [];
        $user = [];
 try{
    $student  =  $this->student->find($id);
    $user  =  $this->UserModel->find($student['student_id']); 
    $is_student = getPermissionByUserId($user['id']);

    }catch(\Exception $e){
        echo "Something went wrong";
        die;
    }
    if($is_student === "stud"){
         // is login permission have
         if($user['status'] == LOGIN_PERMISSION){
           // payment type 
           if($student['paytype_status']  == PAYMENT_PARTIAl){
            $old_invoice_data  = $this->Invoice_Model->where("student" , $id)->first();
            $paid_amounts  =    (float)$old_invoice_data['paid'];
            
            // Payment process 
            $jsone_payment = $student['payment_breakups'];
            $payemnt_array = json_decode($jsone_payment, true);
            
            $selecte_id = 0;
            $pay_value = 0.0;
            $match_found = false;
            // pay id and amount finding
            for ($i = 0; $i < count($payemnt_array); $i++) {
                $row = $payemnt_array[$i];
                
                if ($row['id'] == $pay_id && $row['value'] == $pay_amount && $row['pay'] != PAID_ID) {
                    $selecte_id = $row['id'];
                    $pay_value = $row['value'];
                    $row['pay'] = PAID_ID;
                    $payemnt_array[$i] = $row;
                    $encode  = json_encode($payemnt_array);
                    $this->student->update($id,["payment_breakups"=>$encode]);
                    $match_found = true;
                    break; 
                }
                
            }
            // pay id and amount not match redirect to index
            if (!$match_found) {
                return redirect()->to(ADMIN . 'invoice')->with('error', "Something went wrong")->withInput();
            }
            // Calculate the total and remaining amounts
            $invoic_paid = 0.0;
            $payment_isfull = PAR_PAY;
            $total_amount = get_totalAmount($student['class']);
            $invoic_paid   = (float) ($paid_amounts  +  $pay_value);
            $remaining_amount = (float) $total_amount - $invoic_paid;
            
            if($invoic_paid == $total_amount){
                $payment_isfull = FULL_PAY;
            }
            
     
            // Prepare the payment details
            $payment_details = [
                "student_id" => $id,
                "total_amount" => $total_amount,
                "paid_amount" => $pay_value,
                "remaining_amount" => $remaining_amount,
                "transaction_id" => "",
                "message" => "Successfully"
            ];
          
            // FULL_PAY
            // UNPAID
            $invoice_details = [
                "paid" =>$invoic_paid ,
                "status" => $payment_isfull,
            ];
            try{
            // updating
            $invoice_row = $this->Invoice_Model->where("student",$id)->first();
            
            }catch(\Exception $e){
                 return redirect()->to(ADMIN . 'invoice')->with('error', "Something went wrong")->withInput();
            }
            //last steps
            // Insert the payment details and redirect accordingly
            if($this->Invoice_Model->update($invoice_row['id'] ,$invoice_details)){
             if ($this->PaymentModel->insert($payment_details)) {
                return redirect()->to(ADMIN . 'invoice')->with('success', "Payment is done");
              } 
           }else{
              return redirect()->to(ADMIN . 'invoice')->with('error', "Something went wrong")->withInput();  
            }

              
            }
         }
    }
    return redirect()->to(ADMIN . 'invoice')->with('error',"Someting went wrong or you dont have permission")->withInput();   
       
        
    } 
    
  
    
    
}    
    
    
}