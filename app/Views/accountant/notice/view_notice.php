<?= $this->extend('accountant/layouts/base') ?>

<?= $this->section('main') ?>
<main class="app-main">
    <!--begin::App Content Header-->
    <div class="app-content-header">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-12">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3 class="mb-0"><?= $notice['title'] ?></h3>
                        <div>
                            <a href="<?= base_url(ACCO . 'notice_table') ?>" class="btn btn-secondary">Back</a>
                        </div>
                    </div>
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
                <div class="col-12">
                    <!-- Default box -->
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h3 class="card-title"><?= $notice['title'] ?></h3>
                                <div class="btn-group">
                                    <button class="btn btn-primary">Print</button>
                                    <button class="btn btn-danger">PDF Preview</button>
                                   
                                    <button class="btn btn-success">Send Pdf to Mail</button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <p><?= nl2br($notice['notice']) ?></p>
                            <div class="text-end">
                                <small class="text-muted"><?= date('d M Y', strtotime($notice['date'])) ?></small>
                            </div>
                        </div>
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
document.querySelector('.btn-primary').addEventListener('click', function() {
    window.print();
});
</script>

<?= $this->endSection() ?>
