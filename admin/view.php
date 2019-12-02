<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

<?php
 if(!isset($_GET['viewid'])||$_GET['viewid']==NULL){
    echo "<script>window.location='inbox.php';</script>";
 }

 else{

$viewid=$_GET['viewid'];
 }

 ?>

        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>View Message</h2>
<?php
 if($_SERVER['REQUEST_METHOD']=='POST'){
   echo "<script>window.location='inbox.php';</script>";
    
   }

  ?>











                <div class="block">               
                 <form action="" method="POST" >
			                  
					                   <?php
					$sql="SELECT * FROM contact WHERE id='$viewid'";
					$result=$db->select($sql); 
					if($result){
					    $raw=$result->fetch_assoc();

					?>

                    <table class="form">
                       
                        <tr>
                            <td>
                                <label>Name</label>
                            </td>
                            <td>
                                <input type="text" readonly value="<?php echo $raw['firstname']; echo $raw['lastname']; ?>" class="medium"/>
                            </td>
                        </tr>
                     
                    <tr>
                            <td>
                                <label>Email</label>
                            </td>
                            <td>
                                <input type="text" readonly value="<?php echo $raw['email'];?>"class="medium" />
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label>Date</label>
                            </td>
                            <td>
                                <input type="text" readonly value="<?php echo $raw['date'];?>"class="medium" />
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label>Message</label>
                            </td>
                            <td>
                                <textarea type="text" readonly style="width: 300px; height:50px;" ><?php echo $raw['body'];?></textarea>
                            </td>
                        </tr>
                    
                       
                     <?php } ?>

                          

						<tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="OK" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
              
         <script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            setupTinyMCE();
            setDatePicker('date-picker');
            $('input[type="checkbox"]').fancybutton();
            $('input[type="radio"]').fancybutton();
        });
    </script>

         <?php include 'inc/footer.php';?>
