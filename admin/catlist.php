<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>Category List</h2>
<?php


if (isset($_GET['catid'])) {
	$id=$_GET['catid'];
	$sql="DELETE  FROM category WHERE id='$id'";
    $catagory=$db->delete($sql);
  if ($catagory) {
   echo "<span class='error'>Catagory  deleted!</span>";
  }
  else{
  	  echo "<span class='error'>Catagory not deleted!</span>";
  }

    
}

?>



                <div class="block"> 
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Category Name</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
                        
                        $sql="SELECT *FROM category";      
                        $result=$db->select($sql);
                        if($result!=false){
	                    while($value=mysqli_fetch_array($result)){

						?>
						<tr class="odd gradeX">
							<td><?php echo $value['id']?></td>
							<td><?php echo $value['name']?></td>
							<td><a href="editcat.php?catid=<?php echo $value['id']; ?>">Edit</a> || <a onclick="return confirm('Are you sure to delete!');"href="catlist.php?catid=<?php echo $value['id']; ?>">Delete</a></td>
						</tr>
						<?php } } ?>
					</tbody>
				</table>
               </div>
            </div>
        </div>


        <script type="text/javascript">

        $(document).ready(function () {
            setupLeftMenu();

            $('.datatable').dataTable();
			setSidebarHeight();


        });
    </script>
 <?php include 'inc/footer.php';?>
