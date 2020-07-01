<?php
include('server.php');

$id = $_GET['id'];

$query = "DELETE FROM dailytracker WHERE id=:id";
$stmt = $conn->prepare($query);
if ($stmt->execute([':id' => $id])) {
    header('Location: index.php');
}
