<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php
 if(!isset($_GET['pageid'])||$_GET['pageid']==NULL){
    echo "<script>window.location=index.php</script>";
 }

 else{

$pageid=$_GET['pageid'];
 }




?>

<style type="text/css">
 .actiondel{
margin-left:10px;}
.actiondel a{
    border: 1px solid #ddd;
    color: #444;
    cursor: pointer;
    font-size: 20px;
    padding: 2px 10px;
    font-weight: normal;
    background: #ddd;  } 

</style>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Update Post</h2>
<?php
 if($_SERVER['REQUEST_METHOD']=='POST'){
$name=mysqli_real_escape_string($db->link,$_POST['name']);
$body=mysqli_real_escape_string($db->link,$_POST['body']);



   

    if($name==""||$body==""){  echo "<span class='error'>Field must not be empty!</span>"; }

else{

    $query = "UPDATE pages
              SET name='$name',
                  body ='$body'
                  
                  WHERE id=$pageid";
    $inserted_rows = $db->update($query);
    if ($inserted_rows) {
     echo "<span class='success'>Page Updated Successfully.
     </span>";
    }else {
     echo "<span class='error'>Page Not Updated !</span>";
    }
    }



    
   }

 


  ?>











                <div class="block"> 
                   <?php
$sql="SELECT * FROM pages WHERE id='$pageid'";
$result=$db->select($sql); 
if($result){
    $raw=$result->fetch_assoc();

?>


                 <form action="" method="POST" >
                    <table class="form">
                       
                        <tr>
                            <td>
                                <label>Page Name</label>
                            </td>
                            <td>
                                <input type="text"name="name"value="<?php echo $raw['name'];?>" class="medium"/>
                            </td>
                        </tr>

                   
                    
                        
                       
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Content</label>
                            </td>
                            <td>
                                <textarea name="body"class="tinymce"><?php echo $raw['body'];?></textarea>
                            </td>
                        </tr>


                          


                          



						<tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Update"/>
                                <span class="actiondel"><a href="delpage.php?pageid=<?php echo $raw['id']; ?>" onclick="return confirm('Are you sure to delete!');" >Delete</a> </span>
                            </td>
                        </tr>
                    </table>
                    </form>
<?php }  ?>

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
