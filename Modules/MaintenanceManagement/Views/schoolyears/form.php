  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid ">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h2 class="m-0"><?= $edit ? 'Editing': 'Adding'?> School year</h2>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">School year</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
      <div class="content">
        <div class="container-fluid">
          <div class="card card-outline card-info">
          <div class="card-header">
            <!-- <h3 class="card-title">Select2 (Default Theme)</h3> -->
            
          
            <div class="card-tools">
               
            <span class="d-none alert alert-success mb-3" id="res_message"></span>
            </div>
          </div>
          <!-- /.card-header -->
        <form action="<?= base_url('admin/schoolyears')?>/<?= $edit ? 'edit/'.esc($id): 'add'?>" method="post" accept-charset="utf-8">
          <div class="card-body">
           
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Start Year*</label>
                  <!-- <select id="Year" class="form-control" value="<?=isset($value['start_sy']) ? esc($value['start_sy']): ''?>" placeholder="Start Year" id="start_sy" name="start_sy">
                  </select> -->
                  <input type="number" class="form-control" value="<?=isset($value['start_sy']) ? esc($value['start_sy']): ''?>" placeholder="Start Year" id="start_sy" name="start_sy">

                </div>
                <?php if(isset($errors['start_sy'])):?>
                      <p class="text-danger"><?=esc($errors['start_sy'])?><p>
                <?php endif;?> 
                
              </div>
              <!-- /.col -->
              <div class="col-md-6">

                <div class="form-group">
                <label>End Year*</label>
                <input type="number" class="form-control" value="<?=isset($value['end_sy']) ? esc($value['end_sy']): ''?>" placeholder="End Year" id="end_sy" name="end_sy">
                
                </div>
                <?php if(isset($errors['end_sy'])):?>
                      <p class="text-danger"><?=esc($errors['end_sy'])?><p>
                <?php endif;?>
                <!-- /.form-group -->
                
                <div class="form-group">
                  <button type="submit" class="btn btn-success">Save</button>
                </div>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
  
            <!-- /.row -->
          </div>
          <!-- /.card-body -->
        </form>
        </div>
        </div>
      </div>


    <!-- /.content -->
  </div>
  