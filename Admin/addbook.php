<?php
$conn=mysqli_connect('localhost','root','','bookscenter');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Add Books</title>
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
    <!-- Navbar End -->
         <div class="container">
            <a href="index.php" class="text-muted text-decoration-none">Home</a> /
            <a href="addbook.php" class="active text-decoration-none text-black">Add Book</a>
            <!--/.span9-->
             <div class="span9">
              <div class="container mt-4" style="background-color: #F5F6F9; border-top-left-radius: 20px; border-top-right-radius: 20px; border-bottom-left-radius: 20px; border-bottom-right-radius: 20px;">
                <br >
                  <div class="row p-5">
                  <div class="col-md-7 mt-5 pt-2 d-flex justify-content-center">
                  <img src="img/bookcenter.jpg" alt="" width="295px" height="396px">
                  </div>
                  <div class="col-md-5 pt-3">
                    <form class="form-horizontal row-fluid" action="addbook.php" method="post">
                            <div class="control-group">
                                <div class="mb-3">
                                    <label class="form-label" for="Title"><b>Book Title</b></label>
                                    <div class="controls">
                                        <input type="text" id="title" name="title" placeholder="Ex Sejarah" class="form-control form Button-Up" required>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="Author"><b>Author</b></label>
                                    <div class="controls">
                                        <input type="text" id="author" name="author" placeholder=" Ex Klvnn"  class="form-control form Button-Up" required>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="Publisher"><b>Publisher</b></label>
                                    <div class="controls">
                                        <input type="text" id="publisher" name="publisher" placeholder="Publisher" class="form-control form Button-Up" required>
                                    </div>
                                </div>
                                <div class="mb-3">
                                <label class="form-label" for="Year"><b>Year</b></label>
                                <div class="controls">
                                    <input type="text" id="year" name="year" placeholder="Year" class="form-control form Button-Up" required>
                                </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="Availability"><b>Number of Copies</b></label>
                                    <div class="controls">
                                        <input type="text" id="availability" name="availability" placeholder="Number of Copies" class="form-control form Button-Up" required>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="controls mt-3">
                                        <button type="submit" name="submit"class="btn btn-primary">Add Book</button>
                                    </div>
                                </div>
                            </div>
                    </form>
                  </div>
                  
              </div>
              <!--/.content-->
             </div>
         </div>
        </div>
         <!--/.container-->
        <footer class="border-top footer mt-5">
        <div class="d-flex justify-content-center mt-3">
          <p> Book Center Copyright 2022</p>
        </div>
        </footer>
    <!-- Isi End -->
        <script src="js/bootstrap.bundle.min.js"></script>
<?php
if(isset($_POST['submit']))
{
    $title=$_POST['title'];
    $author=$_POST['author'];
    $publisher=$_POST['publisher'];
    $year=$_POST['year'];
    $availability=$_POST['availability'];

$sql1="insert into buku (Judul_buku,Penerbit,Tahun,Jml_tersedia) values ('$title','$publisher','$year','$availability')";

if($conn->query($sql1) === TRUE){
$sql2="select max(Id_buku) as x from buku";
$result=$conn->query($sql2);
$row=$result->fetch_assoc();
$x=$row['x'];
$sql3="insert into penulis values ('$x','$author')";
$result=$conn->query($sql3);

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