<?= $this->extend('admin/layout/base') ?>

<?= $this->section('main') ?>

<main class="app-main">
    <!--begin::App Content Header-->
    <div class="app-content-header">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0"><?= $page_title ?></h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            <?= $page_title ?>
                        </li>
                    </ol>
                </div>
            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::App Content Header-->

    <!--begin::App Content-->
    <div class="app-content">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-12 ">
                    <!-- Default box -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">  <?= $page_title ?></h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-lte-toggle="card-collapse" title="Collapse">
                                    <i data-lte-icon="expand" class="bi bi-plus-lg"></i>
                                    <i data-lte-icon="collapse" class="bi bi-dash-lg"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-lte-toggle="card-remove" title="Remove">
                                    <i class="bi bi-x-lg"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
    <form action="<?= site_url(ADMIN . "update_student/$user[id]") ?>"  method="post" enctype="multipart/form-data">
       
    
        <!-- Student Information Card -->
        <div class="card card-info card-outline mb-4">
            <!--begin::Header-->
            <div class="card-header">
                <div class="card-title">Personal Information</div>
            </div>
            <!--end::Header-->
            <!--begin::Body-->
            <div class="card-body">
                <!-- Row 1 -->
                <div class="row g-3">
                    <div class="col-md-3">
                        <label for="name" class="form-label">Name</label>
                             <?php
                              $name = "";
                              $email = "";
                              $mobile = "";
                              $student_name = new \App\Models\UserModel();
                             try{
                             $info =  $student_name->find($user['student_id']);
                             $name  = $info['username'];
                             $email = $info['email'];
                             $mobile =  $info['mobile'];
                                 
                             }catch(\Exception $e){
                             $name ="NOT_FOUND";
                            $email = "NOT_FOUND";
                             $mobile = "NOT_FOUND";     
                              }
                             ?>
                        <input type="text" class="form-control" id="name" name="name" value="<?= $name?>"  >
                        <input type="hidden" class="form-control" id="name" name="student_id" value="<?=($user['student_id']) ?? ''?>"  >

                        <div class="valid-feedback">Looks good!</div>
                    </div>
                    <div class="col-md-3">
                        <label for="father_name" class="form-label">Father's Name</label>
                        <input type="text" class="form-control" id="father_name" name="father_name" value="<?=$user['father_name'] ?>"  >
                        <div class="valid-feedback">Looks good!</div>
                    </div>
                    <div class="col-md-3">
                        <label for="mother_name" class="form-label">Mother's Name</label>
                        <input type="text" class="form-control" id="mother_name" name="mother_name" value="<?=$user['mother_name'] ?>"  >
                        <div class="valid-feedback">Looks good!</div>
                    </div>
                    <div class="col-md-3">
                        <label for="gender" class="form-label">Gender</label>
                          <select class="form-control select22" id="gender" name="gender">
                                <option value="" disabled>Select Gender</option>
                                <option value="Male" <?= set_select('gender', 'Male', ($user['gender'] == 'Male')) ?>>Male</option>
                                <option value="Female" <?= set_select('gender', 'Female', ($user['gender'] == 'Female')) ?>>Female</option>
                                <option value="Other" <?= set_select('gender', 'Other', ($user['gender'] == 'Other')) ?>>Other</option>
                            </select>
                        <div class="valid-feedback">Looks good!</div>
                    </div>
                </div>
                <!-- Row 2 -->
                <div class="row g-3">
                    <div class="col-md-3">
                        <label for="dob" class="form-label">Date of Birth</label>
                        <input type="text" class="form-control cutomedate" id="dob" name="dob" value="<?= $user['dob'] ?>"  >
                        <div class="valid-feedback">Looks good!</div>
                    </div>
                    <div class="col-md-3">
                        <label for="enrollment_no" class="form-label">Enrollment No</label>
                        <input type="text" class="form-control" id="enrollment_no" name="enrollment_no" value="<?= $user['enrollment_no']  ?>"  >
                        <div class="valid-feedback">Looks good!</div>
                    </div>
                    <div class="col-md-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?=$email ?>"  >
                        <div class="valid-feedback">Looks good!</div>
                    </div>
                    <div class="col-md-3">
    <label for="religion" class="form-label">Religion</label>
    <input type="text" class="form-control" id="religion" name="religion" value="<?= $user['religion']  ?>"  >
    <div class="valid-feedback">Looks good!</div>
