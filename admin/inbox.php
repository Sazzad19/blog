 <?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>


        <div class="grid_10">
            <div class="box round first grid">
                <h2>Inbox</h2>

                <?php

if(isset($_GET['seenid'])){

    $seenid=$_GET['seenid'];

     $sql="UPDATE contact SET status='0' WHERE id='$seenid'";
                $result=$db->update($sql);

                if($result){
                     echo "<span class='success'>Message sent in the seen box</span>";
                }
                else{
                     echo "<span class='error'>Something wwrong!</span>";
                }

}
?>

                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Name</th>
							<th>Email</th>
							<th>Message</th>
							<th>Date</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
<?php

                 $sql="SELECT *FROM contact WHERE status='1'";
                 $contact=$db->select($sql);
			     if($contact){
                   $i=0;
			while($row=$contact->fetch_assoc()){
                 $i++;



			?>


						<tr class="odd gradeX">
			<td><?php echo $i;?></td>
			<td><?php echo $row['firstname'].' '.$row['lastname'];?></td>
			<td><?php echo $row['email'];?></td>
			<td><?php echo $row['body'];?></td>
			<td><?php echo $row['date'];?></td>
			<td><a href="view.php?viewid=<?php echo  $row['id'];?>">View</a> || <a href="reply.php?replyid=<?php echo  $row['id'];?>">Reply</a>||<a href="inbox.php?seenid=<?php echo  $row['id'];?>">Seen</a></td>
						</tr>
					<?php } }?>
					</tbody>
				</table>
               </div>
            </div>





            <div class="box round first grid">
                <h2>Seen Box</h2>
				<?php
				if (isset($_GET['delid'])) {
					$delid=$_GET['delid'];
					$sql="DELETE  FROM contact WHERE id='$delid'";
				    $delmsg=$db->delete($sql);
				  if ($delmsg) {
				  	 echo "<span class='success'>Message Deleted Successfully</span>";
				  }
				  else{
				  	  echo "<span class='error'>Message Not Deleted!</span>";
				  }

				    
				}

				?>



                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Name</th>
							<th>Email</th>
							<th>Message</th>
							<th>Date</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
<?php

                 $sql="SELECT *FROM contact WHERE status='0' order by id desc";
                 $seen=$db->select($sql);
			     if($seen){
                 $i=0;
			while($row=$seen->fetch_assoc()){
                $i++;



			?>


						<tr class="odd gradeX">
			<td><?php echo $i;?></td>
			<td><?php echo $row['firstname'].' '.$row['lastname'];?></td>
			<td><?php echo $row['email'];?></td>
			<td><?php echo $row['body'];?></td>
			<td><?php echo $row['date'];?></td>
			<td><a onclick="return confirm('Are you sure want to delete?')" href="?delid=<?php echo  $row['id'];?>" >Delete</a></td>
						</tr>
					<?php } }?>
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