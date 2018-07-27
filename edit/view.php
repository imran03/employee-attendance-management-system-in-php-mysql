

<html>
<head>
<title>View Records</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
</head>
<body>
<div class="container">
    <center><h1>View Records</h1></center>


<?php
// connect to the database

include('../config.php');
include_once('../class.user.php');
session_start();
$userId = $_GET["eid"];

$userd=$dbcon->query("SELECT fullname,uname,uemail FROM users WHERE uid=$userId");

// display records if there are records to display
if ($userd->num_rows > 0) {
// display records in a table
    echo "<table border='1' cellpadding='10'>";

// set table headers

    while ($row = $userd->fetch_row()) {?>
<form class="form-horizontal" method="post" action="update.php?eid=<?=$userId?>">

    <div class="form-group">
        <label class="control-label col-sm-2" for="email">Full Name:-</label>
        <div class="col-sm-10">
        <input class="form-control" type='text' id='fname' name="fullname" value='<?=$row[0]?>' /> <br/>
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-sm-2" for="email">User Name:-</label>
        <div class="col-sm-10">
        <input class="form-control" type='text' id='uname'name="uname" value='<?=$row[1]?>' /><br/>
        </div>
    </div>

    <div class="form-group">

        <label class="control-label col-sm-2" for="email">E-Mail:-</label>
        <div class="col-sm-10">
        <input class="form-control" type='text' id='email'name="uemail" value='<?=$row[2]?>' /><br/>
        </div>
    </div>

        <input class="control-label col-sm-2" type="submit" name="Update" value="edit" class="btn btn-info" role="button">
</form>

  <?php  }?>

<?php }
// if there are no records in the database, display an alert message
else
    {
        echo "No results to display!";
    }

//// show an error if there is an issue with the database query
//else
//{
//echo "Error: " . $dbcon->error;
//}

// close database connection
$dbcon->close();

?>

<form action="">
</form>

</body>
</html>