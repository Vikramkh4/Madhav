<?php 

namespace App\Models;

use CodeIgniter\Model;

class StudentModel extends Model
{
    protected $table = 'students';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'enrollment_no', //1 
        'name',          //2
        'father_name',   //3
        'mother_name',   // 4
        'dob',           // 5
        'mobile',        // 6
        'email',         // 7
        'abc_id',       // 8
        'category',   // 9
        'gender',    // 10
        'address',   // 11
        'session_year',   // 11
        'local_address', // 12
        'application_id',  // 13
        'college_recipt_no',  //14
        'class',             // 15
        'student_photo',             // 15
        'date_college_recipt', //16
        'whapsup_no',     //17
        'father_mobile_no', // 18
        'state',  //19
        'city', //20
        'anti_raging_no', //21
        'sign_of_student', //22
        'sign_of_teacher', //23
         'gap_repor'//26
         ,'non_criminal_report'//27
         ,'anti_raggin'//28
         ,'tripal_samgra_id'//29
         ,'adhar_card'//30
         ,'migration_certificate'//31
         ,'tc'//32
         ,'snanthak_result_allyear'//33
         ,'12th_result'//34
         ,'10th_result'//35
         ,'college_recipt'//36
         ,'online_admission_recipet'//37
         ,'allotment_letter'//38
         ,'religion'//39
         ,'collage_id'//40
         ,'branch'//41
         ,'student_id'//42
        ,'created_date', //24
        'updated_date', //25
        'paytype_status', //25
        'payment_breakups', //25
    
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_date' ;
    protected $updatedField  = 'updated_date';
}








?>