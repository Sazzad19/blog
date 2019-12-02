

<?php
if (isset($_GET['catid'])) {
	$id=$_GET['catid'];
	$sql="DELETE  FROM category WHERE id='$id'";
    $category=$db->delete($sql);
  if ($category) {
  	header('location:catlist.php');
  }
  else{
  	  echo "<span class='error'>Category not deleted!</span>";
  }

    
}

?>