<!DOCTYPE html>
<html lang="en"> <!--begin::Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title><?=getAppDetails(1 ,"name")?> | <?=$page_title?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="title" content="Madhav Collage | Dashboard">
    <meta name="author" content="swifnix ">
<!--1 -->    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css" integrity="sha256-tXJfXfp6Ewt1ilPzLDtQnJV4hclT9XuaZUKyUvmyr+Q=" crossorigin="anonymous"><!--end::Fonts--><!--begin::Third Party Plugin(OverlayScrollbars)-->
 <!--1 -->    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.3.0/styles/overlayscrollbars.min.css" integrity="sha256-dSokZseQNT08wYEWiz5iLI8QPlKxG+TswNRD8k35cpg=" crossorigin="anonymous"><!--end::Third Party Plugin(OverlayScrollbars)--><!--begin::Third Party Plugin(Bootstrap Icons)-->
  <!--1 -->   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.min.css" integrity="sha256-Qsx5lrStHZyR9REqhUF8iQt73X06c8LGIUPzpOhwRrI=" crossorigin="anonymous"><!--end::Third Party Plugin(Bootstrap Icons)--><!--begin::Required Plugin(AdminLTE)-->
   <!--1 -->   <link rel="stylesheet" href="<?=base_url('assests/')?>dist/css/adminlte.css"><!--end::Required Plugin(AdminLTE)--><!-- apexcharts -->
   <!--1 -->   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.css" integrity="sha256-4MX+61mt9NVvvuPjUWdUdyfZfxSB1/Rf9WtqRHgG5S0=" crossorigin="anonymous"><!-- jsvectormap -->
   <!--1 -->    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/jsvectormap@1.5.3/dist/css/jsvectormap.min.css" integrity="sha256-+uGLJmmTKOqBr+2E6KDYs/NRsHxSkONXFHUL0fy2O/4=" crossorigin="anonymous">
    <!--1 -->    <link  href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
   <!--1 -->     <link rel="icon" href="<?=base_url(getAppDetails(1,"logo"))?>" type="image/gif" sizes="16x16">
    <!--1 -->   <link rel="stylesheet" href="<?=base_url('assests/')?>custome/custome.css">
  <!--1 -->    <link rel="stylesheet" href="<?=base_url('assests/select2')?>/dist/css/select2.min.css">
  <!--1 -->    <link rel="stylesheet" href="<?=base_url('assests/datepicker/jquery-ui.css')?>">
  <!--1 -->    <script src="<?=base_url("assests/iziToas/dist/js/iziToast.min.js")?>"> </script>
 
   
    <!-- css of iziToast -->
    <!--1 -->  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" />
     <!--1 -->  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.1.0/css/buttons.dataTables.min.css" />
     <!--D m -->  <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
  <!--D -->   <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>

    <!-- Buttons extension CSS -->
    <!--<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css"/>-->

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <!-- DataTables JS -->

    <!-- Buttons extension JS -->
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.flash.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
 <!--end-->

    

    
    
    
    
   <link rel="stylesheet" href="<?=base_url("assests/iziToas/dist/css/iziToast.min.css")?>">
   <style>
           .form-control {
            padding: 0.25rem 0.5rem;
            font-size: 0.875rem;
            border-radius: 0.25rem;
        }
        .form-label {
            font-size: 0.875rem;
            margin-bottom: 0.25rem;
        }
   </style>
</head> <!--end::Head--> <!--begin::Body-->

