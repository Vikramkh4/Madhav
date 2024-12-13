<?php

namespace App\Controllers\accountant;

use App\Controllers\BaseController;
use App\Models\SessionModel;

class Session extends BaseController
{
    protected $validation;
    protected $session;

    public function __construct()
    {
        if (session()->get("role") !== ACCOUNTANT_ROLE) {
            echo "Direct Access is not allowed";
            die;
            return;
        }
        $this->validation = \Config\Services::validation();
        $this->session =  new SessionModel();
       
    }
    
    public function index()
    {  
        $data['page_title'] = "Add Session";
    
        
        return view(ACCO.'session/add_session',$data);
    }

    public function saving_session()
    {
        $this->validation->setRules([
            'session' => 'required|is_unique[session.session_date]',
        ]);

        if (!$this->validate($this->validation->getRules())) {
          
             return redirect()->to(ACCO.'session')->with('validation', $this->validator);
        }

        $data =  [
            "session_date" =>  $this->request->getPost("session"),
            "create_date" => date('d-m-y')
            
        ];

        if ($this->session->insert($data)) {
            return redirect()->to(ACCO . 'session_table')->with('success', 'Successfully Created');
        } else {
            return redirect()->to(ACCO . 'session_table')->with('error', 'Something went wrong');
        }
    }
    
    
    
    
public function session_list()
{
    $data['page_title'] = "Session Table";
    $degreelist =$this->session->findAll();
 

    $data['session'] = $degreelist;
    return view(ACCO . 'session/index', $data);
}

    
    public function update_session_page($id){
        if($id === null){
            return redirect()->to(ACCO . 'session_table')->with('error', 'Id not found or you empty');
        }
        $data['page_title'] = "Update Session";
        $row = $this->session->find($id);
        if($row){
            $data['session'] = $row;
            return view(ACCO."session/update_session",$data);
        }else{
             return redirect()->to(ACCO . 'session_table')->with('error', 'Fial to load update page');
        }
        
    }
    
 
    public function update_savesession($id){
          if($id === null){
            return redirect()->to(ACCO . 'session_table')->with('error', 'Id not found or you empty');
        }
        
         $this->validation->setRules([
            'sessionup' => 'required|is_unique[session.session_date,session_date,'.$this->request->getPost("sessionup").']',
          
        ]);

        if (!$this->validate($this->validation->getRules())) {
          
             return redirect()->to(ACCO.'update_page/'.$id)->with('validation', $this->validator);
        }
        
        
       $data =  [
            "session_date" =>  $this->request->getPost("sessionup"),
        ];
        
         if ($this->session->update($id,$data)) {
            return redirect()->to(ACCO . 'session_table')->with('success', 'Successfully Updated');
        } else {
            return redirect()->to(ACCO . 'session_table')->with('error', 'Fail to Update');
        } 
    }
    
    
    
     //echo json_encode(['status' => 'success', 'message' => ''.$user['username'].' '.$stat.' successfully.'])
    public function delete_session($id){
          if ($id === null) {
            return json_encode(['status' => 'fail', 'message' => 'id not provided']);
        }
     
        if($this->session->delete($id)){
             return json_encode(['status' => 'success', 'message' => 'Delete Successfully']);
        }
        else{
             return json_encode(['status' => 'fail', 'message' => 'someting went wrong']);
        }
    }
    
    
}