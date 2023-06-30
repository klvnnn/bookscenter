<?php
$conn=mysqli_connect('localhost','root','','bookscenter');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Books Recommendations</title>
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
                        <a class="text-black nav-link dropdown-toggle" href="" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
                            <li><a class="dropdown-item" href="biodata.php">Your Profile</a></li>
                            <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            </div>
    </nav>
        <!-- /navbar -->
        <div class="wrapper">
            <div class="container">
                <a href="index.php" class="text-muted text-decoration-none">Home</a> /
                <a href="recommendations.php" class="active text-decoration-none text-black">Recommendations</a>
                <div class="row mt-4">
                    <div class="span9">
                        <table class="table" id = "tables">
                            <thead style="background-color: #29A867;">
                             <tr>
                               <th>Book Name</th>
                               <th>Description</th>
                               <th>Recommended By</th>
                             </tr>
                            </thead>
                            <tbody>
                            <?php
                            $sql="select * from rekomendasi_buku";
                            $result=$conn->query($sql);
                            while($row=$result->fetch_assoc())
                            {
                                $bookname=$row['Judul_buku'];
                                $description=$row['Deskripsi'];
                                $rollno=$row['Id_anggota'];
                            ?>
                                    <tr>
                                      <td><?php echo $bookname ?></td>
                                      <td><?php echo $description?></td>
                                      <td><?php echo strtoupper($rollno)?></td>
                                    </tr>
                               <?php } ?>
                            </tbody>
                        </table>
                        <center>
                        <a href="addbook.php" class="btn btn-primary">Add a Book</a>
                        </center>
                    </div>
                    <!--/.span9-->
                </div>
            </div>
            <!--/.container-->
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