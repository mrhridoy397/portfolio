<?php
require_once(__DIR__ . '/Db.php');
class LoginModel extends Db
{

    /**
     * @param string
     * @return array
     * @desc Returns a user record based on the method parameter....
     **/
    public function fetchusername(string $username): array
    {
        $this->query("SELECT * FROM `user` WHERE `username` = :username");
        $this->bind('username', $username);
        $this->execute();

        $username = $this->fetch();
        if (empty($username)) {
            $Response = array(
                'status' => true,
                'data' => $username
            );

            return $Response;
        }

        if (!empty($username)) {
            $Response = array(
                'status' => false,
                'data' => $username
            );

            return $Response;
        }
    }
}