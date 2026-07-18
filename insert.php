<?php
$servername = "sql102.infinityfree.com";
$username = "if0_42401176";
$password = "nLiWz68qe94Re0H";
$dbname = "if0_42401176_db_waseem";
$name = $_GET['name'];
$age = $_GET['age'];

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO user1 (id, name, age) VALUES ('', '$name', '$age')";

// تنفيذ الاستعلام والتحقق من النتيجة
if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
  // إضافة رابط بسيط للعودة إلى صفحة النموذج بعد الحفظ
  echo "<br><br><a href='index.php'>العودة إلى الصفحة الرئيسية</a>";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

// إغلاق الاتصال
$conn->close();
?>
