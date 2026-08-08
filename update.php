<?php
$servername = "sql308.infinityfree.com";
$username = "if0_42361786";
$password = "EPub8Ul06DW";
$dbname = "if0_42361786_myfrist";

$conn = new mysqli($servername, $username, $password, $dbname);

if (isset($_GET['id'])) {
   $id = $_GET['id'];
$stmt = $conn->prepare("SELECT status FROM stu WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$row = $stmt->get_result()->fetch_assoc();

$newStatus = ($row['status'] == 0) ? 1 : 0;

$stmt2 = $conn->prepare("UPDATE stu SET status = ? WHERE id = ?");
$stmt2->bind_param("ii", $newStatus, $id);
$stmt2->execute();
echo $newStatus;

}
$conn->close();
?>