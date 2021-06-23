<?php 
  include "../vendor/autoload.php";
  use Helpers\AUTH;

  $auth = AUTH::check();
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UCSL</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    
    
</head>
<body>
    
<div class="wrapper colp">
  <div class="top_navbar sticky-top">
    <div class="hamburger">
       <div class="one"></div>
       <div class="two"></div>
       <div class="three"></div>
    </div>
    <div class="top_menu">
      <div class="logo">LOGO</div>
      <ul>
        <li><a href="#">
          <i class="fas fa-search"></i></a></li>
        <li><a href="#">
          <i class="fas fa-bell"></i>
          </a></li>
        <li><a href="../admin/profile.php?id=<?= $auth['id'] ?>">
          <i class="fas fa-user"></i>
          </a></li>
      </ul>
    </div>
  </div>
  
  <div class="sidebar">
      <ul>
        <li><a href="dashboard.php">
          <span class="icon"><i class="fas fa-home"></i></span>
          <span class="title">Dashboard</span></a></li>
        <li><a href="student.php">
          <span class="icon"><i class="fas fa-users"></i></span>
          <span class="title">Students</span>
          </a></li>
        <li><a href="teacher.php">
          <span class="icon"><i class="fas fa-chalkboard-teacher"></i></span>
          <span class="title">Teachers</span>
          </a></li>
        <li><a href="professor.php">
          <span class="icon"><i class="fas fa-user-tie"></i></span>
          <span class="title">Professors</span>
          </a></li>
        <li><a href="pdf.php">
          <span class="icon"><i class="fas fa-book"></i></span>
          <span class="title">PDF EBook</span>
          </a></li>
        <li><a href="#">
          <span class="icon"><i class="fas fa-cog"></i></span>
          <span class="title">Settings</span>
          </a></li>
    </ul>
  </div>
  <div class="main_container">
  
 