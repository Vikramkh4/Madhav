<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;
use App\Models\BannerModel;

class Banner extends BaseController
{
    protected $validation;
    protected $complain;
    protected $banner;

    public function __construct() {
        if (session()->get("role") !== ADMIN_ROLE) {
            echo "Direct Access is not allowed";
            die;
        }
        $this->validation = \Config\Services::validation();
        $this->banner = new BannerModel();
        
    }

    public function index(): string {
        $data['page_title'] = "Banner Table";
        $data['banner'] = $this->banner->findAll();
        return view(ADMIN . 'banner/index', $data);
    }
    
    
    public function add_banner(){
        $data['page_title'] = "Add Banner";
       
        return view(ADMIN . 'banner/addbanner', $data); 
    }
    

public function save_banner() {
   $rules = [
        'title' => 'required',
        'image' => 'uploaded[image]|is_image[image]|max_size[image,1024]|ext_in[image,jpg,jpeg,png,gif,webp]'
    ];
    if (!$this->validate($rules)) {
        return redirect()->to(ADMIN.'addbanner')->withInput()->with('validation', $this->validator);
    }
    $image = $this->request->getFile('image');
    $new_name = '';
    if ($image->isValid() && !$image->hasMoved()) {
        $new_name = $image->getRandomName();
        if ($image->move('uploads/banner', $new_name)) {
        } else {
            return redirect()->to(ADMIN.'addbanner')->withInput()->with('error', 'Failed to upload image.');
        }
    }
    $name = $this->request->getVar('title');
    $saveData = [
        'name' => $name,
        'image' => $new_name
    ];
    if ($this->banner->insert($saveData)) {
        return redirect()->to('admin/banner')->with('success', 'Banner created successfully');
    } else {
        return redirect()->to(ADMIN.'addbanner')->withInput()->with('error', 'Failed to create banner.');
    }
}


    

    
    public function edit_banner($id) {
    $complain = $this->banner->find($id);

    if (!$complain) {
        return redirect()->to('admin/banner')->with('error', 'Banner Could not find');
    }

    $data['page_title'] = "Edit Banner";
    $data['banner'] = $complain;

    return view(ADMIN . 'banner/updatebanner', $data);
}

public function update_banner($id) {
    // Define validation rules
    $rules = [
        'title' => 'required',
        'image' => 'if_exist|is_image[image]|max_size[image,1024]|ext_in[image,jpg,jpeg,png,gif]'
    ];

    // Validate input
    if (!$this->validate($rules)) {
        // Redirect back with validation errors
        return redirect()->to(ADMIN . 'edit_banner/' . $id)->withInput()->with('validation', $this->validator);
    }

    // Prepare data for update
    $data = [
        'name' => trim($this->request->getPost('title'))
    ];

    // Handle file upload
    $file = $this->request->getFile('image');
    if ($file && $file->isValid() && !$file->hasMoved()) {
        $newName = $file->getRandomName();
        if ($file->move('uploads/banner', $newName)) {
            $data['image'] = $newName;
        } else {
            // Log the error and redirect with an error message
            log_message('error', 'Failed to move uploaded file: ' . $file->getErrorString());
            return redirect()->to(ADMIN . 'edit_banner/' . $id)->withInput()->with('error', 'Failed to upload image.');
        }
    }

    // Update data in the database
    if ($this->banner->update($id, $data)) {
        // Redirect to the banner list with a success message
        return redirect()->to('admin/banner')->with('success', 'Banner updated successfully');
    } else {
        // Log the error and redirect with an error message
        log_message('error', 'Failed to update banner in the database: ' . $this->banner->errors());
        return redirect()->to(ADMIN . 'edit_banner/' . $id)->withInput()->with('error', 'Failed to update banner.');
    }
}



public function view_complain($id)
    {
        $notice = $this->complain->find($id);

        if (!$notice) {
            return redirect()->to(ADMIN . 'complain_table')->with('error', 'Notice not found');
        }

        $data['page_title'] = "View Complain";
        $data['complain'] = $notice;

        return view('admin/Announcement2/view_complain', $data);
    }
public function delete_banner($id) {
    // Find the banner by ID
    $banner = $this->banner->find($id);

    if (!$banner) {
        // Return JSON response for banner not found
        return $this->response->setJSON([
            'status' => 'error',
            'message' => 'Banner not found'
        ]);
    }

    // Delete the image file if it exists
    if (isset($banner['image']) && file_exists('uploads/banner/' . $banner['image'])) {
        if (!unlink('uploads/banner/' . $banner['image'])) {
            // Return JSON response for file deletion failure
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Failed to delete banner image'
            ]);
        }
    }

    // Delete the banner from the database
    if ($this->banner->delete($id)) {
        // Return JSON response for success
        return $this->response->setJSON([
            'status' => 'success',
            'message' => 'Banner deleted successfully'
        ]);
    } else {
        // Return JSON response for database deletion failure
        return $this->response->setJSON([
            'status' => 'error',
            'message' => 'Failed to delete banner'
        ]);
    }
}

}
