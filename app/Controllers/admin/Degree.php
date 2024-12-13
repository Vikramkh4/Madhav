<?php


namespace App\Controllers\admin;
use App\Controllers\BaseController;
use App\Models\DegreeModel;

class Degree extends BaseController
{
    protected $validation;
    protected $degree;
    public function __construct() {
      if(session()->get("role") !== ADMIN_ROLE){
       echo "Direct Access is not alled";
       die;
       return;
      }
      $this->validation = \Config\Services::validation();
     $this->degree =  new DegreeModel();
 }
    public function index(): string
    {   $data['page_title'] = "Class";
      
  
        return view(ADMIN.'degree/add_degree',$data);
    }


    public function saveing_degree(){

        $this->validation->setRules([
            'name' => 'required',
            'year' => 'required',
        
        ]);

        if (!$this->validate($this->validation->getRules())) {
            return view(ADMIN.'degree/add_degree', ['validation' => $this->validator,'page_title'=>"Class"]);
        }
        $data =  [
            "name" => trim(((string)$this->request->getPost("name"))),
            "short_name" => trim(((string)$this->request->getPost("short_name"))),
            "years" => trim(((string)$this->request->getPost("year")))
            ,"create_date"=>date("d-m-y")
        ];
     
         if($this->degree->insert($data))
         {
            return redirect()->to(ADMIN.'degree_table')->with('success', 'Successfully Created');
         }
         else
         {
            return redirect()->to(ADMIN.'degree_table')->with('error', 'Someting went wrong');

         }

    }
    
    public function update_degree($id){
     $data['page_title'] = "Class Update";
 
     try{
        $row  =  $this->degree->find($id);
         
        $data['user'] = $row;

        return view(ADMIN."degree/update_degree",$data);
     }catch(\Exception $e){
     session()->setFlashdata('error', 'User not found');
     return view(ADMIN.'/user/index',$data);   
       
     }
        
    }
    
    public function update_save_degree($id){
        
           $this->validation->setRules([
            'name' => 'required',
            'years' => 'required',
        
        ]);

        if (!$this->validate($this->validation->getRules())) {
            return view(ADMIN.'degree/update_degree/'.$id, ['validation' => $this->validator,'page_title'=>"Class"]);
        }
        
        $name = $this->request->getPost("name");
        $short_name = $this->request->getPost("short_name");
        
        $data = [
            "name" =>$name,
             "years" => trim(((string)$this->request->getPost("years")))
            ,"short_name" =>$short_name,
            ];
        
        if($this->degree->update($id , $data)){
               return redirect()->to(ADMIN."degree_table")->with("success",  'Updated  successfully.') ;
        }    
        else{
            return redirect()->to(ADMIN."degree_table")->with("error",  'faild Updated  Class.') ;
        }
        
        
    }
    
   
    public function degree_list()
    {
        $degreeModel = new DegreeModel();
        
        $data['page_title'] = "Class Table";
        $data['degreelist'] = $degreeModel->builder()->get()->getResultArray();
 
        return view('admin/degree/index', $data);
    }
    
    
    
    

   public function delete_degree($id)
{ 
    if ($this->degree->delete($id)) {
        // Deletion was successful
        return $this->response->setJSON(['status' => "success", 'message' => 'deleted successfully.']);
    } else {
        // Deletion failed
        return $this->response->setJSON(['status' => false, 'message' => 'Failed to delete degree.']);
    }
}

}
