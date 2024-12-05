<?php
require_once(__dir__ . '/controller.php');
require_once('./model/AboutModel.php');
require_once('./controller/UploadFile.php');
class about extends Controller
{

    public $active = 'about'; //for highlighting the active link...
    private $Model;

    /**
     * @param null|void
     * @return null|void
     * @desc Checks if the user session is set and creates a new instance of the DashboardModel...
     **/
    public function __construct()
    {
        if (!isset($_SESSION['auth_status'])) header("Location: index.php");
        $this->Model = new aboutModel();
    }
    public function get(): array
    {
        return $this->Model->index();
    }
    /**
     * @param array
     * @return array|boolean
     * @desc Creates, and returns a user by calling the create method on the BatchModel...\
     **/
    public function createabout($data, $file)
    {
        if ($file['image'] != "") {
            $fileName = new upload();
            $fileName->startupload($file);
            $fileName->uploadfile();
            $image  =  $fileName->dbupload;
        } else {
            $image = "";
        }

        // $teacherId = stripcslashes(strip_tags($data['teacherId']));



        $Payload = array(
            'Title' =>  $data['Title'],
            'name' =>  $data['name'],
            'profile' =>  $data['profile'],
            'email' =>  $data['email'],
            'phone' =>  $data['phone'],
            'description' =>  $data['description'],
            'image' =>  $image,
            'status' =>  $data['status'],
        );
        $Response = $this->Model->createabout($Payload);

        if (!$Response) {
            $Response['status'] = 'Sorry, An unexpected error occurred and your request could not be completed.';
            return $Response;
        } else {
            $Response['status'] = 'Congress! you data added successfully';
            header("location:AboutIndex.php");
            return $Response;
        }
    }

    /**
     * @param null|void
     * @return array
     * @desc Returns an array of news by calling the  BatchModel fetchNews method...
     **/
    public function edit($id): array
    {
        return $this->Model->editabout($id);
    }

    public function Update(array $data, $file)
    {
        if ($file['image']['name'] == "") {
            $image = $data['oldImage'];
        } 
        else {
            if ($data['oldImage'] != "") {
                unlink($_SERVER['DOCUMENT_ROOT'] . "/portfolio/" . $data['oldImage']);
            }
            $fileName = new upload();
            $fileName->startupload($file);
            $fileName->uploadfile();
            $image  =  $fileName->dbupload;
        }

        $Payload = array(
            'id'     => $data['id'],
            'Title' =>  $data['Title'],
            'name' =>  $data['name'],
            'profile' =>  $data['profile'],
            'email' =>  $data['email'],
            'phone' =>  $data['phone'],
            'description' =>  $data['description'],
            'image' =>  $image,
            'status' =>  $data['status'],
        );
        $Response = $this->Model->Updateabout($Payload);

        if (!$Response['status']) {
            $Response['status'] = 'Sorry, An unexpected error occurred and your request could not be completed.';
            return $Response;
        } else {
            $Response['status'] = 'Congress! you data Update successfully';
            header("location:AboutIndex.php");
            return $Response;
        }
    }


    /**
     * @param null|void
     * @return array
     * @desc Returns an array of news by calling the  BatchModel fetchNews method...
     **/
    public function delete($id)
    {
        $image = $this->Model->deleteImage($id);
        if ($image['image'] != false) {
            unlink($_SERVER['DOCUMENT_ROOT'] . "/portfolio/" . $image['image']);
        }

        $response = $this->Model->deleteabout($id);
        if (!$response) {
            $Response['status'] = 'Sorry, An unexpected error occurred and your request could not be completed.';
            header("location:AboutIndex.php");
            return $Response;
        } else {
            $Response['status'] = 'Congress! you data Update successfully';
            header("location:AboutIndex.php");
            return $Response;
        }
    }
}
