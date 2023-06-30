<?php
$conn=mysqli_connect('localhost','root','','bookscenter');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Book Details</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="icon" href="img/logo.png" type = "image/x-icon">
    </head>
    <body>
    <nav class="navbar navbar-expand-lg mb-4 mt-4">
        <div class="container">
          <a alt="cek" href = "/"><img src="img/image 14.png"></a>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav w-100 d-flex justify-content-end">
                <li class="nav-item">
                    <a class="nav-link text-black" aria-current="page" href="index.php">Home</a>
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
                    <a class="nav-link dropdown-toggle" href="" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
    <div class="container">
            <a href="book.php" class="text-muted text-decoration-none">All Book</a> /
            <a href="bookdetails.php" class="active text-decoration-none text-black">Book Details</a>
            <!--/.span9-->
             <div class="span9">
              <div class="container mt-4" style="background-color: #F5F6F9; border-top-left-radius: 20px; border-top-right-radius: 20px; border-bottom-left-radius: 20px; border-bottom-right-radius: 20px;">
                <br >
                  <div class="row p-5">
                  <div class="col-md-7 pt-2 d-flex justify-content-center">
                  <img src="img/bookcenter.jpg" alt="" width="295px" height="396px">
                  </div>
                  <div class="col-md-5 pt-3">
                  <?php
                            $x=$_GET['id'];
                            $sql="select * from buku where Id_buku='$x'";
                            $result=$conn->query($sql);
                            $row=$result->fetch_assoc();    
                            
                                $bookid=$row['Id_buku'];
                                $name=$row['Judul_buku'];
                                $publisher=$row['Penerbit'];
                                $year=$row['Tahun'];
                                $avail=$row['Jml_tersedia'];

                                echo "<b>Book ID:</b> ".$bookid."<br><br>";
                                echo "<b>Judul buku:</b> ".$name."<br><br>";
                                $sql1="select * from penulis where Id_buku='$bookid'";
                                $result=$conn->query($sql1);
                                
                                echo "<b>Penulis:</b> ";
                                while($row1=$result->fetch_assoc())
                                {
                                    echo $row1['Nama']."&nbsp;";
                                }
                                echo "<br><br>";
                                echo "<b>Penerbit:</b> ".$publisher."<br><br>";
                                echo "<b>Tahun:</b> ".$year."<br><br>";
                                echo "<b>Tersedia:</b> ".$avail."<br><br>";
                            ?> 
                  </div>
              </div>
              <!--/.content-->
             </div>
         </div>
         </div>
        <!-- /navbar -->
        <footer class="border-top footer mt-5">
        <div class="d-flex justify-content-center mt-3">
          <p> Book Center Copyright 2022</p>
        </div>
        </footer>
        <!--/.wrapper-->
        <script src="js/bootstrap.bundle.min.js"></script>
    </body>
</html>