<body class="layout-fixed sidebar-expand-lg bg-body-tertiary"> <!--begin::App Wrapper-->
    <div class="app-wrapper"> <!--begin::Header-->
        <nav class="app-header navbar navbar-expand bg-body"> <!--begin::Container-->
            <div class="container-fluid"> <!--begin::Start Navbar Links-->
                <ul class="navbar-nav">
                    <li class="nav-item"> <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button"> <i class="bi bi-list"></i> </a> </li>
                    <!--<li class="nav-item d-none d-md-block"> <a href="#" class="nav-link">Home</a> </li>-->
                    <!--<li class="nav-item d-none d-md-block"> <a href="#" class="nav-link">Contact</a> </li>-->
                </ul> <!--end::Start Navbar Links--> <!--begin::End Navbar Links-->
                <ul class="navbar-nav ms-auto"> <!--begin::Navbar Search-->
                    <!--<li class="nav-item"> <a class="nav-link" data-widget="navbar-search" href="#" role="button"> <i class="bi bi-search"></i> </a> </li> <!--end::Navbar Search--> <!--begin::Messages Dropdown Menu-->
                    <!-- <li class="nav-item dropdown"> <a class="nav-link" data-bs-toggle="dropdown" href="#"> <i class="bi bi-chat-text"></i> <span class="navbar-badge badge text-bg-danger">3</span> </a>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end"> <a href="#" class="dropdown-item"> 
                                <div class="d-flex">
                                    <div class="flex-shrink-0"> <img src="<?=base_url('assests/')?>dist/assets/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 rounded-circle me-3"> </div>
                                    <div class="flex-grow-1">
                                        <h3 class="dropdown-item-title">
                                            Brad Diesel
                                            <span class="float-end fs-7 text-danger"><i class="bi bi-star-fill"></i></span>
                                        </h3>
                                        <p class="fs-7">Call me whenever you can...</p>
                                        <p class="fs-7 text-secondary"> <i class="bi bi-clock-fill me-1"></i> 4 Hours Ago
                                        </p>
                                    </div>
                                </div> 
                            </a>
                            <div class="dropdown-divider"></div> <a href="#" class="dropdown-item"> 
                                <div class="d-flex">
                                    <div class="flex-shrink-0"> <img src="<?=base_url('assests/')?>dist/assets/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 rounded-circle me-3"> </div>
                                    <div class="flex-grow-1">
                                        <h3 class="dropdown-item-title">
                                            John Pierce
                                            <span class="float-end fs-7 text-secondary"> <i class="bi bi-star-fill"></i> </span>
                                        </h3>
                                        <p class="fs-7">I got your message bro</p>
                                        <p class="fs-7 text-secondary"> <i class="bi bi-clock-fill me-1"></i> 4 Hours Ago
                                        </p>
                                    </div>
                                </div> 
                            </a>
                            <div class="dropdown-divider"></div> <a href="#" class="dropdown-item"> 
                                <div class="d-flex">
                                    <div class="flex-shrink-0"> <img src="<?=base_url('assests/')?>dist/assets/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 rounded-circle me-3"> </div>
                                    <div class="flex-grow-1">
                                        <h3 class="dropdown-item-title">
                                            Nora Silvester
                                            <span class="float-end fs-7 text-warning"> <i class="bi bi-star-fill"></i> </span>
                                        </h3>
                                        <p class="fs-7">The subject goes here</p>
                                        <p class="fs-7 text-secondary"> <i class="bi bi-clock-fill me-1"></i> 4 Hours Ago
                                        </p>
                                    </div>
                                </div> 
                            </a>
                            <div class="dropdown-divider"></div> <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
                        </div> 
                    </li>  -->
                    <!-- <li class="nav-item dropdown"> <a class="nav-link" data-bs-toggle="dropdown" href="#"> <i class="bi bi-bell-fill"></i> <span class="navbar-badge badge text-bg-warning">15</span> </a>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end"> <span class="dropdown-item dropdown-header">15 Notifications</span>
                            <div class="dropdown-divider"></div> <a href="#" class="dropdown-item"> <i class="bi bi-envelope me-2"></i> 4 new messages
                                <span class="float-end text-secondary fs-7">3 mins</span> </a>
                            <div class="dropdown-divider"></div> <a href="#" class="dropdown-item"> <i class="bi bi-people-fill me-2"></i> 8 friend requests
                                <span class="float-end text-secondary fs-7">12 hours</span> </a>
                            <div class="dropdown-divider"></div> <a href="#" class="dropdown-item"> <i class="bi bi-file-earmark-fill me-2"></i> 3 new reports
                                <span class="float-end text-secondary fs-7">2 days</span> </a>
                            <div class="dropdown-divider"></div> <a href="#" class="dropdown-item dropdown-footer">
                                See All Notifications
                            </a>
                        </div>
                    </li>  -->
                    <li class="nav-item"> <a class="nav-link" href="#" data-lte-toggle="fullscreen"> <i data-lte-icon="maximize" class="bi bi-arrows-fullscreen"></i> <i data-lte-icon="minimize" class="bi bi-fullscreen-exit" style="display: none;"></i> </a> </li> <!--end::Fullscreen Toggle--> <!--begin::User Menu Dropdown-->
                    <li class="nav-item dropdown user-menu"> <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"> <img src="<?=base_url(getAppDetails(1,"logo"))?>" class="user-image rounded-circle shadow" alt="User Image"> <span class="d-none d-md-inline"><?=session()->get('name')?></span> </a>
                        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end"> <!--begin::User Image-->
                            <li class="user-header text-bg-primary"> <img src="<?=base_url(getAppDetails(1,"logo"))?>" class="rounded-circle shadow" alt="User Image">
                                <p>
                               <?= getAppDetails(1,"name")?>
                                </p>
                            </li> <!--end::User Image--> <!--begin::Menu Body-->
                            <!-- <li class="user-body"> 
                                <div class="row">
                                    <div class="col-4 text-center"> <a href="#">Followers</a> </div>
                                    <div class="col-4 text-center"> <a href="#">Sales</a> </div>
                                    <div class="col-4 text-center"> <a href="#">Friends</a> </div>
                                </div> 
                            </li>  -->
                            <li class="user-footer"> <a href="#" class="btn btn-default btn-flat">Profile</a> <a href="<?=site_url('logout')?>" class="btn btn-default btn-flat float-end">Sign out</a> </li> <!--end::Menu Footer-->
                        </ul>
                    </li> <!--end::User Menu Dropdown-->
                </ul> <!--end::End Navbar Links-->
            </div> <!--end::Container-->
        </nav> <!--end::Header--> <!--begin::Sidebar-->
        <aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark"> <!--begin::Sidebar Brand-->
            <div class="sidebar-brand"> <!--begin::Brand Link--> <a href="<?=ADMIN?>" class="brand-link"> <!--begin::Brand Image--> <img src="<?=base_url(getAppDetails(1,"logo"))?>" alt="<?=getAppDetails(1,'name')?>" class="brand-image opacity-75 shadow"> <!--end::Brand Image--> <!--begin::Brand Text--> <span class="brand-text fw-light"><?=getAppDetails(1,"name")?></span> <!--end::Brand Text--> </a> <!--end::Brand Link--> </div> <!--end::Sidebar Brand--> <!--begin::Sidebar Wrapper-->
            <div class="sidebar-wrapper">
                <nav class="mt-2"> <!--begin::Sidebar Menu-->
                    <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">

                        <li class="nav-item menu-open"> <a href="<?=base_url(session()->get("role"))?>" class="nav-link active"> <i class="nav-icon bi bi-speedometer"></i>
                             <p>Dashboard</p>
                            </a>
                        </li>
                       <li class="nav-item"> <a href="#" class="nav-link"> <i class="nav-icon bi bi-file-earmark-person-fill"></i>
                                <p>
                                  Students
                                    <i class="nav-arrow bi bi-chevron-right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item"> <a href="<?=base_url(ADMIN."/student")?>" class="nav-link"> <i class="nav-icon bi bi-circle"></i>
                                        <p>Add Student</p>
                                    </a> </li>
                                <li class="nav-item"> <a href="<?=base_url(ADMIN."/studenttable")?>" class="nav-link"> <i class="nav-icon bi bi-circle"></i>
                                        <p>Student Lists</p>
                                    </a> </li>
                            
                            </ul>
                        </li>


                        <li class="nav-item"> <a href="#" class="nav-link"> <i class="nav-icon bi bi-person-circle"></i>
                                <p>
                                   Users 
                                    <i class="nav-arrow bi bi-chevron-right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item"> <a href="<?=base_url(ADMIN."/users")?>" class="nav-link"> <i class="nav-icon bi bi-circle"></i>
                                        <p>Add User</p>
                                    </a> </li>
                                <li class="nav-item"> <a href="<?=base_url(ADMIN."/user_table")?>" class="nav-link"> <i class="nav-icon bi bi-circle"></i>
                                        <p>User Lists</p>
                                    </a> </li>
                            
                            </ul>
                        </li>
                       
                 
                        <li class="nav-item"> <a href="#" class="nav-link"> <i class="nav-icon bi bi-bell-fill"></i>
                                <p>
                                 Notices
                                    <i class="nav-arrow bi bi-chevron-right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item"> <a href="<?=base_url(ADMIN."/notice_table")?>" class="nav-link"> <i class="nav-icon bi bi-circle"></i>
                                        <p>Notice</p>
                                    </a> </li>
                               
                            
                            </ul>
                        </li>
                     
                        <li class="nav-item"> <a href="#" class="nav-link"> <i class="nav-icon bi bi-pen-fill"></i>
                                <p>
                                 Complains
                                    <i class="nav-arrow bi bi-chevron-right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item"> <a href="<?=base_url(ADMIN."/add_complain")?>" class="nav-link"> <i class="nav-icon bi bi-circle"></i>
                                        <p>Add  Category</p>
                                    </a> </li>
                                <li class="nav-item"> <a href="<?=base_url(ADMIN."/complaincategory_table")?>" class="nav-link"> <i class="nav-icon bi bi-circle"></i>
                                        <p>Category List</p>
                                    </a> </li>
                                    
                                 <li class="nav-item"> <a href="<?=base_url(ADMIN."/complain_table")?>" class="nav-link"> <i class="nav-icon bi bi-circle"></i>
                                        <p>Complains</p>
                                    </a> </li>    
                            
                            </ul>
                        </li>
                        <!-- invoice dashboard-->
                        <li class="nav-item"> <a href="#" class="nav-link"> <i class="nav-icon bi bi-cash"></i>
                                <p>
                                  Fees Management
                                    <i class="nav-arrow bi bi-chevron-right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                
                                <li class="nav-item"> <a href="<?=base_url(ADMIN."/Feetype")?>" class="nav-link"> <i class="nav-icon bi bi-circle"></i>
                                        <p>Add Fee</p>
                                  </a>
                               </li>
                                <li class="nav-item"> <a href="<?=base_url(ADMIN."/feetype_table")?>" class="nav-link"> <i class="nav-icon bi bi-circle"></i>
                                        <p>Fee Lists</p>
                                    </a> </li>
                                    <li class="nav-item"> <a href="<?=base_url(ADMIN."/feesgroup")?>" class="nav-link"> <i class="nav-icon bi bi-circle"></i>
                                        <p>Add Fees Group</p>
                                    </a> </li>
                                <li class="nav-item"> <a href="<?=base_url(ADMIN."/feesgroup_table")?>" class="nav-link"> <i class="nav-icon bi bi-circle"></i>
                                        <p>Fees Group Lists</p>
                                    </a> </li>
                                
                                <li class="nav-item"> <a href="<?=base_url(ADMIN."/invoice")?>" class="nav-link"> <i class="nav-icon bi bi-circle"></i>
                                        <p>Fees List</p>
                                    </a>
                                </li>
                             
                            
                            </ul>
                        </li>
                        <li class="nav-item"> <a href="#" class="nav-link"> <i class="nav-icon bi bi-image-fill"></i>
                                <p>
                                Banners
                                <i class="nav-arrow bi bi-chevron-right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item"> <a href="<?=base_url(ADMIN."/banner")?>" class="nav-link"> <i class="nav-icon bi bi-circle"></i>
                                        <p>App Banner</p>
                                    </a> </li>
                             
                            
                            </ul>
                        </li>
                        
                        
                        
                        
             
                        <!--Report -->
                     <li class="nav-item"> <a href="#" class="nav-link"> <i class="nav-icon bi bi-r-circle-fill"></i>
                                <p>
                             Reports
                                <i class="nav-arrow bi bi-chevron-right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item"> <a href="<?=base_url(ADMIN."/report")?>" class="nav-link"> <i class="nav-icon bi bi-envelope"></i>
                                        <p>Student Report</p>
                                  </a> </li>
                             
                            
                            </ul>
                        </li>
                        
                       <li class="nav-item"> <a href="#" class="nav-link"> <i class="nav-icon bi bi-c-circle-fill"></i>
                                <p>
                                   Class 
                                    <i class="nav-arrow bi bi-chevron-right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item"> <a href="<?=base_url(ADMIN.'degree')?>" class="nav-link"> <i class="nav-icon bi bi-circle"></i>
                                        <p>Add Class</p>
                                    </a> </li>
                                <li class="nav-item"> <a href="<?=base_url(ADMIN."/degree_table")?>" class="nav-link"> <i class="nav-icon bi bi-circle"></i>
                                        <p>Class Lists</p>
                                    </a> </li>
                            
                            </ul>
                        </li>
                        <!--<li class="nav-item"> <a href="#" class="nav-link"> <i class="nav-icon bi bi-person-circle"></i>-->
                        <!--        <p>-->
                        <!--           Fees Type -->
                        <!--            <i class="nav-arrow bi bi-chevron-right"></i>-->
                        <!--        </p>-->
                        <!--    </a>-->
                        <!--    <ul class="nav nav-treeview">-->
                        <!--        <li class="nav-item"> <a href="<?=base_url(ADMIN."/Feetype")?>" class="nav-link"> <i class="nav-icon bi bi-circle"></i>-->
                        <!--                <p>Add Fees</p>-->
                        <!--            </a> </li>-->
                        <!--        <li class="nav-item"> <a href="<?=base_url(ADMIN."/feetype_table")?>" class="nav-link"> <i class="nav-icon bi bi-circle"></i>-->
                        <!--                <p>Fees Lists</p>-->
                        <!--            </a> </li>-->
                            
                        <!--    </ul>-->
                        <!--</li>-->
                        
                        <!--<li class="nav-item"> <a href="#" class="nav-link"> <i class="nav-icon bi bi-person-circle"></i>-->
                        <!--        <p>-->
                        <!--           Fees Group -->
                        <!--            <i class="nav-arrow bi bi-chevron-right"></i>-->
                        <!--        </p>-->
                        <!--    </a>-->
                        <!--    <ul class="nav nav-treeview">-->
                            
                            
                        <!--    </ul>-->
                        <!--</li>-->
                        <li class="nav-item"> <a href="#" class="nav-link"> <i class="nav-icon bi bi-calendar"></i>
                                <p>
                                   Sessions
                                    <i class="nav-arrow bi bi-chevron-right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item"> <a href="<?=base_url(ADMIN."/session")?>" class="nav-link"> <i class="nav-icon bi bi-circle"></i>
                                        <p>Add Sessions</p>
                                    </a> </li>
                                <li class="nav-item"> <a href="<?=base_url(ADMIN."/session_table")?>" class="nav-link"> <i class="nav-icon bi bi-circle"></i>
                                        <p>Sessions Lists</p>
                                    </a> </li>
                            
                            </ul>
                        </li>  
                        
                              <!--Email-->
                         <li class="nav-item"> <a href="#" class="nav-link"> <i class="nav-icon bi bi-gear"></i>
                                <p>
                             Setting
                                <i class="nav-arrow bi bi-chevron-right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item"> <a href="<?=base_url(ADMIN."/email")?>" class="nav-link"> <i class="nav-icon bi bi-envelope"></i>
                                        <p>Email</p>
                                  </a> </li>
                             
                            
                            </ul>
                        </li>  
                    </ul> <!--end::Sidebar Menu-->
                </nav>
            </div> <!--end::Sidebar Wrapper-->
        </aside> <!--end::Sidebar--> <!--begin::App Main-->

        <?= $this->renderSection('main') ?>


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
    <script src="<?=base_url('assests/')?>custome/custome.js" defer></script>
       <script src="<?=base_url("assests/datepicker/jquery-ui.js")?>" defer> </script>
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
   <script src="<?=base_url("assests/select2/dist/js/select2.min.js")?>"> </script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
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

