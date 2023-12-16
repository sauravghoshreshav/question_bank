<?php
// Database Connection
$rootpath=$_SERVER["DOCUMENT_ROOT"];
require_once $rootpath."/sem3/database/database.php";

$action=$_POST["action"];
if($action=="courseHandler"){
$db= new database;
$sql="select code, title from course_details ";
$row=$db->conn->prepare($sql);
$row->execute();
$result=$row->fetchAll(PDO::FETCH_ASSOC);
header('Content-Type: application/json');
echo json_encode(array('data'=>$result));
exit;
}


?>