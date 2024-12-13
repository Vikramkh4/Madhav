<?= $this->extend('accountant/layouts/base') ?>

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
    <form action="<?= site_url(ACCO . "save_student") ?>"  method="post" enctype="multipart/form-data">
     
     
     <!-- student login information -->
     
    <div class="card card-info card-outline mb-4">
            <!--begin::Header-->
            <div class="card-header">
                <div class="card-title">Login Credentials</div>
            </div>
            <!--end::Header-->
            <!--begin::Body-->
            <div class="card-body">
                <!-- Row 1 -->
                <div class="row g-3">
                    <div class="col-md-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?= set_value('email') ?>"  >
                        <div class="valid-feedback">Looks good!</div>
                    </div>
                    <div class="col-md-3">
                        <label for="anti_raggin" class="form-label">Password</label>
                        <input type="text" class="form-control" id="name"  name="user_password" <?= set_value('user_password') ?>>
                    </div>
                </div>
                
                 
            </div>
            <!--end::Body-->
        </div>
     
     
     
     
     
     
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
                        <input type="text" class="form-control" id="name" name="name" value="<?= set_value('name') ?>"  >
                        <div class="valid-feedback">Looks good!</div>
                    </div>
                    <div class="col-md-3">
                        <label for="father_name" class="form-label">Father's Name</label>
                        <input type="text" class="form-control" id="father_name" name="father_name" value="<?= set_value('father_name') ?>"  >
                        <div class="valid-feedback">Looks good!</div>
                    </div>
                    <div class="col-md-3">
                        <label for="mother_name" class="form-label">Mother's Name</label>
                        <input type="text" class="form-control" id="mother_name" name="mother_name" value="<?= set_value('mother_name') ?>"  >
                        <div class="valid-feedback">Looks good!</div>
                    </div>
                    <div class="col-md-3">
                        <label for="gender" class="form-label">Gender</label>
                        <select class="form-control select22" id="gender" name="gender"  >
                            <option value="" disabled selected>Select Gender</option>
                            <option value="Male" <?= set_select('gender', 'Male') ?>>Male</option>
                            <option value="Female" <?= set_select('gender', 'Female') ?>>Female</option>
                            <option value="Other" <?= set_select('gender', 'Other') ?>>Other</option>
                        </select>
                        <div class="valid-feedback">Looks good!</div>
                    </div>
                </div>
                <!-- Row 2 -->
                <div class="row g-3">
                    <div class="col-md-3">
                        <label for="dob" class="form-label">Date of Birth</label>
                        <input type="text" class="form-control cutomedate" id="dob" name="dob" value="<?= set_value('dob') ?>"  >
                        <div class="valid-feedback">Looks good!</div>
                    </div>
                    <div class="col-md-3">
                        <label for="enrollment_no" class="form-label">Enrollment No</label>
                        <input type="text" class="form-control" id="enrollment_no" name="enrollment_no" value="<?= set_value('enrollment_no') ?>"  >
                        <div class="valid-feedback">Looks good!</div>
                    </div>
                    <div class="col-md-3">
    <label for="religion" class="form-label">Religion</label>
    <input type="text" class="form-control" id="religion" name="religion" value="<?= set_value('religion') ?>"  >
    <div class="valid-feedback">Looks good!</div>
