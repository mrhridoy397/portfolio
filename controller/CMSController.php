
<?php
require_once(__dir__ . './Controller.php');
require_once('./model/CMSModel.php');
require_once('./controller/UploadFile.php');
class CMSController extends Controller
{

    public $active = 'CMS'; //for highlighting the active link...
    private $Model;

    /**
     * @param null|void
     * @return null|void
     * @desc Checks if the user session is set and creates a new instance of the DashboardModel...
     **/
    public function __construct()
    {
        $this->Model = new CMSModel();
    }

    /**
     * @param null|void
     * @return array
     * @desc Returns an array of news by calling the BatchModel fetchNews method...
     **/
    
    
     // HeroAria
    public function getheroaria()
    {
        return $this->Model->indexheroaria();
    }

      // About
      public function getabout()
      {
          return $this->Model->indexabout();
      }
  
    //   resume

    public function getresume()
    {
        return $this->Model->indexresume();
    }

       //   Services
       public function getservices()
       {
           return $this->Model->indexservices();
       }
    
        //   Counter
        public function getCounter()
        {
            return $this->Model->indexCounter();
        }
           //   Portfolio
           public function getportfolio()
           {
               return $this->Model->indexportfolio();
           }
     //   Portfolio Details
    public function detailsportfolio($id)
     {
         return $this->Model->portfolioDetails($id);
     }
}
