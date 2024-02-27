<?php
namespace App\Models;
class User extends BaseModel{
    protected $table = 'users';

    public function getUser(){
        $sql = "SELECT * FROM $this->table";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }

    public function addUser($id, $user, $pass, $email, $address, $tel){
        $sql = "INSERT INTO $this->table values(?,?,?,?,?,?)";
        $this->setQuery($sql);
        return $this->execute([$id, $user, $pass, $email, $address, $tel]);
    }

    public function detailUser($id){
        $sql = "SELECT * FROM $this->table where id = ?";
        $this->setQuery($sql);
        return $this->loadRow([$id]);
    }

    public function updateUser($id, $user, $pass, $email, $address, $tel){
        $sql = "UPDATE $this->table SET user = ?, pass= ?, email= ?, address= ?, tel= ? WHERE id = ?"; 
        $this->setQuery($sql);
        return $this->execute([$user, $pass, $email, $address, $tel, $id]);
    }

    public function deleteUser($id){
        $sql = "DELETE FROM $this->table WHERE id = ?";
        $this->setQuery($sql);
        return $this->execute([$id]);
    }
}
