<?php
require_once(__dir__ . '/Db.php');

class resumeModel extends Db
{
    /**
     * @param string
     * @return array
     * @desc Returns a user record based on the method parameter....
     **/
    public function index(): array
    {
        $this->query("SELECT * FROM `resume`");
        $this->execute();
        $resume = $this->fetchAll();
        if (!empty($resume)) {
        
            return $resume;
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
    public function resumeCrate(array $data): array
    {
        // var_dump($data);

        $this->query("INSERT INTO `resume`( `Title`, `shortTitle`, `location`,`year`,`description`,`status`) VALUES (?,?,?,?,?,?)");
        $this->bind(1, $data['Title']);
        $this->bind(2, $data['shortTitle']);
        $this->bind(3, $data['location']);
        $this->bind(4, $data['year']);
        $this->bind(5, $data['description']);
        $this->bind(6, $data['status']);

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
    public function resumeedit($id): array
    {
        $this->query("SELECT * FROM `resume` WHERE`id` = :id");
        $this->bind('id', $id);
        $this->execute();

        $resume = $this->fetch();
        if (!empty($resume)) {

            return $resume;
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
    public function resumeUpdate(array $data): array
    {
       
        $this->query("UPDATE `resume` SET `Title`=?,`shortTitle`=?,`location`=?,`year`=?,`description`=?,`status`=? WHERE `id`=?");
        $this->bind(1, $data['Title']);
        $this->bind(2, $data['shortTitle']);
        $this->bind(3, $data['location']);
        $this->bind(4, $data['year']);
        $this->bind(5, $data['description']);
        $this->bind(6, $data['status']);
        $this->bind(7, $data['id']);
        
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
    public function resumedelete($id): array
    {
        
        $this->query("DELETE FROM `resume` WHERE `id` = :id");
        $this->bind('id', $id);
        if ($this->execute()) {
            $Response = array(
                'status' => true,
                'msg' => 'resume Delete successfully'
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
