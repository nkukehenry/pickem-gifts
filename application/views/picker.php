<?php require_once 'front_header.php'; ?>
  
  <div class="content">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><span style="color:#BC413A;">GIFT</span> EX</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item ">Pick you Match</li>
              <li class="breadcrumb-item active">Hello <?php echo $user->name; ?>,</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    
    <section class="content" style="display:none;">
      <div class="container-fluid">
          
      <h3 class='text-center' style="color:#BC413A;">Choose an available number to reveal your match</h3><hr/>
       
      <div class="row" style="padding: 20px;">

      <?php if($this->session->flashdata('msg_alert')) { ?>
        <div class="alert alert-info alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <?=$this->session->flashdata('msg_alert');?>
        </div>
        <?php } ?>

        <?php 
        $i=1;
        foreach($participants as $person): 
          if($person->id !== $user->id):
              $randNumber = mt_rand(0,99);
               $randNumber2 = mt_rand(1,9);
               $i++;
          ?>

          <div class="col-lg-3 col-6">
            <div class="small-box text-center <?=($person->matched>0)?'bg-danger':'bg-success'; ?>">
                <a href="<?=($person->matched>0)?'#':base_url('/matches/pick/').$person->id;?>">
                <div class="inner">
                    <h3><?=$person->id+$randNumber+$randNumber2+$i;?></h3>
                    <p><?=($person->matched>0)?'AM TAKEN':'AM AVAILABLE';?></p>
                </div>
                </a>
             </div>
          </div>
          
         <?php endif; endforeach; ?>
         
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
        setTimeout(function(){
        $('.loader').hide();
        $('.content').show();
        },3000);
    })
</script>

</body>
</html>