<?php include('config/config.php');?>
<?php include('lib/Database.php');?>
<?php include('helpers/format.php');?>
<?php $db=new Database();
      $fm=new format();
 ?>



<!DOCTYPE html>
<html>
<head>
 <?php
                        if(isset($_GET['pageid'])){
                        	$id=$_GET['pageid'];
                        $sql="SELECT *FROM pages WHERE id=$id";      
                        $result=$db->select($sql);
                        if($result){
                        while($value=mysqli_fetch_array($result)){
                        	?>
                      <title><?php echo $value['name']; ?>-<?php echo TITLE; ?></title>

                      <?php } } }
					elseif(isset($_GET['id'])){
                        	$id=$_GET['id'];
                        $sql="SELECT *FROM posts WHERE id=$id";      
                        $result=$db->select($sql);
                        if($result){
                        while($value=mysqli_fetch_array($result)){
                        	?>
					<title><?php echo $value['title']; ?>-<?php echo TITLE; ?></title>

					                      <?php } } }


                      else{?>
<title><?php echo $fm->title();?>-<?php echo TITLE; ?></title>

                      <?php } ?>


	


	<meta name="language" content="English">
	<meta name="description" content="It is a website about education">
<?php if(isset($_GET['id'])){

                        	$id=$_GET['id'];
                        $sql="SELECT *FROM posts WHERE id=$id";      
                        $result=$db->select($sql);
                        if($result){
                        while($value=mysqli_fetch_array($result)){
                        	?>
						<meta name="keywords" content="<?php echo $value['tags'];?>">

					                      <?php } } }

					                      else{?>

                           <meta name="keywords" content="<?php echo KEYWORD;?>">

					                      <?php  } ?>




	<meta name="author" content="Delowar">
	<link rel="stylesheet" href="font-awesome-4.5.0/css/font-awesome.css">	
	<link rel="stylesheet" href="css/nivo-slider.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="style.css">
	<script src="js/jquery.js" type="text/javascript"></script>
	<script src="js/jquery.nivo.slider.js" type="text/javascript"></script>

<script type="text/javascript">
$(window).load(function() {
	$('#slider').nivoSlider({
		effect:'random',
		slices:10,
		animSpeed:500,
		pauseTime:5000,
		startSlide:0, //Set starting Slide (0 index)
		directionNav:false,
		directionNavHide:false, //Only show on hover
		controlNav:false, //1,2,3...
		controlNavThumbs:false, //Use thumbnails for Control Nav
		pauseOnHover:true, //Stop animation while hovering
		manualAdvance:false, //Force manual transitions
		captionOpacity:0.8, //Universal caption opacity
		beforeChange: function(){},
		afterChange: function(){},
		slideshowEnd: function(){} //Triggers after all slides have been shown
	});
});
</script>
</head>

<body>
	<div class="headersection templete clear">
		<a href="#">
			<div class="logo">
<?php  
$sql="SELECT * FROM title_slogan WHERE id='1'";
$result=$db->select($sql); 
if($result){
    $raw=$result->fetch_assoc();


?>


				<img src="admin/<?php echo $raw['logo'];?>" alt="Logo"/>
				<h2><?php echo $raw['title'];?></h2>
				<p><?php echo $raw['slogan'];?></p>
			<?php } ?>
			</div>
		</a>
		<div class="social clear">
			<div class="icon clear">
<?php  
$sql="SELECT * FROM social_media WHERE id='1'";
$result=$db->select($sql); 
if($result){
    $raw=$result->fetch_assoc();


?>

				<a href="<?php echo $raw['fb'];?>" target="_blank"><i class="fa fa-facebook"></i></a>
				<a href="<?php echo $raw['tw'];?>" target="_blank"><i class="fa fa-twitter"></i></a>
				<a href="<?php echo $raw['ld'];?>" target="_blank"><i class="fa fa-linkedin"></i></a>
				<a href="<?php echo $raw['gp'];?>" target="_blank"><i class="fa fa-google-plus"></i></a>
			</div>
		<?php } ?>
			<div class="searchbtn clear">
			<form action="search.php" method="get">
				<input type="text" name="search" placeholder="Search keyword..."/>
				<input type="submit" name="submit" value="Search"/>
			</form>
			</div>
		</div>
	</div>
<div class="navsection templete">
<?php
$path=$_SERVER['SCRIPT_FILENAME'];
$currentpage=basename($path,'.php');?>

	<ul>
		<li><a 
             <?php if($currentpage=='index'){ echo 'id="active"';} ?>
		 href="index.php">Home</a></li>	
		<li><a <?php if($currentpage=='contact'){ echo 'id="active"';} ?> href="contact.php">Contact</a></li>

		 <?php
 

                        
                        $sql="SELECT *FROM pages";      
                        $result=$db->select($sql);
                        if($result){
                        while($value=mysqli_fetch_array($result)){



                        ?>

                             <li><a <?php if(isset($_GET['pageid'])&&($_GET['pageid']==$value['id'])){?> id="active"<?php } ?>href="page.php?pageid=<?php echo $value['id']; ?>"><?php echo $value['name']; ?></a></li>
                            <?php } }?>
	</ul>
</div>

	
