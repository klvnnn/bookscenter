<?php
$conn=mysqli_connect('localhost','root','','bookscenter');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Edit Book</title>
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
                        <a class=" text-black nav-link dropdown-toggle" href="" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
        <div class="container">
            <a href="book.php" class="text-muted text-decoration-none">Home</a> /
            <a href="edit_book_details.php" class="active text-decoration-none text-black">Edit Book</a>
            <!--/.span9-->
             <div class="span9">
              <div class="container mt-4" style="background-color: #F5F6F9; border-top-left-radius: 20px; border-top-right-radius: 20px; border-bottom-left-radius: 20px; border-bottom-right-radius: 20px;">
                <br >
                  <div class="row p-5">
                  <div class="col-md-7 mt-5 pt-2 d-flex justify-content-center">
                  <img src="img/bookcenter.jpg" alt="" width="295px" height="396px">
                  </div>
                  <div class="col-md-5 pt-3">
                  <?php
                    $bookid = $_GET['id'];
                    $sql = "select * from buku where Id_buku='$bookid'";
                    $result=$conn->query($sql);
                    $row=$result->fetch_assoc();
                    $name=$row['Judul_buku'];
                    $publisher=$row['Penerbit'];
                    $year=$row['Tahun'];
                    $avail=$row['Jml_tersedia'];
                   ?>
                    <br >
                    <form class="form-horizontal row-fluid" action="edit_book_details.php?id=<?php echo $bookid ?>" method="post">
                        <div class="control-group">
                            <b>
                            <label class="form-label" for="Title">Book Title:</label></b>
                            <div class="controls">
                                <input type="text" id="Title" name="Title" value= "<?php echo $name?>" class="form-control form Button-Up" required>
                            </div>
                        </div>
                        <div class="control-group">
                            <b>
                            <label class="form-label" for="Publisher">Publisher:</label></b>
                            <div class="controls">
                                <input type="text" id="Publisher" name="Publisher" value= "<?php echo $publisher?>" class="form-control form Button-Up" required>
                            </div>
                        </div>
                        <div class="control-group">
                            <b>
                            <label class="form-label" for="Year">Year:</label></b>
                            <div class="controls">
                                <input type="text" id="Year" name="Year" value= "<?php echo $year?>" class="form-control form Button-Up" required>
                            </div>
                        </div>
                        <div class="control-group">
                            <b>
                            <label class="form-label" for="Availability">Availability:</label></b>
                            <div class="controls">
                                <input type="text" id="Availability" name="Availability" value= "<?php echo $avail?>" class="form-control form Button-Up" required>
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="controls mt-3">
                                <button type="submit" name="submit"class="btn btn-primary">Update Details</button>
                            </div>
                        </div>
                    </form> 
                  </div>
              </div>
              <!--/.content-->
             </div>
             </div>
         </div>
        <!-- Footer -->
        <footer class="border-top footer mt-5">
        <div class="d-flex justify-content-center mt-3">
          <p> Book Center Copyright 2022</p>
        </div>
        </footer>
        <!--/.wrapper-->
        <script src="js/bootstrap.bundle.min.js"></script>
<?php
if(isset($_POST['submit']))
{
    $bookid = $_GET['id'];
    $name=$_POST['Title'];
    $publisher=$_POST['Publisher'];
    $year=$_POST['Year'];
    $avail=$_POST['Availability'];

$sql1="update buku set Judul_buku='$name', Penerbit='$publisher', Tahun='$year', Jml_tersedia='$avail' where Id_buku='$bookid'";

if($conn->query($sql1) === TRUE){
echo "<script type='text/javascript'>alert('Success')</script>";
header( "Refresh:0.01; url=book.php", true, 303);
}
else
{//echo $conn->error;
echo "<script type='text/javascript'>alert('Error')</script>";
}
}
?>  
    </body>
</html>