</div>

                </div>
                <!-- Row 3 -->
                <div class="row g-3">
                <div class="col-md-3">
                        <label for="category" class="form-label">Category</label>
                        <select class="form-control select22" id="category" name="category"  >
                            <option value="" disabled selected>Select Category</option>
                            <option value="General Cast" <?= set_select('category', 'General Cast',($user['category'] == 'General Cast')) ?>>General Cast</option>
                            <option value="SC" <?= set_select('category', 'SC',($user['category'] == 'SC')) ?>>SC</option>
                            <option value="ST" <?= set_select('category', 'ST',($user['category'] == 'ST')) ?>>ST</option>
                            <option value="OBC" <?= set_select('category', 'OBC',($user['category'] == 'OBC')) ?>>OBC</option>
                            <option value="other" <?= set_select('category', 'other',($user['category'] == 'other')) ?>>Other</option>
                        </select>
                        <div class="valid-feedback">Looks good!</div>
                    </div>
                 
                    <div class="col-md-3">
    <label for="state" class="form-label">State</label>
    <select name="state" id="state" class="form-control">
    <option value="" disabled>Select State</option>
    <option value="Andhra Pradesh" <?= set_select('state', 'Andhra Pradesh', ($user['state'] == 'Andhra Pradesh')) ?>>Andhra Pradesh</option>
    <option value="Andaman and Nicobar Islands" <?= set_select('state', 'Andaman and Nicobar Islands', ($user['state'] == 'Andaman and Nicobar Islands')) ?>>Andaman and Nicobar Islands</option>
    <option value="Arunachal Pradesh" <?= set_select('state', 'Arunachal Pradesh', ($user['state'] == 'Arunachal Pradesh')) ?>>Arunachal Pradesh</option>
    <option value="Assam" <?= set_select('state', 'Assam', ($user['state'] == 'Assam')) ?>>Assam</option>
    <option value="Bihar" <?= set_select('state', 'Bihar', ($user['state'] == 'Bihar')) ?>>Bihar</option>
    <option value="Chandigarh" <?= set_select('state', 'Chandigarh', ($user['state'] == 'Chandigarh')) ?>>Chandigarh</option>
    <option value="Chhattisgarh" <?= set_select('state', 'Chhattisgarh', ($user['state'] == 'Chhattisgarh')) ?>>Chhattisgarh</option>
    <option value="Dadar and Nagar Haveli" <?= set_select('state', 'Dadar and Nagar Haveli', ($user['state'] == 'Dadar and Nagar Haveli')) ?>>Dadar and Nagar Haveli</option>
    <option value="Daman and Diu" <?= set_select('state', 'Daman and Diu', ($user['state'] == 'Daman and Diu')) ?>>Daman and Diu</option>
    <option value="Delhi" <?= set_select('state', 'Delhi', ($user['state'] == 'Delhi')) ?>>Delhi</option>
    <option value="Lakshadweep" <?= set_select('state', 'Lakshadweep', ($user['state'] == 'Lakshadweep')) ?>>Lakshadweep</option>
    <option value="Puducherry" <?= set_select('state', 'Puducherry', ($user['state'] == 'Puducherry')) ?>>Puducherry</option>
    <option value="Goa" <?= set_select('state', 'Goa', ($user['state'] == 'Goa')) ?>>Goa</option>
    <option value="Gujarat" <?= set_select('state', 'Gujarat', ($user['state'] == 'Gujarat')) ?>>Gujarat</option>
    <option value="Haryana" <?= set_select('state', 'Haryana', ($user['state'] == 'Haryana')) ?>>Haryana</option>
    <option value="Himachal Pradesh" <?= set_select('state', 'Himachal Pradesh', ($user['state'] == 'Himachal Pradesh')) ?>>Himachal Pradesh</option>
    <option value="Jammu and Kashmir" <?= set_select('state', 'Jammu and Kashmir', ($user['state'] == 'Jammu and Kashmir')) ?>>Jammu and Kashmir</option>
    <option value="Jharkhand" <?= set_select('state', 'Jharkhand', ($user['state'] == 'Jharkhand')) ?>>Jharkhand</option>
    <option value="Karnataka" <?= set_select('state', 'Karnataka', ($user['state'] == 'Karnataka')) ?>>Karnataka</option>
    <option value="Kerala" <?= set_select('state', 'Kerala', ($user['state'] == 'Kerala')) ?>>Kerala</option>
    <option value="Madhya Pradesh" <?= set_select('state', 'Madhya Pradesh', ($user['state'] == 'Madhya Pradesh')) ?>>Madhya Pradesh</option>
    <option value="Maharashtra" <?= set_select('state', 'Maharashtra', ($user['state'] == 'Maharashtra')) ?>>Maharashtra</option>
    <option value="Manipur" <?= set_select('state', 'Manipur', ($user['state'] == 'Manipur')) ?>>Manipur</option>
    <option value="Meghalaya" <?= set_select('state', 'Meghalaya', ($user['state'] == 'Meghalaya')) ?>>Meghalaya</option>
    <option value="Mizoram" <?= set_select('state', 'Mizoram', ($user['state'] == 'Mizoram')) ?>>Mizoram</option>
    <option value="Nagaland" <?= set_select('state', 'Nagaland', ($user['state'] == 'Nagaland')) ?>>Nagaland</option>
    <option value="Odisha" <?= set_select('state', 'Odisha', ($user['state'] == 'Odisha')) ?>>Odisha</option>
    <option value="Punjab" <?= set_select('state', 'Punjab', ($user['state'] == 'Punjab')) ?>>Punjab</option>
    <option value="Rajasthan" <?= set_select('state', 'Rajasthan', ($user['state'] == 'Rajasthan')) ?>>Rajasthan</option>
    <option value="Sikkim" <?= set_select('state', 'Sikkim', ($user['state'] == 'Sikkim')) ?>>Sikkim</option>
    <option value="Tamil Nadu" <?= set_select('state', 'Tamil Nadu', ($user['state'] == 'Tamil Nadu')) ?>>Tamil Nadu</option>
    <option value="Telangana" <?= set_select('state', 'Telangana', ($user['state'] == 'Telangana')) ?>>Telangana</option>
    <option value="Tripura" <?= set_select('state', 'Tripura', ($user['state'] == 'Tripura')) ?>>Tripura</option>
    <option value="Uttar Pradesh" <?= set_select('state', 'Uttar Pradesh', ($user['state'] == 'Uttar Pradesh')) ?>>Uttar Pradesh</option>
    <option value="Uttarakhand" <?= set_select('state', 'Uttarakhand', ($user['state'] == 'Uttarakhand')) ?>>Uttarakhand</option>
    <option value="West Bengal" <?= set_select('state', 'West Bengal', ($user['state'] == 'West Bengal')) ?>>West Bengal</option>
