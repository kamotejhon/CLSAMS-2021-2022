<?php namespace Modules\MaintenanceManagement\Controllers;

use App\Controllers\BaseController;
use Modules\MaintenanceManagement\Models as MaintenanceManagement;
use Modules\MaintenanceManagement\Models\CategoriesModel;
use Modules\MaintenanceManagement\Models\ActivityLogsModel;

class Categories extends BaseController {

  function __construct(){
    $this->categoriesModel = new MaintenanceManagement\CategoriesModel();
    $this->activityLogsModel = new ActivityLogsModel;

  }

  public function index(){
    $data['categories'] = $this->categoriesModel->get();
    $data['view'] = 'Modules\MaintenanceManagement\Views\categories\index';
    return view('template/index', $data);
  }

  public function add(){
    $categoriesModel = new categoriesModel;
    $data['edit'] = false;
    $data['view'] = 'Modules\MaintenanceManagement\Views\categories\form';
    if($this->request->getMethod() === 'post'){
      if($this->validate('categories')){
        if($categoriesModel->add($_POST)){
          $this->activityLogsModel->addLogs($_SESSION['uid'], 'Add Category', 'admin/categories/add', json_encode($_POST));
          $this->session->setFlashData('success_message', 'Sucessfuly created a category');
        } else {
          $this->session->setFlashData('error_message', 'Something went wrong!');
        }
        return redirect()->to(base_url('admin/categories'));
      } else {
        $data['value'] = $_POST;
        $data['errors'] = $this->validation->getErrors();
      }
    }
    return view('template/index', $data);
  }

  public function edit($id){
    $data['edit'] = true;
    $data['view'] = 'Modules\MaintenanceManagement\Views\categories\form';
    $data['id'] = $id;
    $data['value'] = $this->categoriesModel->get(['id' => $id])[0];
    if(empty($data['value'])){
      die('Some Error Code Here (No Record)');
    }
    if($this->request->getMethod() === 'post'){
      if($this->validate('categories')){
        if($this->categoriesModel->edit($id, $_POST)){
          $this->activityLogsModel->addLogs($_SESSION['uid'], 'Edit Category', 'admin/categories/edit/',$id);
          $this->session->setFlashData('success_message', 'Sucessfuly edited a category');
        } else {
          $this->session->setFlashData('error_message', 'Something went wrong!');
        }
        return redirect()->to(base_url('admin/categories'));
      } else {
        $data['value'] = $_POST;
        $data['errors'] = $this->validation->getErrors();
      }
    }
    return view('template/index', $data);
  }

  public function delete($id){
    $categoriesModel = new categoriesModel;

    if($categoriesModel->inactive($id)) {
      $this->activityLogsModel->addLogs($_SESSION['uid'], 'Archived Category', 'admin/categories/delete',$id);
      $this->session->setFlashData('success_message', 'Successfully deleted category');
    } else {
      $this->session->setFlashData('error_message', 'Something went wrong!');
    }
    return redirect()->to(base_url('admin/categories'));
  }

  public function active($id){
    $categoriesModel = new categoriesModel;

    if($categoriesModel->active($id)) {
      $this->activityLogsModel->addLogs($_SESSION['uid'], 'Restore Category', 'admin/categories/active',$id);
      $this->session->setFlashData('success_message', 'Successfully restored category');
    } else {
      $this->session->setFlashData('error_message', 'Something went wrong!');
    }
    return redirect()->to(base_url('admin/categories'));
  }

  public function view($id){
    $data['view'] = 'Modules\MaintenanceManagement\Views\categories\view';
    $data['id'] = $id;
    $data['value'] = $this->categoriesModel->get(['id' => $id])[0];
    return view('template/index', $data);

  }

}
