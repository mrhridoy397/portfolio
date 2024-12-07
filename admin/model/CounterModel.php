<?php
require_once(__dir__ . '/Db.php');

class counterModel extends Db
{
    /**
     * @param string
     * @return array
     * @desc Returns a user record based on the method parameter....
     **/
    public function index(): array
    {
        $this->query("SELECT * FROM `counter`");
        $this->execute();
        $counter = $this->fetchAll();
        if (!empty($counter)) {
        
            return $counter;
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
    public function counterCrate(array $data): array
    {
        // var_dump($data);

        $this->query("INSERT INTO `counter`( `Title`, `number`,`status`) VALUES (?,?,?)");
        $this->bind(1, $data['Title']);
        $this->bind(2, $data['number']);
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
    public function counteredit($id): array
    {
        $this->query("SELECT * FROM `counter` WHERE`id` = :id");
        $this->bind('id', $id);
        $this->execute();

        $counter = $this->fetch();
        if (!empty($counter)) {

            return $counter;
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
    public function counterUpdate(array $data): array
    {
       
        $this->query("UPDATE `counter` SET `Title`=?,`number`=?,`status`=? WHERE `id`=?");
        $this->bind(1, $data['Title']);
        $this->bind(2, $data['number']);
        $this->bind(3, $data['id']);
        
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
    public function counterdelete($id): array
    {
        
        $this->query("DELETE FROM `counter` WHERE `id` = :id");
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
