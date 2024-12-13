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
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <select name="class" class="form-select form-select-sm" style="float:right">
                                        <option value="">Select class</option>
                                        <?php foreach($degree as $row):?>
                                        <option value="<?=$row['id']?>"><?=$row['name']?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table id="example1" class="table table-sm table-hover table-striped table-bordered example " >
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
                                    <tbody>
                                        <?php foreach($students as $key => $row): ?>
                                            <tr> 
                                                <td><?=($key + 1)?></td>
                                                <td><?=$row['enrollment_no']?></td>
                                                
                                                <?php
                                                 $name = "";
                                                 $student_name = new \App\Models\UserModel();
                                               try{
                                                 $info =  $student_name->find($row['student_id']);
                                                  $name  = $info['username'] ;
                                               }catch(\Exception $e){
                                                   $name ="NOT_FOUND";
                                               }
                                              ?>
                                                <td><?=$name?></td>
                                                <td><?=$row['father_name']?></td>
                                                <td><?=$row['mother_name']?></td>
                                                <td><?=$row['dob']?></td>
                                                <td><?=$row['mobile']?></td>
                                                <td><?=$row['email']?></td>
                                                <td><?=$row['abc_id']?></td>
                                                <td><?=$row['category']?></td>
                                                <td><?=$row['gender']?></td>
                                                <td><?=$row['address']?></td>
                                                <td>
                                                    <a href="<?= site_url(ADMIN . 'update_student/' . $row['id']) ?>" class="btn btn-primary btn-sm">Edit</a>
                                                    <a href="<?= site_url(ADMIN . 'viewstudent/' . $row['id']) ?>" class="btn btn-warning btn-sm">View</a>
                                                    <button class="btn btn-danger btn-sm delete-button" data-id="<?=$row['id']?>">Delete</button>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
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

  
   

   
});
$(document).ready(function() {
    $(".classselect").change(function() {
        var id = $(this).val(); 
        $.ajax({
            url: "<?=base_url(ADMIN."/studentlist")?>", // Make sure this route name is correct
            method: "POST",
            data: { id: id }, 
            success: function(response) {
                if (response && response.data) {
                    var tableBody = $('#student-table tbody');
                    tableBody.empty(); // Clear existing table rows
                    response.data.forEach(function(rowData) {
                        var row = $('<tr>');
                        rowData.forEach(function(cellData) {
                            row.append($('<td>').text(cellData));
                        });
                        tableBody.append(row);
                    });
                }
            },
            error: function(xhr, textStatus, errorThrown) {
                console.error("Ajax error:", textStatus);
                console.error(xhr.responseText);
            }
        });
    });
});
</script>


<script>
$(document).ready(function() {
 $('.delete-button').on('click', function() {
        var item = $(this).closest('tr');
        var id = $(this).data('id');

        if (confirm('Are you sure you want to delete?')) {
            $.ajax({
                url: '<?= base_url(ADMIN . "deletestudent/") ?>' + id,
                type: 'GET',
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
