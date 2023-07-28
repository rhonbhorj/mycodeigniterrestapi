<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
      <img src="<?php echo base_url();?>assets/dist/img/logo.png" width="120px">
      </li>  
    </ul>


      <!-- /.SEARCH FORM sarado ng search form -->


    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
 

     <!--   log out  -->
     <li class="nav-item dropdown user-menu">
        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
          <span class="d-none d-md-inline"><?php echo $this->session->userdata('Name');?></span>
        </a>
        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        
          <!-- User image -->
          <li class="user-header bg-primary">
          <img src="<?php echo base_url()?>assets/img/logo_pic.png" class="user-image img-circle elevation-2" alt="usere" style="margin-top: 2%;">
            <p><?php echo $this->session->userdata('Name');?>
            <small>Alpha Red Management System Incorporated</small>
            </p>
          </li> 
          <!-- Menu Footer-->
          <li class="user-footer">
            <a href="changepass" class="btn btn-default btn-flat">Change Password</a>
            <a href="<?php echo site_url('login/logout');?>" class="btn btn-default btn-flat float-right">Sign out</a>
          </li>
        </ul>
      </li>
      
 
      <!--  /. log out -->
    </ul>
   
  </nav>