</div>

                </div>
                <!-- Row 3 -->
                <div class="row g-3">
                <div class="col-md-3">
                        <label for="category" class="form-label">Category</label>
                        <select class="form-control select22" id="category" name="category"  >
                            <option value="" disabled selected>Select Category</option>
                            <option value="General Cast" <?= set_select('category', 'General Cast') ?>>General Cast</option>
                            <option value="SC" <?= set_select('category', 'SC') ?>>SC</option>
                            <option value="ST" <?= set_select('category', 'ST') ?>>ST</option>
                            <option value="OBC" <?= set_select('category', 'OBC') ?>>OBC</option>
                            <option value="other" <?= set_select('category', 'other') ?>>Other</option>
                        </select>
                        <div class="valid-feedback">Looks good!</div>
                    </div>
                 
                    <div class="col-md-3">
    <label for="state" class="form-label">State</label>
    <select name="state" id="state" class="form-control"  >
        <option value="" disabled selected>Select State</option>
        <option value="Andhra Pradesh" <?= set_select('state', 'Andhra Pradesh') ?>>Andhra Pradesh</option>
        <option value="Andaman and Nicobar Islands" <?= set_select('state', 'Andaman and Nicobar Islands') ?>>Andaman and Nicobar Islands</option>
        <option value="Arunachal Pradesh" <?= set_select('state', 'Arunachal Pradesh') ?>>Arunachal Pradesh</option>
        <option value="Assam" <?= set_select('state', 'Assam') ?>>Assam</option>
        <option value="Bihar" <?= set_select('state', 'Bihar') ?>>Bihar</option>
        <option value="Chandigarh" <?= set_select('state', 'Chandigarh') ?>>Chandigarh</option>
        <option value="Chhattisgarh" <?= set_select('state', 'Chhattisgarh') ?>>Chhattisgarh</option>
        <option value="Dadar and Nagar Haveli" <?= set_select('state', 'Dadar and Nagar Haveli') ?>>Dadar and Nagar Haveli</option>
        <option value="Daman and Diu" <?= set_select('state', 'Daman and Diu') ?>>Daman and Diu</option>
        <option value="Delhi" <?= set_select('state', 'Delhi') ?>>Delhi</option>
        <option value="Lakshadweep" <?= set_select('state', 'Lakshadweep') ?>>Lakshadweep</option>
        <option value="Puducherry" <?= set_select('state', 'Puducherry') ?>>Puducherry</option>
        <option value="Goa" <?= set_select('state', 'Goa') ?>>Goa</option>
        <option value="Gujarat" <?= set_select('state', 'Gujarat') ?>>Gujarat</option>
        <option value="Haryana" <?= set_select('state', 'Haryana') ?>>Haryana</option>
        <option value="Himachal Pradesh" <?= set_select('state', 'Himachal Pradesh') ?>>Himachal Pradesh</option>
        <option value="Jammu and Kashmir" <?= set_select('state', 'Jammu and Kashmir') ?>>Jammu and Kashmir</option>
        <option value="Jharkhand" <?= set_select('state', 'Jharkhand') ?>>Jharkhand</option>
        <option value="Karnataka" <?= set_select('state', 'Karnataka') ?>>Karnataka</option>
        <option value="Kerala" <?= set_select('state', 'Kerala') ?>>Kerala</option>
        <option value="Madhya Pradesh" <?= set_select('state', 'Madhya Pradesh') ?>>Madhya Pradesh</option>
        <option value="Maharashtra" <?= set_select('state', 'Maharashtra') ?>>Maharashtra</option>
        <option value="Manipur" <?= set_select('state', 'Manipur') ?>>Manipur</option>
        <option value="Meghalaya" <?= set_select('state', 'Meghalaya') ?>>Meghalaya</option>
        <option value="Mizoram" <?= set_select('state', 'Mizoram') ?>>Mizoram</option>
        <option value="Nagaland" <?= set_select('state', 'Nagaland') ?>>Nagaland</option>
        <option value="Odisha" <?= set_select('state', 'Odisha') ?>>Odisha</option>
        <option value="Punjab" <?= set_select('state', 'Punjab') ?>>Punjab</option>
        <option value="Rajasthan" <?= set_select('state', 'Rajasthan') ?>>Rajasthan</option>
        <option value="Sikkim" <?= set_select('state', 'Sikkim') ?>>Sikkim</option>
        <option value="Tamil Nadu" <?= set_select('state', 'Tamil Nadu') ?>>Tamil Nadu</option>
        <option value="Telangana" <?= set_select('state', 'Telangana') ?>>Telangana</option>
        <option value="Tripura" <?= set_select('state', 'Tripura') ?>>Tripura</option>
        <option value="Uttar Pradesh" <?= set_select('state', 'Uttar Pradesh') ?>>Uttar Pradesh</option>
        <option value="Uttarakhand" <?= set_select('state', 'Uttarakhand') ?>>Uttarakhand</option>
        <option value="West Bengal" <?= set_select('state', 'West Bengal') ?>>West Bengal</option>
    </select>
    <div class="valid-feedback">Looks good!</div>
