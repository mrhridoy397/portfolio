<?php
require_once(__dir__ . '/controller.php');
require_once('./model/PricingModel.php');
class Pricing extends Controller
{

    public $active = 'pricing'; //for highlighting the active link...
    private $Model;

    /**
     * @param null|void
     * @return null|void
     * @desc Checks if the user session is set and creates a new instance of the DashboardModel...
     **/
    public function __construct()
    {
        if (!isset($_SESSION['auth_status'])) header("Location: index.php");
        $this->Model = new pricingModel();
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
    public function createpricing($data)
    {

        $Payload = array(
            'Title' =>  $data['Title'],
            'Pricing' =>  $data['Pricing'],
            'status' =>  $data['status'],
        );
        $Response = $this->Model->pricingCrate($Payload);

        if (!$Response) {
            $Response['status'] = 'Sorry, An unexpected error occurred and your request could not be completed.';
            return $Response;
        } else {
            $Response['status'] = 'Congress! you data added successfully';
            header("location:PricingIndex.php");
            return $Response;
        }
    }

    /**
     * @param null|void
     * @return array
     * @desc Returns an array of news by calling the  BatchModel fetchNews method...
     **/
    public function editpricing($id): array
    {
        return $this->Model->pricingedit($id);
    }

    public function Updatepricing(array $data)
    {

        $Payload = array(
            'id'     => $data['id'],
            'Title' =>  $data['Title'],
            'Pricing' =>  $data['Pricing'],
            'status' =>  $data['status'],
        );
        $Response = $this->Model->pricingUpdate($Payload);

        if (!$Response['status']) {
            $Response['status'] = 'Sorry, An unexpected error occurred and your request could not be completed.';
            return $Response;
        } else {
            $Response['status'] = 'Congress! you data Update successfully';
            header("location:PricingIndex.php");
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

        $response = $this->Model->pricingdelete($id);
        if (!$response) {
            $Response['status'] = 'Sorry, An unexpected error occurred and your request could not be completed.';
            header("location:PricingIndex.php");
            return $Response;
        } else {
            $Response['status'] = 'Congress! you data Update successfully';
            header("location:PricingIndex.php");
            return $Response;
        }
    }
}