<?= $this->extend('accountant/layouts/base') ?>

<?= $this->section('main') ?>
<style>
    .container {
        margin-top: 50px;
    }
    .card-header {
        font-weight: bold;
    }
</style>
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
                <div class="col-12">
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
                            <form action="<?= site_url(ACCO . "save_invoice") ?>" method="post">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="student">Student</label>
                                                <select class="form-control select12" id="student" name="student">
                                                    <option value="">Select Student</option>
                                                    <?php foreach ($students as $student): ?>
                                                        <option value="<?= $student['id'] ?>" <?= set_select('student', $student['id']) ?>><?= $student['name'] ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="degree">Class</label>
                                                <select class="form-control select12" id="degree" name="degree">
                                                    <option value="">Select Class</option>
                                                    <?php foreach ($degrees as $degree): ?>
                                                        <option value="<?= $degree['id'] ?>" <?= set_select('degree', $degree['id']) ?>><?= $degree['name'] ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="date">Date</label>
                                                <input type="date" class="form-control" id="date" name="date" value="<?= set_value('date', date('Y-m-d')) ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="total">Total</label>
                                                <input type="text" class="form-control" id="total" name="total" value="<?= set_value('total') ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="discount">Discount</label>
                                                <input type="text" class="form-control" id="discount" name="discount" value="<?= set_value('discount') ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="paid">Paid</label>
                                                <input type="text" class="form-control" id="paid" name="paid" value="<?= set_value('paid') ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="balance">Balance</label>
                                                <input type="text" class="form-control" id="balance" name="balance" value="<?= set_value('balance') ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="status" class="form-label">Status</label>
                                                <select class="form-control select22" id="status" name="status">
                                                    <option value="" disabled selected>Select Status</option>
                                                    <option value="Paid" <?= set_select('status', 'Paid') ?>>Paid</option>
                                                    <option value="Unpaid" <?= set_select('status', 'Unpaid') ?>>Unpaid</option>
                                                    <option value="Partially" <?= set_select('status', 'Partially') ?>>Partially</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!--end::Body-->
                                
                               <div class="col-md-8">
                                    <div class="card">
                                      
                                        <div class="card-body">
                                            <div class="form-group">
    <label for="feeType">Fee Type</label>
    <select class="form-control" id="feeType" required>
        <?php foreach ($feestype as $fee): ?>
            <option value="<?= $fee['id'] ?>" <?= set_select('feeType', $fee['id']) ?>><?= $fee['fees_name'] ?></option>
        <?php endforeach; ?>
    </select>
</div>

                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Fee Type</th>
                                                        <th>Amount</th>
                                                        <th>Discount</th>
                                                        <th>Paid</th>
                                                        <th>Balance</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>Total</td>
                                                        <td colspan="5">0.00</td>
                                                        <td></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div> 

                                <!--begin::Footer-->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <button type="reset" class="btn btn-secondary">Reset</button>
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
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<?= $this->endSection() ?>
