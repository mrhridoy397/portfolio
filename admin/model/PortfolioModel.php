<?php
require_once(__dir__ . '/Db.php');

class portfolioModel extends Db
{
    /**
     * @param string
     * @return array
     * @desc Returns a user record based on the method parameter....
     **/
    public function index(): array
    {
        $this->query("SELECT * FROM `portfolio`");
        $this->execute();
        $portfolio = $this->fetchAll();
        if (!empty($portfolio)) {
        
            return $portfolio;
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
    public function createportfolio(array $data): array
    {
        // var_dump($data);

        $this->query("INSERT INTO `portfolio`( `Title`, `shortTitle`, `Category`,`Client`,`Projectdate`,`ProjectURL`,`description`,`image`,`status`) VALUES (?,?,?,?,?,?,?,?,?)");
        $this->bind(1, $data['Title']);
        $this->bind(2, $data['shortTitle']);
        $this->bind(3, $data['Category']);
        $this->bind(4, $data['Client']);
        $this->bind(5, $data['Projectdate']);
        $this->bind(6, $data['ProjectURL']);
        $this->bind(7, $data['description']);
        $this->bind(8, $data['image']);
        $this->bind(9, $data['status']);

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
    public function editportfolio($id): array
    {
        $this->query("SELECT * FROM `portfolio` WHERE`id` = :id");
        $this->bind('id', $id);
        $this->execute();

        $portfolio = $this->fetch();
        if (!empty($portfolio)) {

            return $portfolio;
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
    public function Updateportfolio(array $data): array
    {
       
        $this->query("UPDATE `portfolio` SET `Title`=?,`shortTitle`=?,`Category`=?,`Client`=?,`Projectdate`=?,`ProjectURL`=?,`description`=?,`image`=?,`status`=? WHERE `id`=?");
        $this->bind(1, $data['Title']);
        $this->bind(2, $data['shortTitle']);
        $this->bind(3, $data['Category']);
        $this->bind(4, $data['Client']);
        $this->bind(5, $data['Projectdate']);
        $this->bind(6, $data['ProjectURL']);
        $this->bind(7, $data['description']);
        $this->bind(8, $data['image']);
        $this->bind(9, $data['status']);
        $this->bind(10, $data['id']);
        
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
        $this->query("SELECT `image`FROM `portfolio` WHERE `id` = :id");
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
    public function deleteportfolio($id): array
    {
        
        $this->query("DELETE FROM `portfolio` WHERE `id` = :id");
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