$(document).ready(function() {
    $('.select2grouptype').select2({
        'multiple':true,
        'placeholder':"Select Fees Types Multiple"
    });
});

$(document).ready(function() {
    $('.select22').select2({
       'placeholder':"Select Class"
    });
});
$(document).ready(function() {
    $('.select12').select2({
       'placeholder':"Select Value"
    });
});


</script>
<script>
    
      $(document).ready(function() {
            $(".cutomedate").datepicker({
                changeMonth: true,
                changeYear: true,
                showButtonPanel: true,
                yearRange: "c-100:c",
                dateFormat: 'dd-mm-yy',
           
            })
        });
    
    
</script>
<script>
 

  $(document).ready(function() {
            $(".cutomedatesession").datepicker({
                changeMonth: false,
                changeYear: true,
                showButtonPanel: true,
                yearRange: "c-100:c",
                closeText: 'Select',
                currentText: 'This year',
                dateFormat: 'yy',
                onClose: function(dateText, inst) {
                    var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
                    $(this).val(year);
                },
                beforeShow: function(input, inst) {
                    if ((datestr = $(this).val()).length > 0) {
                        var year = datestr.substring(0, 4);
                        $(this).datepicker('option', 'defaultDate', new Date(year, 0, 1));
                        $(this).datepicker('setDate', new Date(year, 0, 1));
                    }
                }
            }).focus(function() {
                $(".ui-datepicker-calendar").hide();
                $("#ui-datepicker-div").position({
                    my: "center top",
                    at: "center bottom",
                    of: $(this)
                });
            });
        });
        
</script>

<script>

  $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });     
    
</script>
<script>
$(document).ready(function() {
    $('.alltable12').DataTable({
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'copy',
                exportOptions: {
                    columns: ':not(:last-child)' // Exclude the last column (Action column)
                }
            },
            {
                extend: 'excel',
                exportOptions: {
                    columns: ':not(:last-child)' // Exclude the last column (Action column)
                }
            },
            // Remove the PDF button
            'colvis'
        ],
        searching: true,
        lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
        pageLength: 10
    });
});

</script>  
</body><!--end::Body-->

</html>                                                                                                                                                                                                                                                                                                                                         