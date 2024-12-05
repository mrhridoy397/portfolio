<?php
require_once(__dir__ . '/controller.php');
require_once('./model/ResumeModel.php');
class resume extends Controller
{

    public $active = 'Resume'; //for highlighting the active link...
    private $Model;

    /**
     * @param null|void
     * @return null|void
     * @desc Checks if the user session is set and creates a new instance of the DashboardModel...
     **/
    public function __construct()
    {
        if (!isset($_SESSION['auth_status'])) header("Location: index.php");
        $this->Model = new resumeModel();
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
    public function createresume($data)
    {

        $Payload = array(
            'Title' =>  $data['Title'],
            'shortTitle' =>  $data['shortTitle'],
            'location' =>  $data['location'],
            'year' =>  $data['year'],
            'description' =>  $data['description'],
            'status' =>  $data['status'],
        );
        $Response = $this->Model->resumeCrate($Payload);

        if (!$Response) {
            $Response['status'] = 'Sorry, An unexpected error occurred and your request could not be completed.';
            return $Response;
        } else {
            $Response['status'] = 'Congress! you data added successfully';
            header("location:ResumeIndex.php");
            return $Response;
        }
    }

    /**
     * @param null|void
     * @return array
     * @desc Returns an array of news by calling the  BatchModel fetchNews method...
     **/
    public function editresume($id): array
    {
        return $this->Model->resumeedit($id);
    }

    public function Updateresume(array $data)
    {

        $Payload = array(
            'id'     => $data['id'],
            'Title' =>  $data['Title'],
            'shortTitle' =>  $data['shortTitle'],
            'location' =>  $data['location'],
            'year' =>  $data['year'],
            'description' =>  $data['description'],
            'status' =>  $data['status'],
        );
        $Response = $this->Model->resumeUpdate($Payload);

        if (!$Response['status']) {
            $Response['status'] = 'Sorry, An unexpected error occurred and your request could not be completed.';
            return $Response;
        } else {
            $Response['status'] = 'Congress! you data Update successfully';
            header("location:ResumeIndex.php");
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

        $response = $this->Model->resumedelete($id);
        if (!$response) {
            $Response['status'] = 'Sorry, An unexpected error occurred and your request could not be completed.';
            header("location:ResumeIndex.php");
            return $Response;
        } else {
            $Response['status'] = 'Congress! you data Update successfully';
            header("location:ResumeIndex.php");
            return $Response;
        }
    }
}
