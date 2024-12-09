<?php
require_once(__dir__ . '/Db.php');

class pricingModel extends Db
{
    /**
     * @param string
     * @return array
     * @desc Returns a user record based on the method parameter....
     **/
    public function index(): array
    {
        $this->query("SELECT * FROM `pricing`");
        $this->execute();
        $pricing = $this->fetchAll();
        if (!empty($pricing)) {
        
            return $pricing;
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
    public function pricingCrate(array $data): array
    {
        // var_dump($data);

        $this->query("INSERT INTO `pricing`( `Title`, `Pricing`,`status`) VALUES (?,?,?)");
        $this->bind(1, $data['Title']);
        $this->bind(2, $data['Pricing']);
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
    public function pricingedit($id): array
    {
        $this->query("SELECT * FROM `pricing` WHERE`id` = :id");
        $this->bind('id', $id);
        $this->execute();

        $pricing = $this->fetch();
        if (!empty($pricing)) {

            return $pricing;
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
    public function pricingUpdate(array $data): array
    {
       
        $this->query("UPDATE `pricing` SET `Title`=?,`Pricing`=?,`status`=? WHERE `id`=?");
        $this->bind(1, $data['Title']);
        $this->bind(2, $data['Pricing']);
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
    public function pricingdelete($id): array
    {
        
        $this->query("DELETE FROM `pricing` WHERE `id` = :id");
        $this->bind('id', $id);
        if ($this->execute()) {
            $Response = array(
                'status' => true,
                'msg' => 'pricing Delete successfully'
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
