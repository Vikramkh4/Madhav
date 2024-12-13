<?php

namespace App\Controllers\accountant;

use App\Controllers\BaseController;
use App\Models\FeetypeModel;

class Filename extends BaseController
{
    protected $validation;
    protected $filetype;

    public function __construct()
    {
        if (session()->get("role") !== ACCOUNTANT_ROLE) {
            echo "Direct Access is not allowed";
            die;
            return;
        }
        $this->validation = \Config\Services::validation();
        $this->filetype =  new FeetypeModel();
    }
    
    public function index()
    {  
        $data['page_title'] = "Feestype";

        
        return view('accountant/feetype/addfiletype',$data);
    }

    public function saving_filetype()
    {
        $this->validation->setRules([
            'fees_name' => 'required',
            'fees' => 'required'
        ]);

        if (!$this->validate($this->validation->getRules())) {
            return view(ACCO . 'feetype/addfiletype', ['validation' => $this->validator, 'page_title' => "Degree"]);
        }

        $data =  [
            "fees_name" =>  $this->request->getPost("fees_name"),
            "fees" =>  $this->request->getPost("fees"),
            "created_date" => date("d-m-y")
        ];

        if ($this->filetype->insert($data)) {
            return redirect()->to(ACCO . 'feetype_table')->with('success', 'Successfully Created');
        } else {
            return redirect()->to(ACCO . 'feetype_table')->with('error', 'Something went wrong');
        }
    }
    
    
    
    
    public function feestype_list()
    {
        $filetype = new FeetypeModel();
        
        $data['page_title'] = "Fees_Type";
        $data['feelist'] = $filetype->findAll();
 
        return view('accountant/feetype/index', $data);
    }
    
    
    public function update_page($id){
        if($id === null){
            return redirect()->to(ACCO . 'feetype_table')->with('error', 'Id not found or you empty');
        }
        $data['page_title'] = "Fees update";
        $row = $this->filetype->find($id);
        if($row){
            $data['user'] = $row;
            return view(ACCO."feetype/update_fees",$data);
        }else{
             return redirect()->to(ACCO . 'feetype_table')->with('error', 'Fial to load update page');
        }
        
    }
    
    
    //  $data =  [
    //         "fees_name" =>  $this->request->getPost("fees_name"),
    //         "fees" =>  $this->request->getPost("fees"),
    //         "created_date" => date("d-m-y")
    //     ];
        
    //      if ($this->filetype->update($id,$data)) {
    //         return redirect()->to(ADMIN . 'feetype_table')->with('success', 'Successfully Updated');
    //     } else {
    //         return redirect()->to(ADMIN . 'feetype_table')->with('error', 'Fial Update');
    //     } 
    
    public function update_save_fun($id){
          if($id === null){
            return redirect()->to(ACCO . 'feetype_table')->with('error', 'Id not found or you empty');
        }
        
         $data =  [
            "fees_name" =>  $this->request->getPost("fees_name"),
            "fees" =>  $this->request->getPost("fees"),
            "created_date" => date("d-m-y")
        ];
        
         if ($this->filetype->update($id,$data)) {
            return redirect()->to(ACCO . 'feetype_table')->with('success', 'Successfully Updated');
        } else {
            return redirect()->to(ACCO . 'feetype_table')->with('error', 'Fail to Update');
        } 
    }
    
    
    
     //echo json_encode(['status' => 'success', 'message' => ''.$user['username'].' '.$stat.' successfully.'])
    public function delete_feestype($id){
          if ($id === null) {
            return json_encode(['status' => 'fail', 'message' => 'id not provided']);
        }
       
        $filetype = new FeetypeModel();
        
        if($filetype->delete($id)){
             return json_encode(['status' => 'success', 'message' => 'Delete Successfully']);
        }
        else{
             return json_encode(['status' => 'fail', 'message' => 'someting went wrong']);
        }
    }
    
    
}