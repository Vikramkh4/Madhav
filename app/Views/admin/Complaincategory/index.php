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
                            <div class="box-body table-responsive overflow-visible-lg">
                                <div>
                                    <table class="table table-hover datatable1 table-striped table-bordered example">
                                        <thead>
                                            <tr>
                                                <th>id</th>
                                                <th>Session</th>
                                                <th>Action</th>
                                            </tr> 
                                        </thead>
                                        <tbody>
                                            <?php foreach($category as $key => $row): ?>
                                                <tr> 
                                                    <td><?=($key+1)?></td>
                                                    <td><?=$row['name']?></td>
                                                    <td>
                                                     <a href="<?=base_url(ADMIN.'update_companin/'.$row["id"])?>" class="btn btn-primary" >Edit</a>
                                                    <button class="btn btn-danger delete-button" data-id="<?= $row['id'] ?>">Delete</button>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
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
    $('.delete-button').on('click', function() {
        var item = $(this).closest('tr');
        var id = $(this).data('id');

        if (confirm('Are you sure you want to delete?')) {
            $.ajax({
                url: '<?= base_url(ADMIN . "deletecomplain/") ?>'+id,
                type: 'GET', // Changed to POST as you are getting data using POST method
                
                dataType: "json",
                success: function(result) {
                    if (result.status === "success") { // Corrected the comparison operator
                        alert(result.message);
                        setTimeout(function() { 
                            location.reload();
                        }, 1000);
                    } else {
                        alert('Failed to delete degreo.');
                    }
                },
                error: function(xhr, status, error) {
                    alert('Failed to delete degrOe.');
                }
            });
        }
    });
});

$(document).ready(function() {
   $('.datatable1').DataTable({
    dom: 'Bfrtip', 
    buttons: [
        'copy', 
        'excel', 
        'pdf', 
        'colvis' 
    ],
    "searching": true, 
    "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]], 
    "pageLength": 10 
});
});


</script>
<?= $this->endSection() ?>
