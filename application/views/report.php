  <?php require_once 'header.php'; ?>

  <div class="content-wrapper">
    
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Participantion Report</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
              <li class="breadcrumb-item active">Participantion Report</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    
    <section class="content">
      <div class="container-fluid"> <div class="row">
          <div class="col-12">
            <?php if($this->session->flashdata('msg_alert')) { ?>

            <div class="alert alert-info alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <?=$this->session->flashdata('msg_alert');?>
            </div>
            <?php } ?>
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Participation Status</h3>

                
              </div>
              <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                  <tr>
                    <th>No.</th>
                    <th>Photo</th>
                    <th>Particpant</th>
                    <th>Department</th>
                    <th>Status</th>
                  </tr>
                  <?php
                    $i=1;
                    foreach ($rows as $d) {
                      $class = ($d->finished)?'bg-success':'bg-warning';
                     
                      $match  = "";
                      $picker = "";
                      
                      if($d->finished>0):
                        $this->db->where('id',$d->finished);
                        $picked = $this->db->get('participants')->row();
                        $match  = "Match: ".$picked->name;
                      endif;
                      
                      if($d->matched>0):
                        $this->db->where('id',$d->matched);
                        $picked = $this->db->get('participants')->row();
                        $picker  = "<p class='text-info'>Picked by: ".$picked->name."<p>";
                      endif;
                  ?>
                  <tr>
                    <td><?=$i++;?></td>
                    <td>
                      <img src="<?=base_url()?>assets/uploads/<?=($d->photo)?$d->photo:'user.jpg';?>" width="60px">
                    </td>
                    <td>
                        <?=$d->name;?>
                        <?=$picker;?></p>
                    </td>
                    <td><?=$d->department_name;?></td>
                    <td class="<?=$class?>">
                        <?=($d->finished)?'PARTICPATED':'PENDING';?>
                        <h5><?=$match;?></h5>
                    </td>
                   
                  </tr>
                  <?php } ?>
                </table>
              </div>
            </div>
          </div>
        </div>
	  </div>
    </section>
    
  </div>
  


 <?php require_once 'footer.php'; ?>