</select>

    <div class="valid-feedback">Looks good!</div>
</div>

                    <div class="col-md-3">
    <label for="city" class="form-label">City</label>
    <input type="text" class="form-control" id="city" name="city" value="<?=$user['city'] ?>"  >
    <div class="valid-feedback">Looks good!</div>
</div>
   <div class="col-md-3">
                        <label for="class" class="form-label">Class</label>
                        <select name="class" id="class_select"  class="form-control select22">
                            <option value="">Select Class</option>
                            <?php foreach($class as $row): ?>
                                <option value="<?= $row['id'] ?>"     <?= set_select('class',$row['id'] , ($user['class'] == $row['id']))?>  ><?= $row['name'] ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="valid-feedback">Looks good!</div>
                    </div>

             
                    
                </div>
                <!-- Row 4 -->
                <div class="row g-3">
                    <div class="col-md-3">
    <label for="branch" class="form-label">Branch</label>
    <input type="text" class="form-control" id="branch" name="branch" value="<?=$user['branch'] ?>"  >
    <div class="valid-feedback">Looks good!</div>
</div>

                    <div class="col-md-3">
                        <label for="college_recipt_no" class="form-label">College Receipt No</label>
                        <input type="text" class="form-control" id="college_recipt_no" name="college_recipt_no" value="<?=$user['college_recipt_no'] ?>"  >
                        <div class="valid-feedback">Looks good!</div>
                    </div>
                    <div class="col-md-3">
                        <label for="date_college_recipt" class="form-label">Date of College Receipt</label>
                        <input type="text" class="form-control cutomedate" id="date_college_recipt" name="date_college_recipt" value="<?= $user['date_college_recipt'] ?>"  >
                        <div class="valid-feedback">Looks good!</div>
                    </div>
                   
                    <div class="col-md-3">
                        <label for="tripal_samgra_id" class="form-label">Triple Samgra ID</label>
                        <input type="text" class="form-control" id="tripal_samgra_id" name="tripal_samgra_id" value="<?=$user['tripal_samgra_id']  ?>"  >
                        <div class="valid-feedback">Looks good!</div>
                    </div>
                </div>
                <!-- Row 5 -->
                <div class="row g-3">
                    
                    <div class="col-md-3">
                        <label for="session_year" class="form-label">Session Year</label>
                        <select class="form-control select22 " id="session_year" name="session_year"  >
                            <option value="">Session Years</option>
                            <?php foreach($session_year as $row):?>
                            <option value="<?=$row['id']?>"  <?= set_select('session_year',$row['id'] , ($user['session_year'] == $row['id']))?>  ><?=$row['session_date']?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="valid-feedback">Looks good!</div>
                    </div>
                   
                   <div class="col-md-3">
    <label for="gap_report" class="form-label">Gap Report</label>
    <select class="form-select" id="gap_report" name="gap_report"  >
        <option value="">Select One</option>
        <option value="yes" <?= set_select('gap_report', 'yes', ($user['gap_repor'] == 'yes')) ?>>Yes</option>
        <option value="no" <?= set_select('gap_report', 'no' ,($user['gap_repor'] == 'no')) ?>>No</option>
    </select>
    <div class="valid-feedback">Looks good!</div>
