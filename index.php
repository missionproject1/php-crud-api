<?php
include "db.php";

$sql = "SELECT * FROM users";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
<title>User List</title>
<style>

table{
border-collapse: collapse;
width: 60%;
margin:auto;
}

th,td{
border:1px solid black;
padding:10px;
text-align:center;
}

th{
background:#f2f2f2;
}

h2{
text-align:center;
}

</style>
</head>

<body>

<h2>User Data</h2>

<table>

<tr>
<th>ID</th>
<th>Name</th>
<th>Email</th>
<th>Mobile</th>
</tr>

<?php

if($result->num_rows > 0){

while($row = $result->fetch_assoc()){

?>

<tr>
<td><?php echo $row['id']; ?></td>
<td><?php echo $row['name']; ?></td>
<td><?php echo $row['email']; ?></td>
<td><?php echo $row['mobile']; ?></td>
</tr>

<?php
}
}
?>

</table>

</body>
</html>