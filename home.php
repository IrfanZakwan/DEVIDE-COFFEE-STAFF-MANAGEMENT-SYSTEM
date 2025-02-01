<?php 
  include('header.php'); 
  include_once('controller/connect.php');

  $dbs = new database();
  $db = $dbs->connection();

  // Get total employees excluding RoleId = 1
  $TotalEmp = mysqli_query($db, "SELECT COUNT(EmployeeId) AS emp FROM employee WHERE RoleId != '1'");
  $TotalEmploId = mysqli_fetch_assoc($TotalEmp);

  // Get pending leave requests count
  $pandingleave = mysqli_query($db, "SELECT COUNT(LeaveStatus) AS pleave FROM leavedetails WHERE LeaveStatus = 'Pending'");
  $tpandingleave = mysqli_fetch_assoc($pandingleave);

  // Get total projects count (check if table exists)
  $result = mysqli_query($db, "SELECT COUNT(*) AS total FROM project");
  if ($result) {
      $row = mysqli_fetch_assoc($result);
      $num_rows = $row['total'];
  } else {
      $num_rows = 0; // Default if query fails
  }

  // Get total vacancies count (check if table exists)
  $vacancy = mysqli_query($db, "SELECT COUNT(*) AS total FROM vacancy");
  if ($vacancy) {
      $row = mysqli_fetch_assoc($vacancy);
      $res = $row['total'];
  } else {
      $res = 0;
  }
?>

<ol class="breadcrumb" style="margin: 10px 0px !important;">
    <li class="breadcrumb-item" title="Home"><a href="home.php">Home</a></li>
</ol>

<div class="four-grids" style="margin-bottom: 30px; margin-top: 10px; background: white;">
    <div class="col-md-3 four-grid">
        <div class="four-agileits">
            <a href="employeeview.php">
                <div class="icon">
                    <i class="glyphicon glyphicon-user" aria-hidden="true"></i>
                </div>
                <div class="four-text">
                    <h3>Employee</h3>
                    <h4><?php echo isset($TotalEmploId['emp']) ? $TotalEmploId['emp'] : "0"; ?></h4>
                </div>
            </a>
        </div>
    </div>

    <div class="col-md-3 four-grid">
        <div class="four-agileinfo">
            <a href="leaverequest.php">
                <div class="icon">
                    <i class="glyphicon glyphicon-list-alt" aria-hidden="true"></i>
                </div>
                <div class="four-text">
                    <h3>Leave Request</h3>
                    <h4><?php echo isset($tpandingleave['pleave']) ? $tpandingleave['pleave'] : "0"; ?></h4>
                </div>
            </a>
        </div>
    </div>

    <div class="col-md-3 four-grid">
        <div class="four-w3ls">
            <a href="viewproject.php">
                <div class="icon">
                    <i class="glyphicon glyphicon-folder-open" aria-hidden="true"></i>
                </div>
                <div class="four-text">
                    <h3>Projects</h3>
                    <h4><?php echo $num_rows; ?></h4>
                </div>
            </a>
        </div>
    </div>

    <div class="col-md-3 four-grid">
        <div class="four-wthree">
            <a href="viewvacancy.php">
                <div class="icon">
                    <i class="glyphicon glyphicon-briefcase" aria-hidden="true"></i>
                </div>
                <div class="four-text">
                    <h3>Vacancies</h3>
                    <h4><?php echo $res; ?></h4>
                </div>
            </a>
        </div>
    </div>

    <div class="clearfix"></div>
</div>

<?php include('footer.php'); ?>
