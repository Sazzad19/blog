<?php include('../lib/session.php');
session::checksession();
?>
<?php include '../lib/Database.php';
$db=new Database();
if(!isset($_GET['pageid'])||$_GET['pageid']==NULL){
    echo "<script>window.location=index.php</script>";
 }
else{
	$pageid=$_GET['pageid'];



$sql="DELETE  FROM pages WHERE id='$pageid'";
$result=$db->delete($sql);
if($result){
	  echo "<script>alert('Page deleted successfully');</script>";
    echo "<script>window.location='index.php';</script>";
  
}
else{
	echo "<script>alert('Page not deleted');</script>";
    echo "<script>window.location='index.php';</script>";

}
}
?>

