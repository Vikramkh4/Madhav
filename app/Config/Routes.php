 <?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override(function(){
    //set here for 404 override;
});
$routes->setAutoRoute(false);


// app pages of students 

$routes->get('student/(:num)', 'student\AppStudent::update_studentview/$1');
$routes->post('student_update/(:num)', 'student\AppStudent::studentEdit/$1');



// login routes here ;

$routes->match(['GET', 'POST'], 'login', 'Auth::index', ['filter' => 'noauth']);
$routes->post('login_porcess', 'Auth::get_login', ['filter' => 'noauth']);
$routes->get('/logout', 'Auth::logout');


// admin main route 
$routes->group("admin",["filter" => "auth"] , function($routes){
    // dashboard url
    $routes->get('/', 'admin\Home::index',["filter" => "auth"]); 
    // User Controllers
    $routes->get( 'users', 'admin\User::index',["filter" => "auth"]);
    $routes->post( 'save_user', 'admin\User::save_user',["filter" => "auth"]);
    $routes->get( 'user_table', 'admin\User::User_table',["filter" => "auth"]);
    $routes->get( 'edit_user/(:num)', 'admin\User::edit_user/$1',["filter" => "auth"]);
    $routes->get( 'blockuser', 'admin\User::block_user',["filter" => "auth"]);
    $routes->post( 'edit_save/(:num)', 'admin\User::edit_save/$1',["filter" => "auth"]);
    // degree 
    $routes->get("degree",'admin\Degree::index',["filter" => "auth"]);
    $routes->get('degree_table', 'admin\Degree::degree_list', ['filter' => 'auth']);
    $routes->get('delete_degree/(:num)', 'admin\Degree::delete_degree/$1', ['filter' => 'auth']);
    $routes->get('update_degree/(:num)', 'admin\Degree::update_degree/$1', ['filter' => 'auth']);
    $routes->post("save_degree",'admin\Degree::saveing_degree',["filter" => "auth"]);
    $routes->post("updatesave/(:num)",'admin\Degree::update_save_degree/$1',["filter" => "auth"]);
    //fees types
    $routes->get("Feetype",'admin\Filename::index',["filter" => "auth"]);
    $routes->get("deletefees/(:num)",'admin\Filename::delete_feestype/$1',["filter" => "auth"]);
    $routes->get("update_fees/(:num)",'admin\Filename::update_page/$1',["filter" => "auth"]);
    $routes->post("update_savefees/(:num)",'admin\Filename::update_save_fun/$1',["filter" => "auth"]);
    $routes->post("save_feestype", 'admin\Filename::saving_filetype', ["filter" => "auth"]);
    $routes->get("feetype_table", 'admin\Filename::feestype_list', ["filter" => "auth"]);
    //fees group types
    $routes->get("feesgroup",'admin\FeesGroup::index',["filter" => "auth"]);
    $routes->get("deletefeesgroup/(:num)",'admin\FeesGroup::delete_feesgroup/$1',["filter" => "auth"]);
    $routes->get("update_feesgroup/(:num)",'admin\FeesGroup::update_feesgroupage/$1',["filter" => "auth"]);
    $routes->post("update_savefeesgroup/(:num)",'admin\FeesGroup::update_savegroup_fun/$1',["filter" => "auth"]);
    $routes->post("save_feesgroup", 'admin\FeesGroup::saving_feesgroup', ["filter" => "auth"]);
    $routes->get("feesgroup_table", 'admin\FeesGroup::feesgrouptype_list', ["filter" => "auth"]);
    //session  types
    $routes->get("session",'admin\Session::index',["filter" => "auth"]);
    $routes->get("deletesession/(:num)",'admin\Session::delete_session/$1',["filter" => "auth"]);
    $routes->get("update_page/(:num)",'admin\Session::update_session_page/$1',["filter" => "auth"]);
    $routes->post("update_savesession/(:num)",'admin\Session::update_savesession/$1',["filter" => "auth"]);
    $routes->post("save_session", 'admin\Session::saving_session', ["filter" => "auth"]);
    $routes->get("session_table", 'admin\Session::session_list', ["filter" => "auth"]);
    //Student
    $routes->get("student",'admin\Student::index',["filter" => "auth"]);
    $routes->post('save_student', 'admin\Student::save_student',["filter" => "auth"]);
    $routes->get("deletestudent/(:num)", 'admin\Student::delete_student/$1', ["filter" => "auth"]);
    $routes->get("update_student/(:num)",'admin\Student::update_studentview/$1',["filter" => "auth"]);
    $routes->get('studenttable', 'admin\Student::student_list', ["filter" => "auth"]);
    $routes->post("update_student/(:num)",'admin\Student::update_save_student/$1',["filter" => "auth"]);
    //$routes->post('studentlist', 'admin\Student::student_list_ajax', ["filter" => "auth"]);
    $routes->get('viewstudent/(:num)', 'admin\Student::viewstudnet/$1', ["filter" => "auth"]);
    //complaine category
    $routes->get("add_complain",'admin\ComplainCategory::index',["filter" => "auth"]);
    $routes->get("deletecomplain/(:num)",'admin\ComplainCategory::delete_complain/$1',["filter" => "auth"]);
    $routes->get("update_companin/(:num)",'admin\ComplainCategory::update_compain_page/$1',["filter" => "auth"]);
    $routes->post("update_savecomplain/(:num)",'admin\ComplainCategory::update_savecomplain/$1',["filter" => "auth"]);
    $routes->post("save_complain", 'admin\ComplainCategory::save_compalin', ["filter" => "auth"]);
    $routes->get("complaincategory_table", 'admin\ComplainCategory::complain_list', ["filter" => "auth"]);
   //notice
    $routes->group('', ['filter' => 'auth'], function($routes) {
    $routes->get('notice', 'admin\Notice::index');
    $routes->post('save_notice', 'admin\Notice::save_notice');
    $routes->get('notice_table', 'admin\Notice::notice_list');
    $routes->get('view_notice/(:num)', 'admin\Notice::view_notice/$1');
    $routes->get('edit_notice/(:num)', 'admin\Notice::edit_notice/$1');
    $routes->post('update_notice/(:num)', 'admin\Notice::update_notice/$1');
    $routes->get('delete_notice/(:num)', 'admin\Notice::delete_notice/$1');
});

    //complain
   $routes->get('complain', 'admin\Complain::index', ['filter' => 'auth']);
$routes->post('save_complain4', 'admin\Complain::save_complain', ['filter' => 'auth']);
$routes->get('complain_table', 'admin\Complain::complain_list', ['filter' => 'auth']);
$routes->get('edit_complain/(:num)', 'admin\Complain::edit_complain/$1', ['filter' => 'auth']);
$routes->post('update_complain/(:num)', 'admin\Complain::update_complain/$1', ['filter' => 'auth']);
$routes->get('view_complain/(:num)', 'admin\Complain::view_complain/$1', ['filter' => 'auth']);
$routes->post('delete_complain/(:num)', 'admin\Complain::delete_complain/$1', ['filter' => 'auth']);
$routes->post('save_solution/(:num)', 'admin\Complain::complain_sol/$1', ['filter' => 'auth']);



    //invoice 
    $routes->get('invoice', 'admin\Invoice::index', ['filter' => 'auth']);
    $routes->get('add_invoice', 'admin\Invoice::add_invoice', ['filter' => 'auth']);
    $routes->get('pay/(:num)', 'admin\Invoice::pay_view/$1', ['filter' => 'auth']);
    $routes->post('pay_proccess/(:num)', 'admin\Invoice::create_pay/$1', ['filter' => 'auth']);
    $routes->get("getamount","admin\Student::get_totalamount");



    
    $routes->post('save_invoice', 'admin\Invoice::save_invoice', ['filter' => 'auth']);
    
   
   //banner
    $routes->get('banner', 'admin\Banner::index', ['filter' => 'auth']);
    $routes->get('addbanner', 'admin\Banner::add_banner', ['filter' => 'auth']);
    $routes->get('edit_banner/(:num)', 'admin\Banner::edit_banner/$1', ['filter' => 'auth']);
    $routes->get('delete_banner/(:num)', 'admin\Banner::delete_banner/$1', ['filter' => 'auth']);
    $routes->post('save_banner', 'admin\Banner::save_banner', ['filter' => 'auth']);
    $routes->post('update_banner/(:num)', 'admin\Banner::update_banner/$1', ['filter' => 'auth']);
   
$routes->get('report', 'admin\Report::index', ['filter' => 'auth']);
$routes->get('get_report', 'admin\Report::get_reportFilter', ['filter' => 'auth']);


    //Email
    $routes->get('email', 'admin\EmailControllert::index', ['filter' => 'auth']);
    
    
});

