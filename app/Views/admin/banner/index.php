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
    <!--end::App Content Header date('d M Y', strtotime($row['date']) -->

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
                            <h3 class="card-title"><a href="<?=base_url(ADMIN.'addbanner')?>" class="btn btn-primary">
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
                                                    <table class="table alltable table-hover table-striped table-bordered example">
                                        <thead>
                                            <tr>
                                                <th>id</th>
                                                <th>Banner Name</th>
                                                <th>Banner Image</th>
                                                <th>Action</th>
                                            </tr> 
                                        </thead>
                                        <tbody>
                                            <?php foreach($banner as $key => $row): ?>
                                                <tr> 
                                                    <td><?=($key+1)?></td>
                                                    <td><?=$row['name']?></td>
                                                    <td><img width="140" src="<?=base_url('uploads/banner/'.$row['image'])?>" /></td>
                                                    <td>
                                                     <a href="<?=base_url(ADMIN.'edit_banner/'.$row["id"])?>" class="btn btn-primary" >Edit</a>
                                                    <button class="btn btn-danger delete-button12" data-id="<?= $row['id'] ?>">Delete</button>
                               
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
    // Initialize DataTable with buttons
    $('#example1').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });    
    
</script>

<script>
$(document).ready(function() {

     $('.delete-button12').on('click', function() {
        var item = $(this).closest('tr');
        var id = $(this).data('id');

        if (confirm('Are you sure you want to delete?')) {
            $.ajax({
                url: '<?= base_url(ADMIN . "delete_banner/") ?>' + id,
                type: 'GET',
                dataType: "json",
                success: function(result) {
                    if (result.status === "success") {
                        alert(result.message);
                        setTimeout(function() { 
                            location.reload();
                        }, 1000);
                    } else {
                        alert('Failed to delete banner.');
                    }
                },
                error: function(xhr, status, error) {
                    alert('Failed to delete banner.');
                }
            });
        }
    });
});
</script>

<?= $this->endSection() ?>
