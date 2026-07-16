<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Web Task</title>
    
    <script>
    function toggleStatus(id) {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                // تحديث الخلية المحددة فوراً بالقيمة الجديدة القادمة من قاعدة البيانات
                document.getElementById("status_" + id).innerHTML = this.responseText;
            }
        };
        // update.php
        xmlhttp.open("GET", "update.php?id=" + id, true);
        xmlhttp.send();
    }
    </script>
</head>
<body>

<form action="insert.php" method="get">
  <label for="name">Name:</label>
  <input type="text" id="name" name="name" placeholder="اكتب اسمك" required>
  
  <label for="age">Age:</label>
  <input type="number" id="age" name="age" placeholder="ادخل عمرك" required>
  
  <input type="submit" value="Submit">
</form>

<br><br>

<?php include 'select.php'; ?>

</body>
</html>