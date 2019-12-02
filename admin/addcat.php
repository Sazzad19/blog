<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>



        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Add New Category</h2>
               <div class="block copyblock"> 
                <?php if($_SERVER['REQUEST_METHOD']=='POST'){
                $name=$_POST["name"];

if(empty($name)){
    echo "<span class='error'>Field must not be emoty!</span>";
}
else{


               
                $sql="INSERT INTO category VALUES(NULL,'$name')";
                $result=$db->insert($sql);

                if($result){
                    echo "<span class='success'>Category is added successfully!</span>";
                }
                else{
                     echo "<span class='error'>Category is not inserted!</span>";
                }

}


} ?>



                 <form action="addcat.php" method="POST">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" placeholder="Enter Category Name..." name="name"class="medium" />
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