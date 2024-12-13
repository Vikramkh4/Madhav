<?= $this->extend('admin/layout/base') ?>

<?= $this->section('main') ?>
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" />
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.1.0/css/buttons.dataTables.min.css" />
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.1.0/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.1.0/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.1.0/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.1.0/js/buttons.print.min.js"></script>

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
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
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
                            <div class="row mb-3">
                                <div class="col-md-3">
                                    <select name="class" id="class_filter" class="form-select form-select-sm" style="float:right">
                                        <option value="">Select class</option>
                                        <?php foreach($degree as $row): ?>
                                        <option value="<?= $row['id'] ?>"><?= $row['name'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="col-md-3" style="float:right">
                                    <select id="payment-type" name="payment_type" class="form-select">
                                        <option value="">Select Payment Type</option>
                                        <option value="0">Full Payment</option>
                                        <option value="1">Partial Payment</option>
                                    </select>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-sm table-hover table-striped table-bordered example student-table12">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Enroll. No</th>
                                            <th>Name</th>
                                            <th>Father's Name</th>
                                            <th>Mother's Name</th>
                                            <th>DOB</th>
                                            <th>Mobile</th>
                                            <th>Email</th>
                                            <th>ABC ID</th>
                                            <th>Category</th>
                                            <th>Gender</th>
                                            <th>Address</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="student-list">
                                        <!-- Dynamic content -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
</main>

<script>
$(document).ready(function() {
    var dataTable = $('.student-table12').DataTable({
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'copy',
                exportOptions: {
                    columns: ':not(:last-child)'
                }
            },
            {
                extend: 'excel',
                exportOptions: {
                    columns: ':not(:last-child)'
                }
            },
            {
                extend: 'pdf',
                exportOptions: {
                    columns: ':not(:last-child)'
                }
            },
            'colvis'
        ],
        searching: true,
        lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
        pageLength: 10
    });

    function fetchFilteredData() {
        var classId = $('#class_filter').val();
        var paymentType = $('#payment-type').val();
        $.ajax({
            url: '<?= base_url(ADMIN . "/report/get_reportFilter"); ?>',
            method: 'GET',
            data: { id: classId, payment_type: paymentType, key: '215mdsfjd636712' },
            success: function(response) {
                if (response && response.data) {
                    var tableBody = $('#student-list');
                    tableBody.empty();
                    response.data.forEach(function(rowData, index) {
                        var row = $('<tr>');
                        row.append($('<td>').text(index + 1));
                        row.append($('<td>').text(rowData.enrollment_no));
                        row.append($('<td>').text(rowData.student_id));
                        row.append($('<td>').text(rowData.father_name));
                        row.append($('<td>').text(rowData.mother_name));
                        row.append($('<td>').text(rowData.dob));
                        row.append($('<td>').text(rowData.mobile));
                        row.append($('<td>').text(rowData.email));
                        row.append($('<td>').text(rowData.abc_id));
                        row.append($('<td>').text(rowData.category));
                        row.append($('<td>').text(rowData.gender));
                        row.append($('<td>').text(rowData.address));
                        row.append('<td><button class="btn btn-danger delete-button" data-id="'+rowData.id+'"><i class="bi bi-trash"></i></button></td>');
                        tableBody.append(row);
                    });
                }
            },
            error: function(xhr, textStatus, errorThrown) {
                console.error("Ajax error:", textStatus);
                console.error(xhr.responseText);
            }
        });
    }

    $('#class_filter, #payment-type').on('change', fetchFilteredData);
    fetchFilteredData(); // Initial load
});
</script>

<?= $this->endSection() ?>
