 <!-- /.d-flex -->
<!--               </div> -->
<!--             </div> -->
<!--           </div> -->
          <!-- /.col-md-6 -->
<!--         </div> -->
        <!-- /.row -->
<!--       </div> -->
      <!-- /.container-fluid -->
<!--     </div> -->
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


<!-- REQUIRED SCRIPTS --> 


<!-- jQuery -->
<script src="<?php echo base_url();?>assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="<?php echo base_url();?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE -->
<script src="<?php echo base_url();?>assets/dist/js/adminlte.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>


<script src="<?php echo base_url();?>assets/plugins/datatables-tables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>assets/plugins/datatables-tables/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url();?>assets/plugins/datatables-tables/jszip.min.js"></script>
<script src="<?php echo base_url();?>assets/plugins/datatables-tables/pdfmake.min.js"></script>
<script src="<?php echo base_url();?>assets/plugins/datatables-tables/vfs_fonts.js"></script>
<script src="<?php echo base_url();?>assets/plugins/datatables-tables/buttons.html5.min.js"></script>
<script src="<?php echo base_url();?>assets/plugins/datatables-tables/buttons.print.min.js"></script>

<!-- for wysiwyg html -->
  <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<!-- camera -->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>
   
   
<!-- for wysiwyg html -->
 <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
   





</html>
  <script>
    $(document).ready(function() {
    
    
//  what you see is what you get   
 $('#Announcement').summernote();
        
//  one user checked       
     
     checktoken();
     profilepic()
        

        
        
function checktoken() {
       
           $.ajax({
            url:"<?=site_url('login/checktoken')?>",
            method:"POST",
            dataType:"json",
            success:function(data){    
	
           		if(data == '1'){
           		 $.ajax({
                        url:"<?=site_url('login/logout')?>",
                        method:"POST",
                        success:function(){
                        alert('New user login');
                        location.reload();
                        
                        }
                         })
           		
           		}
            }
            
            })
       
}        
        
   function profilepic(){
 
			 $.ajax({
                url:"<?=site_url('dashboard/profilepic')?>",
                method:"POST",
                dataType:"json",
                success:function(data){
               
            	var profilepic='<img src="/uploads/'+data.Profilepic+'" class="img-circle elevation-2" alt="User Image">';
                
                $('#profilepic').html(profilepic);
                }
                 })
   }     
        
    });
  </script>

<script>
 $(document).ready(function () {


$('#bar').click(function(){
	$(this).toggleClass('open');
	$('#page-content-wrapper ,#sidebar-wrapper').toggleClass('toggled' );

});

});



  </script>
  
  





