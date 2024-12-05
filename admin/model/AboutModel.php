<?php
require_once(__dir__ . '/Db.php');

class aboutModel extends Db
{
    /**
     * @param string
     * @return array
     * @desc Returns a user record based on the method parameter....
     **/
    public function index(): array
    {
        $this->query("SELECT * FROM `about`");
        $this->execute();
        $about = $this->fetchAll();
        if (!empty($about)) {
        
            return $about;
        }
        return array(
            'data' => []
        );
    }


    /**
     * @param array
     * @return array
     * @desc Creates and returns a user record....
     **/
    public function createabout(array $data): array
    {
        // var_dump($data);

        $this->query("INSERT INTO `about`( `Title`, `name`, `profile`,`email`,`phone`,`description`,`image`,`status`) VALUES (?,?,?,?,?,?,?,?)");
        $this->bind(1, $data['Title']);
        $this->bind(2, $data['name']);
        $this->bind(3, $data['profile']);
        $this->bind(4, $data['email']);
        $this->bind(5, $data['phone']);
        $this->bind(6, $data['description']);
        $this->bind(7, $data['image']);
        $this->bind(8, $data['status']);

        if ($this->execute()) {
            $Response = array(
                'status' => true,
            );
            return $Response;
        } else {
            $Response = array(
                'status' => false
            );
            return $Response;
        }
    }




    /**
     * @param string
     * @return array
     * @desc Returns a user record based on the method parameter....
     **/
    public function editabout($id): array
    {
        $this->query("SELECT * FROM `about` WHERE`id` = :id");
        $this->bind('id', $id);
        $this->execute();

        $about = $this->fetch();
        if (!empty($about)) {

            return $about;
        }
        return array(
            'data' => []
        );
    }


    /**
     * @param array
     * @return array
     * @desc Creates and returns a user record....
     **/
    public function Updateabout(array $data): array
    {
       
        $this->query("UPDATE `about` SET `Title`=?,`name`=?,`profile`=?,`email`=?,`phone`=?,`description`=?,`image`=?,`status`=? WHERE `id`=?");
        $this->bind(1, $data['Title']);
        $this->bind(2, $data['name']);
        $this->bind(3, $data['profile']);
        $this->bind(4, $data['email']);
        $this->bind(5, $data['phone']);
        $this->bind(6, $data['description']);
        $this->bind(7, $data['image']);
        $this->bind(8, $data['status']);
        $this->bind(9, $data['id']);
        
        if ($this->execute()) {
            $Response = array(
                'status' => true,
            );
            return $Response;
        } else {
            $Response = array(
                'status' => false
            );
            return $Response;
        }
    }
    public function deleteImage($id){
        $this->query("SELECT `image`FROM `about` WHERE `id` = :id");
        $this->bind('id', $id);
        $this->execute();
        $image = $this->fetch();
        if ($image) {
            return $image;
        } else {
            return false;
        }
    }
    /**
     * @param string
     * @return array
     * @desc Returns a user record based on the method parameter....
     **/
    public function deleteabout($id): array
    {
        
        $this->query("DELETE FROM `about` WHERE `id` = :id");
        $this->bind('id', $id);
        if ($this->execute()) {
            $Response = array(
                'status' => true,
                'msg' => 'about Delete successfully'
            );
            return $Response;
        } else {
            $Response = array(
                'status' => false,
                'msg' => 'Oops! somthing Wrong, Place try again'
            );
            return $Response;
        }
    }
}
