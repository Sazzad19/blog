<?php include('inc/header.php');?>
<?php include('inc/slider.php');?>

<?php
if(!isset($_GET["search"])||$_GET["search"]==NULL){
header("location:404.php");}
else{

	$search=$_GET["search"];

$sql="SELECT *FROM posts WHERE title LIKE '%$search%' OR body LIKE '%$search%' ";
$result=$db->select($sql);




?>

	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<?php
			if($result){

			while($row=$result->fetch_assoc()){




			?>
			<div class="samepost clear">
				<h2><a href=""><?php echo $row['title'];?></a></h2>
				<h4><?php echo $fm->formatDate($row['date']); ?>, By <a href="#"><?php echo $row['author'];?></a></h4>
				 <a href="#"><img src="<?php echo $row['image']; ?>" alt="post image"/></a>

				<?php echo $fm->textShorten($row['body']);?>

				<div class="readmore clear">
					<a href="post.php?id=<?php echo $row['id'] ?>">Read More</a>
				</div>
			</div>
			

     <?php    }   }
       else{
       	?><p>Your search is not found!</p>
       	<?php
       }

             }
            
     ?>


		</div>
		<?php include('inc/sidebar.php');?>
	<?php include('inc/footer.php');?>