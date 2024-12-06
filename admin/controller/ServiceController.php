<?php
require_once(__dir__ . '/controller.php');
require_once('./model/ServicesModel.php');
require_once('./controller/UploadFile.php');
class Services extends Controller
{

    public $active = 'Services'; //for highlighting the active link...
    private $Model;

    /**
     * @param null|void
     * @return null|void
     * @desc Checks if the user session is set and creates a new instance of the DashboardModel...
     **/
    public function __construct()
    {
        if (!isset($_SESSION['auth_status'])) header("Location: index.php");
        $this->Model = new servicesModel();
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
    public function create($data, $file)
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
            'description' =>  $data['description'],
            'image' =>  $image,
            'status' =>  $data['status'],
        );
        $Response = $this->Model->createservices($Payload);

        if (!$Response) {
            $Response['status'] = 'Sorry, An unexpected error occurred and your request could not be completed.';
            return $Response;
        } else {
            $Response['status'] = 'Congress! you data added successfully';
            header("location:ServiceIndex.php");
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
        return $this->Model->editservices($id);
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
            'description' =>  $data['description'],
            'image' =>  $image,
            'status' =>  $data['status']
        );
        $Response = $this->Model->Updateservices($Payload);

        if (!$Response['status']) {
            $Response['status'] = 'Sorry, An unexpected error occurred and your request could not be completed.';
            return $Response;
        } else {
            $Response['status'] = 'Congress! you data Update successfully';
            header("location:ServiceIndex.php");
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

        $response = $this->Model->deleteservices($id);
        if (!$response) {
            $Response['status'] = 'Sorry, An unexpected error occurred and your request could not be completed.';
            header("location:ServiceIndex.php");
            return $Response;
        } else {
            $Response['status'] = 'Congress! you data Update successfully';
            header("location:ServiceIndex.php");
            return $Response;
        }
    }
}
