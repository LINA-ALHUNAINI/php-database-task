<?php
$servername = "sql308.infinityfree.com";
$username = "if0_42361786";
$password = "EPub8Ul06DW";
$dbname = "if0_42361786_myfrist";

$conn = new mysqli($servername, $username, $password, $dbname);

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = $conn->query("SELECT status FROM stu WHERE id = $id");
    $row = $result->fetch_assoc();
    
    $newStatus = ($row['status'] == 0) ? 1 : 0;
    
    $conn->query("UPDATE stu SET status = $newStatus WHERE id = $id");
    echo $newStatus;
}
$conn->close();
?>