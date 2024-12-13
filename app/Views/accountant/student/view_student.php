<?= $this->extend('accountant/layouts/base') ?>

<?= $this->section('main') ?>

<main class="app-main">
  <div class="app-content-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6">
          <h3 class="mb-0"><?= $page_title ?></h3>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-end">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?= $page_title ?></li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <div class="app-content">
    <div class="container">
      <div class="row">
 <div class="col-md-3">
    <div class="card">
        <?php if (!empty($user['student_photo'])): ?>
            <img src="<?= base_url(IMAGE_PATH . '/' . $user['student_photo']) ?>" width="120" alt="" class="card-img-top">
        <?php else: ?>
            <img src="<?= base_url("upload/no-icon.webp") ?>" width="120" alt="" class="card-img-top">
        <?php endif; ?>
        <div class="card-body">
            <!-- Separate paragraph tags for each line of text -->
         
                <p class="card-text">Student Name: <?= $user['name'] ?></p>
        
          
                <p class="card-text">Enrollment no: <?= $user['enrollment_no'] ?></p>
         
            <!-- Add a horizontal line -->
            <hr>
            <!-- Added line for showing text details about the user -->
            <?php if (!empty($user['details'])): ?>
                <p class="card-text"><?= $user['details'] ?></p>
            <?php endif; ?>
        </div>
    </div>
</div>

        <div class="col-md-8">
          <div class="card card-info card-outline mb-">
            <div class="card-header">
              <div class="card-title">
                <h3>Personal Information</h3>
              </div>
            </div>
            <div class="card-body">
                
              <div class="row g-3">
                <div class="col-md-3">
                  <label for="name" class="form-label"><h5>Name:</h5></label>
                </div>
                <div class="col-md-9">
                 <h5><?= $user['name'] ?></h5> 
                </div>
              </div>
              
              <div class="row g-3">
                <div class="col-md-3">
                  <label for="name" class="form-label"><h5>Name:</h5></label>
                </div>
                <div class="col-md-9">
                 <h5><?= $user['name'] ?></h5> 
                </div>
              </div>
              
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
              </div>
                
               </div>
            

              
                
              
            
              
              
          </div>
        </div>
      </div>
    </div>
  </div>
</main>

<?= $this->endSection() ?>
