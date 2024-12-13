<?php

namespace App\Models;

use CodeIgniter\Model;

class PaymentModel extends Model
{
    protected $table = 'payment_detailes';
    protected $primaryKey = 'id';
    protected $allowedFields = ['student_id', 'total_amount','paid_amount','remaining_amount','transaction_id','pay_date' ,'message'];
   
    protected $useSoftDeletes = false; 
}
