<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Update Copyright Text</h2>
                <div class="block copyblock"> 
<?php
                  if($_SERVER['REQUEST_METHOD']=='POST'){
        $copyright=mysqli_real_escape_string($db->link,$_POST['copyright']);
           

if($copyright==""){  echo "<span class='error'>Field must not be emoty!</span>"; }
else{
$query = "UPDATE copyright
              SET copy='$copyright'
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
$sql="SELECT * FROM copyright;";
$result=$db->select($sql);
if($result){
while($value=$result->fetch_assoc()){
?>
                     <form action="" method="POST">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" value="<?php echo $value['copy']; ?>" name="copyright" class="large" />
                            </td>
                        </tr>
						
						 <tr> 
                            <td>
                                <input type="submit" name="submit" Value="Update" />
                            </td>
                        </tr>
                    </table>
<?php
 } }
?>
                    </form>
                </div>
            </div>
        </div>
 <?php include 'inc/footer.php';?> 