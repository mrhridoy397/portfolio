<?php
require_once(__dir__ . '/Db.php');

class FaqModel extends Db
{
    /**
     * @param string
     * @return array
     * @desc Returns a user record based on the method parameter....
     **/
    public function index(): array
    {
        $this->query("SELECT * FROM `questions`");
        $this->execute();
        $questions = $this->fetchAll();
        if (!empty($questions)) {
        
            return $questions;
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
    public function questionsCrate(array $data): array
    {
        // var_dump($data);

        $this->query("INSERT INTO `questions`( `Title`,`description`,`status`) VALUES (?,?,?)");
        $this->bind(1, $data['Title']);
        $this->bind(2, $data['description']);
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
    public function questionsedit($id): array
    {
        $this->query("SELECT * FROM `questions` WHERE`id` = :id");
        $this->bind('id', $id);
        $this->execute();

        $questions = $this->fetch();
        if (!empty($questions)) {

            return $questions;
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
    public function questionsUpdate(array $data): array
    {
       
        $this->query("UPDATE `questions` SET `Title`=?,`description`=?,`status`=? WHERE `id`=?");
        $this->bind(1, $data['Title']);
        $this->bind(2, $data['description']);
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
    /**
     * @param string
     * @return array
     * @desc Returns a user record based on the method parameter....
     **/
    public function questionsdelete($id): array
    {
        
        $this->query("DELETE FROM `questions` WHERE `id` = :id");
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