</div>

                    <!--<div class="col-md-3">-->
                    <!--    <label for="application_id" class="form-label">Application ID</label>-->
                    <!--    <input type="text" class="form-control" id="application_id" name="application_id" value="<?= set_value('application_id') ?>"  >-->
                    <!--    <div class="valid-feedback">Looks good!</div>-->
                    <!--</div>-->
                </div>
            </div>
            <!--end::Body-->
        </div>
        <!-- Contact Information Card -->
        <div class="card card-info card-outline mb-4">
            <!--begin::Header-->
            <div class="card-header">
                <div class="card-title">Contact Information</div>
            </div>
            <!--end::Header-->
            <!--begin::Body-->
            <div class="card-body">
                <!-- Row 1 -->
                <div class="row g-3">
                    <div class="col-md-3">
                        <label for="mobile" class="form-label">Mobile</label>
                        <input type="text" class="form-control" id="mobile" name="mobile" value="<?= $mobile ?>"  >
                        <div class="valid-feedback">Looks good!</div>
                    </div>
                    <div class="col-md-3">
                        <label for="whapsup_no" class="form-label">WhatsApp No</label>
                        <input type="text" class="form-control" id="whapsup_no" name="whapsup_no" value="<?= $user['whapsup_no']  ?>"  >
                        <div class="valid-feedback">Looks good!</div>
                    </div>
                    <div class="col-md-3">
                        <label for="father_mobile_no" class="form-label">Father's Mobile No</label>
                        <input type="text" class="form-control" id="father_mobile_no" name="father_mobile_no" value="<?=$user['father_mobile_no']   ?>"  >
                        <div class="valid-feedback">Looks good!</div>
                    </div>
                    <div class="col-md-3">
                        <label for="abc_id" class="form-label">ABC ID</label>
                        <input type="text" class="form-control" id="abc_id" name="abc_id" value="<?=$user['abc_id']  ?>"  >
                        <div class="valid-feedback">Looks good!</div>
                    </div>
                </div>
                <!-- Row 2 -->
                <div class="row g-3">
                    <div class="col-md-3">
                        <label for="local_address" class="form-label">Local Address</label>
                        <input type="text" class="form-control" id="local_address" name="local_address" value="<?= $user['local_address'] ?>"  >
                        <div class="valid-feedback">Looks good!</div>
                    </div>
                    <div class="col-md-3">
                        <label for="local_address" class="form-label">Main Address</label>
                        <input type="text" class="form-control" id="local_address" name="address" value="<?=$user['address']  ?>"  >
                        <div class="valid-feedback">Looks good!</div>
                    </div>
                </div>
            </div>
            <!--end::Body-->
        </div>
        <!-- Check Points Card -->
     
        <!-- Image Uploads Card -->
       <div class="card card-info card-outline mb-4">
    <!--begin::Header-->
    <div class="card-header">
        <div class="card-title">Profile Image</div>
    </div>
    <!--end::Header-->
    <!--begin::Body-->
    <div class="card-body">
        <!-- Row 1 -->
        <div class="row g-3">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="student_photo" class="form-control-label">Student Photo<span class='text-success text-sm'>*</span></label>
                    <input type="file" id="student_photo" class="form-control-file" name="student_photo" >
                    
                </div>
                <div>
                    <img src="<?=base_url(IMAGE_PATH.'/'.$user['student_photo'])?>" width="130"/>
                    <img id="preview-student-photo" class="ll"width="150px">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="sign_of_student" class="form-control-label">Sign of Student<span class='text-success text-sm'>*</span></label>
                    <input type="file" id="sign_of_student" class="form-control-file" name="sign_of_student" accept="image/*"  >
                </div>
                <div>
                         <img src="<?=base_url(IMAGE_PATH.'/'.$user['sign_of_student'])?>" width="130"/>
                    <img id="preview-sign-of-student" class="ll" width="150px">
                </div>
            </div>
        </div>
    </div>
    <!--end::Body-->
