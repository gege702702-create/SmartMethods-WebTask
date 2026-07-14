<?php

include 'db.php';

if(isset($_POST['submit']))
{
    $name = $_POST['name'];
    $age = $_POST['age'];

    $sql = "INSERT INTO stu(name,age,status)
            VALUES('$name','$age',0)";

    $conn->query($sql);
}

?>

<!DOCTYPE html>
<html>

<head>

<title>Web Task</title>

<style>

body{
    font-family:Arial;
    text-align:center;
    margin-top:50px;
}

input{
    padding:10px;
    margin:5px;
}

button{
    padding:10px;
}

table{
    margin:auto;
    margin-top:20px;
    border-collapse:collapse;
    width:70%;
}

table,th,td{
    border:1px solid black;
}

th,td{
    padding:10px;
}

</style>

</head>

<body>

<h2>Student Form</h2>

<form method="POST">

<input type="text" name="name" placeholder="Name" required>

<input type="number" name="age" placeholder="Age" required>

<button type="submit" name="submit">
Submit
</button>

</form>

<table>

<tr>
<th>ID</th>
<th>Name</th>
<th>Age</th>
<th>Status</th>
<th>Action</th>
</tr>

<?php

$result = $conn->query("SELECT * FROM stu");

while($row = $result->fetch_assoc())
{
?>

<tr>

<td><?php echo $row['id']; ?></td>

<td><?php echo $row['name']; ?></td>

<td><?php echo $row['age']; ?></td>

<td id="status<?php echo $row['id']; ?>">
<?php echo $row['status']; ?>
</td>

<td>

<button onclick="toggleStatus(<?php echo $row['id']; ?>)">
Toggle
</button>

</td>

</tr>

<?php
}
?>

</table>

<script>

function toggleStatus(id){

var xhr = new XMLHttpRequest();

xhr.open(
"GET",
"toggle.php?id="+id,
true
);

xhr.onload = function(){

if(xhr.status == 200){

document.getElementById("status"+id)
.innerHTML = xhr.responseText;

}

}

xhr.send();

}

</script>

</body>
</html>