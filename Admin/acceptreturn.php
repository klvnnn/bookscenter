<?php
session_start();
$conn=mysqli_connect('localhost','root','','bookscenter');

$bookid=$_GET['id1'];
$rollno=$_GET['id2'];

$sql="update peminjaman set Tgl_pengembalian=curdate(), where Id_buku'$bookid' and Id_anggota='$rollno'";
$result=$conn->query($sql);
$row=$result->fetch_assoc();

if($conn->query($sql1) === TRUE)
{$sql3="update buku set Jml_tersedia=Jml_tersedia+1 where Id_buku'$bookid'";
 $result=$conn->query($sql3);
 $sql4="delete from pengembalian where Id_buku'$bookid' and Id_anggota='$rollno'";
 $result=$conn->query($sql4);
echo "<script type='text/javascript'>alert('Success')</script>";
header( "Refresh:0.01; url=return_requests.php", true, 303);
}
else
{
	echo "<script type='text/javascript'>alert('Error')</script>";
    header( "Refresh:1; url=return_requests.php", true, 303);

}
?>