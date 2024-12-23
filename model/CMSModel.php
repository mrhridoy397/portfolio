
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

       // resume
       public function indexresume()
       {
           $this->query("SELECT * FROM `resume` where `status` = 1");
           $this->execute();
   
           $resume = $this->fetchAll();
           if (!empty($resume)) {
               $Response = array(
                   $resume
               );
               return $Response;
           }
           return array();
       }
      
         // Services
         public function indexservices()
         {
             $this->query("SELECT * FROM `services` where `status` = 1");
             $this->execute();
     
             $services = $this->fetchAll();
             if (!empty($services)) {
                 $Response = array(
                     $services
                 );
                 return $Response;
             }
             return array();
         }

              // Counter
              public function indexCounter()
              {
                  $this->query("SELECT * FROM `counter` where `status` = 1");
                  $this->execute();
          
                  $counter = $this->fetchAll();
                  if (!empty($counter)) {
                      $Response = array(
                          $counter
                      );
                      return $Response;
                  }
                  return array();
              }
    
    
       // Portfolio
       public function indexportfolio()
       {
           $this->query("SELECT * FROM `portfolio` where `status` = 1");
           $this->execute();
   
           $portfolio = $this->fetchAll();
           if (!empty($portfolio)) {
               $Response = array(
                   $portfolio
               );
               return $Response;
           }
           return array();
       }

    //    Portfolio Details
       public function portfolioDetails($id)
       {
           $this->query("SELECT * FROM `portfolio` where  `id` = :id");
           $this->bind(':id', $id);
           $this->execute();
   
           $portfolio = $this->fetch();
   
           return $portfolio;
       }

              // Pricing
              public function indexPricing()
              {
                  $this->query("SELECT * FROM `pricing` where `status` = 1");
                  $this->execute();
          
                  $Pricing = $this->fetchAll();
                  if (!empty($Pricing)) {
                      $Response = array(
                          $Pricing
                      );
                      return $Response;
                  }
                  return array();
              }

                 // questions
                 public function indexquestions()
                 {
                     $this->query("SELECT * FROM `questions` where `status` = 1");
                     $this->execute();
             
                     $questions = $this->fetchAll();
                     if (!empty($questions)) {
                         $Response = array(
                             $questions
                         );
                         return $Response;
                     }
                     return array();
                 }
   
                     // Testimonials
                     public function indextestimonials()
                     {
                         $this->query("SELECT * FROM `testimonials` where `status` = 1");
                         $this->execute();
                 
                         $testimonials = $this->fetchAll();
                         if (!empty($testimonials)) {
                             $Response = array(
                                 $testimonials
                             );
                             return $Response;
                         }
                         return array();
                     }
                    // Settings
                    public function settings()
                    {
                        $this->query("SELECT * FROM `settings` ");
                        $this->execute();
                        $settings = $this->fetchAll();
                        return $settings;
                    }
}
