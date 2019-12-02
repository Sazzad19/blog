<?php include('inc/header.php');?>
<?php include('inc/slider.php');?>

<?php
if(isset($_GET["page"])){ 
	$page=$_GET["page"];
    $start=($page*4)-4;}
else{$start=0;}

$sql="SELECT *FROM posts limit $start,4";
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
				 <a href="#"><img src="admin/<?php echo $row['image']; ?>" alt="post image"/></a>

				<?php echo $fm->textShorten($row['body']);?>

				<div class="readmore clear">
					<a href="post.php?id=<?php echo $row['id'] ?>">Read More</a>
				</div>
			</div>
			
			<?php }
         $query="SELECT *FROM posts";
        $res=$db->select($query);
		$rownum=mysqli_num_rows($res);
        $pagenum=ceil($rownum/4);
        ?>
        <span class="pagination">
        	<?php for($a=1;$a<=$pagenum;$a++){?>
        	<a href="index.php?page=<?php echo $a;?>"><?php echo $a;?></a>
        	<?php }?>
        </span>

     <?php    }
       else{
       	header("location:404.php");
       }

     ?>





			 

		</div>
		<?php include('inc/sidebar.php');?>

		
	

	

	<?php include('inc/footer.php');?>