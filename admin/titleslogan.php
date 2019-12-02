<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

 
<style type="text/css">
    .leftside{
  float:left;
  width:70%;  
    }
    .rightside{
         float:left;
         width:20%; 
    }
    .rightside img{ height: 160px;width: 170px; }

</style>




        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Update Site Title and Description</h2>
                                        
                 <?php
                  if($_SERVER['REQUEST_METHOD']=='POST'){
                $title=mysqli_real_escape_string($db->link,$_POST['title']);
                $slogan=mysqli_real_escape_string($db->link,$_POST['slogan']);
                
                   
                    $permited  = array('png');
                    $file_name = $_FILES['logo']['name'];
                    $file_size = $_FILES['logo']['size'];
                    $file_temp = $_FILES['logo']['tmp_name'];

                    $div = explode('.', $file_name);
                    $file_ext = strtolower(end($div));
                    $same_image = 'logo'.'.'.$file_ext;
                    $uploaded_image = "uploads/".$same_image;


                    if($title==""||$slogan==""){  echo "<span class='error'>Field must not be emoty!</span>"; }


     
else{
     if (!empty( $file_name )) {
      

     if (in_array($file_ext, $permited) === false) {
     echo "<span class='error'>You can upload only:-"
     .implode(', ', $permited)."</span>";
    }

     else{
       
    move_uploaded_file($file_temp, $uploaded_image);
    $query = "UPDATE title_slogan
              SET title='$title',
                  slogan ='$slogan',
                  logo='$uploaded_image'
                  
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

   else{
   $query = "UPDATE title_slogan
              SET title='$title',
                  slogan ='$slogan'
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
}


            
            ?>

                     

           
                                <?php 
                                  $sql="SELECT *FROM title_slogan WHERE id=1";
                                  $result=$db->select($sql);
                                  if($result){
                                  $value=$result->fetch_assoc()
                                ?>
                              
 <div class="block sloginblock"> 
               <div class="leftside">


                 <form   action="" method="POST" enctype="multipart/form-data">
                    <table  class="form">					
                        <tr>
                            <td>
                                <label>Website Title</label>
                            </td>
                            <td>
                                <input type="text" value="<?php echo $value['title'];?>" name="title" class="medium" />
                            </td>
                        </tr>
						 <tr>
                            <td>
                                <label>Website Slogan</label>
                            </td>
                            <td>
                                <input type="text" value="<?php echo $value['slogan'];?>"  name="slogan" class="medium" />
                            </td>
                        </tr>

                         <tr>
                            <td>
                                <label>Website Logo</label>
                            </td>
                            <td>
                               
                                <input type="file" name="logo" />
                            </td>
                        </tr>
						 
						
						 <tr>
                            <td>
                            </td>
                            <td>
                                <input type="submit" name="submit" Value="Update" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>

                <div class="rightside">

                  
                    <img src="<?php echo $value['logo'];?>" alt="logo">
               
                </div>
                </div>
 <?php } ?>

            </div>
        </div>
        <?php include 'inc/footer.php';?> 