<!DOCTYPE html>
<html lang="en"> <!--begin::Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title><?=getAppDetails(1 ,"name")?> | <?=$page_title?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="title" content="Madhav Collage | Dashboard">
    <meta name="author" content="swifnix Saurbh">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css" integrity="sha256-tXJfXfp6Ewt1ilPzLDtQnJV4hclT9XuaZUKyUvmyr+Q=" crossorigin="anonymous"><!--end::Fonts--><!--begin::Third Party Plugin(OverlayScrollbars)-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.3.0/styles/overlayscrollbars.min.css" integrity="sha256-dSokZseQNT08wYEWiz5iLI8QPlKxG+TswNRD8k35cpg=" crossorigin="anonymous"><!--end::Third Party Plugin(OverlayScrollbars)--><!--begin::Third Party Plugin(Bootstrap Icons)-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.min.css" integrity="sha256-Qsx5lrStHZyR9REqhUF8iQt73X06c8LGIUPzpOhwRrI=" crossorigin="anonymous"><!--end::Third Party Plugin(Bootstrap Icons)--><!--begin::Required Plugin(AdminLTE)-->
    <link rel="stylesheet" href="<?=base_url('assests/')?>dist/css/adminlte.css"><!--end::Required Plugin(AdminLTE)--><!-- apexcharts -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.css" integrity="sha256-4MX+61mt9NVvvuPjUWdUdyfZfxSB1/Rf9WtqRHgG5S0=" crossorigin="anonymous"><!-- jsvectormap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/jsvectormap@1.5.3/dist/css/jsvectormap.min.css" integrity="sha256-+uGLJmmTKOqBr+2E6KDYs/NRsHxSkONXFHUL0fy2O/4=" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="icon" href="<?=base_url(getAppDetails(1,"logo"))?>" type="image/gif" sizes="16x16">
    <link rel="stylesheet" href="<?=base_url('assests/')?>custome/custome.css">
    <script src="<?=base_url("assests/iziToas/dist/js/iziToast.min.js")?>"> </script>
     <!--css of iziToast -->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css" />
 
<script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
    <link href="<?=base_url("assests/select2/")?>dist/css/select2.min.css" rel="stylesheet" />
<script src="<?=base_url("assests/select2/")?>dist/js/select2.min.js"></script>
    
    
    <link rel="stylesheet" href="<?=base_url("assests/datepicker/jquery-ui.css")?>">
    <script src="<?=base_url("assests/datepicker/jquery-ui.js")?>"></script>
   <link rel="stylesheet" href="<?=base_url("assests/iziToas/dist/css/iziToast.min.css")?>">
</head> <!--end::Head--> <!--begin::Body-->

