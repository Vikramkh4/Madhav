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
                <div class="col-8">
                    <!-- Default box -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"><?= $page_title ?></h3>
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
                            <form action="<?= site_url(ADMIN . "update_savefeesgroup/" . $user['id']) ?>" method="post">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Fees Group Name</label>
                                    <input type="text" class="form-control" id="name" name="feesname" value="<?= $user['fees_name'] ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="fees_group" class="form-label">Select Fees Types</label>
                             <select name="fees_group[]" class="form-select select2grouptype" multiple>
                                <option value="">Select</option>
                                <?php foreach ($feestype as $row): ?>
                                    <option value="<?php echo $row['id']; ?>" <?php echo in_array($row['id'], $fees_grouparr) ? 'selected="selected"' : ''; ?>><?php echo $row['fees_name']; ?>(<?=$row['fees']?>)</option>
                                <?php endforeach; ?>
                            </select>
                                </div>
                                   <div class="mb-3">
                                        <label for="class" class="form-label">Select Class</label>
                                        <select name="class" class="form-select select22">
                                            <option value="">Select</option>
                                            <?php foreach($class as $row): ?>
                                                <?php 
                                                    
                                                    $class_id = $row['id'];
                                                    $class_name = $row['name'];
                                            
                                                    $selected = in_array($row['id'], array($user['class'])) ? 'selected' : '';
                                                ?>
                                                <option value="<?= $class_id ?>" <?= $selected ?>><?= $class_name ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
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

<?= $this->endSection() ?>