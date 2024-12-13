<?= $this->extend('student/layouts/base') ?>

<?= $this->section('main') ?>

<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>

<div class="app-content">
    <!--begin::Container-->
    <div class="container-fluid">
        <!--begin::Row-->
        <div class="row">
            <div class="col-sm-6">
                <h3 class="mb-0">ADD COMPLAIN</h3>
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
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-lte-toggle="card-collapse">
                                <i data-lte-icon="expand" class="bi bi-plus-lg"></i>
                                <i data-lte-icon="collapse" class="bi bi-dash-lg"></i>
                            </button>
                        </div> <!-- /.card-tools -->
                    </div> <!-- /.card-header -->
                    <div class="card-body">
                        <form action="<?= site_url(STD . 'save_complain1') ?>" method="post" enctype="multipart/form-data" onsubmit="return confirmSubmit()">
                            <!-- Name Field -->
                            <div class="form-group">
                                <label for="name">Name <span class="text-red">*</span></label>
                                <input type="text" class="form-control" id="name" name="name" value="<?= set_value('name') ?>">
                            </div>

                            <!-- Year Field -->
                            <div class="form-group">
                                <label for="year">Year <span class="text-red">*</span></label>
                                <input type="text" class="form-control" id="year" name="year" value="<?= set_value('year') ?>" required>
                            </div>

                            <!-- Enrollment Number Field -->
                            <div class="form-group">
                                <label for="enrollno">Enrollment Number <span class="text-red">*</span></label>
                                <input type="text" class="form-control" id="enrollno" name="enrollno" value="<?= set_value('enrollno') ?>" required>
                            </div>

                            <!-- Branch Field -->
                            <div class="form-group">
                                <label for="branch">Branch <span class="text-red">*</span></label>
                                <input type="text" class="form-control" id="branch" name="branch" value="<?= set_value('branch') ?>" required>
                            </div>

                            <!-- Contact Field -->
                            <div class="form-group">
                                <label for="contact">Contact <span class="text-red">*</span></label>
                                <input type="text" class="form-control" id="contact" name="contact" value="<?= set_value('contact') ?>" required>
                            </div>

                            <!-- Category Field -->
                            <div class="form-group">
                                <label for="category" class="form-label">Category <span class="text-red">*</span></label>
                                <select name="category" class="form-control select22" required>
                                    <option value="">Select Category</option>
                                    <?php foreach($category as $row): ?>
                                    <option value="<?= $row['id'] ?>" <?= set_select('category', $row['id']) ?>><?= $row['name'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <!-- File Upload Field -->
                            <div class="form-group mt-3 mb-2">
                                <label for="file">File</label>
                                <input type="file" class="form-control-file" id="file" name="file">
                            </div>

                            <!-- Problem Field -->
                            <div class="form-group">
                                <label for="problem">Problem <span class="text-red">*</span></label>
                                <textarea class="form-control" id="problem" name="problem" rows="4" required><?= set_value('problem') ?></textarea>
                            </div>

                            <!-- Form Footer -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <button type="reset" class="btn btn-secondary">Reset</button>
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

<script>
    CKEDITOR.replace('problem');

    function confirmSubmit() {
        return confirm('Are you sure you want to submit?');
    }
</script>

<?= $this->endSection() ?>
