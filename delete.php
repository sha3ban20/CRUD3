<?php
include"db_conn.php";
$id =$_GET['id'];
$sql ="DELETE FROM CRUD WHERE id = $id";
$result =mysqli_query($conn,$sql);
if($result){
    header("Location: add_new.php?msg=Record deleted successfully");
}
else{
    echo "Failed:".mysqli_error($conn);
}

?>