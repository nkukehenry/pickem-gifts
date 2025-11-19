<?php require_once 'front_header.php'; ?>
  
  <div class="content">
    
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><span style="color:#BC413A;">MUTINDO</span> SantaBox</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active"><b>Your Match</b></li>
              <li class="breadcrumb-item active"><a href="<?=base_url('matches/mywishes')?>">My Profile</a></li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    
    <section class="content">
      <div class="container-fluid">
          
      <h3 class='text-center' style="color:#BC413A;">Here's Your match</h3><hr/>
        <div class="row" style="padding: 20px; justify-content:center; align-items:center;">
           
        
          <?php if($choice->id == $user->finished): ?>
          
          <div class="col-lg-4 col-sm-12">
            <div class="small-box text-center  bg-white">
                <div class="inner">
                    <img src="<?=base_url()?>assets/uploads/<?=($choice->photo)?$choice->photo:'user.jpg';?>" style="max-width:300px;">
                    <h3><?=$choice->name;?></h3>
                    <h4 class="text-success"><?=$choice->department_name;?></h4>
                    <?php 
                    
                    if(count($wishes) > 0): ?>
                    <span class="text-success"></span>Wishes:</span><br>
                    <p><small class="text-muted">
                        <?php foreach($wishes as $wish): ?>
                        
                           <label class="badge badge-primary"><?php echo $wish->wish_name; ?> </label>
                        
                        <?php endforeach; ?>
                        
                    </small></p>
                    <?php endif; ?>
                </div>
             </div>
             <a href="<?=base_url()?>" class="btn btn-danger col-lg-12">CLOSE</a>
           
          </div>
          
          
          
          <?php else: ?>
            <div class="col-lg-4 col-sm-12">
                <div class="small-box text-center bg-white">
                    <div class="inner">
                        <h3>Someone has taken me first!</h3>
                        <a href="<?=base_url('matches/picker')?>" class="btn btn-success">TRY AGAIN</a>
                    </div>
                </div>
            </div>
          <?php endif; ?>
          
  		</div>
	  </div>
    </section>
    
  </div>
  
</div>

<script src="<?=base_url('assets/plugins/');?>jquery/jquery.min.js"></script>

<script src="<?=base_url('assets/plugins/');?>bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>

<script src="<?=base_url('assets/plugins/');?>slimScroll/jquery.slimscroll.min.js"></script>

<script src="<?=base_url('assets/plugins/');?>fastclick/fastclick.js"></script>
<script>
    $(document).ready(function(){
        $('.loader').hide();
    })
</script>

</body>
</html>