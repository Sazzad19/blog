<?php include('inc/header.php');?>




<?php 
if(!isset($_GET['id'])||$_GET['id']==0){
	header("location:404.php");
}

else{

$db=new Database();
$fm=new format();
$id=$_GET['id'];
$sql="SELECT *FROM posts WHERE id=$id";
$result=$db->select($sql);
if(!$result){header("location:404.php");}
else{
$row=$result->fetch_assoc()
?>



	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<div class="about">
				<h2><?php echo $row['title'];?></h2>
				<h4><?php echo $fm->formatDate($row['date']); ?>,By <a href="#"><?php echo $row['author'];?></a></h4>
				<img src="admin/<?php echo $row['image']; ?>" alt="MyImage"/>
				<?php echo $row['body'];?>

				<div class="relatedpost clear">
					<h2>Related articles</h2>
					<?php 
                     $cat=$row['cat'];
                    $query="SELECT *FROM posts WHERE cat=$cat order by rand()";
                     $catresult=$db->select($query);
                     if($catresult){
                     while($rowcat=$catresult->fetch_assoc()){
					?>
					<a href="post.php?id=<?php echo $rowcat['id'] ?>"><img src="admin/<?php echo $rowcat['image'];?>" alt="post image"/></a>
					<?php } } else{ header("location:404.php"); } ?>
				</div>
	</div>

		</div>
	<?php }  }?>
		<?php include('inc/sidebar.php');?>

		<?php include('inc/footer.php');?>