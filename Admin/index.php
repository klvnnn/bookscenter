<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="img/image 14.png" type = "image/x-icon">
    <title>Book's Center</title>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg mb-4 mt-4">
            <div class="container">
            <a alt="cek" href = "/"><img src="img/logo.png"></a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav w-100 d-flex justify-content-end">
                    <li class="nav-item">
                        <a class="text-black nav-link " aria-current="page" href="index.php">Home</a>
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
                            <li><a class="dropdown-item" href="biodata.php">Your Profile</a></li>
                            <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            </div>
    </nav>
    <!-- Isi -->
    <div class="container" style="background-color: #F5F6F9; border-top-left-radius: 20px; border-top-right-radius: 20px;">
      <div class="row align-items-start">
        <div class="col-8 ps-5" style="margin-top: 80px;">
            <h1 style="font-size: 46px;">For All Your <br> Reading Books Needs</h1>
            <br>
            <p>Jangan Lupa Baca Buku Hari Ini!!!</p>
        </div>
        <div class="col-4 ps-5 " style="margin-top: 40px;">
          <img src="img/img.png" alt="">
        </div>
      </div>
    </div>
    <div class="container" style="background-color: #F5F6F9; border-bottom-left-radius: 20px; border-bottom-right-radius: 20px;">
      <div class="row align-items-start">
      <div class="col-6 ps-5 " style="margin-top: 40px;">
          <img src="img/image 1.png" alt="" class="mt-2">
        </div>
        <div class="col-6 ps-5" style="margin-top: 80px;">
            <h1 style="font-size: 46px;">Book Center</h1>
            <br>
            <p>Layanan peminjaman buku Gratis Untuk Semua kalangan <br>
            Book’s center berdiri sejak tahun 2022, semoga layanan ini <br>
            dapat membantu anda, ayo jangan malas membaca!</p>
        </div>
      </div>
    </div>
    <!-- Footer -->
    <footer class="border-top footer mt-5">
        <div class="d-flex justify-content-center mt-3">
          <p> Book Center Copyright 2022</p>
        </div>
    </footer>
    <!-- javascript -->
    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>