<?php include('inc/header.php');?>

	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<div class="about">

<?php 
if(!isset($_GET['pageid'])||$_GET['pageid']==0){
	header("location:404.php");
}

else{

$db=new Database();

$id=$_GET['pageid'];
$sql="SELECT *FROM pages WHERE id=$id";
$result=$db->select($sql);
if(!$result){header("location:404.php");}
else{
$row=$result->fetch_assoc()
?>





				<h2><?php echo $row['name']; ?></h2>
	             <?php echo $row['body']; ?>     
				
	</div>

		</div>
	<?php } }?>
						<?php include('inc/sidebar.php');?>


		<?php include('inc/footer.php');?>