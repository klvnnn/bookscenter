<?php
session_start();
$conn=mysqli_connect('localhost','root','','bookscenter');

$id=$_GET['id'];

$roll=$_SESSION['Id_anggota'];

$sql="insert into peminjaman (Id_anggota,Id_buku) values ('$roll','$id')";

if($conn->query($sql) === TRUE)
{
echo "<script type='text/javascript'>alert('Request Sent to Admin.')</script>";
header( "Refresh:0.01; url=book.php", true, 303);
}
else
{
	echo "<script type='text/javascript'>alert('Request Already Sent.')</script>";
    header( "Refresh:0.01; url=book.php", true, 303);

}

?>