</div>

                    <div class="col-md-3">
    <label for="city" class="form-label">City</label>
    <input type="text" class="form-control" id="city" name="city" value="<?= set_value('city') ?>"  >
    <div class="valid-feedback">Looks good!</div>
</div>
   <div class="col-md-3">
                        <label for="class" class="form-label">Class</label>
                        <select name="class" class="form-control select22">
                            <option value="">Select Class</option>
                            <?php foreach($class as $row):?>
                            <option value="<?= $row['id'] ?>" <?= set_select('class',$row['id'])?>  ><?= $row['name'] ?></option>
                            <?php endforeach;?>
                        </select>
                        <div class="valid-feedback">Looks good!</div>
                    </div>

                   
                    
                </div>
                <!-- Row 4 -->
                <div class="row g-3">
                    <div class="col-md-3">
    <label for="branch" class="form-label">Branch</label>
    <input type="text" class="form-control" id="branch" name="branch" value="<?= set_value('branch') ?>"  >
    <div class="valid-feedback">Looks good!</div>
</div>

                    <div class="col-md-3">
                        <label for="college_recipt_no" class="form-label">College Receipt No</label>
                        <input type="text" class="form-control" id="college_recipt_no" name="college_recipt_no" value="<?= set_value('college_recipt_no') ?>"  >
                        <div class="valid-feedback">Looks good!</div>
                    </div>
                    <div class="col-md-3">
                        <label for="date_college_recipt" class="form-label">Date of College Receipt</label>
                        <input type="text" class="form-control cutomedate" id="date_college_recipt" name="date_college_recipt" value="<?= set_value('date_college_recipt') ?>"  >
                        <div class="valid-feedback">Looks good!</div>
                    </div>
                   
                    <div class="col-md-3">
                        <label for="tripal_samgra_id" class="form-label">Tripal Samgra ID</label>
                        <input type="text" class="form-control" id="tripal_samgra_id" name="tripal_samgra_id" value="<?= set_value('tripal_samgra_id') ?>"  >
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
                            <option value="<?=$row['id']?>"  <?= set_select('session_year',$row['id'])?>  ><?=$row['session_date']?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="valid-feedback">Looks good!</div>
                    </div>
                   
                   <div class="col-md-3">
    <label for="gap_report" class="form-label">Gap Report</label>
    <select class="form-select" id="gap_report" name="gap_report"  >
        <option value="">Select One</option>
        <option value="yes" <?= set_select('gap_report', 'yes') ?>>Yes</option>
        <option value="no" <?= set_select('gap_report', 'no') ?>>No</option>
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
                        <input type="text" class="form-control" id="mobile" name="mobile" value="<?= set_value('mobile') ?>"  >
                        <div class="valid-feedback">Looks good!</div>
                    </div>
                    <div class="col-md-3">
                        <label for="whapsup_no" class="form-label">WhatsApp No</label>
                        <input type="text" class="form-control" id="whapsup_no" name="whapsup_no" value="<?= set_value('whapsup_no') ?>"  >
                        <div class="valid-feedback">Looks good!</div>
                    </div>
                    <div class="col-md-3">
                        <label for="father_mobile_no" class="form-label">Father's Mobile No</label>
                        <input type="text" class="form-control" id="father_mobile_no" name="father_mobile_no" value="<?= set_value('father_mobile_no') ?>"  >
                        <div class="valid-feedback">Looks good!</div>
                    </div>
                    <div class="col-md-3">
                        <label for="abc_id" class="form-label">ABC ID</label>
                        <input type="text" class="form-control" id="abc_id" name="abc_id" value="<?= set_value('abc_id') ?>"  >
                        <div class="valid-feedback">Looks good!</div>
                    </div>
                </div>
                <!-- Row 2 -->
                <div class="row g-3">
                    <div class="col-md-3">
                        <label for="local_address" class="form-label">Local Address</label>
                        <input type="text" class="form-control" id="local_address" name="local_address" value="<?= set_value('local_address') ?>"  >
                        <div class="valid-feedback">Looks good!</div>
                    </div>
                    <div class="col-md-3">
                        <label for="local_address" class="form-label">Main Address</label>
                        <input type="text" class="form-control" id="local_address" name="address" value="<?= set_value('address') ?>"  >
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
                    <input type="file" id="student_photo" class="form-control-file" name="student_photo"  >
                </div>
                <div>
                    <img id="preview-student-photo" class="ll"width="150px">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="sign_of_student" class="form-control-label">Sign of Student<span class='text-success text-sm'>*</span></label>
                    <input type="file" id="sign_of_student" class="form-control-file" name="sign_of_student" accept="image/*"  >
                </div>
                <div>
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
                        <input type="file" class="form-control" id="allotment_letter" name="allotment_letter"  >
                        <div class="valid-feedback">Looks good!</div>
                    </div>
                    <div class="col-md-3">
                        <label for="online_admission_recipet" class="form-label">Online Admission Receipt</label>
                        <input type="file" class="form-control" id="online_admission_recipet" name="online_admission_recipet"  >
                        <div class="valid-feedback">Looks good!</div>
                    </div>
                    <div class="col-md-3">
                        <label for="college_recipt" class="form-label">College Receipt</label>
                        <input type="file" class="form-control" id="college_recipt" name="college_recipt"  >
                        <div class="valid-feedback">Looks good!</div>
                    </div>
                    <div class="col-md-3">
                        <label for="10th_result" class="form-label">10th Result</label>
                        <input type="file" class="form-control" id="10th_result" name="10th_result"  >
                        <div class="valid-feedback">Looks good!</div>
                    </div>
                    <div class="col-md-3">
                        <label for="12th_result" class="form-label">12th Result</label>
                        <input type="file" class="form-control" id="12th_result" name="12th_result"  >
                        <div class="valid-feedback">Looks good!</div>
                    </div>
                    <div class="col-md-3">
                        <label for="snanthak_result_allyear" class="form-label">Snathak Result All Year</label>
                        <input type="file" class="form-control" id="snanthak_result_allyear" name="snanthak_result_allyear"  >
                        <div class="valid-feedback">Looks good!</div>
                    </div>
                    <div class="col-md-3">
                        <label for="tc" class="form-label">TC</label>
                        <input type="file" class="form-control" id="tc" name="tc"  >
                        <div class="valid-feedback">Looks good!</div>
                    </div>
                    <div class="col-md-3">
                        <label for="migration_certificate" class="form-label">Migration Certificate</label>
                        <input type="file" class="form-control" id="migration_certificate" name="migration_certificate"  >
                        <div class="valid-feedback">Looks good!</div>
                    </div>
                    <div class="col-md-3">
                        <label for="adhar_card" class="form-label">Aadhar Card</label>
                        <input type="file" class="form-control" id="adhar_card" name="adhar_card"  >
                        <div class="valid-feedback">Looks good!</div>
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
                        <input type="checkbox" class="form-check-input" id="non_criminal_report" name="non_criminal_report" <?= set_checkbox('non_criminal_report', '1') ?>>
                    </div>
                    <div class="col-md-3">
                        <label for="anti_raggin" class="form-label">Anti-Ragging</label>
                        <input type="checkbox" class="form-check-input" id="anti_raggin" name="anti_raggin" <?= set_checkbox('anti_raggin', '1') ?>>
                    </div>
                </div>
                
                 
            </div>
            <!--end::Body-->
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
<?= $this->endSection() ?>