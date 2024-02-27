<?php
namespace App\Models;
class Product extends BaseModel{
    protected $table = 'products';

    public function getProduct(){
        $sql = "SELECT $this->table.*, categorys.name as name_category from products 
        join categorys on categorys.id = $this->table.id_category";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }

    public function addProduct($id, $name, $image, $price, $describe, $id_category)
    {
        $sql = "INSERT INTO $this->table values (?, ?, ?, ?, ?, ?)";
        $this->setQuery($sql);
        $this->execute([$id, $name, $image, $price, $describe, $id_category]);
    }

    public function detailProduct($id)
    {
        $sql = "SELECT $this->table.*,categorys.id as id_ct, categorys.name as name_category from products 
        join categorys on categorys.id = $this->table.id_category where $this->table.id = ?";
        $this->setQuery($sql);
        return $this->loadRow([$id]);
    }

    public function updateProduct($id, $name,  $image, $price, $id_category)
    {
        if ($image != '') {
            $sql = "UPDATE $this->table SET name = ?, image = ?, price = ?,  id_category = ? where $this->table.id = ?";
            $this->setQuery($sql);
            $this->execute([$name, $image, $price, $id_category, $id]);
        } else {
            $sql = "UPDATE $this->table SET name = ?, price = ?, id_category = ? where $this->table.id = ?";
            $this->setQuery($sql);
            $this->execute([$name, $price, $id_category, $id]);
        }
    }
    
    public function deleteProduct($id){
        $sql = "DELETE FROM $this->table WHERE id = ?";
        $this->setQuery($sql);
        return $this->execute([$id]);
    }
}