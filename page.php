<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// بيانات الاتصال بقاعدة البيانات
$servername = "sql308.infinityfree.com";
$username = "if0_42361786";
$password = "EPub8Ul06DW";
$dbname = "if0_42361786_myfrist";

$conn = new mysqli($servername, $username, $password, $dbname);

// التأكد من نجاح الاتصال
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// كود الإضافة (يشتغل إذا ضغط المستخدم على زر Submit)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $age = $_POST['age'];
    
    // إدخال البيانات في الجدول (حالة افتراضية 0)
    $sql = "INSERT INTO stu (name, age, status) VALUES ('$name', '$age', 0)";
    if ($conn->query($sql) === TRUE) {
        // تحديث الصفحة عشان تظهر البيانات الجديدة بالجدول تحت
        header("Location: page.php"); 
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>My Task Page</title>
    <style>
        body { font-family: sans-serif; margin: 20px; }
        table { border-collapse: collapse; width: 50%; margin-top: 20px; }
        th, td { border: 1px solid black; padding: 8px; text-align: center; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>

    <h2>My page</h2>
    <!-- الفورم يرسل البيانات لنفس الصفحة عن طريق POST -->
    <form action="" method="POST">
        <label>name:</label><br>
        <input type="text" name="name" required><br>
        <label>age:</label><br>
        <input type="number" name="age" required><br><br>
        <input type="submit" value="Submit">
    </form>

    <hr>

    <!-- جدول عرض البيانات -->
    <h2>Records:</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Age</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        
        <?php
        // جلب البيانات من قاعدة البيانات لعرضها
        $result = $conn->query("SELECT * FROM stu");
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row['id'] . "</td>
                        <td>" . $row['name'] . "</td>
                        <td>" . $row['age'] . "</td>
                        <td id='status-" . $row['id'] . "'>" . $row['status'] . "</td>
                        <td><button onclick='toggleStatus(" . $row['id'] . ")'>Toggle</button></td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='5'>No records found</td></tr>";
        }
        $conn->close();
        ?>
    </table>

    <!-- كود جافاسكريبت عشان زر التبديل يشتغل بدون تحديث الصفحة -->
    <script>
        function toggleStatus(id) {
            fetch('update.php?id=' + id)
                .then(response => response.text())
                .then(data => {
                    document.getElementById('status-' + id).innerText = data;
                });
        }
    </script>
</body>
</html>