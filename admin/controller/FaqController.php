<?php
require_once(__dir__ . '/controller.php');
require_once('./model/FaqModel.php');
class Faq extends Controller
{

    public $active = 'Faq'; //for highlighting the active link...
    private $Model;

    /**
     * @param null|void
     * @return null|void
     * @desc Checks if the user session is set and creates a new instance of the DashboardModel...
     **/
    public function __construct()
    {
        if (!isset($_SESSION['auth_status'])) header("Location: index.php");
        $this->Model = new FaqModel();
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
    public function Cratequestions($data)
    {

        $Payload = array(
            'Title' =>  $data['Title'],
            'description' =>  $data['description'],
            'status' =>  $data['status'],
        );
        $Response = $this->Model->questionsCrate($Payload);

        if (!$Response) {
            $Response['status'] = 'Sorry, An unexpected error occurred and your request could not be completed.';
            return $Response;
        } else {
            $Response['status'] = 'Congress! you data added successfully';
            header("location:FaqIndex.php");
            return $Response;
        }
    }

    /**
     * @param null|void
     * @return array
     * @desc Returns an array of news by calling the  BatchModel fetchNews method...
     **/
    public function editquestions($id): array
    {
        return $this->Model->questionsedit($id);
    }

    public function Updatequestions(array $data)
    {

        $Payload = array(
            'id'     => $data['id'],
            'Title' =>  $data['Title'],
            'description' =>  $data['description'],
            'status' =>  $data['status'],
        );
        $Response = $this->Model->questionsUpdate($Payload);

        if (!$Response['status']) {
            $Response['status'] = 'Sorry, An unexpected error occurred and your request could not be completed.';
            return $Response;
        } else {
            $Response['status'] = 'Congress! you data Update successfully';
            header("location:FaqIndex.php");
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

        $response = $this->Model->questionsdelete($id);
        if (!$response) {
            $Response['status'] = 'Sorry, An unexpected error occurred and your request could not be completed.';
            header("location:FaqIndex.php");
            return $Response;
        } else {
            $Response['status'] = 'Congress! you data Update successfully';
            header("location:FaqIndex.php");
            return $Response;
        }
    }
}
