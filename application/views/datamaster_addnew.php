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
              <li class="breadcrumb-item">Matches</li>
              <li class="breadcrumb-item active">Entry</li>
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
                <h3 class="card-title">Data Entry</h3>
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

                <?=form_open_multipart('matches/add_new/' . $name);?>
                <?php if($name=='participant') { ?>
                  <div class="form-group">
                    <label for="nama_participants_d">Nama Subject</label>
                    <input type="text" class="form-control" name="name" id="nama_participants_d" placeholder="Name..." required>
                  </div>

                  <div class="form-group">
                    <label for="email">Participant Phone</label>
                    <input type="text" class="form-control" name="email" id="email" placeholder="Phone..." required>
                  </div>
                  
                  <div class="form-group">
                    <label for="deprtment_id">Choose Departent</label>
                    <select name="department_id" id="deprtment_id" class="form-control" required>
                      <option disabled selected>-- Choose --</option>
                      <?php
                        foreach($departments as $dp) {
                      ?>
                      <option value="<?=$dp->id;?>"><?=$dp->department_name;?></option>
                      <?php
                        }
                      ?>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="photo">Photo</label>
                    <input type="file" class="form-control" name="photo" id="photo" >
                  </div>

                  <?php } ?>
                <?php if($name=='department') { ?>
                  <div class="form-group">
                    <label for="department_name">Department Name</label>
                    <input type="text" class="form-control" name="department_name" id="department_name" placeholder="Department Name...">
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
                  <button type="submit" class="btn btn-primary">SAVE</button>
                </div>
              <?=form_close();?>
            </div>
          </div>
        </div>
	  </div>
    </section>
    
  </div>
  
 
 <?php require_once 'footer.php'; ?>