<?php
namespace App\Controllers;
use App\Models\User;
class UserController extends BaseController{
    public $user;

    public function __construct(){
        $this->user = new User();
    }

    // list
    public function index(){
        $users = $this->user->getUser();
        return $this->render('user.list', compact('users'));
    }

    // add
    public function addUser(){
        return $this->render('user.add');
    }

    // xử lí form
    public function postUser(){
        if(isset($_POST['submit'])){
            $error = [];
            if(empty($_POST['name'])){
                $error[] = "Vui lòng nhập tên.";
            }
            if(empty($_POST['pass'])){
                $error[] = "Vui lòng nhập pass.";
            }
            if(empty($_POST['email'])){
                $error[] = "Vui lòng nhập email.";
            }
            if(empty($_POST['address'])){
                $error[] = "Vui lòng nhập address.";
            }
            if(empty($_POST['tel'])){
                $error[] = "Vui lòng nhập tel.";
            }
            if(count($error) >= 1){
                flash('errors', $error, 'add-user');
            }else{
                $check = $this->user->addUser(null, $_POST['name'], $_POST['pass'], $_POST['email'], $_POST['address'], $_POST['tel']);
                if($check){
                    flash('success', "Thêm thành công.", 'add-user');
                }
            }
        }
    }

    // chi tiết
    public function detail($id){
        // var_dump($id);
        // die;
        $users = $this->user->detailUser($id);
        return $this->render('user.edit', compact('users'));

    }

    public function editUser($id){
        if(isset($_POST['submit'])){
            $error = [];
            if(empty($_POST['name'])){
                $error[] = "Vui lòng nhập tên.";
            }
            if(empty($_POST['pass'])){
                $error[] = "Vui lòng nhập pass.";
            }
            if(empty($_POST['email'])){
                $error[] = "Vui lòng nhập email.";
            }
            if(empty($_POST['address'])){
                $error[] = "Vui lòng nhập address.";
            }
            if(empty($_POST['tel'])){
                $error[] = "Vui lòng nhập tel.";
            }
            if(count($error) >= 1){
                flash('errors', $error, 'detail-user/'.$id);
            }else{
                $check = $this->user->updateUser($id, $_POST['name'], $_POST['pass'], $_POST['email'], $_POST['address'], $_POST['tel']);
                if($check){
                    $editRoute = 'detail-user/'.$id;
                    flash('success', "Sửa thành công.", $editRoute);
                }
            }
        }
    }

    // delete
    public function deleteUser($id){
        $users = $this->user->deleteUser($id);
        flash("success", "Xóa Thành Công.", "list-user");
    }
}