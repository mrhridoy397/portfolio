
<?php
require_once(__dir__ . '/Db.php');
class CMSModel extends Db
{


    // HeroAria
    public function indexheroaria()
    {
        $this->query("SELECT * FROM `heroaria` where `status` = 1");
        $this->execute();

        $heroaria = $this->fetchAll();
        if (!empty($heroaria)) {
            $Response = array(
                $heroaria
            );
            return $Response;
        }
        return array();
    }

      // About
      public function indexabout()
      {
          $this->query("SELECT * FROM `about` where `status` = 1");
          $this->execute();
  
          $about = $this->fetchAll();
          if (!empty($about)) {
              $Response = array(
                  $about
              );
              return $Response;
          }
          return array();
      }
      
    
    
    
    
}
