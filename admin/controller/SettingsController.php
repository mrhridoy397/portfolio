<?php
require_once(__dir__ . '/controller.php');
require_once('./model/SettingsModel.php');
require_once('./controller/newUploadsFile.php');
class Settings extends Controller
{

    public $active = 'Settings'; //for highlighting the active link...
    private $Model;

    /**
     * @param null|void
     * @return null|void
     * @desc Checks if the user session is set and creates a new instance of the DashboardModel...
     **/
    public function __construct()
    {
        if (!isset($_SESSION['auth_status'])) header("Location: index.php");
        $this->Model = new SettingModel();
    }
  

    /**
     * @param null|void
     * @return array
     * @desc Returns an array of news by calling the  BatchModel fetchNews method...
     **/
    public function edit(): array
    {
        return $this->Model->edit();
    }

    public function Update($data, $file)
    {
        
        if ($file['Faviconicon']['name'] == "") {
            $Faviconicon = $data['oldFaviconicon'];
        } 
        else {
            if ($data['oldFaviconicon'] != "") {
                unlink($_SERVER['DOCUMENT_ROOT'] . "/portfolio/" . $data['oldFaviconicon']);
            }
            $files = $file['Faviconicon'];
            $fileName = new upload();
            $fileName->startupload($files);
            $fileName->uploadfile();
            $Faviconicon  =  $fileName->dbupload;
        }
        

        $Payload = array(
           'Faviconicon' => $Faviconicon,
           'hirenow' => $data['hirenow'],
           'WhatsApp' => $data['WhatsApp'],
           'facebook' => $data['facebook'],
           'Instagram' => $data['Instagram'],
           'linkedin' => $data['linkedin'],
           'resume' => $data['resume'],
           'service' => $data['service'],
           'portfolio' => $data['portfolio'],
           'pricing' => $data['pricing'],
           'faq' => $data['faq'],
           'address' => $data['address'],
           'callus' => $data['callus'],
           'contact' => $data['contact'],
           'email' => $data['email'],






        );
        $Response = $this->Model->Update($Payload);

        if (!$Response = true) {
            $Response = 'Sorry, An unexpected error occurred and your request could not be completed.';
            return $Response;
        } else {
            $Response  = 'Congress! you data Update successfully';
            header("location:SettingEdit.php");
            return $Response;
        }
    }


    
}
