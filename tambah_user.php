<?php 
session_start();
if(!isset($_SESSION['session_username'])){
    header("location:index.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>pemograman 3.com</title>
</head>
<html lang=""en>
<head>
    <meta charset="UFT-8" />
    <title>PEMOGRAMAN 3.COM</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
</head>
<body>
    <nav>
        <ul>
            <li><a href="index.php">
                <i class="fas fa-home"></i>
                <span class="nav-item">HOME</span>
            </a></li>
            <li><a href="tambah_user.php">
                <i class="fas fa-wallet"></i>
                <span class="nav-item">TAMBAH USER</span>
            </a></li>
            <li><a href="tampil_user.php">
                <i class="fas fa-chart-bar"></i>
                <span class="nav-item">TAMPIL USER</span>
            </a></li>
        </ul>
    </nav>
</body>

<style>
    @import url("https://fonts.googleapis.com/css2?family=Pooppins:wght@400;500;600;700&display=swap");
*{
 margin: 0px;
 padding: 0px;
 outline: 0px;
 text-decoration: none;
 }

 body {
  background: #dfe9f5;
  margin: 0;
  padding: 0;
  display: flex;
  justify-content: flex-start;
  align-items: flex-start; /* Mengatur elemen lebih ke atas */
  height: 97vh;
 
}
.container {
            text-align: center;
            padding: 30px;
        }
        header {
            background-color: #009999;
            color: black;
            padding: 20px;
        }

        header h1 {
            margin: 0;
 
}
nav{
  position: absolute;
  top: 10;
  bottom: 0;
  height: 100%;
  left: 0px;
  background: #009999;
  width: 90px;
  overflow: hidden;
  transition: width 0.2s linear;
  box-shadow: 0 20px 35px rgba(1, 0, 0, 0.1)
  }

a{
 position: relative;
 color: rgba(85, 83, 83);
 font-size: 14px;
 display: table;
 width: 300px; 
 padding: 10px;
 }

 .fas{
  position: relative;
  width: 70px;
  height: 50px;
  top: 14px;
  font-size: 20px;
  text-align: center;
  }

.nav-item{
  position: relative;
  top: 12px;
  margin-left: 10px;
  }

nav:hover{
  width: 240px;
  transition: all 0.5s ease;   
  }
</style>

<?php
//koneksi database
include 'koneksi.php';
//menangkap data yang di kirim dari form
if (!empty($_POST['save'])){

    $Nama = $_POST['Nama'];
    $Password = $_POST['Password'];
    $level = $_POST['level'];
    $status = $_POST['status'];
    //menginput data ke database
    $a=mysqli_query($koneksi,"insert into user values('','$Nama','$Password','$level','$status')");
    if($a){
        //mengalihkan halaman kembali
        header("location:tambah_user.php");
    }else{
        echo mysqli_error();
    }
}  

?>  
<html>
<head>
    <style>
        body {
            background: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        form {
            background: #fff;
            align-items: center;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
        }

        tr {
            margin-bottom: 10px;
        }

        td {
            padding: 10px;
            text-align: left; /* Mengatur label rata kiri */
        }

        input[type="date"],
        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="submit"] {
            background: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background: #0056b3;
        }
    </style>
</head>

<body>
    <form method="POST">
    <header>
<div class="container">
            <h1>TAMBAH USER</h1>
        </header></div>
        <table>
            <tr>
                <td>Nama</td>
                <td><input type="text" name="Nama"></td>
            </tr>
            <tr>
             <td>Password</td>
             <td><input type="text" name="Password"></td>
        </tr>
        <tr>
            <td>level</td>
            <td><select name="level">
                <option value="">-----pilih</option>
                <option value="1">Admin</option>
                <option value="2">Staff</option>
                <option value="3">Spv</option>
                <option value="4">Mgr</option>
</select>
</td>
</tr>
<tr>
    <td>status</td>
    <td><select name="status">
        <option value="">-----pilih</option>
        <option value="1">Aktif</option>
        <option value="0">tdk aktif</option>
</select>
</td>
</tr>
<tr>
    <td><td>
        <td><input type="submit" name="save"></td>
</tr>
</table>
</form>
</body>
</html>

