<?php
$servername = "sql102.infinityfree.com";
$username = "if0_42401176";
$password = "nLiWz68qe94Re0H";
$dbname = "if0_42401176_db_waseem";

$id = $_GET['id'];


$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT status FROM user1 WHERE id = $id";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $current_status = $row["status"];
    
    // 4. قلب الحالة: إذا كانت 0 اجعلها 1، والعكس
    if ($current_status == 0) {
        $new_status = 1;
    } else {
        $new_status = 0;
    }
    
    
    $update_sql = "UPDATE user1 SET status = $new_status WHERE id = $id";
    
    if ($conn->query($update_sql) === TRUE) {
        // 6. طباعة الرقم الجديد (هذا الرقم هو الذي سيأخذه AJAX ويضعه في الجدول أمامك)
        echo $new_status;
    } else {
        echo "Error";
    }
}

// إغلاق الاتصال
$conn->close();
?>