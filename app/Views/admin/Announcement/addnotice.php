<?= $this->extend('admin/layout/base') ?>

<?= $this->section('main') ?>

<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>

<div class="app-content">
    <!--begin::Container-->
    <div class="container-fluid">
        <!--begin::Row-->
        <div class="row">
            <div class="col-sm-6">
                <h3 class="mb-0">ADD NOTICE</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="<?=base_url(session()->get("role"))?>">Dashboard</a></li>
                    <li class="breadcrumb-item active"><?= $page_title ?></li>
                </ol>
            </div>
        </div>
        <!--end::Row-->
    </div>
    <!--begin::Container-->
    <div class="container-fluid">
        <!--begin::Row-->
        <div class="row g-4">
            <!--begin::Col-->
            <div class="col-md-12">
                            <div class="card card-outline card-success">
                                <div class="card-header">
                                <h3 class="card-title"><i class="bi bi-calendar-event"></i> <?= $page_title ?></h3>
                                    <div class="card-tools"> <button type="button" class="btn btn-tool" data-lte-toggle="card-collapse"> <i data-lte-icon="expand" class="bi bi-plus-lg"></i> <i data-lte-icon="collapse" class="bi bi-dash-lg"></i> </button> </div> <!-- /.card-tools -->
                                </div> <!-- /.card-header -->
                                <div class="card-body">
                                    <?php if (session()->getFlashdata('validation')): ?>
    <div class="alert alert-danger">
        <?= session()->getFlashdata('validation')->listErrors() ?>
    </div>
<?php endif; ?>

                                    <form action="<?= site_url(ADMIN . 'save_notice') ?>" method="post" class="needs-validation" novalidate>
                                        <!-- Title Field -->
                                        <div class="form-group">
                                            <label for="title">Title <span class="text-red">*</span></label>
                                            <input type="text" class="form-control" id="title" name="title" value="<?= set_value('title') ?>" required>
                                            <div class="invalid-feedback">Title is required.</div>
                                        </div>
                                        
                                        <!-- Date Field -->
                                        <div class="form-group">
                                            <label for="date">Date <span class="text-red">*</span></label>
                                            <input type="date" class="form-control" id="date" name="date" style="width:180px;" value="<?= set_value('date') ?>" required>
                                            <div class="invalid-feedback">Date is required.</div>
                                        </div>
                                        <div class="col-md-3">
                        <label for="class" class="form-label">Class</label>
                        <select name="class" class="form-control select22">
                            <option value="">Select Class</option>
                            <?php foreach($class as $row):?>
                            <option value="<?= $row['name'] ?>" <?= set_select('class',$row['name'])?>  ><?= $row['name'] ?></option>
                            <?php endforeach;?>
                        </select>
                        <div class="valid-feedback">Looks good!</div>
                    </div>
                                        <!-- Notice Field -->
                                        <div class="form-group">
                                            <label for="notice">Notice <span class="text-red">*</span></label>
                                            <textarea class="form-control" id="notice" name="notice" required><?= set_value('notice') ?></textarea>
                                            <div class="invalid-feedback">Notice is required.</div>
                                        </div>
                                        
                                        <div class="card-footer">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                                <button type="reset" class="btn btn-secondary" >Reset</button>
                                              </div>
                                    </form>
                                </div><!-- /.card-body -->
                            </div> <!-- /.card -->
                        </div>
            <!--end::Col-->
        </div>
        <!--end::Row-->
    </div>
    <!--end::Container-->
</div>
<script> CKEDITOR.replace('notice');</script>
<?= $this->endSection() ?>
