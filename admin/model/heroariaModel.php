<?php
require_once(__dir__ . '/Db.php');

class heroariaModel extends Db
{
    /**
     * @param string
     * @return array
     * @desc Returns a user record based on the method parameter....
     **/
    public function index(): array
    {
        $this->query("SELECT * FROM `heroaria`");
        $this->execute();
        $heroaria = $this->fetchAll();
        if (!empty($heroaria)) {
        
            return $heroaria;
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
    public function createheroaria(array $data): array
    {
        // var_dump($data);

        $this->query("INSERT INTO `heroaria`( `Title`, `image`, `status`) VALUES (?,?,?)");
        $this->bind(1, $data['Title']);
        $this->bind(2, $data['image']);
        $this->bind(3, $data['status']);

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
    public function editheroaria($id): array
    {
        $this->query("SELECT * FROM `heroaria` WHERE`id` = :id");
        $this->bind('id', $id);
        $this->execute();

        $heroaria = $this->fetch();
        if (!empty($heroaria)) {

            return $heroaria;
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
    public function Updateheroaria(array $data): array
    {
       
        $this->query("UPDATE `heroaria` SET `Title`=?,`image`=?,`status`=? WHERE `id`=?");
        $this->bind(1, $data['Title']);
        $this->bind(2, $data['image']);
        $this->bind(3, $data['status']);
        $this->bind(4, $data['id']);
        
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
        $this->query("SELECT `image`FROM `heroaria` WHERE `id` = :id");
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
    public function deleteheroaria($id): array
    {
        
        $this->query("DELETE FROM `heroaria` WHERE `id` = :id");
        $this->bind('id', $id);
        if ($this->execute()) {
            $Response = array(
                'status' => true,
                'msg' => 'heroaria Delete successfully'
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
