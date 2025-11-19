
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Mutindo Home</title>
  <link rel="shortcut icon" href="<?=base_url('favicon.ico');?>" type="image/x-icon" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?=base_url('assets/plugins/');?>font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?=base_url('assets/dist/');?>css/adminlte.min.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  
  <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
    
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
      </li>
    </ul>
  </nav>
  

  
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    
    <a href="<?=base_url('/');?>" class="brand-link">
      <img src="<?=base_url('assets/images/logo.png');?>" alt="logo" class="ml-3 img-size-32 mr-2">
      <span class="brand-text font-weight-light">Home</span>
    </a>


<div class="sidebar">

      
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="<?=base_url('/admin');?>" class="nav-link">
              <i class="nav-icon fa fa-dashboard"></i>
              <p>Dashboard</p>
            </a>
          </li>
         
              <li class="nav-item">
                <a href="<?=base_url('/matches/participants');?>" class="nav-link ">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Participants</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=base_url('/matches/departments');?>" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Departments</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=base_url('/matches/report');?>" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Report</p>
                </a>
              </li>
           
         
        </ul>
      </nav>
      
    </div>
    
  </aside>