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
                <div class="col-8 ">
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
                            <form action="<?=site_url(ADMIN."updatesave/$user[id]")?>" method="post"> 
                                <div class="card-body">
                                    <div class="mb-3">
                                       <label for="name" class="form-label">Class Name</label>
                                        <input type="text" class="form-control" id="name" name="name" value="<?=set_value('name', isset($user['name']) ? esc($user['name']) : '') ?>" >
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Class Short Name</label>
                                        <input type="text" value="<?=set_value('short_name', isset($user['short_name']) ? esc($user['short_name']) : '') ?>" class="form-control" id="exampleInputEmail1" name="short_name" aria-describedby="emailHelp" >
                                    </div>
                          
                                  <div class="mb-3">
                                    <label for="year" class="form-label">Years</label>
                                    <select name="years" class="form-select">
                                        <option value="" >Select Year</option>
                                        <option value="1" <?= set_select('year', 1,($user['years'] == 1) ? true:false) ?>>One</option>
                                        <option value="2" <?= set_select('year', 2,($user['years'] == 2) ? true:false) ?>>Two</option>
                                        <option value="3" <?= set_select('year', 3,($user['years'] == 3) ? true:false) ?>>Three</option>
                                        <option value="4" <?= set_select('year', 4,($user['years'] == 4) ? true:false) ?>>Four</option>
                                    </select>
                                </div>
                                </div> <!--end::Body--> 
                                <!--begin::Footer-->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <button type="reset" class="btn btn-secondary" >Reset</button>
                                </div>
                                <!--end::Footer-->
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

<?= $this->endSection() ?>