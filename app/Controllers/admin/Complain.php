<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;
use App\Models\ComplainModel;
use App\Models\ComplainCategoryModel;

class Complain extends BaseController
{
    protected $validation;
    protected $complain;
    protected $category;

    public function __construct() {
        if (session()->get("role") !== ADMIN_ROLE) {
            echo "Direct Access is not allowed";
            die;
        }
        $this->validation = \Config\Services::validation();
        $this->category = new ComplainCategoryModel();
        $this->complain = new ComplainModel();
    }

    public function index(): string {
        $data['page_title'] = "Add Complain";
        $data['category'] = $this->category->findAll();
        return view(ADMIN . 'Announcement2/addcomplain', $data);
    }

    public function save_complain() {
        $this->validation->setRules([
            'name' => 'required',
            'category' => 'required',
            'problem' => 'required',
         
        ]);

        if (!$this->validate($this->validation->getRules())) {
            return redirect()->back()->withInput()->with('validation', $this->validation);
        }

        $data = [
            'name' => trim($this->request->getPost('name')),
            'category' => trim($this->request->getPost('category')),
            'problem' => trim($this->request->getPost('problem')),
        ];
   
        // Handle file upload
        $file = $this->request->getFile('file');
        if($file->getSize() > 0){
        if ($file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move('uploads', $newName);
            $data['file'] = $newName;
        } else {
            return redirect()->back()->with('error', 'Failed to upload file');
        }
}
        if ($this->complain->insert($data)) {
            return redirect()->to('admin/complain')->with('success', 'Complain created successfully');
        } else {
            return redirect()->to('admin/complain')->with('error', 'Failed to create complain');
        }
    }
 public function complain_list() {
    $data['page_title'] = "Complain Table";
    $data['complain'] = $this->complain->findAll();

    // Ensure 'comments' field exists in each complain entry
    foreach ($data['complain'] as &$complain) {
        if (!array_key_exists('comments', $complain)) {
            $complain['comments'] = ''; // Default value if 'comments' is missing
        }
    }

    $this->request->setLocale('en'); 

    return view(ADMIN . 'Announcement2/index', $data);
}


   public function complain_sol($id){
        $data = [
            'comments' => trim($this->request->getPost('solution')),  
        ];

        if ($this->complain->update($id, $data)) {
            return redirect()->to(base_url('admin/complain'))->with('success', 'Solution saved successfully.');
        } else {
            return redirect()->to(base_url('admin/complain'))->with('error', 'Failed to save solution.');
        }
    }

    public function edit_complain($id) {
        $complain = $this->complain->find($id);

        if (!$complain) {
            return redirect()->to('admin/complain_table')->with('error', 'Complain not found');
        }

        $data['page_title'] = "Edit Complain";
        $data['category'] = $this->category->findAll();
        $data['complain'] = $complain;

        return view(ADMIN . 'Announcement2/complainedit', $data);
    }

    public function update_complain($id) {
        $this->validation->setRules([
            'name' => 'required',
            'category' => 'required',
            'problem' => 'required',
            'file' => [
                'mime_in[file,image/jpg,image/jpeg,image/gif,image/png,application/pdf]',
                'max_size[file,2048]'
            ]
        ]);

        if (!$this->validate($this->validation->getRules())) {
            return redirect()->back()->withInput()->with('validation', $this->validation);
        }

        $data = [
            'name' => trim($this->request->getPost('name')),
            'category' => trim($this->request->getPost('category')),
            'problem' => trim($this->request->getPost('problem')),
        ];

        $file = $this->request->getFile('file');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move(WRITEPATH . 'uploads', $newName);
            $data['file'] = $newName;
        }

        if ($this->complain->update($id, $data)) {
            return redirect()->to('admin/complain_table')->with('success', 'Complain updated successfully');
        } else {
            return redirect()->to('admin/complain_table')->with('error', 'Failed to update complain');
        }
    }

    public function view_complain($id) {
        $complain = $this->complain->find($id);

        if (!$complain) {
            return redirect()->to('admin/complain_table')->with('error', 'Complain not found');
        }

        $data['page_title'] = "View Complain";
        $data['complain'] = $complain;

        return view('admin/Announcement2/view_complain', $data);
    }

    public function delete_complain($id) {
        $complain = $this->complain->find($id);

        if (!$complain) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Complain not found']);
        }

        if ($this->complain->delete($id)) {
            return $this->response->setJSON(['status' => 'success', 'message' => 'Complain deleted successfully']);
        } else {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Failed to delete complain']);
        }
    }
}
