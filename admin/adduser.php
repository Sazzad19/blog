<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>



        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Add New User</h2>
               <div class="block copyblock"> 
                <?php
                 if($_SERVER['REQUEST_METHOD']=='POST'){
                $username=$_POST["username"];
                $email=$_POST["email"];
                $details=$_POST["details"];
                $password=$_POST["password"];
                $role=$_POST["role"];

  if(empty($username)||empty($email)||empty($details)||empty($password)||empty($role)){
  echo "<span class='error'>Field must not be emoty!</span>";
}
else{


             
                $sql="INSERT INTO users VALUES(NULL,'$username','$email','$details','$password','$role')";
                $result=$db->insert($sql);

                if($result){
                    echo "<span class='success'>User is created successfully!</span>";
                }
                else{
                     echo "<span class='error'>User is not created!</span>";
                }

}


} ?>



                 <form action="" method="POST">
                    <table class="form">					
                        <tr>
                              <td>
                              <label>Username</label>
                            </td>
                            <td>
                                <input type="text" placeholder="Enter Username..." name="username"class="medium" />
                            </td>
                        </tr>

                           <tr>
                              <td>
                              <label>Email</label>
                            </td>
                            <td>
                                <input type="text" placeholder="Enter Email..." name="email"class="medium" />
                            </td>
                        </tr>

                           <tr>
                              <td>
                              <label>Details</label>
                            </td>
                            <td>
                                <textarea name="details"class="medium" ></textarea>
                            </td>
                        </tr>
                         <tr>

                              <td>
                              <label>Password</label>
                            </td>
                            <td>
                                <input type="text" name="password" placeholder="Enter Password..." class="medium" />
                            </td>
                        </tr>


                       <tr>
                        <td>
                              <label> User Role</label>
                            </td>

                            <td>
                               <select id="select" name="role">
                                   
                                <option> Select User Role</option>
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
                </div>
            </div>
        </div>
       <?php include 'inc/footer.php';?> 