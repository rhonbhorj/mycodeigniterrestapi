<aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: #343a40;">
    <!-- Brand Logo -->
 <a href="<?php echo base_url();?>dashboard" class="brand-link" >
      <img src="assets/dist/img/logo_1604556531.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-dark">HRIS</span>
    </a>
    <!-- /.Brand Logo -->



    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
       <div class="user-panel mt-3 pb-3 mb-3 d-flex"  <?= uri_string() == 'employee_profile' ? 'style="background-color:#6c757d "':'' ?> >
        <div class="image" id="profilepic">
  
        </div>
        <div class="info">
          <a href="<?php echo base_url();?>employee_profile" class="d-block "  ><?php echo $this->session->userdata('Name')?></a>
        </div>
      </div>
      <!-- SidebarSearch Form -->
      <div class="form-inline">
     
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               
               
               
          <li class="nav-item menu-open">
            <a href="<?php echo base_url();?>dashboard" class="nav-link active" style=" background: linear-gradient(to right, rgb(51, 51, 51), rgb(221, 24, 24));">
           <i class="fas fa-th"></i>
              <p>
                Dashboard 
              </p>
            </a>
           </li>
			
           <li class="nav-item">
            <a href="" class="nav-link "   <?= uri_string() == 'request' ? 'style="background-color:#6c757d "':'' ?> >
             <i class="fas fa-file"></i>
              <p>
               Request
              </p>
            </a>
          </li>
             <li class="nav-item">
            <a href="" class="nav-link "  >
             <i class="fas fa-file"></i>
              <p>
               PaySlip
              </p>
            </a>
          </li>
          
          <li class="nav-item">
                <a href="" class="nav-link ">  
                <i class="fas fa-clock"></i>              
                  <p>
                    Time 
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="" class="nav-link ">
                      <i class="far fa-circle nav-icon"></i>
                      <p>My Records</p>
                    </a>
                  </li> 
                  <li class="nav-item">
                    <a href="" class="nav-link ">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Punch In/Out</p>
                    </a>
                  </li> 
                </ul>    
            </li>
        
         

   
			
          
         </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
	
	<!--	<img  class="wow" src="<?php echo base_url();?>assets/img/wave.png" style="width:100%; height:auto; position:absolute; margin-top:660px;" >-->
  </aside>


    <!-- haba ng sidebar wag galawin -->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
         
		 	
		 
		 
		 
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
      <!--/. haba ng sidebar wag galawin -->
