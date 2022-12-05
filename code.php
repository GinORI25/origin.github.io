<?php
session_start();
require 'dbcon.php';

if(isset($_POST['delete_siswaa']))
{
    $siswaa_id = mysqli_real_escape_string($con, $_POST['delete_siswaa']);

    $query = "DELETE FROM employees WHERE id='$siswaa_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Penghapusan Data telah berhasil!!";
        header("Location: Full-data.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "nt kadang2 nt";
        header("Location: Full-data.php");
        exit(0);
    }
}

if(isset($_POST['update_siswaa']))
{
    $siswaa_id = mysqli_real_escape_string($con, $_POST['siswaa_id']);

    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $kelamin = mysqli_real_escape_string($con, $_POST['kelamin']);
    $Hobi = mysqli_real_escape_string($con, $_POST['Hobi']);

    $query = "UPDATE `employees` SET `name`='$name', `email`='$email', `phone`='$phone',
     `kelamin`='$kelamin', `Hobi`='$Hobi' WHERE `id`='$siswaa_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Apaan tuhh! UPDATE DATA TELAH BERHASIL!";
        header("Location: Full-data.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "NT kadang2 NT";
        header("Location: Full-data.php");
        exit(0);
    }

}


if(isset($_POST['save_siswaa']))
{
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $kelamin = mysqli_real_escape_string($con, $_POST['kelamin']);
    $Hobi = mysqli_real_escape_string($con, $_POST['Hobi']);

    $query = "INSERT INTO employees (name,email,phone,Hobi,kelamin) VALUES ('$name','$email','$phone','$Hobi','$kelamin')";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "Apaan tuhh! DATA BARU TALAH DISIMPAN!";
        header("Location: Full-data.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "NT kadang2 NT";
        header("Location: siswaa-create.php");
        exit(0);
    }
}

?>