</div>
        <!-- Documents Card -->
        <div class="card card-primary card-outline mb-4">
            <!--begin::Header-->
            <div class="card-header">
                <div class="card-title">Documents</div>
            </div>
            <!--end::Header-->
            <!--begin::Body-->
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-md-3">
                        <label for="allotment_letter" class="form-label">Allotment Letter</label>
                        <input type="file" class="form-control" id="allotment_letter"  name="allotment_letter" accept=".pdf" >
                        <div class="valid-feedback">Looks good!</div>
          
                        <?php if (isset($user['allotment_letter']) && file_exists(FILES_PATH . $user['allotment_letter'])): ?>
                            <p>Current file: <a href="<?= base_url('upload/files/' . $user['allotment_letter']) ?>" target="_blank">Download</a></p>
                        <?php else: ?>
                            <p class="text-danger">File not found</p>
                        <?php endif; ?>

                        
                    </div>
                    
                    <div class="col-md-3">
                        <label for="online_admission_recipet" class="form-label">Online Admission Receipt</label>
                        <input type="file" class="form-control" id="online_admission_recipet" name="online_admission_recipet"  accept=".pdf" >
                        <div class="valid-feedback">Looks good!</div>
                              <?php if (isset($user['online_admission_recipet']) && file_exists(FILES_PATH . $user['online_admission_recipet'])): ?>
                            <p>Current file: <a href="<?= base_url('upload/files/' . $user['online_admission_recipet']) ?>" target="_blank">Download</a></p>
                        <?php else: ?>
                            <p class="text-danger">File not found</p>
                        <?php endif; ?>
                    </div>
                    <div class="col-md-3">
                        <label for="college_recipt" class="form-label">College Receipt</label>
                        <input type="file" class="form-control" id="college_recipt" name="college_recipt" accept=".pdf" >
                        <div class="valid-feedback">Looks good!</div>
                           <?php if (!empty($user['college_recipt_no']) && file_exists(FILES_PATH . $user['college_recipt_no'])): ?>
                            <p>Current file: <a href="<?= base_url('upload/files/' . $user['college_recipt_no']) ?>" target="_blank">Download</a></p>
                        <?php else: ?>
                            <p class="text-danger">File not found</p>
                        <?php endif; ?>
                    </div>
                    <div class="col-md-3">
                        <label for="10th_result" class="form-label">10th Result</label>
                        <input type="file" class="form-control" id="10th_result" name="10th_result" accept=".pdf"  >
                        <div class="valid-feedback">Looks good!</div>
                               <?php if (isset($user['10th_result']) && file_exists(FILES_PATH . $user['10th_result'])): ?>
                            <p>Current file: <a href="<?= base_url('upload/files/' . $user['10th_result']) ?>" target="_blank">Download</a></p>
                        <?php else: ?>
                            <p class="text-danger">File not found</p>
                        <?php endif; ?>    
                    </div>
                    <div class="col-md-3">
                        <label for="12th_result" class="form-label">12th Result</label>
                        <input type="file" class="form-control" id="12th_result" name="12th_result"accept=".pdf"  >
                        <div class="valid-feedback">Looks good!</div>
                                  <?php if (isset($user['12th_result']) && file_exists(FILES_PATH . $user['12th_result'])): ?>
                            <p>Current file: <a href="<?= base_url('upload/files/' . $user['12th_result']) ?>" target="_blank">Download</a></p>
                        <?php else: ?>
                            <p class="text-danger">File not found</p>
                        <?php endif; ?>
                    </div>
                    <div class="col-md-3">
                        <label for="snanthak_result_allyear" class="form-label">Snathak Result All Year</label>
                        <input type="file" class="form-control" id="snanthak_result_allyear" name="snanthak_result_allyear" accept=".pdf" >
                        <div class="valid-feedback">Looks good!</div>
                                      <?php if (isset($user['snanthak_result_allyear']) && file_exists(FILES_PATH . $user['snanthak_result_allyear'])): ?>
                            <p>Current file: <a href="<?= base_url('upload/files/' . $user['snanthak_result_allyear']) ?>" target="_blank">Download</a></p>
                        <?php else: ?>
                            <p class="text-danger">File not found</p>
                        <?php endif; ?>
                    </div>
                    <div class="col-md-3">
                        <label for="tc" class="form-label">TC</label>
                        <input type="file" class="form-control" id="tc" name="tc" accept=".pdf" >
                        <div class="valid-feedback">Looks good!</div>
                           <?php if (isset($user['tc']) && file_exists(FILES_PATH . $user['tc'])): ?>
                            <p>Current file: <a href="<?= base_url('upload/files/' . $user['tc']) ?>" target="_blank">Download</a></p>
                        <?php else: ?>
                            <p class="text-danger">File not found</p>
                        <?php endif; ?>    
                    </div>
                    <div class="col-md-3">
                        <label for="migration_certificate" class="form-label">Migration Certificate</label>
                        <input type="file" class="form-control" id="migration_certificate" name="migration_certificate" accept=".pdf" >
                        <div class="valid-feedback">Looks good!</div>
                                 <?php if (isset($user['migration_certificate']) && file_exists(FILES_PATH . $user['migration_certificate'])): ?>
                            <p>Current file: <a href="<?= base_url('upload/files/' . $user['migration_certificate']) ?>" target="_blank">Download</a></p>
                        <?php else: ?>
                            <p class="text-danger">File not found</p>
                        <?php endif; ?>  
                    </div>
                    <div class="col-md-3">
                        <label for="adhar_card" class="form-label">Aadhar Card</label>
                        <input type="file" class="form-control" id="adhar_card" name="adhar_card"  accept=".pdf">
                        <div class="valid-feedback">Looks good!</div>
                                    <?php if (isset($user['adhar_card']) && file_exists(FILES_PATH . $user['adhar_card'])): ?>
                            <p>Current file: <a href="<?= base_url('upload/files/' . $user['adhar_card']) ?>" target="_blank">Download</a></p>
                        <?php else: ?>
                            <p class="text-danger">File not found</p>
                        <?php endif; ?> 
                    </div>
                </div>
            </div>
            <!--end::Body-->
        </div>
        
           <div class="card card-info card-outline mb-4">
            <!--begin::Header-->
            <div class="card-header">
                <div class="card-title">Check Points</div>
            </div>
            <!--end::Header-->
            <!--begin::Body-->
            <div class="card-body">
                <!-- Row 1 -->
                <div class="row g-3">
             <div class="col-md-3">
            <label for="non_criminal_report" class="form-label">Non-Criminal Report</label>
            <input type="checkbox" style="margin-left:10px;" class="form-check-input" id="non_criminal_report" name="non_criminal_report"  <?= set_checkbox('non_criminal_report', '1', ($user['non_criminal_report'] === "on")) ?>>
        </div>
    <div class="col-md-3">
                        <label for="anti_raggin" class="form-label">Anti-Ragging</label>
                        <input type="checkbox"  style="margin-left:10px;"class="form-check-input" id="anti_raggin" name="anti_raggin" <?= set_checkbox('anti_raggin', '1' ,($user['anti_raggin'] == "on")) ?>>
                    </div>
                </div>
                
                 
            </div>
            <!--end::Body-->
        </div>
        
        
          <div class="card card-info card-outline mb-4">
    <div class="card-header">
        <div class="card-title">Payment Types</div>
    </div>
    <div class="card-body">
        <!-- Display Total Amount -->
        <div class="row g-3">
            
            <div class="col-md-12">
                <label style="color:red;" >Total Amount: ₹</label>
                <span id="total-amount" style="color:red;">0.00</span>
            </div>
            
        </div>

        <!-- Existing Payment Type Select and Partial Payment Inputs -->
     <div class="row g-3">
    <div class="col-md-3">
        <label for="payment-type">Payment Type:</label>
        <select id="payment-type" name="payment_type" class="form-select" onchange="togglePartialPayment()">
            <option <?= $user['paytype_status'] == 0 ? "selected" : "" ?> value="full">Full Payment</option>
            <option <?= $user['paytype_status'] == 1 ? "selected" : "" ?> value="partial">Partial Payment</option>
        </select>

