<html>
<head lang="en">
    <meta charset="UTF-8">
    <link type="text/css" rel="stylesheet" href="../css/bootstrap-3.2.0/dist/css/bootstrap.css"> <!--css file link in bootstrap folder-->
    <title>View Users</title>
</head>
<style>
    .login-panel {
        margin-top: 150px;
    }
    .table {
        margin-top: 50px;

    }

</style>

<body>

<div class="table-scrol">
    <h1 align="center">All the Users</h1>

    <div class="table-responsive"><!--this is used for responsive display in mobile and other devices-->


        <table class="table table-bordered table-hover table-striped" style="table-layout: fixed">
            <thead>

            <tr>

                <th>User Id</th>
                <th>User Name</th>
                <th>User Pass</th>
                <th>User full name</th>
                <th>User Email</th>
                <th>Status</th>
                <th>Delete</th>

            </tr>
            </thead>

            <?php
            include '../config.php';
            $view_users_query="select * from users ";//select query for viewing users.

            $run=$dbcon->query($view_users_query);//here run the sql query.

            while($row=mysqli_fetch_row($run)){//while look to fetch the result and store in a array $row. ?>

            <tr>
                <!--here showing results in the table -->
                <td><?php echo $row[0];  ?></td>
                <td><?php echo $row[1];  ?></td>
                <td><?php echo $row[2];  ?></td>
                <td><?php echo $row[3];  ?></td>
                <td><?php echo $row[4];  ?></td>
                <td><?php echo $row[5];  ?></td>
                <td><a href="delete.php?del=<?php echo $uid ?>"><button class="btn btn-danger">Delete</button></a></td> <!--btn btn-danger is a bootstrap button to show danger-->
            </tr>


            <?php } ?>

        </table>
    </div>
</div>


</body>

</html>