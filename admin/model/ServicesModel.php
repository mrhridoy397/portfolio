<?php
require_once(__dir__ . '/Db.php');

class servicesModel extends Db
{
    /**
     * @param string
     * @return array
     * @desc Returns a user record based on the method parameter....
     **/
    public function index(): array
    {
        $this->query("SELECT * FROM `services`");
        $this->execute();
        $services = $this->fetchAll();
        if (!empty($services)) {
        
            return $services;
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
    public function createservices(array $data): array
    {
        // var_dump($data);

        $this->query("INSERT INTO `services`( `Title`, `description`,`image`, `status`) VALUES (?,?,?,?)");
        $this->bind(1, $data['Title']);
        $this->bind(2, $data['description']);
        $this->bind(3, $data['image']);
        $this->bind(4, $data['status']);

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
    public function editservices($id): array
    {
        $this->query("SELECT * FROM `services` WHERE`id` = :id");
        $this->bind('id', $id);
        $this->execute();

        $services = $this->fetch();
        if (!empty($services)) {

            return $services;
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
    public function Updateservices(array $data): array
    {
       
        $this->query("UPDATE `services` SET `Title`=?,`description`=?,`image`=?,`status`=? WHERE `id`=?");
        $this->bind(1, $data['Title']);
        $this->bind(2, $data['description']);
        $this->bind(3, $data['image']);
        $this->bind(4, $data['status']);
        $this->bind(5, $data['id']);
        
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
        $this->query("SELECT `image`FROM `services` WHERE `id` = :id");
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
    public function deleteservices($id): array
    {
        
        $this->query("DELETE FROM `services` WHERE `id` = :id");
        $this->bind('id', $id);
        if ($this->execute()) {
            $Response = array(
                'status' => true,
                'msg' => 'services Delete successfully'
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
