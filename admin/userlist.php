<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>User List</h2>
<?php


if (isset($_GET['userid'])) {
	$userid=$_GET['userid'];
	$sql="DELETE  FROM users WHERE id='$userid'";
    $catagory=$db->delete($sql);
  if ($catagory) {
   echo "<span class='error'>User  deleted!</span>";
  }
  else{
  	  echo "<span class='error'>User not deleted!</span>";
  }

    
}

?>



                <div class="block"> 
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>UserName</th>
              <th>Email</th>
              <th>Details</th>
              <th>Role</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
                        
                        $sql="SELECT *FROM users";      
                        $result=$db->select($sql);
                        if($result){
                          $i=0;
	                    while($value=mysqli_fetch_array($result)){
                        $i++;

						?>
						<tr class="odd gradeX">
							<td><?php echo $i;?></td>
							<td><?php echo $value['username']?></td>
                 <td><?php echo $value['email']?></td>
                 <td><?php echo $value['details']?></td>
                 <td><?php if($value['role']==0)
                            echo "Admin";
                            elseif($value['role']==1)
                              echo"Author";
                        elseif($value['role']==2)
                              echo"Editor";

                            ?></td>

							<td><a href="viewuser.php?userid=<?php echo $value['id']; ?>">view</a> || <a onclick="return confirm('Are you sure to delete!');"href="?userid=<?php echo $value['id']; ?>">Delete</a></td>
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
