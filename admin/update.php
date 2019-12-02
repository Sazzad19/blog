<?php include('../lib/Database.php');?>
<?php 
if($_SERVER['REQUEST_METHOD']=='POST'){
         $name=$_POST["name"];

if(empty($name)){
    echo "<span class='error'>Field must not be emoty!</span>";
}
else{
     $db=new Database();
    $id=$_GET['catid'];


                
                $sqla="UPDATE catEgory SET name='$name' WHERE id='$id'";
                $result=$db->update($sqla);

                if($result){
                   header('location:catlist.php');
                }
                else{
                     echo "<span class='error'>CatEgory not updated!</span>";
                }

}


} ?>