<body class="layout-fixed sidebar-expand-lg bg-body-tertiary"> <!--begin::App Wrapper-->
    <div class="app-wrapper"> <!--begin::Header-->
  

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
                    <!--<div class="col-sm-6">-->
                    <!--    <h3 class="mb-0"><?= $page_title ?></h3>-->
                    <!--</div>-->
                <!--<div class="col-sm-6">-->
                <!--    <ol class="breadcrumb float-sm-end">-->
                <!--        <li class="breadcrumb-item"><a href="#">Home</a></li>-->
                <!--        <li class="breadcrumb-item active" aria-current="page"><?= $page_title ?></li>-->
                <!--    </ol>-->
                <!--</div>-->
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
                                       
                              <?php if($user['paytype_status'] == 1){?>  
                                    <?php foreach($payment as $row):?>
                                    
                                        <div class="pay-button-container">
                                            <form action="<?=site_url("admin/pay_proccess/$user[id]")?>" method="post" style="display: flex; align-items: center; gap: 10px;">
                                                <input type="checkbox" name="pay_selected" style="margin: 0;" />
                                                <input type="text"  name="pay_amount" class="form-control" placeholder="Enter amount" style="flex: 1; margin: 0;" value="<?=$row['amount']?>"  readonly/>
                                                <input type="hidden" name="pay_id" value="<?=$row['id']?>" />
                                                <input type="buttton" value="Pay" class="btn" style="background-color: #4CAF50; color: white; margin: 0;" />
                                            </form>
                                        </div>
                                        
                                    <?php endforeach;?>     
                                <?php }else {?>
                                    <div class="pay-button-container">
                                        <form action="<?=site_url("admin/pay_proccess/$user[id]")?>" method="post" style="display: flex; align-items: center; gap: 10px;">
                                             <input type="hidden" name="full_payment" value="full" />
                                            <input type="buttton" value="Pay" class="btn" style="background-color: #4CAF50; color: white; margin: 0;" />
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


        <footer class="app-footer"> <!--begin::To the end-->

                <a href="https://madhavcollege.edu.in/" class="text-decoration-none">Madhav Collage</a>.
            </strong>
            All rights reserved.
            <!--end::Copyright-->
        </footer> <!--end::Footer-->
    </div> <!--end::App Wrapper--> <!--begin::Script--> <!--begin::Third Party Plugin(OverlayScrollbars)-->
    <script src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.3.0/browser/overlayscrollbars.browser.es6.min.js" integrity="sha256-H2VM7BKda+v2Z4+DRy69uknwxjyDRhszjXFhsL4gD3w=" crossorigin="anonymous"></script> <!--end::Third Party Plugin(OverlayScrollbars)--><!--begin::Required Plugin(popperjs for Bootstrap 5)-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha256-whL0tQWoY1Ku1iskqPFvmZ+CHsvmRWx/PIoEvIeWh4I=" crossorigin="anonymous"></script> <!--end::Required Plugin(popperjs for Bootstrap 5)--><!--begin::Required Plugin(Bootstrap 5)-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha256-YMa+wAM6QkVyz999odX7lPRxkoYAan8suedu4k2Zur8=" crossorigin="anonymous"></script> <!--end::Required Plugin(Bootstrap 5)--><!--begin::Required Plugin(AdminLTE)-->
      <script src="<?=base_url('assests/')?>dist/js/adminlte.js"></script> <!--end::Required Plugin(AdminLTE)--><!--begin::OverlayScrollbars Configure-->
    <script>
        const SELECTOR_SIDEBAR_WRAPPER = ".sidebar-wrapper";
        const Default = {
            scrollbarTheme: "os-theme-light",
            scrollbarAutoHide: "leave",
            scrollbarClickScroll: true,
        };
        document.addEventListener("DOMContentLoaded", function() {
            const sidebarWrapper = document.querySelector(SELECTOR_SIDEBAR_WRAPPER);
            if (
                sidebarWrapper &&
                typeof OverlayScrollbarsGlobal?.OverlayScrollbars !== "undefined"
            ) {
                OverlayScrollbarsGlobal.OverlayScrollbars(sidebarWrapper, {
                    scrollbars: {
                        theme: Default.scrollbarTheme,
                        autoHide: Default.scrollbarAutoHide,
                        clickScroll: Default.scrollbarClickScroll,
                    },
                });
            }
        });
    </script> <!--end::OverlayScrollbars Configure--> <!-- OPTIONAL SCRIPTS --> <!-- sortablejs -->
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js" integrity="sha256-ipiJrswvAR4VAx/th+6zWsdeYmVae0iJuiR+6OqHJHQ=" crossorigin="anonymous"></script> <!-- sortablejs -->
    <script>
        const connectedSortables =
            document.querySelectorAll(".connectedSortable");
        connectedSortables.forEach((connectedSortable) => {
            let sortable = new Sortable(connectedSortable, {
                group: "shared",
                handle: ".card-header",
            });
        });

        const cardHeaders = document.querySelectorAll(
            ".connectedSortable .card-header",
        );
        cardHeaders.forEach((cardHeader) => {
            cardHeader.style.cursor = "move";
        });
    </script> <!-- apexcharts -->
    <script src="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.min.js" integrity="sha256-+vh8GkaU7C9/wbSLIcwq82tQ2wTf44aOHA8HlBMwRI8=" crossorigin="anonymous"></script> <!-- ChartJS -->
    <script>
        // NOTICE!! DO NOT USE ANY OF THIS JAVASCRIPT
        // IT'S ALL JUST JUNK FOR DEMO
        // ++++++++++++++++++++++++++++++++++++++++++

        const sales_chart_options = {
            series: [{
                    name: "Digital Goods",
                    data: [28, 48, 40, 19, 86, 27, 90],
                },
                {
                    name: "Electronics",
                    data: [65, 59, 80, 81, 56, 55, 40],
                },
            ],
            chart: {
                height: 300,
                type: "area",
                toolbar: {
                    show: false,
                },
            },
            legend: {
                show: false,
            },
            colors: ["#0d6efd", "#20c997"],
            dataLabels: {
                enabled: false,
            },
            stroke: {
                curve: "smooth",
            },
            xaxis: {
                type: "datetime",
                categories: [
                    "2023-01-01",
                    "2023-02-01",
                    "2023-03-01",
                    "2023-04-01",
                    "2023-05-01",
                    "2023-06-01",
                    "2023-07-01",
                ],
            },
            tooltip: {
                x: {
                    format: "MMMM yyyy",
                },
            },
        };

        const sales_chart = new ApexCharts(
            document.querySelector("#revenue-chart"),
            sales_chart_options,
        );
        sales_chart.render();
    </script> <!-- jsvectormap -->

    
     <script src="https://cdn.jsdelivr.net/npm/jsvectormap@1.5.3/dist/js/jsvectormap.min.js" integrity="sha256-/t1nN2956BT869E6H4V1dnt0X5pAQHPytli+1nTZm2Y=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/jsvectormap@1.5.3/dist/maps/world.js" integrity="sha256-XPpPaZlU8S/HWf7FZLAncLg2SAkP8ScUTII89x9D3lY=" crossorigin="anonymous"></script> <!-- jsvectormap -->
  
   <script>
        const visitorsData = {
            US: 398, // USA
            SA: 400, // Saudi Arabia
            CA: 1000, // Canada
            DE: 500, // Germany
            FR: 760, // France
            CN: 300, // China
            AU: 700, // Australia
            BR: 600, // Brazil
            IN: 800, // India
            GB: 320, // Great Britain
            RU: 3000, // Russia
        };

        // World map by jsVectorMap
        const map = new jsVectorMap({
            selector: "#world-map",
            map: "world",
        });

        // Sparkline charts
        const option_sparkline1 = {
            series: [{
                data: [1000, 1200, 920, 927, 931, 1027, 819, 930, 1021],
            }, ],
            chart: {
                type: "area",
                height: 50,
                sparkline: {
                    enabled: true,
                },
            },
            stroke: {
                curve: "straight",
            },
            fill: {
                opacity: 0.3,
            },
            yaxis: {
                min: 0,
            },
            colors: ["#DCE6EC"],
        };

        const sparkline1 = new ApexCharts(
            document.querySelector("#sparkline-1"),
            option_sparkline1,
        );
        sparkline1.render();

        const option_sparkline2 = {
            series: [{
                data: [515, 519, 520, 522, 652, 810, 370, 627, 319, 630, 921],
            }, ],
            chart: {
                type: "area",
                height: 50,
                sparkline: {
                    enabled: true,
                },
            },
            stroke: {
                curve: "straight",
            },
            fill: {
                opacity: 0.3,
            },
            yaxis: {
                min: 0,
            },
            colors: ["#DCE6EC"],
        };

        const sparkline2 = new ApexCharts(
            document.querySelector("#sparkline-2"),
            option_sparkline2,
        );
        sparkline2.render();

        const option_sparkline3 = {
            series: [{
                data: [15, 19, 20, 22, 33, 27, 31, 27, 19, 30, 21],
            }, ],
            chart: {
                type: "area",
                height: 50,
                sparkline: {
                    enabled: true,
                },
            },
            stroke: {
                curve: "straight",
            },
            fill: {
                opacity: 0.3,
            },
            yaxis: {
                min: 0,
            },
            colors: ["#DCE6EC"],
        };

        const sparkline3 = new ApexCharts(
            document.querySelector("#sparkline-3"),
            option_sparkline3,
        );
        sparkline3.render();
    </script> <!--end::Script-->

 <!--download script of izitost -->
 <?php $arra = array(); if (isset($validation)): ?>
    <?php foreach ($validation->getErrors() as $key => $error): ?>
        <?php $arra[$key] = $error; ?>
    <?php endforeach; ?>
    <script>
        iziToast.error({
            message: '<?= implode("<br>", array_map('esc', $arra)) ?>',
            position: 'topRight',
            timeout: 5000 // Optional: Adjust the timeout as needed
        });
    </script>
<?php endif; ?>

<?php 
$arra = array(); 
$validation = session()->getFlashdata("validation");

if ($validation && is_object($validation)) {
    $errors = $validation->getErrors();
    if (is_array($errors)) {
        foreach ($errors as $key => $error) {
            $arra[$key] = $error;
        }
    }
}
?>
<?php if (!empty($arra)): ?>
    <script>
        iziToast.error({
            message: '<?= implode("<br>", array_map('esc', $arra)) ?>',
            position: 'topRight',
            timeout: 2000 
        });
    </script>
<?php endif; ?>




        <?php if (session()->getFlashdata('error')): ?>
            <script>
            iziToast.error({
                message: '<?= esc(session()->getFlashdata('error')) ?>',
                position: 'topRight'
            });
            </script>
        <?php endif; ?>
    
        <?php if (session()->getFlashdata('success')): ?>
            <script>
            iziToast.success({
                message: '<?= esc(session()->getFlashdata('success')) ?>',
                position: 'topRight'
            });
            </script>
        <?php endif; ?>
<script>
  $( function() {
    $( ".cutomedate" ).datepicker();
  } );

$(document).ready(function() {
    $('.select2grouptype').select2({
        'multiple':true,
        'placeholder':"Select Fees Types Multiple"
    });
});

</script>


        <footer class="app-footer"> <!--begin::To the end-->

                <a href="https://madhavcollege.edu.in/" class="text-decoration-none">Madhav Collage</a>.
            </strong>
            All rights reserved.
            <!--end::Copyright-->
        </footer> <!--end::Footer-->
    </div> <!--end::App Wrapper--> <!--begin::Script--> <!--begin::Third Party Plugin(OverlayScrollbars)-->
    <script src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.3.0/browser/overlayscrollbars.browser.es6.min.js" integrity="sha256-H2VM7BKda+v2Z4+DRy69uknwxjyDRhszjXFhsL4gD3w=" crossorigin="anonymous"></script> <!--end::Third Party Plugin(OverlayScrollbars)--><!--begin::Required Plugin(popperjs for Bootstrap 5)-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha256-whL0tQWoY1Ku1iskqPFvmZ+CHsvmRWx/PIoEvIeWh4I=" crossorigin="anonymous"></script> <!--end::Required Plugin(popperjs for Bootstrap 5)--><!--begin::Required Plugin(Bootstrap 5)-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha256-YMa+wAM6QkVyz999odX7lPRxkoYAan8suedu4k2Zur8=" crossorigin="anonymous"></script> <!--end::Required Plugin(Bootstrap 5)--><!--begin::Required Plugin(AdminLTE)-->
      <script src="<?=base_url('assests/')?>dist/js/adminlte.js"></script> <!--end::Required Plugin(AdminLTE)--><!--begin::OverlayScrollbars Configure-->
    <script>
        const SELECTOR_SIDEBAR_WRAPPER = ".sidebar-wrapper";
        const Default = {
            scrollbarTheme: "os-theme-light",
            scrollbarAutoHide: "leave",
            scrollbarClickScroll: true,
        };
        document.addEventListener("DOMContentLoaded", function() {
            const sidebarWrapper = document.querySelector(SELECTOR_SIDEBAR_WRAPPER);
            if (
                sidebarWrapper &&
                typeof OverlayScrollbarsGlobal?.OverlayScrollbars !== "undefined"
            ) {
                OverlayScrollbarsGlobal.OverlayScrollbars(sidebarWrapper, {
                    scrollbars: {
                        theme: Default.scrollbarTheme,
                        autoHide: Default.scrollbarAutoHide,
                        clickScroll: Default.scrollbarClickScroll,
                    },
                });
            }
        });
    </script> <!--end::OverlayScrollbars Configure--> <!-- OPTIONAL SCRIPTS --> <!-- sortablejs -->
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js" integrity="sha256-ipiJrswvAR4VAx/th+6zWsdeYmVae0iJuiR+6OqHJHQ=" crossorigin="anonymous"></script> <!-- sortablejs -->
    <script>
        const connectedSortables =
            document.querySelectorAll(".connectedSortable");
        connectedSortables.forEach((connectedSortable) => {
            let sortable = new Sortable(connectedSortable, {
                group: "shared",
                handle: ".card-header",
            });
        });

        const cardHeaders = document.querySelectorAll(
            ".connectedSortable .card-header",
        );
        cardHeaders.forEach((cardHeader) => {
            cardHeader.style.cursor = "move";
        });
    </script> <!-- apexcharts -->
    <script src="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.min.js" integrity="sha256-+vh8GkaU7C9/wbSLIcwq82tQ2wTf44aOHA8HlBMwRI8=" crossorigin="anonymous"></script> <!-- ChartJS -->
    <script>
        // NOTICE!! DO NOT USE ANY OF THIS JAVASCRIPT
        // IT'S ALL JUST JUNK FOR DEMO
        // ++++++++++++++++++++++++++++++++++++++++++

        const sales_chart_options = {
            series: [{
                    name: "Digital Goods",
                    data: [28, 48, 40, 19, 86, 27, 90],
                },
                {
                    name: "Electronics",
                    data: [65, 59, 80, 81, 56, 55, 40],
                },
            ],
            chart: {
                height: 300,
                type: "area",
                toolbar: {
                    show: false,
                },
            },
            legend: {
                show: false,
            },
            colors: ["#0d6efd", "#20c997"],
            dataLabels: {
                enabled: false,
            },
            stroke: {
                curve: "smooth",
            },
            xaxis: {
                type: "datetime",
                categories: [
                    "2023-01-01",
                    "2023-02-01",
                    "2023-03-01",
                    "2023-04-01",
                    "2023-05-01",
                    "2023-06-01",
                    "2023-07-01",
                ],
            },
            tooltip: {
                x: {
                    format: "MMMM yyyy",
                },
            },
        };

        const sales_chart = new ApexCharts(
            document.querySelector("#revenue-chart"),
            sales_chart_options,
        );
        sales_chart.render();
    </script> <!-- jsvectormap -->

    
     <script src="https://cdn.jsdelivr.net/npm/jsvectormap@1.5.3/dist/js/jsvectormap.min.js" integrity="sha256-/t1nN2956BT869E6H4V1dnt0X5pAQHPytli+1nTZm2Y=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/jsvectormap@1.5.3/dist/maps/world.js" integrity="sha256-XPpPaZlU8S/HWf7FZLAncLg2SAkP8ScUTII89x9D3lY=" crossorigin="anonymous"></script> <!-- jsvectormap -->
  
   <script>
        const visitorsData = {
            US: 398, // USA
            SA: 400, // Saudi Arabia
            CA: 1000, // Canada
            DE: 500, // Germany
            FR: 760, // France
            CN: 300, // China
            AU: 700, // Australia
            BR: 600, // Brazil
            IN: 800, // India
            GB: 320, // Great Britain
            RU: 3000, // Russia
        };

        // World map by jsVectorMap
        const map = new jsVectorMap({
            selector: "#world-map",
            map: "world",
        });

        // Sparkline charts
        const option_sparkline1 = {
            series: [{
                data: [1000, 1200, 920, 927, 931, 1027, 819, 930, 1021],
            }, ],
            chart: {
                type: "area",
                height: 50,
                sparkline: {
                    enabled: true,
                },
            },
            stroke: {
                curve: "straight",
            },
            fill: {
                opacity: 0.3,
            },
            yaxis: {
                min: 0,
            },
            colors: ["#DCE6EC"],
        };

        const sparkline1 = new ApexCharts(
            document.querySelector("#sparkline-1"),
            option_sparkline1,
        );
        sparkline1.render();

        const option_sparkline2 = {
            series: [{
                data: [515, 519, 520, 522, 652, 810, 370, 627, 319, 630, 921],
            }, ],
            chart: {
                type: "area",
                height: 50,
                sparkline: {
                    enabled: true,
                },
            },
            stroke: {
                curve: "straight",
            },
            fill: {
                opacity: 0.3,
            },
            yaxis: {
                min: 0,
            },
            colors: ["#DCE6EC"],
        };

        const sparkline2 = new ApexCharts(
            document.querySelector("#sparkline-2"),
            option_sparkline2,
        );
        sparkline2.render();

        const option_sparkline3 = {
            series: [{
                data: [15, 19, 20, 22, 33, 27, 31, 27, 19, 30, 21],
            }, ],
            chart: {
                type: "area",
                height: 50,
                sparkline: {
                    enabled: true,
                },
            },
            stroke: {
                curve: "straight",
            },
            fill: {
                opacity: 0.3,
            },
            yaxis: {
                min: 0,
            },
            colors: ["#DCE6EC"],
        };

        const sparkline3 = new ApexCharts(
            document.querySelector("#sparkline-3"),
            option_sparkline3,
        );
        sparkline3.render();
    </script> <!--end::Script-->

 <!--download script of izitost -->
 <?php $arra = array(); if (isset($validation)): ?>
    <?php foreach ($validation->getErrors() as $key => $error): ?>
        <?php $arra[$key] = $error; ?>
    <?php endforeach; ?>
    <script>
        iziToast.error({
            message: '<?= implode("<br>", array_map('esc', $arra)) ?>',
            position: 'topRight',
            timeout: 5000 // Optional: Adjust the timeout as needed
        });
    </script>
<?php endif; ?>

<?php 
$arra = array(); 
$validation = session()->getFlashdata("validation");

if ($validation && is_object($validation)) {
    $errors = $validation->getErrors();
    if (is_array($errors)) {
        foreach ($errors as $key => $error) {
            $arra[$key] = $error;
        }
    }
}
?>
<?php if (!empty($arra)): ?>
    <script>
        iziToast.error({
            message: '<?= implode("<br>", array_map('esc', $arra)) ?>',
            position: 'topRight',
            timeout: 2000 
        });
    </script>
<?php endif; ?>




        <?php if (session()->getFlashdata('error')): ?>
            <script>
            iziToast.error({
                message: '<?= esc(session()->getFlashdata('error')) ?>',
                position: 'topRight'
            });
            </script>
        <?php endif; ?>
    
        <?php if (session()->getFlashdata('success')): ?>
            <script>
            iziToast.success({
                message: '<?= esc(session()->getFlashdata('success')) ?>',
                position: 'topRight'
            });
            </script>
        <?php endif; ?>
<script>
  $( function() {
    $( ".cutomedate" ).datepicker();
  } );

$(document).ready(function() {
    $('.select2grouptype').select2({
        'multiple':true,
        'placeholder':"Select Fees Types Multiple"
    });
});

</script>

</body><!--end::Body-->

</html>  
