<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Update Social Media</h2>
                <?php
                  if($_SERVER['REQUEST_METHOD']=='POST'){
            $fb=mysqli_real_escape_string($db->link,$_POST['facebook']);
            $tw=mysqli_real_escape_string($db->link,$_POST['twitter']);
            $ld=mysqli_real_escape_string($db->link,$_POST['linkedin']);
            $gp=mysqli_real_escape_string($db->link,$_POST['googleplus']);

if($fb==""||$tw==""||$ld==""||$gp==""){  echo "<span class='error'>Field must not be emoty!</span>"; }
else{
$query = "UPDATE social_media
              SET facebook='$fb',
                  twitter ='$tw',
                  linkedin='$ld',
                  googlepluss='$gp'
                  
                  WHERE id='1'";
    $inserted_rows = $db->update($query);
    if ($inserted_rows) {
     echo "<span class='success'>Data Updated Successfully.
     </span>";
    }else {
     echo "<span class='error'>Data Not Updated !</span>";
    }
}

}
?>


                <?php 
                                  $sql="SELECT *FROM social_media WHERE id=1";
                                  $result=$db->select($sql);
                                  if($result){
                                  $value=$result->fetch_assoc()
                                ?>
                              
                <div class="block">

                 <form action="" method="POST">
                    <table class="form">					
                        <tr>
                            <td>
                                <label>Facebook</label>
                            </td>
                            <td>
                                <input type="text" name="facebook" value="<?php echo $value['facebook'];?>" class="medium" />
                            </td>
                        </tr>
						 <tr>
                            <td>
                                <label>Twitter</label>
                            </td>
                            <td>
                                <input type="text" name="twitter"  value="<?php echo $value['twitter'];?>" class="medium" />
                            </td>
                        </tr>
						
						 <tr>
                            <td>
                                <label>LinkedIn</label>
                            </td>
                            <td>
                                <input type="text" name="linkedin"  value="<?php echo $value['linkedin'];?>"class="medium" />
                            </td>
                        </tr>
						
						 <tr>
                            <td>
                                <label>Google Plus</label>
                            </td>
                            <td>
                                <input type="text" name="googleplus"  value="<?php echo $value['googlepluss'];?>" class="medium" />
                            </td>
                        </tr>
						
						 <tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Update" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            <?php } ?>
            </div>
        </div>
         <?php include 'inc/footer.php';?>
