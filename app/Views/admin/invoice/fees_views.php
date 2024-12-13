<?= $this->extend('admin/layout/base') ?>

<?= $this->section('main') ?>

<style>
    table {
        margin-right: auto;
        margin-left: 0; 
        font-size: 16px; 
        width: 100%;
        border-collapse: collapse;
    }
  
    td, th {
        border: 1px solid black;
        text-align: center;
        padding: 8px; 
    }
  
    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    tr:hover {
        background-color: #ddd;
    }

    th {
        background-color: #4CAF50;
        color: white;
    }

    .table-container {
        margin-top: 20px;
        width: 100%; 
    }

    .card-body h4 {
        text-align: right;
    }

    .card-img-top-container {
        position: relative;
        width: 100%;
        padding-top: 100%; /* 1:1 Aspect Ratio */
        overflow: hidden;
    }

    .card-img-top {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .pay-button-container {
        display: flex;
        justify-content: flex-start;
        margin-top: 10px;
    }

    .card {
        margin-bottom: 20px;
    }

    .payment-options {
        margin-top: 20px;
    }
</style>

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
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <!-- Main content area -->
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-img-top-container">
                                            <?php if (!empty($user['student_photo'])): ?>
                                                <img src="<?= base_url(IMAGE_PATH . '/' . $user['student_photo']) ?>" alt="Student Photo" class="card-img-top">
                                            <?php else: ?>
                                                <img src="<?= base_url("upload/no-icon.webp") ?>" alt="No Photo Available" class="card-img-top">
                                            <?php endif; ?>
                                        </div>
                                        <div class="card-body">
                                            <p class="card-text">Student Name: <?= $user['name'] ?></p>
                                            <p class="card-text">Enrollment no: <?= $user['enrollment_no'] ?></p>
                                            <?php  
                                                $DegreeModel = new \App\Models\DegreeModel();
                                                $class = $DegreeModel->find($user['class']);
                                            ?>
                                            <p class="card-text">Class: <?= $class['name'] ?? '' ?></p>
                                            <hr>
                                            <?php if (!empty($user['details'])): ?>
                                                <p class="card-text"><?= $user['details'] ?></p>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <!-- Table area and Sidebar area -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-container">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Fee Type</th>
                                            <th>Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($row as $pay): ?>
                                            <tr>
                                                <td><?= trim($pay['fees_name']); ?></td>
                                                <td class="pay_fees">₹<?= trim($pay['fees']); ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table> 
                                <div class="card mb-3">
                                    <div class="card-body">
                                        
                                       <h4>Grand Total: <span id="grand_total"></span></h4>
                                        <div class="payment-options">
                                            
                                            <label>
                                                <input type="radio" name="payment_type" <?=$user['paytype_status'] == 1 ? "" : "checked"?> value="full" checked onclick="togglePaymentInput()"> Full Payment
                                            </label>
                                    <?php if($user['paytype_status'] ==1){?> 
                                            <label>
                                                <input type="radio" name="payment_type" <?=$user['paytype_status'] == 1 ? "checked" : ""?>  value="partial" onclick="togglePaymentInput()"> Partial Payment
                                            </label>
                                       </div>
                                         <?php }?>
                                        <div id="partial_payment_input" style="display: none;">
                                            <label for="partial_amount">Enter Amount:</label>
                                            <input type="text" id="partial_amount" name="partial_amount" class="form-control" />
                                        </div>
                                       <!-- checked disabled disabled -->
                              <?php if($user['paytype_status'] == 1){?>  
                                    <?php foreach($payment as $row):?>
                                     
                                        <div class="pay-button-container">
                                            <form action="<?=site_url("admin/pay_proccess/$user[id]")?>" method="post" style="display: flex; align-items: center; gap: 10px;">
                                                
                                                <input type="checkbox" <?=$row['pay'] == PAID_ID ? 'checked' : ''?> name="pay_selected" style="margin: 0;" />
                                              
                                                <input type="text"  name="pay_amount" class="form-control" placeholder="Enter amount" style="flex: 1; margin: 0;" value="<?=$row['amount']?>"  readonly/>
                                                <input type="hidden" name="pay_id" value="<?=$row['id']?>" />
                                                <input type="<?=$row['pay'] == PAID_ID ? 'button' : 'submit'?>" <?=$row['pay'] == PAID_ID ? 'disabled' : ''?> value="Pay" class="btn" style="background-color: #4CAF50; color: white; margin: 0;" />
                                            </form>
                                        </div>
                                        
                                    <?php endforeach;?>     
                                <?php }else {?>
                                    <div class="pay-button-container">
                                        <form action="<?=site_url("admin/pay_proccess/$user[id]")?>" method="post" style="display: flex; align-items: center; gap: 10px;">
                                             <input type="hidden" name="full_payment" value="full" />
                                            <input type="submit" value="Pay" class="btn" style="background-color: #4CAF50; color: white; margin: 0;" />
                                        </form>
                                    </div>
                                <?php }?>
                                                        
                                    </div>
                                </div>
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
        calculateGrandTotal();
    });

    function calculateGrandTotal() {
        let grandTotal = 0;
        $('.pay_fees').each(function() {
            let amount = parseFloat($(this).text().replace('₹', '').trim());
            if (!isNaN(amount)) {
                grandTotal += amount;
            }
        });
        $('#grand_total').text('₹' + grandTotal.toFixed(2));
    }

    // function togglePaymentInput() {
    //     const isPartialPayment = document.querySelector('input[name="payment_type"]:checked').value === 'partial';
    //     document.getElementById('partial_payment_input').style.display = isPartialPayment ? 'block' : 'none';
    // }
</script>

<?= $this->endSection() ?>
