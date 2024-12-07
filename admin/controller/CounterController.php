<?php
require_once(__dir__ . '/controller.php');
require_once('./model/CounterModel.php');
class counter extends Controller
{

    public $active = 'counter'; //for highlighting the active link...
    private $Model;

    /**
     * @param null|void
     * @return null|void
     * @desc Checks if the user session is set and creates a new instance of the DashboardModel...
     **/
    public function __construct()
    {
        if (!isset($_SESSION['auth_status'])) header("Location: index.php");
        $this->Model = new counterModel();
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
    public function createcounter($data)
    {

        $Payload = array(
            'Title' =>  $data['Title'],
            'number' =>  $data['number'],
            'status' =>  $data['status'],
        );
        $Response = $this->Model->counterCrate($Payload);

        if (!$Response) {
            $Response['status'] = 'Sorry, An unexpected error occurred and your request could not be completed.';
            return $Response;
        } else {
            $Response['status'] = 'Congress! you data added successfully';
            header("location:CounterIndex.php");
            return $Response;
        }
    }

    /**
     * @param null|void
     * @return array
     * @desc Returns an array of news by calling the  BatchModel fetchNews method...
     **/
    public function editcounter($id): array
    {
        return $this->Model->counteredit($id);
    }

    public function Updatecounter(array $data)
    {

        $Payload = array(
            'id'     => $data['id'],
            'Title' =>  $data['Title'],
            'number' =>  $data['number'],
            'status' =>  $data['status'],
        );
        $Response = $this->Model->counterUpdate($Payload);

        if (!$Response['status']) {
            $Response['status'] = 'Sorry, An unexpected error occurred and your request could not be completed.';
            return $Response;
        } else {
            $Response['status'] = 'Congress! you data Update successfully';
            header("location:CounterIndex.php");
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

        $response = $this->Model->counterdelete($id);
        if (!$response) {
            $Response['status'] = 'Sorry, An unexpected error occurred and your request could not be completed.';
            header("location:CounterIndex.php");
            return $Response;
        } else {
            $Response['status'] = 'Congress! you data Update successfully';
            header("location:CounterIndex.php");
            return $Response;
        }
    }
}
