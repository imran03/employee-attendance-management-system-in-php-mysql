<?php
/**
 * Created by PhpStorm.
 * User: imran
 * Date: 26/4/18
 * Time: 12:13 PM
 */
include ('../config.php');
include ('../class.user.php');

session_start();
$Id = $_GET["eid"];
$fullname=$_POST['fullname'];
$uname=$_POST['uname'];
$uemail=$_POST['uemail'];

echo $Id.$uname.$fullname.$uemail;

$rowId=$dbcon->query("update users set fullname='$fullname',uname='$uname',uemail='$uemail' where uid=$Id ");
var_dump($rowId);
if ($rowId>0)
{
    echo "successfully Updated";
}
else
{
    echo "not updated";
}


?>