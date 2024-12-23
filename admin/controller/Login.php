<?php
require_once(__dir__ . '/controller.php');
require_once('./model/LoginModel.php');
  
class Login extends Controller {
  
 public $active = 'login'; //for highlighting the active link...
 private $loginModel;
  
 /**
 * @param null|void
 * @return null|void
 * @desc Checks if the user session is set and creates a new instance of the LoginModel...
 **/
 public function __construct()
 {
 if (isset($_SESSION['auth_status'])) header("Location: dashboard.php");
 $this->loginModel = new LoginModel();
 }
  
 /**
 * @param array
 * @return array|boolean
 * @desc Verifies and redirects a user by calling the login method on the LoginModel...
 **/
 public function login(array $data)
 {
 $username = stripcslashes(strip_tags($data['username']));
 $Password = stripcslashes(strip_tags($data['Password']));
  
 $usernameRecords = $this->loginModel->fetchusername(username: $username);
  
 if (!$usernameRecords['status']) {
 if (md5($Password, $usernameRecords['data']['Password'])) {
 //check if the remember_me was selected...
 $Response = array(
 'status' => true
 );
  
 $_SESSION['data'] = $usernameRecords['data'];
 $_SESSION['auth_status'] = true;
 header("Location: dashboard.php");
 }
  
 $Response = array(
 'status' => false,
 );
 return $Response;
 }
  
 $Response = array(
 'status' => false,
 );
 return $Response;
 }
}
 ?>