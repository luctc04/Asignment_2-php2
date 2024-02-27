<?php

namespace App\Controllers;

use App\Models\Product;
use App\Models\Category;

class ProductController extends BaseController
{
    public $product;

    public function __construct()
    {
        $this->product = new Product();
    }

    // list
    public function index()
    {
        $products = $this->product->getProduct();
        // var_dump($products);
        // die;
        return $this->render('product.list', compact('products'));
    }

    // add
    public function addProduct()
    {
        $category = new Category();
        $categorys = $category->getCategory();
        $this->render("product.add", compact("categorys"));
    }

    // xử lí form
    public function postProduct()
    {
        if (isset($_POST['submit'])) {
            $error = [];
            if (empty($_POST['name'])) {
                $error[] = "Vui lòng nhập tên.";
            }
            if (empty($_POST['price'])) {
                $error[] = "Vui lòng nhập giá.";
            }
            if (empty($_POST['describe'])) {
                $error[] = "Vui lòng nhập mô tả.";
            }

            if (count($error) >= 1) {
                flash('errors', $error, 'add-product');
            } else {
                //xủ lý ảnh
                $file = $_FILES['image'];
                //lấy tên ảnh
                $image = $file['name'];
                // Tiến hành upload file ảnh
                move_uploaded_file($file['tmp_name'], "public/uploads/" . $image);

                $this->product->addProduct(null, $_POST['name'], $image, $_POST['price'], $_POST['describe'], $_POST['id_category']);
                flash('success', "Thêm thành công.", 'add-product');
            }
        }
    }

    // chi tiết
    public function detail($id)
    {
        $category = new Category();
        $categorys = $category->getCategory();
        $detail = $this->product->detailProduct($id);
        // var_dump($detail);
        // die;
        $this->render("product.edit", compact("categorys", "detail"));
    }

    public function editProduct($id)
    {
        
        if (isset($_POST['submit'])) {
            $error = [];
            if (empty($_POST['name'])) {
                $error[] = "Vui lòng nhập tên.";
            }
            if (empty($_POST['price'])) {
                $error[] = "Vui lòng nhập giá.";
            }

            if (count($error) >= 1) {
                flash('errors', $error, 'detail-product/' . $id);
            } else {
                // $detail = $this->product->detailProduct($id);
                // $image = $_FILES['image'];
                // $file = $detail->image;
                // if($image['size']>0){
                //     $file = $image['name'];
                //     move_uploaded_file($image['tmp_name'], "public/uploads/" . $file);
                //     // $filename = "public/uploads/" . $filename;
                // }
                // $detail->image = $file;

                //xủ lý ảnh
                $file = $_FILES['image'];
                //kiểm tra xem người dùng có thêm ảnh mới vào hay không 
                if($file['size']>0){
                    //lấy tên ảnh
                    $image = $file['name'];
                    // Tiến hành upload file ảnh
                    move_uploaded_file($file['tmp_name'], "public/uploads/" . $image);
                }

                $this->product->updateProduct($id, $_POST['name'], $image, $_POST['price'] , $_POST['id_category']);
                // header("Location: " . BASE_URL . 'list-product');
                $editRoute = 'detail-product/' . $id;
                flash('success', "Sửa thành công.", 'list-product');
            }
        }
    }

    // delete
    public function deleteProduct($id)
    {
        $products = $this->product->deleteProduct($id);
        flash("success", "Xóa Thành Công.", "list-product");
    }
}
