<?php
$conn=mysqli_connect('localhost','root','','bookcenter');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Profile</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="icon" href="img/logo.png" type = "image/x-icon">
    </head>
    <body>
    <nav class="navbar navbar-expand-lg mb-4 mt-4">
        <div class="container">
          <a alt="cek" href = "/"><img src="img/logo.png"></a>
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
                        <li><a class="dropdown-item" href="addbook.php">Add Books</a></li>
                        <li><a class="dropdown-item" href="recommendations.php">Book Recomendations</a></li>
                        <li><a class="dropdown-item" href="current.php">Agenda</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Request
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark">
                        <li><a class="dropdown-item" href="issue_requests.php">Peminjaman</a></li>
                        <li><a class="dropdown-item" href="return_requests.php">Pengembalian</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="img/user.png" class="nav-avatar" />
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark">
                        <li><a class="dropdown-item" href="index.php">Your Profile</a></li>
                        <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                    </ul>
                </li>
              </ul>
          </div>
        </div>
    </nav>
        <div class="wrapper">
            <div class="container">
                <a href="index.php" class="text-muted text-decoration-none">Home</a> /
                <a href="biodata.php" class="active text-decoration-none text-black">Profile</a>
                <div class="row">
                    <div class="span9">
                        <center>
                            <div class="card"> 
                                <img class="card-img-top" src="img/profile2.png" alt="Card image cap">
                                <div class="card-body">
                                <?php
                                if  (isset($_SESSION['Id']))
                                ?>
                                <?php
                                    $sql="select * from anggota where Id_anggota='Id'";
                                    $result=$conn->query($sql);
                                    while($row=$result->fetch_assoc())
                                    {
                                        $email=$row['Email'];
                                        $mobno=$row['MobNo'];
                                        ?>    
                                        <i>
                                            <h1 class="card-title"><center><?php echo $email ?></center></h1>
                                            <br>
                                            <p><b>Mobile number: </b><?php echo $mobno ?></p>
                                        </i>
                                        <?php
                                    }
                                ?>
                                </div>
                            </div>
                        <br>
                        </center>               
                    </div>
                </div>
            </div>
        </div>
        <footer class="border-top footer mt-5">
        <div class="d-flex justify-content-center mt-3">
          <p> Book Center Copyright 2022</p>
        </div>
        </footer>
        <!--/.wrapper-->
        <script src="js/bootstrap.bundle.min.js"></script>
    </body>
</html>