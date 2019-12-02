<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>


<?php

if(!isset($_GET['catid'])|| $_GET['catid']==NULL){
echo"<script>window.location='catlist.php';</script>";

}
else{
    $id=$_GET['catid'];
}


?>


        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Update Category</h2>
               <div class="block copyblock"> 
        
<?php 
                $sqlb="SELECT * FROM category WHERE id='$id'";
                $catagory=$db->select($sqlb);
                $value=$catagory->fetch_assoc();


?>


                 <form action="update.php?catid=<?php echo $value['id']; ?>" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" value="<?php echo $value['name'];?>" name="name"class="medium" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
       <?php include 'inc/footer.php';?> 