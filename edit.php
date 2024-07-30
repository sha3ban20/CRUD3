<?php 
include"db_conn.php";
$id =$_GET['id'];

if(isset($_POST['submit'])){
   $frist_name =$_POST['frist_name'];
   $last_name =$_POST['last_name'];
   $email =$_POST['email'];
   $gender =$_POST['gender'];
   

   $sql="UPDATE crud SET frist_name='[$frist_name]',
   last_name='[last_name]',email='[$email]',gender='[$gender]' WHERE id =$id";

   $result= mysqli_query($conn,$sql);


   if($result){
    header("Location: add_new.php?msg=Data Update successfully");
   }
   else{echo"failed: ".mysqli_error($conn);}
   
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
     integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
     crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>PHP CRUD APPlaction</title>
  </head>
  <body>
    <nav class="navbar navbar-lihght justify-content-center fs-3 mb-5"
     style="background-color: #00ff5573;">
        PHP Complete CRUD APPclation
    </nav>
    <div class="container">
        <div class="text-center mp-4">
            <h3>Edit User Information</h3>
            <p class="text-muted">Click update after changing any information</p>
        </div>
        <?php
        $sql = "SELECT *FROM CRUD where id= $id LIMIT 1";
        $result =mysqli_query($conn,$sql);
        $row =mysqli_fetch_assoc($result);
        ?>

        <div class="container d-flex justify-content-center">
            <form action="" method="post" style="width: 50vw; min-width:300px;" >
                <div class="row mp-3">
                    <div class="col">
                        <label class="form-laple">Frist Name:</label>
                        <input type="text" class="form-control" name="frist_name" value="<?php echo $row['frist_name'] ?>">
                    </div>

                    <div class="col">
                        <label class="form-laple">Last Name:</label>
                        <input type="text" class="form-control" name="last_name" value="<?php echo $row['last_name'] ?>">
                    </div>
                 </div>

                 <div class="mp-3">
                    <label class="form-laple">Email:</label>&nbsp;
                    <input type="email" class="form-control" name="email" value="<?php echo $row['email'] ?>">

                 </div>
                 <div class="form-group mp-3">
                    <label>Gender:</label> &nbsp;
                    <input type="radio" class="form-check-input" name="gender"
                     id="male" value="male" <?php echo($row['gender']=='male')?
                     "checked":"";?>>
                    <label for="male" class="form-inpur-lable" >male</label>
                    

                    &nbsp;
                    <input type="radio" class="form-check-input" name="gender"
                     id="female" value="female" <?php echo($row['gender']=='female')?
                     "checked":"";?>>
                    <label for="male" class="form-inpur-lable" >female</label>
                 </div>
                 <div>
                    <button type="submit" class="btn btn-success" name="submit">Update</button>
                    <a href="add_new.php" class="btn btn-danger">Cancel</a>
                 </div>




            </form>

        </div>


    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
     integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
