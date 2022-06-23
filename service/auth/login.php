<?php

header('Content-Type: application/json');   //ส่งข้อมูลไปเป็น JSON
require_once '../connect_db.php';

if($_SERVER['REQUEST_METHOD'] === "POST") {

  $stmt = $connection->prepare("SELECT * FROM users WHERE username = :username ");
  $stmt->execute(array(":username" => $_POST['username']));
  $row = $stmt->fetch(PDO::FETCH_OBJ);
  /**
   * FETCH_OBJ
   * $row->u_id
   * 
   * FETCH_ASSOC
   * $row['u_id']
   */
if ( !empty($row) && password_verify($_POST['password'], $row->password)) {
    
    $_SESSION['AD_ID'] = $row->u_id;
    $_SESSION['AD_FIRSTNAME'] = $row->firstname;
    $_SESSION['AD_LASTNAME'] = $row->lastname;
    $_SESSION['AD_USERNAME'] = $row->username;
    $_SESSION['AD_IMAGE'] = $row->image;
    $_SESSION['AD_STATUS'] = $row->status;
    $_SESSION['AD_LOGIN'] = $row->updated_at;

    
    $count = $connection->exec("UPDATE users SET updated_at = '".date("Y-m-d H:i:s")."' WHERE u_id = $row->u_id");
    if($count){
    http_response_code(200);
    echo json_encode(array('status' => true, 'message' => 'Login Success!'));
} else {
    http_response_code(404);
    echo json_encode(array('status' => false, 'message' => 'Update Login failed!'));
}
} else {
    http_response_code(401);
    echo json_encode(array('status' => false, 'message' => 'Unauthorlized!'));
}
} else {
    http_response_code(405); 
 echo json_encode(array('status' => false, 'message' => 'Method Not Allowed!'));

}


