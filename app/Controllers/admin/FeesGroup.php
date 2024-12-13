<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;
use App\Models\FeesGroupModle;
use App\Models\FeetypeModel;
use App\Models\DegreeModel;

class FeesGroup extends BaseController
{
    protected $validation;
    protected $filetype;
    protected $feesGroup;
    protected $degree;

    public function __construct()
    {
        if (session()->get("role") !== ADMIN_ROLE) {
            echo "Direct Access is not allowed";
            die;
            return;
        }
        $this->validation = \Config\Services::validation();
        $this->feesGroup =  new FeesGroupModle();
         $this->filetype =  new FeetypeModel();
         $this->degree =  new DegreeModel();
    }
    
    public function index()
    {  
        $data['page_title'] = "Fees Group";
        $data['feestype'] =    $this->filetype->findAll();
        $data['class']  = $this->degree->findAll();
        
        return view(ADMIN.'feesgroup/addfeesgroup',$data);
    }

    public function saving_feesgroup()
    {
        $this->validation->setRules([
            'feesname' => 'required',
            'fees_group' => 'required',
            'class' => 'required'
        ]);

        if (!$this->validate($this->validation->getRules())) {
          
             return redirect()->to(ADMIN.'feesgroup')->with('validation', $this->validator)->with('page_title' ,"Fees Group");
        }

        $data =  [
            "fees_name" =>  $this->request->getPost("feesname"),
            "fees_group" => implode(" ," ,$this->request->getPost("fees_group")),
            "class" => $this->request->getPost("class")
        ];

        if ($this->feesGroup->insert($data)) {
            return redirect()->to(ADMIN . 'feesgroup_table')->with('success', 'Successfully Created');
        } else {
            return redirect()->to(ADMIN . 'feesgroup_table')->with('error', 'Something went wrong');
        }
    }
    
    
    
    
public function feesgrouptype_list()
{
    $data['page_title'] = "Fees Group Table";
    $degreelist = $this->feesGroup->findAll();
 
    foreach ($degreelist as &$row) {  // Use reference to modify the original array
        if ($row['fees_group'] !== null) {
            $newarra = array();
            $arr = explode(",", $row['fees_group']);  // Removed the space before the comma in explode
            $total = 0;
            foreach ($arr as $id) {
                $type = $this->filetype->find(trim($id));  // Trim whitespace from $id
                if ($type) {
                    $newarra[] = $type['fees_name'];
                    $total = $total + $type['fees'];
                } else {
                    $newarra[] = "";
                    $total = $total + 0;
                }
            }
            
            $row['fees_group'] = implode(" ," ,$newarra); // Correctly assign the transformed array to the original array
            $row['total'] =  $total;
        } else {
            $row['fees_group'] = [];  // Assign "null" as an array for consistency
        }
        $class = '';
     try {
         $sinle  = $this->degree->find($row['class']);
          $class =  $sinle['name'];
         } catch(\Exception $e){
          $class = "NOT_FOUND";  
       } 
       $row['class'] = $class;
    }
 
    
   
    $data['degreelist'] = $degreelist;
    return view(ADMIN . 'feesgroup/index', $data);
}

    
    public function update_feesgroupage($id){
          $data['class']  = $this->degree->findAll();
        if($id === null){
            return redirect()->to(ADMIN . 'feesgroup_table')->with('error', 'Id not found or you empty');
        }
        $data['page_title'] = "Fees Group update";
        $row = $this->feesGroup->find($id);
        if($row){
             $data['feestype'] =    $this->filetype->findAll();
             $data['user'] = $row;
             $data['fees_grouparr'] = explode(" ," , $row['fees_group']);
         
            return view(ADMIN."feesgroup/updatefeesgroup",$data);
        }else{
             return redirect()->to(ADMIN . 'feesgroup_table')->with('error', 'Fial to load update page');
        }
        
    }
    
 
    public function update_savegroup_fun($id){
          if($id === null){
            return redirect()->to(ADMIN . 'feesgroup_table')->with('error', 'Id not found or you empty');
        }
        
         $this->validation->setRules([
            'feesname' => 'required',
          
        ]);

        if (!$this->validate($this->validation->getRules())) {
          
             return redirect()->to(ADMIN.'update_feesgroup')->with('validation', $this->validator)->with('page_title' ,"Update Fees Group");
        }
        
        
          $data =  [
            "fees_name" =>  $this->request->getPost("feesname"),
            "fees_group" => implode(" ," ,$this->request->getPost("fees_group") ?? array()),
             "class" => $this->request->getPost("class")
        ];
        
         if ($this->feesGroup->update($id,$data)) {
            return redirect()->to(ADMIN . 'feesgroup_table')->with('success', 'Successfully Updated');
        } else {
            return redirect()->to(ADMIN . 'feesgroup_table')->with('error', 'Fail to Update');
        } 
    }
    
    
    
     //echo json_encode(['status' => 'success', 'message' => ''.$user['username'].' '.$stat.' successfully.'])
    public function delete_feesgroup($id){
          if ($id === null) {
            return json_encode(['status' => 'fail', 'message' => 'id not provided']);
        }
     
        if($this->feesGroup->delete($id)){
             return json_encode(['status' => 'success', 'message' => 'Delete Successfully']);
        }
        else{
             return json_encode(['status' => 'fail', 'message' => 'someting went wrong']);
        }
    }
    
    
}