//api
//banner 
$routes->get('api/v1/get_banner', 'Api::get_banner');
$routes->post('api/v1/save_banner', 'Api::save_banner');

//complaint
$routes->get('api/v1/getcomplaint', 'Api::get_Complaint');
$routes->get('api/v1/save_complaint', 'Api::save_Complaint');
$routes->post('api/v1/edit_complaint', 'Api::edit_Complaint');
$routes->get('api/v1/delete_complaint', 'Api::delete_Complaint');

//notice
$routes->get('api/v1/getnotice', 'Api::getNotice');
$routes->get('api/v1/delete_notice', 'Api::delete_notice');

$routes->post('api/v1/save_notice', 'Api::save_notice');
$routes->post('api/v1/update_notice', 'Api::update_notice');


// login

$routes->match(['GET', 'POST'],'api/v1/login', 'Api::get_login');
$routes->match(['GET', 'POST'],'api/v1/profile', 'Api::profile_view');


// forget_password 
$routes->post('api/v1/forget_password','Api::forget_password');
$routes->post('change/password','ForgetPassword::change_password');

$routes->get('reset/password','ForgetPassword::forget_password');

//endapi

// accountant main route 
$routes->group("accountant",["filter" => "auth"] , function($routes){
   $routes->get("/", "accountant\Home::index");
 
 //invoice
  $routes->get('invoice', 'accountant\Invoice::index', ['filter' => 'auth']);
    $routes->get('add_invoice', 'accountant\Invoice::add_invoice', ['filter' => 'auth']);
     $routes->post('save_invoice', 'accountant\Invoice::save_invoice', ['filter' => 'auth']);
  
  
   //notice
    $routes->get("notice3",'accountant\Notice::index',["filter" => "auth"]);
    $routes->post('save_notice3', 'accountant\Notice::save_notice',["filter" => "auth"]);
    $routes->get("notice_table3", 'accountant\Notice::notice_list', ["filter" => "auth"]);
    $routes->get('view_notice3/(:num)', 'accountant\Notice::view_notice/$1', ["filter" => "auth"]);
    $routes->get('edit_notice3/(:num)', 'accountant\Notice::edit_notice/$1', ["filter" => "auth"]);
    $routes->post('update_notice3/(:num)', 'accountant\Notice::update_notice/$1', ["filter" => "auth"]);
    $routes->get("delete_notice3/(:num)",'accountant\Notice::delete_notice/$1',["filter" => "auth"]); 
   
   //complain
    //  $routes->get('add_complain3', 'accountant\Complain::index', ['filter' => 'auth']);
    // $routes->post('save_complain3', 'accountant\Complain::save_complain', ['filter' => 'auth']);
    // $routes->get('complain_table3', 'accountant\Complain::complain_list', ['filter' => 'auth']);
    // $routes->get('edit_complain3/(:num)', 'accountant\Complain::edit_complain/$1', ['filter' => 'auth']);
    // $routes->post('update_complain3/(:num)', 'accountant\Complain::update_complain/$1', ['filter' => 'auth']);
    // $routes->get('view_complain3/(:num)', 'accountant\Complain::view_complain/$1', ['filter' => 'auth']);
    // $routes->post('delete_complain3/(:num)', 'accountant\Complain::delete_complain/$1', ['filter' => 'auth']);
    
     //complaine category
    $routes->get("add_complain",'accountant\ComplainCategory::index',["filter" => "auth"]);
    $routes->get("deletecomplain/(:num)",'accountant\ComplainCategory::delete_complain/$1',["filter" => "auth"]);
    $routes->get("update_companin/(:num)",'accountant\ComplainCategory::update_compain_page/$1',["filter" => "auth"]);
    $routes->post("update_savecomplain/(:num)",'accountant\ComplainCategory::update_savecomplain/$1',["filter" => "auth"]);
    $routes->post("save_complain", 'accountant\ComplainCategory::save_compalin', ["filter" => "auth"]);
    $routes->get("complaincategory_table", 'accountant\ComplainCategory::complain_list', ["filter" => "auth"]);
    
     //fees types
    $routes->get("Feetype",'accountant\Filename::index',["filter" => "auth"]);
    $routes->get("deletefees/(:num)",'accountant\Filename::delete_feestype/$1',["filter" => "auth"]);
    $routes->get("update_fees/(:num)",'accountant\Filename::update_page/$1',["filter" => "auth"]);
    $routes->post("update_savefees/(:num)",'accountant\Filename::update_save_fun/$1',["filter" => "auth"]);
    $routes->post("save_feestype", 'accountant\Filename::saving_filetype', ["filter" => "auth"]);
    $routes->get("feetype_table", 'accountant\Filename::feestype_list', ["filter" => "auth"]);
    
    
    //fees group types
    $routes->get("feesgroup",'accountant\FeesGroup::index',["filter" => "auth"]);
    $routes->get("deletefeesgroup/(:num)",'accountant\FeesGroup::delete_feesgroup/$1',["filter" => "auth"]);
    $routes->get("update_feesgroup/(:num)",'accountant\FeesGroup::update_feesgroupage/$1',["filter" => "auth"]);
    $routes->post("update_savefeesgroup/(:num)",'accountant\FeesGroup::update_savegroup_fun/$1',["filter" => "auth"]);
    $routes->post("save_feesgroup", 'accountant\FeesGroup::saving_feesgroup', ["filter" => "auth"]);
    $routes->get("feesgroup_table", 'accountant\FeesGroup::feesgrouptype_list', ["filter" => "auth"]);
    
    
    //Student
    $routes->get("student",'accountant\Student::index',["filter" => "auth"]);
    $routes->post('save_student', 'accountant\Student::save_student',["filter" => "auth"]);
    $routes->get("deletestudent/(:num)", 'accountant\Student::delete_student/$1', ["filter" => "auth"]);
    $routes->get("update_student/(:num)",'accountant\Student::update_studentview/$1',["filter" => "auth"]);
    $routes->get('studenttable', 'accountant\Student::student_list', ["filter" => "auth"]);
    $routes->post("update_student/(:num)",'accountant\Student::update_save_student/$1',["filter" => "auth"]);
    //$routes->post('studentlist', 'admin\Student::student_list_ajax', ["filter" => "auth"]);
    $routes->get('viewstudent/(:num)', 'accountant\Student::viewstudnet/$1', ["filter" => "auth"]);
   
   
    //session  types
    $routes->get("session",'accountant\Session::index',["filter" => "auth"]);
    $routes->get("deletesession/(:num)",'accountant\Session::delete_session/$1',["filter" => "auth"]);
    $routes->get("update_page/(:num)",'accountant\Session::update_session_page/$1',["filter" => "auth"]);
    $routes->post("update_savesession/(:num)",'accountant\Session::update_savesession/$1',["filter" => "auth"]);
    $routes->post("save_session", 'accountant\Session::saving_session', ["filter" => "auth"]);
    $routes->get("session_table", 'accountant\Session::session_list', ["filter" => "auth"]);
   
});
// student main route 
$routes->group("student",["filter" => "auth"] , function($routes){
     $routes->get("/", "student\Home::index");
     //Complain 
    $routes->get('complain1', 'student\Complain::index', ['filter' => 'auth']);
    $routes->post('save_complain1', 'student\Complain::save_complain', ['filter' => 'auth']);
    $routes->get('complain_table1', 'student\Complain::complain_list', ['filter' => 'auth']);
    $routes->get('edit_complain1/(:num)', 'student\Complain::edit_complain/$1', ['filter' => 'auth']);
    $routes->post('update_complain1/(:num)', 'student\Complain::update_complain/$1', ['filter' => 'auth']);
    $routes->get('view_complain1/(:num)', 'student\Complain::view_complain/$1', ['filter' => 'auth']);
    $routes->post('delete_complain1/(:num)', 'student\Complain::delete_complain/$1', ['filter' => 'auth']);
    
    //student

    
});

// teacher main route 
$routes->group("teacher",["filter" => "auth"] , function($routes){
    
    $routes->get("/", "teacher\Home::index");
    
});
   
$routes->get('student_pay/(:num)', 'student\Fees::student_pay12/$1');






