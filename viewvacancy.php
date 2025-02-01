<?php include('header.php');?>

<?php
// Establishing the connection using mysqli
$conn = mysqli_connect("localhost", "root", "", "dhrms");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$s = "SELECT * FROM `vacancy` WHERE 1";
$resource = mysqli_query($conn, $s);
$count = mysqli_num_rows($resource);

echo "<center><h1>HRMS VACANCY DETAILS</h1></center>";

echo "<table border=1 >";
echo "<tr>";
echo "<th> Vacancy Id</th>";
echo "<th> Vacancy Name</th>";
echo "<th> Issue Date</th>";
echo "<th> Expiry Date</th>";
echo "<th> For Post</th>";
echo "<th> Degree Required</th>";
echo "<th> EDIT</th>";
echo "<th> DELETE</th>";
echo "</tr>";

while ($row = mysqli_fetch_row($resource)) {
    echo "<tr>";
    echo "<td> ".$row[0]."</td>";
    echo "<td> ".$row[1]."</td>";
    echo "<td>".$row[2]."</td>";
    echo "<td>".$row[3]."</td>";
    echo "<td>".$row[4]."</td>";
    echo "<td>".$row[5]."</td>";
    echo "<td><a href='vedit.php?id=".$row[0]."' color=red>EDIT</a></td>";
    echo "<td><a href='vdelete.php?id=".$row[0]."' color=red>DELETE</a></td>";
    echo "</tr>";
}

// Close the connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Vacancy Info</title>
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

<br>
<?php include('footer.php');?>
