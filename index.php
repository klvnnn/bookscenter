<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="img/image 14.png" type = "image/x-icon">
    <title>Sign In</title>
</head>
<body>
    <div class="container mb-5">
        <div class="row mt-5 p-5">
            <div class="col-md-7 mt-5 pt-2 d-flex justify-content-center">
                <img src="img/bookcenter.jpg" alt="" width="295px" height="396px">
            </div>
            <div class="col-md-5">
                <h2 class="mb-5">Welcome To Book's Center</h2>
                <div class="col-8">
                    <form action="index.php" method="POST">
                        <div class="mb-3">
                            <label type="input" class="form-label">Id</label>
                            <input type="text" name="Id_anggota" class="form-control form Button-Up">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input type="password" name="Password" class="form-control Button-Up" id="exampleInputPassword1">
                        </div>
                        <div class="d-grid gap-2">
                            <input type="submit" name="signin"; class="btn btn-outline-success text-white Button mt-4" value="Sign In To My Account">
                            <button class="btn Button-Up mt-2"><a href="register.php" class="text-decoration-none text-dark"> Sign Up</a></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <footer class="border-top footer" style="bottom: 0px; position:absolute; width:100%;">
        <div class="d-flex justify-content-center mt-3">
          <p> Book Center Copyright 2022</p>
        </div>
    </footer>
    <!-- javascript -->
    <script src="js/bootstrap.min.js"></script>

<?php
if(isset($_POST['signin']))
{
    $conn=mysqli_connect('localhost','root','','bookscenter');
    $id=$_POST['Id_anggota'];
    $password=$_POST['Password'];

    $sql= "SELECT *from anggota where Id_anggota='$id'";

    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $x = $row['Password'];
    $y = $row['Username'];

    if(strcasecmp($x, $password)==0 && !empty($id) && !empty($password))
    {
        //echo "Login Berhasil";
        $_SESSION['Id_anggota']=$id;
        
        if($y=='admin')
            header('location:admin/index.php');
        else
            header('location:pengguna/index.php');
    }
    else {
        echo "<script type='text/javascript'>alert('Gagal Login! Id atau Password Salah')</script>";
    }
}
?>
</body>
</html>