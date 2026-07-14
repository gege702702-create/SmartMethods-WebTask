<?php

include 'db.php';

$id = $_GET['id'];

$result = $conn->query(
"SELECT status FROM stu WHERE id=$id"
);

$row = $result->fetch_assoc();

$current = $row['status'];

if($current == 0){
    $newStatus = 1;
}else{
    $newStatus = 0;
}

$conn->query(
"UPDATE stu SET status=$newStatus WHERE id=$id"
);

echo $newStatus;

?>