<?= $this->extend('student/layouts/base') ?>

<?= $this->section('main') ?>
<main class="app-main">
    <!-- App Content Header -->
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3 class="mb-0"><?= $page_title ?></h3>
                        <div>
                            <a href="<?= base_url(STD . 'complain_table1') ?>" class="btn btn-secondary">Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End App Content Header -->

    <!-- App Content -->
    <div class="app-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- Default box -->
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h3 class="card-title"><?= $complain['name'] ?></h3>
                                <div class="btn-group">
                                    <button class="btn btn-primary">Print</button>
                                    <button class="btn btn-danger">PDF Preview</button>
                                    <button class="btn btn-success">Send PDF to Email</button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div>
                                <h5>Complain Details</h5>
                        
                                <p><strong>Year:</strong> <?= esc($complain['year']) ?></p>
                                <p><strong>Enrollment Number:</strong> <?= esc($complain['enrollno']) ?></p>
                                <p><strong>Branch:</strong> <?= esc($complain['branch']) ?></p>
                                <p><strong>Contact:</strong> <?= esc($complain['contact']) ?></p>
                                <p><strong>Category:</strong> <?= esc($complain['category']) ?></p>
                                <p><strong>Problem:</strong></p>
                                <p><?= nl2br(esc($complain['problem'])) ?></p>
                            </div>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </div>
    <!-- End App Content -->
</main>
<!--end::App Main-->

<script>
document.querySelector('.btn-primary').addEventListener('click', function() {
    window.print();
});
</script>

<?= $this->endSection() ?>
