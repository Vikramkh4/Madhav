<?= $this->extend('student/layouts/base') ?>

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
                            <h3 class="card-title"><a href="<?=base_url(STD."/complain1")?>" class="btn btn-primary">
                                                                <i class="bi bi-file-earmark-plus-fill"></i>
                                                            </a></h3>
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
                            <div class="box-body table-responsive overflow-visible-lg">
                                <div class="col-sm-12">
                                    <div id="hide-table">
                                                                              <table id="example1" class="table table-striped table-bordered display nowrap table-hover dataTable no-footer">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Name</th>
                                                    <th>Year</th>
                                                    <th>Enrollment Number</th>
                                                    <th>Branch</th>
                                                    <th>Contact</th>
                                                    <th>Category</th>
                                                    <th>Problem</th>
                                                  
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($complain as $key => $row): ?>
                                                    <tr>
                                                        <td><?= ($key + 1) ?></td>
                                                        <td><?= $row['name'] ?></td>
                                                        <td><?= $row['year'] ?></td>
                                                        <td><?= $row['enrollno'] ?></td>
                                                        <td><?= $row['branch'] ?></td>
                                                        <td><?= $row['contact'] ?></td>
                                                        <td><?= $row['category'] ?></td>
                                                        <td><?= substr($row['problem'], 0, 5) . '...' ?></td>
                                                   
                                                        <td>
                                                            <a href="<?= base_url(STD . 'view_complain1/' . $row["id"]) ?>" class="btn btn-warning">
                                                                <i class="bi bi-eye"></i>
                                                            </a>
                                                            <a href="<?= base_url(STD . 'edit_complain1/' . $row["id"]) ?>" class="btn btn-primary">
                                                                <i class="bi bi-pencil-square"></i>
                                                            </a>
                                                            <button class="btn btn-danger delete-button" data-id="<?= $row['id'] ?>">
                                                                <i class="bi bi-trash"></i>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>
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
<script>
$(document).ready(function() {
    // Initialize DataTable with buttons
    $('#example1').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });

    // Handle delete button click
     $('.delete-button').on('click', function() {
        var item = $(this).closest('tr');
        var id = $(this).data('id');

        if (confirm('Are you sure you want to delete?')) {
            $.ajax({
                url: '<?= base_url(STD . "delete_complain1/") ?>' + id,
                type: 'POST',
                dataType: "json",
                success: function(result) {
                    if (result.status === "success") {
                        alert(result.message);
                        setTimeout(function() { 
                            location.reload();
                        }, 1000);
                    } else {
                        alert('Failed to delete student.');
                    }
                },
                error: function(xhr, status, error) {
                    alert('Failed to delete student.');
                }
            });
        }
    });
});
</script>

<?= $this->endSection() ?>