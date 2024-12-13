<?= $this->extend('admin/layout/base') ?>

<?= $this->section('main') ?>
<main class="app-main">
    <!-- App Content Header -->
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3 class="mb-0"><?= esc($page_title) ?></h3>
                        <div>
                            <a href="<?= base_url(ADMIN . 'complain_table') ?>" class="btn btn-secondary">Back</a>
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
                                <h3 class="card-title"><?= esc($complain['name']) ?></h3>
                                <div class="btn-group">
                                    <button class="btn btn-primary" data-toggle="modal" data-target="#solutionModal">Solution</button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div>
                                <h5>Complain Details</h5>
                                <p><strong>Heading:</strong> <?= esc($complain['name']) ?></p>
                                <p><strong>Category:</strong> <?= esc($complain['category']) ?></p>
                                <p><strong>Problem:</strong></p>
                                <p><?= nl2br($complain['problem']) ?></p>
                                <a href="<?= base_url('uploads/' . $complain['file']) ?>" target="_blank"><img width="140" src="<?= base_url('uploads/' . $complain['file']) ?>"></a>
                                <!-- Display the uploaded image -->
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

<!-- Solution Modal -->
<div class="modal fade" id="solutionModal" tabindex="-1" role="dialog" aria-labelledby="solutionModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="solutionModalLabel">Write Solution</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success">
        <?= session()->getFlashdata('success') ?>
    </div>
<?php endif; ?>

<?php if (session()->getFlashdata('error')): ?>
    <div class="alert alert-danger">
        <?= session()->getFlashdata('error') ?>
    </div>
<?php endif; ?>

                <form action="<?= base_url(ADMIN . 'save_solution/'. $complain['id']) ?>" method="post">
                    <div class="form-group">
                        <label for="solution">Solution</label>
                        <textarea class="form-control" id="solution" name="solution" rows="4" required></textarea>
                    </div>
                    <input type="hidden" name="complain_id" value="<?= esc($complain['id']) ?>">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save Solution</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>

<!-- Include jQuery and Bootstrap JavaScript -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<!-- Check if Bootstrap's CSS is included -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
