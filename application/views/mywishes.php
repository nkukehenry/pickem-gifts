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
              <li class="breadcrumb-item active">Your Profile</li>
              <li class="breadcrumb-item active"><a href="<?=base_url('matches/picker')?>">My Match</a></li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    
    <section class="content">
      <div class="container-fluid">
          
      <h3 class='text-center' style="color:#BC413A;">Here's Your Profile</h3><hr/>
        <div class="row" style="padding: 20px; justify-content:center; align-items:center;">
          
        
          <div class="col-lg-4 col-sm-12">
            <div class="small-box text-center  bg-white">
                <div class="inner">
                    
                    <?php 
                    
                    if(count($wishes) > 0): ?>
                    <span class="text-success"></span>My Wishes:</span><br>
                    <p><small class="text-muted">
                        <?php foreach($wishes as $wish): ?>
                        
                           <label class="badge badge-primary"><?php echo $wish->wish_name; ?> </label>
                        
                        <?php endforeach; ?>
                        
                    </small></p>
                     <br>
                     <a href="<?=($user->finished>0)?'#':base_url('/matches/picker') ?>" class="btn btn-info"> PICK MY MATCH</a>
                     <br>
                    <?php else: ?>
                    
                     <?=form_open_multipart('matches/save_wishes')?>
                         <h6><b>My Wishes:</b></h6>
                         
                         <input type="text" class="form-control" name="wishes[]" placeholder="Wish No. 1" required>
                         <br/>
                         <input type="text" class="form-control"  name="wishes[]" placeholder="Wish No. 2">
                         <br/>
                         <input type="text" class="form-control"  name="wishes[]" placeholder="Wish No. 3">
                         <input type="hidden" class="form-control"  name="id" value="<?php echo $user->id;?>">
                         <br/>
                         
                         
                       <button type="submit" class="btn btn-success col-lg-12">Save Wishes</button>
                       <br/>
                       <br/>
                       <a href="<?=base_url('matches/picker')?>" class="btn btn-danger col-lg-12">CHECK MY MATCH</a>
                       <br>
                         
                      <?=form_close();?>
                    
                    <?php endif; ?>
                    
                    
                    <br>
                    <img src="<?=base_url()?>assets/uploads/<?=(@$user->photo)?$user->photo:'user.jpg';?>" style="max-width:300px;">
                    <h3><?=$user->name;?></h3>
                    <h4 class="text-success"><?=$user->department_name;?></h4>
                    
                </div>
             </div>
             
           
          </div>
          
          
         
          
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