<?php
session_start();
$conn=mysqli_connect('localhost','root','','bookscenter');

$bookid=$_GET['id1'];
$rollno=$_GET['id2'];

$sql="select Username from anggota where Id_anggota='$rollno'";
$result=$conn->query($sql);
$row=$result->fetch_assoc();

$category=$row['Username'];

if($category == 'Student')
{
    $sql1="update peminjaman set Tgl_pinjam=curdate(),Batas_waktu=date_add(curdate(),interval 60 day)";
 
    if($conn->query($sql1) === TRUE)
    {
        $sql3="update buku set Jml_tersedia=Jml_tersedia-1 where Id_buku='$bookid'";
        $result=$conn->query($sql3);

        echo "<script type='text/javascript'>alert('Success')</script>";
        header( "Refresh:0.01; url=issue_requests.php", true, 303);
    }
    else
    {
        echo "<script type='text/javascript'>alert('Error')</script>";
        header( "Refresh:1; url=issue_requests.php", true, 303);

    }
}

else
{
    $sql2="update peminjaman set Tgl_pinjam=curdate(),Batas_waktu=date_add(curdate(),interval 180 day)";

    if($conn->query($sql2) === TRUE)
    {
        $sql4="update buku set Jml_tersedia=Jml_tersedia-1 where Id_buku='$bookid'";
        $result=$conn->query($sql4);
        echo "<script type='text/javascript'>alert('Success')</script>";
        header( "Refresh:1; url=issue_requests.php", true, 303);
    }
    else
    {
        echo "<script type='text/javascript'>alert('Error')</script>";
        header( "Refresh:1; url=issue_requests.php", true, 303);

    }
}

?>