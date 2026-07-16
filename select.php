<?php
$servername = "sql102.infinityfree.com";
$username = "if0_42401176";
$password = "nLiWz68qe94Re0H";
$dbname = "if0_42401176_db_waseem";

// 1. إنشاء الاتصال
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// 2. طباعة الهيكل الأساسي للجدول (العناوين)
echo "<table border='1'>
  <tr>
    <th>ID</th>
    <th>Name</th>
    <th>Age</th>
    <th>Status</th>
    <th>Action</th>
  </tr>";

// 3. استعلام جلب البيانات من جدول user1
$sql = "SELECT id, name, age, status FROM user1";
$result = $conn->query($sql);

// 4. نظام العرض واكتشاف الأخطاء
if (!$result) {
    // إذا فشل الاستعلام
    echo "<tr><td colspan='5' style='color:red; text-align:center;'>خطأ في قاعدة البيانات: " . $conn->error . "</td></tr>";
} elseif ($result->num_rows > 0) {
    // 5. وضع البيانات داخل صفوف الجدول وربط الـ AJAX
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["name"] . "</td>";
        echo "<td>" . $row["age"] . "</td>";
        
        // الخلية الخاصة بالحالة مع إضافة ID مميز لها لكي يستهدفها كود الـ AJAX
        echo "<td id='status_" . $row["id"] . "'>" . $row["status"] . "</td>";
        
        // زر التبديل مع إضافة وظيفة onclick لترسل رقم الصف
        echo "<td><button onclick='toggleStatus(" . $row["id"] . ")'>Toggle</button></td>";
        
        echo "</tr>";
    }
} else {
    // إذا كان الجدول فارغاً
    echo "<tr><td colspan='5' style='text-align:center;'>الجدول فارغ</td></tr>";
}

echo "</table>";

// إغلاق الاتصال
$conn->close();
?>