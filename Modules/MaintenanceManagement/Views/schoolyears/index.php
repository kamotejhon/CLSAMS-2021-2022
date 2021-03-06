
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid ">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h2 class="m-0">List of School Year</h2>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">School Year</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- form -->

          <div class="col-12">
            <div class="card card-outline card-secondary">
                      <div class="card-header">
                         <a href="<?=base_url('admin/schoolyears/add')?>" class="btn btn-sm btn-primary">+ School Year</a>
                         <!-- <h4>List of School Year</h4> -->
                      </div>
                      <!-- /.card-header -->
                      <div class="card-body">
                        <table id="example2" class="table table-bordered table-striped">
                          <thead>
                          <tr class="text-center">
                            <th>#</th>
                            <th>School Year</th>
                            <th>Status</th>
                            <th>Action</th>
                          </tr>
                          </thead>
                          <tbody class="text-center">
                          <?php $ctr = 1?>
                            <?php if(empty($schoolyears)): ?>
                              <tr>
                                <td colspan="6" class="text-center"> No Data Available </td>
                              </tr>
                          <?php else: ?>
                            <?php foreach($schoolyears as $schoolyear): ?>
                            <tr>
                              <td><?=esc($ctr)?></td>
                               <td><?=esc($schoolyear['start_sy'].'-'.$schoolyear['end_sy'])?></td>
                               <td><?=esc(($schoolyear['status'] == 'a') ? 'Active':'Inactive')?></td>

                              <td>
                              
                               <a class="btn btn-secondary btn-sm" href="<?=base_url('admin/schoolyears/view/' . esc($schoolyear['id'], 'url'))?>"> View</a>
                               <a class="btn btn-outline-info btn-sm" href="<?=base_url('admin/schoolyears/edit/' . esc($schoolyear['id'], 'url'))?>"> Edit</a>
                                <?php if($schoolyear['status'] == 'a'):?>
                                  <a class="btn btn-danger btn-sm" onclick=" confirmUpdateStatus('<?= base_urL('admin/schoolyears/delete/')?>',<?=$schoolyear['id']?>,'d')" title="deactivate"> Delete</i></a>
                                <?php else:?>
                                  <a class="btn btn-success btn-sm remove" onclick=" confirmUpdateStatus('<?= base_urL('admin/schoolyears/active/')?>',<?=$schoolyear['id']?>,'a')" title="activate">Restore</i></a>
                                <?php endif;?>
                              </td>
                            </tr>
                            <?php $ctr++?>
                            <?php endforeach; ?>
                          <?php endif; ?>
                          </tbody>
                          <!-- <tfoot>
                          <tr class="text-center">
                            <th>#</th>
                            <th>School Year</th>
                            <th>Action</th>
                          </tr>
                          </tfoot> -->
                        </table>
                      </div>
              <!-- /.card-body -->
            </div>
        </div>
        <!-- col 7 -->
      </div>
    </div>
  </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <!-- EDIT MODAL -->
      <div class="modal fade" id="modal-edit">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit Information</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>One fine body&hellip;</p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
      <!-- DELETE MODAL -->
      <div class="modal fade" id="modal-delete">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Do you want to delete the data?</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>Select "Yes" below if you are ready to delete this data.</p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
              <a class="btn btn-danger" href="<?=base_url('admin/schoolyears/delete/' . esc($schoolyear['id'], 'url'))?>"> Yes </a>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
      <?php if(isset($_SESSION['success_message'])): ?>
      <script type="text/javascript">
          alert_success('<?= $_SESSION['success_message']; ?>');
      </script>
      <?php endif; ?>

      <?php if(isset($_SESSION['error_message'])): ?>
        <script type="text/javascript">
            alert_error('<?= $_SESSION['error_message']; ?>');
        </script>
      <?php endif; ?>