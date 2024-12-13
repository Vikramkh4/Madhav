<?= $this->extend('admin/layout/base') ?>

<?= $this->section('main') ?>
<main class="app-main"> <!--begin::App Content Header-->

<div class="app-content-header"> <!--begin::Container-->

    <div class="container-fluid"> <!--begin::Row-->

        <div class="row">
            <div class="col-sm-6">
                <h3 class="mb-0">Dashboard</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                        Dashboard
                    </li>
                </ol>
            </div>
  
        </div> <!--end::Row-->
    </div> <!--end::Container-->
    
</div> <!--end::App Content Header--> <!--begin::App Content-->

<div class="app-content"> <!--begin::Container-->
    <div class="container-fluid"> <!--begin::Row-->
        <div class="row"> <!--begin::Col-->
            <div class="col-lg-3 col-6"> <!--begin::Small Box Widget 1-->
            
                <div class="small-box text-bg-primary">
                    <div class="inner">
                        <h3><?=$student_count?></h3>
                        <p>All Students</p>
                    </div> 
                  
                </div> <!--end::Small Box Widget 1-->
           
            </div> 
            <div class="col-lg-3 col-6"> <!--begin::Small Box Widget 1-->
            
                <div class="small-box text-bg-primary">
                    <div class="inner">
                        <h3><?=$complain?></h3>
                        <p>All Complain</p>
                    </div> 
                  
                </div> <!--end::Small Box Widget 1-->
           
            </div> 
            <div class="col-lg-3 col-6"> <!--begin::Small Box Widget 1-->
            
                <div class="small-box text-bg-primary">
                    <div class="inner">
                        <h3><?=$uncomplain?></h3>
                        <p>Uncompleted </p>
                    </div> 
                  
                </div> <!--end::Small Box Widget 1-->
           
            </div> 
            
        </div> <!--end::Row--> <!--begin::Row-->
      
    </div> <!--end::Container-->
</div> <!--end::App Content-->

</main> <!--end::App Main--> <!--begin::Footer-->

<?= $this->endSection() ?>

