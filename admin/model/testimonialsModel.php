<?php
require_once(__dir__ . '/Db.php');

class testimonialsModel extends Db
{
    /**
     * @param string
     * @return array
     * @desc Returns a user record based on the method parameter....
     **/
    public function index(): array
    {
        $this->query("SELECT * FROM `testimonials`");
        $this->execute();
        $testimonials = $this->fetchAll();
        if (!empty($testimonials)) {
        
            return $testimonials;
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
    public function createtestimonials(array $data): array
    {
        // var_dump($data);

        $this->query("INSERT INTO `testimonials`( `Title`, `name`,`description`,`image`,`status`) VALUES (?,?,?,?,?)");
        $this->bind(1, $data['Title']);
        $this->bind(2, $data['name']);
        $this->bind(3, $data['description']);
        $this->bind(4, $data['image']);
        $this->bind(5, $data['status']);

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
    public function edittestimonials($id): array
    {
        $this->query("SELECT * FROM `testimonials` WHERE`id` = :id");
        $this->bind('id', $id);
        $this->execute();

        $testimonials = $this->fetch();
        if (!empty($testimonials)) {

            return $testimonials;
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
    public function Updatetestimonials(array $data): array
    {
       
        $this->query("UPDATE `testimonials` SET `Title`=?,`name`=?,`description`=?,`image`=?,`status`=? WHERE `id`=?");
        $this->bind(1, $data['Title']);
        $this->bind(2, $data['name']);
        $this->bind(3, $data['description']);
        $this->bind(4, $data['image']);
        $this->bind(5, $data['status']);
        $this->bind(6, $data['id']);
        
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
        $this->query("SELECT `image`FROM `testimonials` WHERE `id` = :id");
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
    public function deletetestimonials($id): array
    {
        
        $this->query("DELETE FROM `testimonials` WHERE `id` = :id");
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
