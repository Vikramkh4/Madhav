<?php

namespace App\Controllers\accountant;

use App\Controllers\BaseController;
use App\Models\NoticeModel;
use App\Models\DegreeModel;
use Config\Services;

class Notice extends BaseController
{
    protected $validation;
    protected $noticeModel;

    public function __construct()
    {
        // Ensure only admins can access
        if (session()->get("role") !== ACCOUNTANT_ROLE) {
            echo "Direct Access is not allowed";
            die;
            // You might want to use a proper error handling mechanism instead of die()
        }

        // Load necessary services
        $this->validation = Services::validation();
        $this->noticeModel = new NoticeModel();
         $this->classModel = new DegreeModel();
    }

    public function index()
    {
        $data['page_title'] = "Notice";
         $data['class'] = $this->classModel->findAll();

        return view(ACCO . 'notice/add_notice', $data);
    }

    public function save_notice()
    {
        $this->validation->setRules([
            'title' => 'required',
            'date' => 'required|valid_date',
            'notice' => 'required'
        ]);

        if (!$this->validate($this->validation->getRules())) {
            return redirect()->back()->withInput()->with('validation', $this->validation);
        }

        $data = [
            'title' => $this->request->getPost('title'),
            'date' => $this->request->getPost('date'),
            'notice' => $this->request->getPost('notice'),
        ];
    
        if ($this->noticeModel->insert($data)) {
            return redirect()->to(ACCO . 'index')->with('success', 'Notice created successfully');
        } else {
            return redirect()->to(ACCO . 'notice3')->with('error', 'Failed to create notice');
        }
    }
    
    public function notice_list()
    {
      $noticeModel = new NoticeModel();
        
        $data['page_title'] = "Notice Table";
        $data['noticeslist'] = $noticeModel->builder()->get()->getResultArray();
 
        return view('accountant/notice/index', $data);
    }
    public function view_notice($id)
    {
        $notice = $this->noticeModel->find($id);

        if (!$notice) {
            return redirect()->to(ACCO . 'notice_table')->with('error', 'Notice not found');
        }

        $data['page_title'] = "View Notice";
        $data['notice'] = $notice;

        return view('accountant/notice/view_notice', $data);
    }
     public function edit_notice($id)
    {
        $notice = $this->noticeModel->find($id);

        if (!$notice) {
            return redirect()->to(ACCO . 'notice_table3')->with('error', 'Notice not found');
        }

        $data['page_title'] = "Edit Notice";
        $data['notice'] = $notice;

        return view('accountant/notice/edit_notice', $data);
    }

    public function update_notice($id)
    {
        $this->validation->setRules([
            'title' => 'required',
            'date' => 'required|valid_date',
            'notice' => 'required'
        ]);

        if (!$this->validate($this->validation->getRules())) {
            return redirect()->back()->withInput()->with('validation', $this->validation);
        }

        $data = [
            'title' => $this->request->getPost('title'),
            'date' => $this->request->getPost('date'),
            'notice' => $this->request->getPost('notice'),
        ];

        if ($this->noticeModel->update($id, $data)) {
            return redirect()->to(ACCO . 'notice_table3')->with('success', 'Notice updated successfully');
        } else {
            return redirect()->to(ACCO . 'notice_table3')->with('error', 'Failed to update notice');
        }
    }   
   public function delete_notice($id)
{
    $result = $this->noticeModel->delete($id);

    if ($result) {
        // Deletion was successful
        return $this->response->setJSON(['status' => "success", 'message' => 'Notice deleted successfully.']);
    } else {
        // Deletion failed
        return $this->response->setJSON(['status' => "error", 'message' => 'Failed to delete notice.']);
    }
}

}
