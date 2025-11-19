  <?php require_once 'header.php'; ?>
  
  <div class="content-wrapper">
    
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Data Master</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
              <li class="breadcrumb-item">Data Master</li>
              <li class="breadcrumb-item active">Edit Data</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    
    <section class="content">
      <div class="container-fluid">
       <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Edit Data</h3>
                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                  </div>
                </div>
              </div>
              <div class="card-body">
                <?php if($this->session->flashdata('msg_alert')) { ?>

                <div class="alert alert-info alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <?=$this->session->flashdata('msg_alert');?>
                </div>
                <?php } ?>
                <?=form_open_multipart('matches/edit/'.$name.'/'.$id);?>
                <?php if($name=='participant') { ?>
                  <input type="hidden" name="id" value="<?=$id;?>">
                  <div class="form-group">
                    <label for="name">Participant Name</label>
                    <input type="text" class="form-control" name="name" value="<?=$username;?>" id="name" placeholder="Participant Name...">
                  </div>
                  <div class="form-group">
                    <label for="email">Participant Phone</label>
                    <input type="text" class="form-control" name="email" value="<?=$email;?>" id="name" placeholder="Participant Phone...">
                  </div>
                  
                   <img src="<?=base_url()?>assets/uploads/<?=(@$photo)?$photo:'user.jpg';?>" width="60px">
                    
                   <div class="form-group">
                    <label for="photo">Change Photo</label>
                    <input type="file" class="form-control" name="photo" id="photo" >
                  </div>
                  
                  <?php } ?>
                <?php if($name=='department') { ?>
                  <input type="hidden" name="id" value="<?=$id;?>">
                  <div class="form-group">
                    <label for="department_name">Department Name</label>
                    <input type="text" class="form-control" name="department_name" value="<?=$department_name;?>" id="department_name" placeholder="Department Name..">
                  </div>
                <?php } ?>
                
                 <div class="row">
                         <input type="text" class="form-control col-lg-4" name="wishes[]" placeholder="Wish No. 1">
                         <br/>
                         <input type="text" class="form-control col-lg-4"  name="wishes[]" placeholder="Wish No. 2">
                         <br/>
                         <input type="text" class="form-control col-lg-4"  name="wishes[]" placeholder="Wish No. 3">
                </div>
                
              
              </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
              <?=form_close();?>
            </div>
          </div>
        </div>
	  </div>
    </section>
    
  </div>
  
  
  <?php require_once 'footer.php'; ?>