<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>Post List</h2>
                <div class="block">  
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th width="5%">No</th>
							<th width="20%">Post Title</th>
							<th width="20%">Description</th>
							<th width="5%">Category</th>
							<th width="10%">Image</th>
							<th width="10%">Author</th>
							<th width="10%">Tags</th>
							<th width="10%">Date</th>
							<th width="10%">Action</th>
						</tr>
					</thead>
					<tbody>
						
<?php $db=new database();
$fm=new format();
$sql="SELECT posts.*,category.name FROM posts
INNER JOIN category
ON posts.cat=category.id";
$result=$db->select($sql);
if($result){
	$i=0;
while($raw=$result->fetch_assoc()){
$i++;
?>
                            <tr class="odd gradeX">

							<td><?php echo $i;?></td>
							<td><?php echo $raw['title'];?></td>
							<td><?php echo $fm->textShorten($raw['body'],100);?></td>
							<td> <?php echo $raw['name'];?></td>
							<td><img src="<?php echo $raw['image'];?>" height="40px" width="60px"/></td>
							
							<td><?php echo $raw['author'];?></td>
							<td><?php echo $raw['tags'];?></td>
							<td><?php echo $fm->formatDate($raw['date']);?></td>
							<td>
								<a href="viewpost.php?viewid=<?php echo $raw['id'];?>">View</a>

							<?php if(Session::get('userid')==$raw['userid']||Session::get('userrole')=='0'){?>
								||<a href="editpost.php?editid=<?php echo $raw['id'];?>">Edit</a> || <a onclick="return confirm('Are you sure to delete?');" href="deletepost.php?deleteid=<?php echo $raw['id'];?>">Delete</a>
						<?php } ?>

                       </td>
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