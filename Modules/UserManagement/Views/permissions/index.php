<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid ">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h2 class="m-0">Permissions</h2>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Permissions</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->




  <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card card-outline card-secondary">
                <div class="card-header">
                    <a href="<?= base_url('admin/permissions/edit');  ?>" class="btn btn-sm btn-primary float-right">Edit Permissions</a>

                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <?php foreach($modules as $module): ?>
                      <h3><?= ucwords($module['module_name']) ?></h3>
                        <table class="table">
                          <thead class="thead-dark">
                            <tr>
                              <th>#</th>
                              <th>Function Name</th>
                              <th>Allowed Roles</th>
                            </tr>
                          </thead>
                          <tbody>
                          <?php foreach($permissions as $permission): ?>
                            <?php if($permission['module_id'] == $module['id']): ?>
                              <tr>
                                <th scope="row"><?= $permission['order'] ?></th>
                                <td><?= ucwords($permission['function_name']) ?></td>
                                <td>
                                  <?php foreach($roles as $role): ?>
                                    <?php
                                      $allowed_roles = substr($permission['allowed_roles'], 0, -1);
                                      $allowed_roles = ltrim($allowed_roles, '[');
                                      $finalAllowed = explode(',',$allowed_roles);
                                      if(in_array($role['id'], $finalAllowed))
                                      {
                                        echo '<i class="fas fa-check ecCheck"></i>';
                                      }
                                      else
                                      {
                                        echo '<i class="fas fa-times ecEx"></i>';
                                      }
                                      echo ' '.$role['role_name'];
                                    ?>
                                  <?php endforeach; ?>
                                </td>
                              </tr>
                            <?php endif; ?>
                          <?php endforeach; ?>
                          </tbody>
                        </table>
                    <?php endforeach; ?>
                  </div>
              <!-- /.card-body -->
            </div>
        </div>
      </div>
    </div>
  </section>
  </div>
