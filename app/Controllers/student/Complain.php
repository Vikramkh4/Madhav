<?php

namespace App\Controllers\student;

use App\Controllers\BaseController;
use App\Models\ComplainModel;
use App\Models\ComplainCategoryModel;

class Complain extends BaseController
{
    protected $validation;
    protected $complain;
    protected $category;

    public function __construct() {
        if (session()->get("role") !== STUDENTS_ROLE) {
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
         
        return view(STD . 'Complain/addcomplain', $data);
    }

    public function save_complain() {
        $this->validation->setRules([
            
            'name' => 'required',
            'year' => 'required',
            'enrollno' => 'required',
            'branch' => 'required',
            'contact' => 'required',
            'category' => 'required',
            'problem' => 'required',
            'file' => [
                'uploaded[file]',
                'mime_in[file,image/jpg,image/jpeg,image/gif,image/png,application/pdf]',
                'max_size[file,2048]'
            ]
        ]);

        if (!$this->validate($this->validation->getRules())) {
            return redirect()->back()->withInput()->with('validation', $this->validation);
        }

         $userId = session()->get('id');

        $data = [
            'user_id'=>$userId,
            'name' => trim($this->request->getPost('name')),
            'year' => trim($this->request->getPost('year')),
            'enrollno' => trim($this->request->getPost('enrollno')),
            'branch' => trim($this->request->getPost('branch')),
            'contact' => trim($this->request->getPost('contact')),
            'category' => trim($this->request->getPost('category')),
            'problem' =>trim( $this->request->getPost('problem')),
           
        ];
 $uploadResult1 = uploadFile($this->request->getFile("file"), IMAGE_PATH);
    if ($uploadResult1['status']) {
        $data['file'] = $uploadResult1['fileName'];
    } 
        if ($this->complain->insert($data)) {
            return redirect()->to('student/complain1')->with('success', 'Complain created successfully');
        } else {
            return redirect()->to('student/complain1')->with('error', 'Failed to create complain');
        }
    }
    
    public function complain_list() {
        $data['page_title'] = "Complain Table";
        
        $userId = session()->get('id');
        $data['complain'] = $this->complain->where("user_id", $userId)->findAll();
         
        return view(STD . 'Complain/index', $data);
    }
    
    
    public function edit_complain($id) {
    $complain = $this->complain->find($id);

    if (!$complain) {
        return redirect()->to('student/complain_table1')->with('error', 'Complain not found');
    }

    $data['page_title'] = "Edit Complain";
    $data['category'] = $this->category->findAll();
    $data['complain'] = $complain;

    return view(STD . 'Complain/complainedit', $data);
}

public function update_complain($id) {
    $this->validation->setRules([
        'name' => 'required',
        'year' => 'required',
        'enrollno' => 'required',
        'branch' => 'required',
        'contact' => 'required',
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
    $userId = session()->get('id');
    $data = [
        'user_id'=>$userId,
        'name' => trim($this->request->getPost('name')),
        'year' => trim($this->request->getPost('year')),
        'enrollno' => trim($this->request->getPost('enrollno')),
        'branch' => trim($this->request->getPost('branch')),
        'contact' => trim($this->request->getPost('contact')),
        'category' => trim($this->request->getPost('category')),
        'problem' => trim($this->request->getPost('problem')),
    ];

    $file = $this->request->getFile('file');
    if ($file && $file->isValid() && !$file->hasMoved()) {
        $uploadResult = uploadFile($file, IMAGE_PATH);
        if ($uploadResult['status']) {
            $data['file'] = $uploadResult['fileName'];
        }
    }

    if ($this->complain->update($id, $data)) {
        return redirect()->to('student/complain_table1')->with('success', 'Complain updated successfully');
    } else {
        return redirect()->to('student/complain_table1')->with('error', 'Failed to update complain');
    }
}

public function view_complain($id)
    {
        $notice = $this->complain->find($id);

        if (!$notice) {
            return redirect()->to(STD . 'complain_table1')->with('error', 'Notice not found');
        }

        $data['page_title'] = "View Complain";
        $data['complain'] = $notice;

        return view('student/Complain/view_complain', $data);
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
