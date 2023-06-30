<?php
session_start();
$conn=mysqli_connect('localhost','root','','bookscenter');
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
        <title>Book's</title>
    </head>
    <body>
    <nav class="navbar navbar-expand-lg mb-4 mt-4">
        <div class="container">
          <a alt="cek" href = "/"><img src="img/image 14.png"></a>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav w-100 d-flex justify-content-end">
                <li class="nav-item">
                    <a class="nav-link " aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Books
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark">
                        <li><a class="dropdown-item" href="book.php">All Books</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="text-black nav-link dropdown-toggle" href="" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Request
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark">
                        <li><a class="dropdown-item" href="recommendations.php">Recommend Books</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="img/user.png" class="nav-avatar" />
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark">
                        <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                    </ul>
                </li>
              </ul>
          </div>
        </div>
    </nav>
        <!-- /navbar -->
        <div class="container">
            <a href="index.php" class="text-muted text-decoration-none">Home</a> /
            <a href="recommendations.php" class="active text-decoration-none text-black">Recommendation</a>
            <!--/.span9-->
             <div class="span9">
              <div class="container mt-4" style="background-color: #F5F6F9; border-top-left-radius: 20px; border-top-right-radius: 20px; border-bottom-left-radius: 20px; border-bottom-right-radius: 20px;">
                <br >
                  <div class="row p-5 mb-5">
                  <div class="col-md-7 mt-5 d-flex justify-content-center">
                  <img src="img/bookcenter.jpg" alt="" width="295px" height="396px">
                  </div>
                  <div class="col-md-5 pt-5 mt-5">
                    <form class="form-horizontal row-fluid" action="recommendations.php" method="post">
                            <div class="control-group">
                                <label class="form-label" for="Title"><b>Book Title</b></label>
                                <div class="controls">
                                    <input type="text" id="title" name="title" placeholder="Title" class="form-control form Button-Up" required>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="form-label" for="Description"><b>Description</b></label>
                                <div class="controls">
                                    <input type="text" id="Description" name="Description" placeholder="Description" class="form-control form Button-Up" required>
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="controls mt-3">
                                    <button type="submit" name="submit"class="btn btn-primary">Submit Recommendation</button>
                                </div>
                            </div>
                    </form>
                    </div>
                    </div>
              <!--/.content-->
             </div>
         </div>
        </div>
        <footer class="border-top footer">
        <div class="d-flex justify-content-center mt-3">
          <p> Book Center Copyright 2022</p>
        </div>
        </footer>
        <!--/.wrapper-->
        <script src="js/bootstrap.bundle.min.js"></script>

<?php
if(isset($_POST['submit']))
{
    $title=$_POST['title'];
    $Description=$_POST['Description'];
    $rollno=$_SESSION['RollNo'];

    $sql1="insert into rekomendasi_buku (Judul_buku,deskripsi,Id_anggota) values ('$title','$Description','$rollno')"; 


if($conn->query($sql1) === TRUE){


echo "<script type='text/javascript'>alert('Success')</script>";
}
else
{//echo $conn->error;
echo "<script type='text/javascript'>alert('Error')</script>";
}
    
}
?> 
    </body>
</html>