<div id="partial-payment-container" class="mt-2" style="<?php if($user['paytype_status'] != 1){ echo 'display: none;'; }elseif($user['paytype_status'] == 0){echo  'display: block;';} ?>">
    <?php foreach($payment as $row):?>
        <div class="partial-payment-row">
            <div class="input-button-container">
                <input type="number" name="payment[]" placeholder="Enter amount" value="<?=$row['value']?>" min="0.00" oninput="deselectCheckbox(this)">
                <?php if($row['id'] == 0){?>
                    <button type="button" onclick="addPartialPaymentRow()">Add</button>
                <?php }else{ ?>
                    <button type="button" onclick="removePartialPaymentRow(this)">Remove</button>
                <?php } ?>
            </div>
        </div>
    <?php endforeach;?>
</div>

<style>
    .input-button-container {
        display: flex;
        align-items: center;
    }
    .input-button-container input[type="number"] {
        margin-right: 10px;
    }
</style>

        <div id="partial-payment-container1" class="mt-2" style="display:none">
              <div class="partial-payment-row">
                    <input type="number" name="payment[]" placeholder="Enter amount"  min="0.00" oninput="deselectCheckbox(this)">
                        <button type="button" onclick="addPartialPaymentRow1()">Add</button>
             </div>
            
          
        </div>
     
        
    </div>
