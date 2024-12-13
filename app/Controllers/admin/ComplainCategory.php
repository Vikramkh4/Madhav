<?php


namespace App\Controllers\admin;
use App\Controllers\BaseController;
use App\Models\DegreeModel;
use App\Models\ComplainCategoryModel;

class ComplainCategory extends BaseController
{
    protected $validation;
    protected $complaint;
    public function __construct() {
      if(session()->get("role") !== ADMIN_ROLE){
       echo "Direct Access is not alled";
       die;
       return;
      }
      $this->validation = \Config\Services::validation();
     $this->complaint =  new ComplainCategoryModel();
 }
    public function index(): string
    {   $data['page_title'] = "Complain Category";
      
        return view(ADMIN.'Complaincategory/add_category',$data);
    }
    public function save_compalin()
    {   $data['page_title'] = "Complain Category";
    
       $this->validation->setRules([
            'category_name' =>  ['label' => 'Category Name', 'rules' => 'required'],
        ]);

        if (!$this->validate($this->validation->getRules())) {
          
             return redirect()->to(ADMIN.'add_complain')->with('validation', $this->validator);
        }
      
      
           $data =  [
            "name" =>  $this->request->getPost("category_name"),
            "created_date" => date('d-m-y')
            
        ];

        if ($this->complaint->insert($data)) {
            return redirect()->to(ADMIN . 'complaincategory_table')->with('success', 'Successfully Created');
        } else {
            return redirect()->to(ADMIN . 'complaincategory_table')->with('error', 'Something went wrong');
        }
      
        return view(ADMIN.'Complaincategory/add_category',$data);
    }
    
    
    public function complain_list(){
          $data['page_title'] = "Complain Category";
         
        $data['category'] = $this->complaint->findAll();
     

          
          return view(ADMIN.'Complaincategory/index',$data);
    }
    
    
     public function update_compain_page($id) {
    $data['page_title'] = "Complain Update";
    $row = $this->complaint->find($id);
       
    if ($row !== null) {
        $data['complaint'] = $row; // Changed variable name to 'row' for consistency
        
        return view(ADMIN . "Complaincategory/update_compaint", $data);
    }
    
    session()->setFlashdata('error', ' Not  found');
    return redirect()->to(ADMIN . 'complaincategory_table');   
}
    
      public function update_savecomplain($id)
    {   $data['page_title'] = "Complain Category";
    
       $this->validation->setRules([
            'category_name' =>  ['label' => 'Category Name', 'rules' => 'required'],
        ]);

        if (!$this->validate($this->validation->getRules())) {
          
             return redirect()->to(ADMIN.'update_companin/'.$id)->with('validation', $this->validator);
        }
      
      
           $data =  [
            "name" =>  $this->request->getPost("category_name"),
            "created_date" => date('d-m-y')
            
        ];

        if ($this->complaint->update($id, $data)) {
            return redirect()->to(ADMIN . 'complaincategory_table')->with('success', 'Successfully update');
        } else {
            return redirect()->to(ADMIN . 'complaincategory_table')->with('error', 'Something went wrong');
        }
      
        return view(ADMIN.'Complaincategory/add_category',$data);
    }  
    
    
    
       public function delete_complain($id)
{ 
    if ($this->complaint->delete($id)) {
        // Deletion was successful
        return $this->response->setJSON(['status' => "success", 'message' => 'Deleted successfully.']);
    } else {
        // Deletion failed
        return $this->response->setJSON(['status' => "error", 'message' => 'Failed to delete student.']);
    }
}
 }
?>