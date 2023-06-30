<?php
$conn=mysqli_connect('localhost','root','','bookscenter');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Agenda</title>
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
                <a href="current.php" class="active text-decoration-none text-black">Agenda</a>
                <div class="row">
                    <div class="span9">
                        <form class="form-horizontal row-fluid" action="current.php" method="post">
                                        <div class="control-group">
                                            <label class="control-label" for="Search"><b>Search:</b></label>
                                            <div class="controls">
                                                <input type="text" id="title" name="title" placeholder="Enter Roll No of Student/Book Name/Book Id." class="span8" required>
                                                <button type="submit" name="submit"class="btn btn-outline-success text-white Button px-4 ms-4">Search</button>
                                            </div>
                                        </div>
                                    </form>
                                    <br>
                                    <?php
                                    if(isset($_POST['submit']))
                                        {$s=$_POST['title'];
                                        $sql="select peminjaman.id_buku,id_anggota,Judul_buku,Batas_waktu,Tgl_pinjam,datediff(curdate(),Batas_waktu) as x from peminjaman, buku where (Tgl_pinjam is NOT NULL and Tgl_pengembalian is NULL and buku.Id_buku = peminjaman.id_buku) and (Id_anggota='$s' or peminjaman.id_buku='$s' or Judul_buku like '%$s%')";
                                        }
                                    else
                                    $sql="select peminjaman.id_buku,id_anggota,Judul_buku,Batas_waktu,Tgl_pinjam,datediff(curdate(),Batas_waktu) as x from peminjaman, buku where Tgl_pinjam is NOT NULL and Tgl_pengembalian is NULL and buku.Id_buku = peminjaman.id_buku";
                                    $result=$conn->query($sql);
                                    $rowcount=mysqli_num_rows($result);
                                    if(!($rowcount))
                                        echo "<br><center><h2><b><i>No Results</i></b></h2></center>";
                                    else
                                    {
                                  ?>
                        <table class="table" id = "tables">
                                  <thead style="background-color: #29A867;">
                                    <tr>
                                      <th>Roll No</th>  
                                      <th>Book id</th>
                                      <th>Book name</th>
                                      <th>Issue Date</th>
                                      <th>Due date</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                <?php
                            //$result=$conn->query($sql);
                            while($row=$result->fetch_assoc())
                            {
                                $rollno=$row['id_anggota'];
                                $bookid=$row['id_buku'];
                                $name=$row['Judul_buku'];
                                $issuedate=$row['Tgl_pinjam'];
                                $duedate=$row['Batas_waktu'];
                            ?>

                                    <tr>
                                      <td><?php echo strtoupper($rollno) ?></td>
                                      <td><?php echo $bookid ?></td>
                                      <td><?php echo $name ?></td>
                                      <td><?php echo $issuedate ?></td>
                                      <td><?php echo $duedate ?></td>
                                    </tr>
                            <?php }
                        } ?>
                                    </tbody>
                        </table>
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