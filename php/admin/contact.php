
<!DOCTYPE html>
<html>
<head>
<title>Table with database</title>
<style>
table {
border-collapse: collapse;
width: 100%;
color: #588c7e;
font-family: monospace;

text-align: left;
}
th {
background-color: #588c7e;
color: white;
}
tr:nth-child(even) {background-color: #f2f2f2}
</style>
</head>
<body>
<table>
<tr>
<th>Id</th>
<th>fname</th>
<th>lname</th>
<th>Email</th>
<th>phone</th>
<th>Message</th>
</tr>
<?php
$conn = mysqli_connect("localhost", "root", "", "dronella");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT id, firstname,lastname, email,phone, message FROM contactdata order by id desc";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
echo "<tr>
<td>" . $row["id"]. "</td>
<td>" . $row["firstname"] . "</td>
<td>" . $row["lastname"] . "</td>
<td>". $row["email"]. "</td>
<td>". $row["phone"]. "</td>
<td>". $row["message"]. "</td>
</tr>";
}
echo "</table>";
} else { echo "0 results"; }
$conn->close();
?>
</table>
</body>
</html>