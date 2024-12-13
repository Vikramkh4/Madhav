<?php

use Dompdf\Dompdf;
use Dompdf\Options;
use App\Models\UserModel;

use App\Models\Invoice_Model;
use App\Models\StudentModel;
use App\Models\DegreeModel;
use App\Models\FeesGroupModle;
use App\Models\FeetypeModel;
// 1 get_detail of app
// 2 get User Permissions list;




use CodeIgniter\Commands\Utilities\Publish;

function getAppDetails($rows ,$filds){
 $model = db_connect();
    if($filds === null){
        return "null";
    }
  $row = $model->table('setting')->where("id",$rows)->get()->getResult("array");
  if($row ===null){ 
      return "null";
  }else
  {
    return $row[0][$filds];
  }
 }
function getAppDetailsArray($rows){
 $model = db_connect();
 
  $row = $model->table('setting')->where("id",$rows)->get()->getResult("array");
  if($row ===null){ 
      return "null";
  }else
  {
    return $row[0];
  }
 }

//give  normal password 
function get_Permission($email , $password){
    $db = db_connect();
    
   if($email && $password == null){
      return throw new Exception("User Permission not found Wrong email and Password");
   }
   // fetching user info 
   $row = $db->table("user")->where("email",$email)->get()->getResultArray();
   // if password match 
   if($row && password_verify($password ,$row[0]['password'])){
     
   $user_persmisson =  $db->table("user_permission")->where("user",$row[0]['id'])->get()->getResult("array");
   return $user_persmisson[0];
   }

}

function setUserPersmissions($role,$user_id){
   $db  = db_connect();
   $data = [
    "user"=>$user_id,
    "user_group"=>$role,
   ];

   if($db->table("user_permission")->insert($data)){
     return true;
   }
   return false;
  }


  function getPermissionByUserId($user_id ,$give_id = null){
    $db  = db_connect();
    if($user_id === null){
     return "";
    }
   $row  = $db->table("user_permission")->where("user",$user_id)->get()->getResultArray();
   if($give_id == 'id' && !empty($give_id) && $row !== null){
       $user_permission_id = (int) $row[0]['user_group'];
       return $user_permission_id;
   }

   if($row !== null){
       $user_permission_id = (int) $row[0]['user_group'];

       if($user_permission_id === ACCOUNTANT_USER){
         return "accoun";
       }else if($user_permission_id === SUPPER_USER){
        return "admin";
       }else{
           return "stud";  
       }
   } 
   return "";
  }


 function updateUserPermission($updated_role,$user_id){
   if($updated_role && $user_id !== null){
    $db  = db_connect();
    $data = [
      "user_group" => $updated_role
    ];

    if($db->table("user_permission")->where("user" , $user_id)->update($data)){
     return true;   
    }
   }
   return false;
 } 
 
//   function getFeesGroup($type = "string" ,$value){
//     $db  = db_connect();
  
//         if ($value !== null) {
//             $newarra = array();
//             $arr = explode(",", $value);  
            
//             foreach ($arr as $id) {
//                 $type = $this->filetype->find(trim($id)); 
//                 if ($type) {
//                     $newarra[] = $type['fees_name'];
//                 } else {
//                     $newarra[] = "";
//                 }
//             }
            
//             $row['fees_group'] = implode(" ," ,$newarra);  
//         } else {
//             $row['fees_group'] = [];  
//         }

   
//  }

// file upload

