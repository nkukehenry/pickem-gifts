
  <?php require_once 'header.php'; ?>


  <div class="content-wrapper">
    
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Participants</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
              <li class="breadcrumb-item active">Participants</li>
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
                <h3 class="card-title">Participants</h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm row" style="width: 300px;">
                    
                  <a href='<?=base_url("/matches/add_new/participant");?>' class="btn btn-block btn-success btn-sm">Add Participant</a>
                  <a href='<?=base_url("/matches/participants?export=1");?>' class="btn btn-block btn-dark btn-sm">Export Participants</a>
                  </div>
                  <br>
                </div>
              </div>
              <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                  <tr>
                    <th>No.</th>
                    <th>Participant</th>
                    <th>ID</th>
                    <th></th>
                  </tr>
                  <?php
                    $i=1;
                    foreach ($participants as $d) {
                  ?>
                  <tr>
                    <td><?=$i++;?></td>
                    <td>
                    <img src="<?=base_url()?>assets/uploads/<?=($d->photo)?$d->photo:'user.jpg';?>" width="60px">
                    
                    </td> 
                    <td><?=$d->department_name?></td>
                    <td><?=$d->name;?></td>
                    <td>
                      <div class="btn-group">
                        <a href='<?=base_url("/matches/edit/participant/{$d->id}");?>' class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i></a>
                        <a href='<?=base_url("/matches/delete/participant/{$d->id}");?>' class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                      </div>
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