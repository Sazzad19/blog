<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

<?php
 if(!isset($_GET['replyid'])||$_GET['replyid']==NULL){
    echo "<script>window.location=inbox.php</script>";
 }

 else{

$replyid=$_GET['replyid'];

 }

 ?>

        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Reply</h2>
<?php

 if($_SERVER['REQUEST_METHOD']=='POST'){
    $fm=new format();
  $to=$fm->validation($_POST['toEmail']);
  $from=$fm->validation($_POST['fromEmail']);
  $subject=$fm->validation($_POST['subject']);
  $message=$fm->validation($_POST['message']);
  $sendmail=mail($to, $subject, $message,$from);
  if($sendmail){
      echo "<span class='success'>Message Sent Successfully</span>";

  }
  else{
      echo "<span class='error'>Message Sent Failed!</span>";

  }

   }

  ?>











                <div class="block">               
                 <form action="" method="POST" >
			                  
					                   <?php
					$sql="SELECT * FROM contact WHERE id='$replyid'";
					$result=$db->select($sql); 
					if($result){
					    $raw=$result->fetch_assoc();

					?>

                    <table class="form">
                       
                        <tr>
                            <td>
                                <label>To</label>
                            </td>
                            <td>
                                <input type="text" name="toEmail" value="<?php echo $raw['email']; ?>" class="medium"/>
                            </td>
                        </tr>
                     
                    <tr>
                            <td>
                                <label>From</label>
                            </td>
                            <td>
                                <input type="text" name="fromEmail" placeholder="Please Enter Valid Email" class="medium" />
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label>Subject</label>
                            </td>
                            <td>
                                <input type="text" name="subject" placeholder="Please Enter Subject" class="medium" />
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label>Message</label>
                            </td>
                            <td>
                                <textarea type="text"  class="tinymce" name="message" ></textarea>
                            </td>
                        </tr>
                    
                       
                     <?php } ?>

                          

						<tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Send" />
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