function uploadFile($file, $uploadPath, $oldFilePath = null, $allowedTypes = ['image/jpeg', 'image/jpg', 'image/png', 'application/pdf'], $maxSize = 1024)
{
    $result = [
        'status' => false,
        'fileName' => '',
        'error' => ''
    ];

    if ($file && $file->isValid() && !$file->hasMoved() && $file->getSize() > 0) {
        $newName = $file->getRandomName();
        $fileType = $file->getMimeType();

        // Check file type
        if (!in_array($fileType, $allowedTypes)) {
            $result['error'] = 'File type not allowed';
            return $result;
        }

        // Check file size
        if ($file->getSize() > $maxSize * 1024) {
            $result['error'] = 'File size exceeds the maximum limit';
            return $result;
        }

        // Ensure upload directory exists
        if (!is_dir($uploadPath)) {
            if (!mkdir($uploadPath, 0755, true)) {
                $result['error'] = 'Failed to create upload directory: ' . error_get_last()['message'];
                return $result;
            }
        }

        try {
            // Move the file to the specified directory
            $file->move($uploadPath, $newName);
            $result['status'] = true;
            $result['fileName'] = $newName;
        } catch (\Exception $e) {
            $result['error'] = 'Error moving file: ' . $e->getMessage();
        }
    } else {
        $result['fileName'] = $oldFilePath;
        if ($oldFilePath) {
            $result['status'] = true;
        } else {
            $result['error'] = $file ? $file->getErrorString() : 'No file uploaded';
        }
    }

    return $result;
}



 function getDataByTable($table = null){
  $db  = db_connect();
    if($table != null)    
     {  
         $builder = $db->table($table);
         $data  =     $builder->get()->getResultArray();
          return $data[0];
     }
}

function getCollegeId($classname = null) {
    // Configuration
    $prefix = 'M';
    
    if ($classname === null) {
        return false; // If no class name is provided, return false
    }
    
    $db = db_connect();
    $db->transStart(); // Start a transaction
    
    try {
        // Lock the table to prevent race conditions
        $db->query('LOCK TABLES students WRITE');
        
        // Retrieve the last inserted college ID from the database
        $builder = $db->table('students');
        $lastInserted = $builder->orderBy('id', 'desc')->limit(1)->get()->getRowArray();
        
        $lastThreeDigits = 1; // Default to 1 if no previous college ID exists
        if ($lastInserted) {
            $college_id = $lastInserted['collage_id'];
            $lastThreeDigits = intval(substr($college_id, -3)) + 1200; // Increment the last three digits
        }
        
        // Construct the new college ID with the class name, current year, and incremented last three digits
        $newCollegeId = $prefix . $classname . date('Y') . str_pad($lastThreeDigits, 3, '0', STR_PAD_LEFT);
        
        // Unlock the table
        $db->query('UNLOCK TABLES');
        
        $db->transComplete(); // Complete the transaction
        
        if ($db->transStatus() === false) {
            // Transaction failed, handle the error
            throw new Exception('Transaction failed');
        }
        
        return $newCollegeId;
    } catch (Exception $e) {
        // Rollback the transaction in case of error
        $db->transRollback();
        // Unlock the table
        $db->query('UNLOCK TABLES');
        // Log the error message
        log_message('error', $e->getMessage());
        return false;
    }
}






function generate_pdf($html, $filename = '', $stream = true, $paper = 'A4', $orientation = 'portrait') {
    
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isRemoteEnabled', true);
        $dompdf = new Dompdf($options);

        $dompdf->loadHtml($html);

        $dompdf->setPaper($paper, $orientation);

        $dompdf->render();

        if ($stream) {
           header("Content-Type: application/pdf");
            $dompdf->stream($filename, ['Attachment' => 0]);
        } else {
            header("Content-Type: application/pdf");
            return $dompdf->output();
        }
    }

  function format_number($number) {
        return number_format($number, 2);
 }






function get_totalAmount($id = null)
{
    if ($id != null && !empty($id)) {
        $FeesGroupModel = new FeesGroupModle();
        $filetypeModel = new FeetypeModel();

        try {
            $fees_group = $FeesGroupModel->where("class", $id)->findAll();
            if (empty($fees_group)) {
                throw new \Exception('Fees group not found.');
            }
            $feeslist = $fees_group[0]['fees_group'];
            $newarra = explode(",", $feeslist);
            $array = [];
            foreach ($newarra as $fee_id) {
                $type = $filetypeModel->find($fee_id);
                if ($type) {
                    $array[] = $type;
                }
            }

            $data['class'] = $fees_group;
            $data['row'] = $array;

            $total = 0;
            foreach ($array as $row) {
                $total += (float) $row['fees'];
            }
            return $total; // return the total amount instead of echoing it
        } catch (\Exception $e) {
            return false;
        }
    }
    return false; // return false if $id is null or empty
}





?>