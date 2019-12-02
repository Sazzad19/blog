<?php include('../lib/session.php');
session::checksession();
?>
<?php include '../lib/Database.php';
$db=new Database();
if(!isset($_GET['deleteid'])||$_GET['deleteid']==NULL){
    echo "<script>window.location=postlist.php</script>";
 }
else{
	$deleteid=$_GET['deleteid'];


$sql="SELECT * FROM posts WHERE id='$deleteid'";
$result=$db->select($sql); 
if($result){
$raw=$result->fetch_assoc();
unlink($raw['image']);
}
$sql="DELETE  FROM posts WHERE id='$deleteid'";
$result=$db->delete($sql);
if($result){
	  echo "<script>alert('Data deleted successfully');</script>";
    echo "<script>window.location='postlist.php';</script>";
  
}
else{
	echo "<script>alert('Data not deleted');</script>";
    echo "<script>window.location='postlist.php';</script>";

}
}
?>

