  <?php require_once 'header.php'; ?>
  
  <div class="content-wrapper">
    
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    
    <section class="content">
      <div class="container-fluid">
        <div class="row">

          <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?=$participants;?></h3>
                <p>Total participants</p>
              </div>
              <div class="icon">
                <i class="ion ion-android-person"></i>
              </div>
              <a href="<?=base_url('/matches/participants');?>" class="small-box-footer">View Participants <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          
          <div class="col-lg-3 col-6">
            
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?=$departments;?></h3>
                <p>Departments</p>
              </div>
              <div class="icon">
                <i class="ion ion-cube"></i>
              </div>
              <a href="<?=base_url('/matches/departments');?>" class="small-box-footer">View List <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
         
  		</div>
	  </div>
    </section>
    
  </div>
  
  <footer class="main-footer">
    Copyright &copy; <?=date('Y');?> Thycast
  </footer>
  
</div>

<script src="<?=base_url('assets/plugins/');?>jquery/jquery.min.js"></script>

<script src="<?=base_url('assets/plugins/');?>bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>

<script src="<?=base_url('assets/plugins/');?>slimScroll/jquery.slimscroll.min.js"></script>

<script src="<?=base_url('assets/plugins/');?>fastclick/fastclick.js"></script>

<script src="<?=base_url('assets/dist/');?>js/adminlte.js"></script>

<script src="<?=base_url('assets/dist/');?>js/pages/dashboard.js"></script>
</body>
</html>