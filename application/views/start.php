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
              <li class="breadcrumb-item active">Get Started</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    
    <section class="content">
      <div class="container-fluid">
          
      <h3 class='text-center' style="color:#BC413A;">Sleigh the Season with Santa's Cheer!</h3><hr/>
      <?=form_open('matches/starter'); ?>
        <div class="row" style="padding: 20px; justify-content:center; align-items:center;">

        
          
                        <div class="col-lg-4 col-sm-12">

                        <?php if($this->session->flashdata('msg_alert')) { ?>

                            <div class="alert alert-info alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <?=$this->session->flashdata('msg_alert');?>
                            </div>
                            <?php } ?>

                            <div class="small-box text-center bg-white">
                                <div class="inner">
                                <div class="form-group">
                                    <label>Enter your Work Email</label>
                                    <input type="tel" placeholder="Enter Phone Email" class="form-control" name="email" required></div>
                                
                                <!--<div class="form-group">
                                    <label>Enter your PIN</label>
                                    <input type="number" maxlength="6" placeholder="Enter PIN" class="form-control" name="pin" required></div>
                                </div>-->

                                <div class="form-group  col-sm-12">
                                    <input type="submit"  value="CONTINUE" class="btn btn-success">
                                </div>
                                
                                <br>
                                
                                </div>
                            </div>

                        </div>
            </div>
            
            <?=form_close();?>
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