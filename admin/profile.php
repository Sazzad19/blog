<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

<?php
$userid=Session::get('userid');
$userrole=Session::get('userrole');
?>




        <div class="grid_10">
    
            <div class="box round first grid">
                <h2>Update User</h2>
               <div class="block copyblock"> 
        
<?php

                if($_SERVER['REQUEST_METHOD']=='POST'){
         $username=$_POST["username"];
           $email=$_POST["email"];
           $details=$_POST["details"];
           $role=$_POST["role"];
            $password=$_POST["password"];


if(empty($username)||empty($email)||empty($details)||empty($role)||empty($password)){
    echo "<span class='error'>Field must not be emoty!</span>";
}
else{

  


                
                $sql="UPDATE users
                 SET username='$username',
                     email='$email',
                     details='$details',
                     role='$role',
                     password='$password'

                  WHERE id='$userid' AND role='$userrole'";
                $result=$db->update($sql);

                if($result){
                   echo "<span class='success'>Updated</span>";
                }
                else{
                     echo "<span class='error'>CatEgory not updated!</span>";
                }

}


} 

                $sql="SELECT * FROM users WHERE id='$userid' AND role='$userrole'";
                $user=$db->select($sql);
                if($user){
               while( $value=$user->fetch_assoc()){


?>


                
                 <form action="" method="POST">
                    <table class="form">          
                        <tr>
                              <td>
                              <label>Username</label>
                            </td>
                            <td>
                                <input type="text" value="<?php echo $value['username'];?>" name="username"class="medium" />
                            </td>
                        </tr>

                           <tr>
                              <td>
                              <label>Email</label>
                            </td>
                            <td>
                                <input type="text" value="<?php echo $value['email'];?>" name="email"class="medium" />
                            </td>
                        </tr>

                           <tr>
                              <td>
                              <label>Details</label>
                            </td>
                            <td>
                                <textarea name="details"class="medium" ><?php echo $value['details'];?></textarea>
                            </td>
                        </tr>
                         <tr>

                              <td>
                              <label>Password</label>
                            </td>
                            <td>
                                <input type="text" name="password" value="<?php echo $value['password'];?> "class="medium" />
                            </td>
                        </tr>


                       <tr>
                        <td>
                              <label> User Role</label>
                            </td>

                            <td>
                               <select id="select" name="role">
                                   
                                <option value="<?php echo $userrole;?>" selected>

                                <?php if($userrole==0)
                            echo "Admin";
                            elseif($userrole==1)
                              echo"Author";
                        elseif($userrole==2)
                              echo"Editor";

                            ?></option>
                                <option value="0">Admin</option>
                                <option value="1">Author</option>
                                 <option value="2">Editor</option>
                                


                               </select>
                            </td>
                        </tr>
                         
                        

            <tr> 
                            <td>
                                <input type="submit" name="submit" Value="Create" />
                            </td>
                        </tr>
                    </table>
                    </form>
                  <?php } }?>
                </div>
            </div>
        </div>
       <?php include 'inc/footer.php';?> 