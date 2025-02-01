<?php include('header.php'); ?>

<?php
// Establishing the connection using mysqli
$conn = mysqli_connect("localhost", "root", "", "dhrms");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$query = "SELECT u.EmployeeId, u.FirstName, u.JoinDate, u.Salary FROM employee u";
$results = mysqli_query($conn, $query);

echo "<center><h1>HRMS SALARY DETAILS</h1></center>";
echo "<table border=1 >";
echo "<tr>";
echo "<th> EMPLOYEE ID</th>";
echo "<th> EMPLOYEE NAME</th>";
echo "<th> JOIN DATE</th>";
echo "<th> SALARY</th>";
echo "</tr>";

while ($row = mysqli_fetch_array($results)) {
    echo "<tr>";
    echo "<td> ".$row[0]."</td>";
    echo "<td> ".$row[1]."</td>";
    echo "<td>".$row[2]."</td>";
    echo "<td>".$row[3]."</td>";
    echo "</tr>";
}

// Close the connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Project Info</title>
    <style>
        body {
            font-family: sans-serif;
            font-size: 10pt;
            background-image: url(HR/image/img.jpg);
            background-size: cover;
            background-attachment: fixed;
        }
        table {
            width: 80%;
        }
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
            opacity: 0.95;
            margin-left: 50px;
            align-items: center;
        }
        th, td {
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #a70000;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #e8e8e8;
        }
        tr:nth-child(odd) {
            background-color: #B0C4DE;
        }
    </style>
</head>
</html>

<?php include('footer.php'); ?>