</div>


    </div>
</div>
              
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        <!--end::Footer-->
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="reset" class="btn btn-secondary">Reset</button>
        </div>
    </form>
</div>

                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::App Content-->
</main>
<!--end::App Main-->
<script>
     var studentPhotoInput = document.getElementById("student_photo");
    var previewStudentPhoto = document.getElementById("preview-student-photo");
    studentPhotoInput.addEventListener("change", function(event) {
        if (event.target.files.length == 0) {
            return;
        }
        var tempUrl = URL.createObjectURL(event.target.files[0]);
        previewStudentPhoto.setAttribute("src", tempUrl);
    });

    var signOfStudentInput = document.getElementById("sign_of_student");
    var previewSignOfStudent = document.getElementById("preview-sign-of-student");
    signOfStudentInput.addEventListener("change", function(event) {
        if (event.target.files.length == 0) {
            return;
        }
        var tempUrl = URL.createObjectURL(event.target.files[0]);
        previewSignOfStudent.setAttribute("src", tempUrl);
    });
</script>


<script>

$(document).ready(function(){
 var classId = document.getElementById('class_select').value;
 total(classId); 
  
function total(class_id){   
       
 $.ajax({
            type: 'GET',
            url: '<?=base_url("admin/getamount")?>',
            data: { class_id: classId },
            dataType: 'json',
            success: function(response) {
                if (response.success) {
               
                    document.getElementById('total-amount').textContent = response.total;
                } else {
                    document.getElementById('total-amount').textContent = '0.00';
                }
            }
        });
}

    $(document).on("change","#class_select",function(){
     var classId = document.getElementById('class_select').value;
      total(classId);
    

     }) 
});
</script>
                                        
  


<?= $this->endSection() ?>