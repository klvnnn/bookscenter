<?php
if(isset($_POST['signup']))
{   
    $conn=mysqli_connect('localhost','root','','bookscenter');
	$nama=$_POST['Nama'];
	$email=$_POST['Email'];
	$password=$_POST['Password'];
	$notlp=$_POST['NoTlp'];
	$id=$_POST['Id_anggota'];
	$username='Student';

    $sql="insert into user (Email, Nama, NoTlp) values ('$email','$nama','$notlp')";
    $query=mysqli_query($conn, $sql);

    if($query){
        $sql2="insert into anggota (Username,Id_anggota,Email,NoTlp,Password) values ('$username','$id','$email','$notlp','$password')";
        $result=mysqli_query($conn, $sql2);
        header("Location: index.php");
        echo 'Berhasil di submit';
    } else {
        echo 'Gagal Error';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="img/image 14.png" type = "image/x-icon">
    <title>Register</title>
</head>
<body>
    <div class="container mb-5">
        <div class="row mt-5 p-5">
            <div class="col-md-7 mt-5 pt-2 d-flex justify-content-center">
                <img src="img/bookcenter.jpg" alt="" width="295px" height="396px">
            </div>
            <div class="col-md-5">
                <h2 class="">Register Your Account</h2>
                <div class="col-8">
                    <form action="register.php" method="POST">
                        <div class="mb-3">
                            <label type="input" class="form-label">Full Name</label>
                            <input type="text" name="Nama" class="form-control form Button-Up">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email Address</label>
                            <input type="email" name="Email" class="form-control form Button-Up" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input type="password" name="Password" class="form-control Button-Up" id="exampleInputPassword1">
                        </div>
                        <div class="mb-3">
                            <label type="input" class="form-label">No.Tlp</label>
                            <input type="text" name="NoTlp" class="form-control form Button-Up">
                        </div>
                        <div class="mb-3">
                            <label type="input" class="form-label">Id</label>
                            <input type="text" name="Id_anggota" class="form-control form Button-Up">
                        </div>
                        <div class="d-grid gap-2">
                            <input type="submit" name="signup"; class="btn btn-outline-success text-white Button mt-4" value="Sign Up Now">
                            <!-- Btn Back To sign -->
                            <button class="btn Button-Up mt-2"><a href="index.php" class="text-decoration-none text-dark"> Back To Sign In</a></button>
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
</body>
</html>

