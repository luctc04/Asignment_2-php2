<?php
namespace App\Controllers;
use App\Models\Category;

class CategoryController extends BaseController{
    public $category;

    public function __construct(){
        $this->category = new Category();
    }

    // list
    public function index(){
        $categorys = $this->category->getCategory();
        // var_dump($categorys);
        // die;
        return $this->render('category.list', compact('categorys'));
    }

    // add
    public function addCategory(){
        return $this->render('category.add');
    }

    // xử lí form
    public function postCategory(){
        if(isset($_POST['submit'])){
            $error = [];
            if(empty($_POST['name'])){
                $error[] = "Vui lòng nhập tên.";
            }
            if(count($error) >= 1){
                flash('errors', $error, 'add-category');
            }else{
                $check = $this->category->addCategory(null, $_POST['name']);
                if($check){
                    flash('success', "Thêm thành công.", 'add-category');
                }
            }
        }
    }

    // chi tiết
    public function detail($id){
        // var_dump($id);
        // die;
        $categorys = $this->category->detailCategory($id);
        return $this->render('category.edit', compact('categorys'));

    }

    //edit
    public function editCategory($id){
        if(isset($_POST['submit'])){
            $error = [];
            if(empty($_POST['name'])){
                $error[] = "Vui lòng nhập tên.";
            }
            if(count($error) >= 1){
                flash('errors', $error, 'detail-category/'.$id);
            }else{
                $check = $this->category->updateCategory($id, $_POST['name']);
                if($check){
                    $editRoute = 'detail-category/'.$id;
                    flash('success', "Sửa thành công", $editRoute);
                }
            }
        }
    }

    // delete
    public function deleteCategory($id){
        $categorys = $this->category->deleteCategory($id);
        flash("success", "Xóa Thành Công.", "list-category");
    }
}