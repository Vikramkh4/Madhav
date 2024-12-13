<?php

namespace App\Controllers\accountant;

use App\Controllers\BaseController;
use App\Models\Invoice_Model;
use App\Models\StudentModel;
use App\Models\DegreeModel;
use App\Models\FeetypeModel;

class Invoice extends BaseController
{
    protected $validation;
    protected $invoice;
    protected $student;
 protected $filetype;
    public function __construct()
    {
        if (session()->get("role") !== ACCOUNTANT_ROLE) {
            echo "Direct Access is not allowed";
            die;
            return;
        }
        $this->validation = \Config\Services::validation();
        $this->invoice =  new Invoice_Model();
        $this->student =  new StudentModel();
        $this->degree =  new DegreeModel();
         $this->filetype =  new FeetypeModel();
       
    }
    
    public function index()
    {  
        $data['page_title'] = "Fees List";
        $invoice =  $this->invoice->findAll();  
        $studnet = "";
        $gegree = "";
        foreach($invoice as $key=>$row){
             try{
             $stu  =$this->student->find($row['student']);
             $deeg = $this->degree->find($row['class']);
             $studnet = $stu['name']; 
             $gegree   =  $deeg['name'];
             }catch(\Exception $e){
                $studnet  = "NOT FOUND" ;
                $gegree  = "NOT FOUND" ;
             }
          $invoice[$key]['student'] =   $studnet ;  
          $invoice[$key]['class']   =   $gegree ;
        }
        
        $data['invoice'] = $invoice;
        
        
        return view(ACCO.'invoice/index',$data);
    }
    
    public function add_invoice()
    {  
        $data['page_title'] = "Add Invoice";
        $data['students'] = $this->student->findAll();
        $data['degrees'] = $this->degree->findAll();
        $data['feestype'] = $this->filetype->findAll();
           
           
           
           
        
        return view(ACCO.'invoice/add_invoice',$data);
    }
   
  public function save_invoice(){ 
      
       $this->validation->setRules([
            'student' => 'required',
            'degree' => 'required|valid_date',
            'date' => 'required',
            'total' => 'required',
            'discount' => 'required',
            'paid' => 'required',
            'balance' => 'required',
            'status' => 'required',
            
            
        ]);

        if (!$this->validate($this->validation->getRules())) {
            return redirect()->back()->withInput()->with('validation', $this->validation);
        }

        $data = [
            'student' => $this->request->getPost('student'),
            'degree' => $this->request->getPost('degree'),
            'date' => $this->request->getPost('date'),
            'total' => $this->request->getPost('total'),
             'discount' => $this->request->getPost('discount'),
              'paid' => $this->request->getPost('paid'),
              'balance' => $this->request->getPost('balance'), 
              'status' => $this->request->getPost('status'), 
            
        ];
    
        if ($this->Invoice_Model->insert($data)) {
            return redirect()->to(ACCO . 'index')->with('success', 'Notice created successfully');
        } else {
            return redirect()->to(ACCO . 'invoice')->with('error', 'Failed to create notice');
        }
  }
}