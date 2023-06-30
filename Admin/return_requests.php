<?php
$conn=mysqli_connect('localhost','root','','bookscenter');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Pengembalian</title>
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
                        <a class="text-black nav-link dropdown-toggle" href="" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
                <div class="row">
                    <div class="span9">
                        <a href="index.php" class="text-muted text-decoration-none">Home</a> /
                        <a href="return_requests.php" class="active text-decoration-none text-black">Pengembalian</a>
                        <h4 class="mt-3">Return Requests</h4>
                        <table class="table" id = "tables">
                                  <thead>
                                    <tr style="background-color: #29A867;">
                                      <th>Id Anggota</th>
                                      <th>Id Buku</th>
                                      <th>Judul Buku</th>
                                      <th></th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php
                            $sql="select pengembalian.id_buku,pengembalian.id_anggota,Judul_buku,datediff(curdate(),Batas_waktu) as x from pengembalian,buku,peminjaman where pengembalian.id_buku=buku.Id_buku and pengembalian.id_buku=peminjaman.id_buku and pengembalian.id_anggota=peminjaman.id_anggota";
                            $result=$conn->query($sql);
                            while($row=$result->fetch_assoc())
                            {
                                $bookid=$row['id_buku'];
                                $rollno=$row['id_anggota'];
                                $name=$row['Judul_buku']; 
                            ?>
                                    <tr>
                                      <td><?php echo strtoupper($rollno) ?></td>
                                      <td><?php echo $bookid ?></td>
                                      <td><b><?php echo $name ?></b></td>
                                      <td>
                                        <center>                                     
                                        <a href="acceptreturn.php?id1=<?php echo $bookid; ?>&id2=<?php echo $rollno; ?>" class="btn btn-success">Accept</a>
                                        </center></td>
                                    </tr>
                               <?php } ?>
                               </tbody>
                        </table>
                    </div>
                    <!--/.span3-->
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