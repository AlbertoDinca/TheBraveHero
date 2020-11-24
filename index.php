<!DOCTYPE html>
<html lang="en">
<head>
          <meta charset="UTF-8">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <meta name="author" content="Gabriel-Alberto Dinca">
          <title>Carl's Adventure</title>
          <link rel="stylesheet" href="style.css">
</head>
<body>
<h1 class="head">Carl's Adventure</h1>
<h2>Plot: Carl went hunting in the enchanted forest, where he was ambushed by a beast.<br> Will our brave hero win? Let's find out together!</h2>
<?php
//Creating the base class
 class CreateAHero{

          //Stats
        public  $Life;
        public  $Power;
        public $Defence;
        public $Speed;
        public $Luck;

        //Constructor
           function __construct($Life, $Power, $Defence, $Speed, $Luck)
        {
                 $this->Life = $Life;
                 $this->Power = $Power;
                 $this->Defence = $Defence;
                 $this->Speed = $Speed;
                 $this->Luck = $Luck;
        }


          }
        
        


class Carl extends CreateAHero
{

          //Puteri Carl 
          //Forta Dragonului
          public function dragonPower($Power)
          {         
                    if (rand(1,10) == 1) {
                      return  $Power = $Power * 2;
                    } else {
                             return $Power;
                    }
          }
          //Scutul Fermecat
          public function shieldPower($EnemyPower)
          {
                    if(rand(1,5) == 1){
                              return $EnemyPower = $EnemyPower / 2;
                    } else {
                              return $EnemyPower;
                    }
          }
}


//Generating Carl's and Beast's stats
$Carl = new Carl (rand(65,95),rand(60,70),rand(40,50),rand(40,50),rand(10,30));

$Beast = new CreateAHero(rand(55,80),rand(50,80),rand(35,55),rand(40,60),rand(25,40));


          //INITIAL STATS OF COMBATANTS
          echo "<h2>Carl's initial stats:  Life ".$Carl->Life." Power ".$Carl->Power." Defence ".$Carl->Defence." Speed ".$Carl->Speed." Luck ".$Carl->Luck."</h2>";
          
          echo "<h2>Beast initial stats:  Life ".$Beast->Life." Power ".$Beast->Power." Defence ".$Beast->Defence." Speed ".$Beast->Speed." Luck ".$Beast->Luck."</h2>";

          
          //Round variable
          $round=0;
//This while loop keeps adding rounds untill one has one
while (($Carl->Life > 0) && ($Beast->Life >0) && ($round <20)) {

          //Round Calculator
          $round++;
          echo "<h1>ROUND ".$round."</h1>";

          //FIRST SCENARIO IF CARL IS FASTER 
           if ($Carl->Speed > $Beast->Speed) {
               echo "Carl atacks first <br>";


               //Power with dragon refers to Carl's power if his passive activates 
               $PowerWithDragon = $Carl->Power * 2 ;


               //Calling dragonPower function
              $Carl->Power = $Carl->dragonPower($Carl->Power);
              if ($Carl->Power == $PowerWithDragon) {
                        echo "Dragon Power has been activated!! <br>";
              } 

              //Calculating Carl's Damage Output
                 $CarlDamage = $Carl->Power - $Beast ->Defence;
                 
                 //Making sure it is in the 0 - 100 range
                  if ($CarlDamage > 100) {
                                    $CarlDamage = 100;
                         } elseif ($CarlDamage < 0) {
                                   $CarlDamage = 0;
                         } 

                         //Luck stat function
                    $arr = range(1, $Beast->Luck);
                 if (in_array(rand(1,100),$arr)) {
                          $CarlDamage = 0;
                          echo "Carl's attack has been dodged <br> ";}

                          //Calculating Beast remaining life 
                 $Beast->Life = $Beast->Life - $CarlDamage ;

                 //Outputing result of the atack
               echo "Beast received ".$CarlDamage." Damage <br> "."Beast's remaining life ".$Beast->Life."<br>";

               //Revesing Carl's Power to normal if DragonPower Activates
               if ($Carl->Power == $PowerWithDragon) {
                         $Carl->Power = $PowerWithDragon / 2;
               }

                //Outputing Carl's Victory if the beast has no more HP
                if ($Beast->Life <= 0) {
                          echo "<p class='win'>Carl is Victorious!!! </p>";

                          //Switching roles and continuing
                } else {
                          echo "Beast's turn to atack <br>";

                          //Calculating Beast DMG
                          $BeastDamage = $Beast->Power - $Carl ->Defence; 

                          //Shield power refers to the Beast DMG output if Carl's passive shieldPower activates
                          $ShielPowerActive = $BeastDamage /2;

                          //Calling shieldPower 
                         $BeastDamage = $Carl->shieldPower($BeastDamage);
                         if ($BeastDamage == $ShielPowerActive) {
                                   echo "Shield Power Active!! <br>";
                         }

                         //Making sure it is in the 0 - 100 range
                         if ($BeastDamage > 100) {
                                    $BeastDamage = 100;
                         } elseif ($BeastDamage < 0) {
                                   $BeastDamage = 0;
                         } 
                          //Luck stat function
                         $arr = range(1, $Carl->Luck);
                         if (in_array(rand(1,100),$arr)) 
                         {
                          $BeastDamage = 0;
                          echo "Beast attack has been dodged <br> ";
                          }
                         //Calculating Carl Remaining Life after atack
                          $Carl->Life = $Carl->Life - $BeastDamage ;

                          //Outputing the results of the atack
                          echo "Carl received ".$BeastDamage." Damage <br>"."Carl remaining life ".$Carl->Life."<br>";

                          //Outputing the beast's Victory if Carl does not have any more HP
                          if ($Carl -> Life <= 0) {
                                    echo "<p class= 'lost'> The Beast Won </p>";
                          }

                          //If the Round limit has been reached
                          if ($round >19 ) {
                                    echo "Limit number of Rounds has been reached <br>";
                                    if ( $Carl->Life > $Beast->Life) {
                                              echo "Carl Has won <br>";
                                    }elseif ( $Carl->Life < $Beast->Life) {
                                              echo "The Beast has won <br>";
                                    }elseif ($Carl->Life == $Beast->Life) {
                                              echo "The battle was a draw <br>";
                                    }
                          } 

                }
            }

            //Second Scenatio IF BEAST IS FASTER
            if ($Carl->Speed < $Beast->Speed){
                       echo "Beast atacks first <br>";

                       //Calculating Beast DMG
                          $BeastDamage = $Beast->Power - $Carl ->Defence; 

                          //Shield power refers to the Beast DMG output if Carl's passive shieldPower activates
                          $ShielPowerActive = $BeastDamage /2;

                          //Calling shieldPower
                         $BeastDamage = $Carl->shieldPower($BeastDamage);
                         if ($BeastDamage == $ShielPowerActive) {
                                   echo "Shield Power Active!! <br>";
                         }

                         //Making sure the DMG is in the 0 - 100 Range
                         if ($BeastDamage > 100) {
                                    $BeastDamage = 100;
                         } elseif ($BeastDamage < 0) {
                                   $BeastDamage = 0;
                         } 

                          //Luck stat function
                         $arr = range(1, $Carl->Luck);
                         if (in_array(rand(1,100),$arr)) 
                         {
                          $BeastDamage = 0;
                          echo "Beast attack has been dodged <br> ";
                          }

                         //Calculating Carl's remaining life after atack
                          $Carl->Life = $Carl->Life - $BeastDamage ;

                          //Outputing the results after atack
                          echo "Carl received ".$BeastDamage." Damage <br>"."Carl remaining life ".$Carl->Life."<br>";

                          //Outputing the Beast's victory if Carl has no HP left
                          if ($Carl -> Life <= 0) {
                                    echo "<p class= 'lost'> The Beast Won </p>";

                                    //Switching Roles and Continuing
                          } else{
                                  echo "Carl turn to atack <br>";

                                   //Power with dragon refers to Carl's power if his passive activates 
                                  $PowerWithDragon = $Carl->Power * 2 ;

                                  //Calling dragonPower Function
                                  $Carl->Power = $Carl->dragonPower($Carl->Power);
                                  if ($Carl->Power == $PowerWithDragon) {
                                  echo "Dragon Power has been activated!! <br>";
                                } 

                                //Calculating Carl's DMG
                                  $CarlDamage = $Carl->Power - $Beast ->Defence; 

                                  //Making sure it remains in the 0 - 100 range
                                  if ($CarlDamage > 100) {
                                  $CarlDamage = 100;
                                } elseif ($CarlDamage < 0) {
                                   $CarlDamage = 0;
                                   } 

                                    //Luck stat function
                                    $arr = range(1, $Beast->Luck);
                                    if (in_array(rand(1,100),$arr)) {
                                    $CarlDamage = 0;
                                    echo "Carl's attack has been dodged <br> ";}

                                   //Calculating beast remaining life
                                  $Beast->Life = $Beast->Life - $CarlDamage ;

                                  //Outputing results 
                                  echo "Beast received ".$CarlDamage." Damage <br> "."Beast's remaining life ".$Beast->Life."<br>";

                                   //Revesing Carl's Power to normal if DragonPower Activates
                                   if ($Carl->Power == $PowerWithDragon) {
                                   $Carl->Power = $PowerWithDragon / 2;
                                   }

                                  //Outputing Carl's victory if beast has no HP left
                                  if ($Beast->Life <= 0) {
                                  echo "<p class='win'>Carl is Victorious!!! </p>";  
                                  }

                    }
                     //If the Round limit has been reached
                          if ($round >19 ) {
                                    echo "Limit number of Rounds has been reached <br>";
                                    if ( $Carl->Life > $Beast->Life) {
                                              echo "Carl Has won <br>";
                                    }elseif ( $Carl->Life < $Beast->Life) {
                                              echo "The Beast has won <br>";
                                    }elseif ($Carl->Life == $Beast->Life) {
                                              echo "The battle was a draw <br>";
                                    }
                          } 
          }

          // Third Scenario IF Carl's speed is equal to the beast's speed
          if ($Carl->Speed == $Beast->Speed) {
                    if ($Carl->Luck > $Beast->Luck) {
                               echo "Carl atacks first <br>";


               //Power with dragon refers to Carl's power if his passive activates 
               $PowerWithDragon = $Carl->Power * 2 ;


               //Calling dragonPower function
              $Carl->Power = $Carl->dragonPower($Carl->Power);
              if ($Carl->Power == $PowerWithDragon) {
                        echo "Dragon Power has been activated!! <br>";
              } 

              //Calculating Carl's Damage Output
                 $CarlDamage = $Carl->Power - $Beast ->Defence;
                 
                 //Making sure it is in the 0 - 100 range
                  if ($CarlDamage > 100) {
                                    $CarlDamage = 100;
                         } elseif ($CarlDamage < 0) {
                                   $CarlDamage = 0;
                         } 

                         //Luck stat function
                    $arr = range(1, $Beast->Luck);
                 if (in_array(rand(1,100),$arr)) {
                          $CarlDamage = 0;
                          echo "Carl's attack has been dodged <br> ";}

                          //Calculating Beast remaining life 
                 $Beast->Life = $Beast->Life - $CarlDamage ;

                 //Outputing result of the atack
               echo "Beast received ".$CarlDamage." Damage <br> "."Beast's remaining life ".$Beast->Life."<br>";

               //Revesing Carl's Power to normal if DragonPower Activates
               if ($Carl->Power == $PowerWithDragon) {
               $Carl->Power = $PowerWithDragon / 2;
               }

               //Outputing Carl's Victory if the beast has no more HP
                if ($Beast->Life <= 0) {
                          echo "<p class='win'>Carl is Victorious!!! </p>";

                          //Switching roles and continuing
                } else {
                          echo "Beast's turn to atack <br>";

                          //Calculating Beast DMG
                          $BeastDamage = $Beast->Power - $Carl ->Defence; 

                          //Shield power refers to the Beast DMG output if Carl's passive shieldPower activates
                          $ShielPowerActive = $BeastDamage /2;

                          //Calling shieldPower 
                         $BeastDamage = $Carl->shieldPower($BeastDamage);
                         if ($BeastDamage == $ShielPowerActive) {
                                   echo "Shield Power Active!! <br>";
                         }

                         //Making sure it is in the 0 - 100 range
                         if ($BeastDamage > 100) {
                                    $BeastDamage = 100;
                         } elseif ($BeastDamage < 0) {
                                   $BeastDamage = 0;
                         } 
                          //Luck stat function
                         $arr = range(1, $Carl->Luck);
                         if (in_array(rand(1,100),$arr)) 
                         {
                          $BeastDamage = 0;
                          echo "Beast attack has been dodged <br> ";
                          }
                         //Calculating Carl Remaining Life after atack
                          $Carl->Life = $Carl->Life - $BeastDamage ;

                          //Outputing the results of the atack
                          echo "Carl received ".$BeastDamage." Damage <br>"."Carl remaining life ".$Carl->Life."<br>";

                          //Outputing the beast's Victory if Carl does not have any more HP
                          if ($Carl -> Life <= 0) {
                                    echo "<p class= 'lost'> The Beast Won </p>";
                          }

                          //If the Round limit has been reached
                          if ($round >19 ) {
                                    echo "Limit number of Rounds has been reached <br>";
                                    if ( $Carl->Life > $Beast->Life) {
                                              echo "Carl Has won <br>";
                                    }elseif ( $Carl->Life < $Beast->Life) {
                                              echo "The Beast has won <br>";
                                    }elseif ($Carl->Life == $Beast->Life) {
                                              echo "The battle was a draw <br>";
                                    }
                          } 

                }
                    }elseif ($Carl->Luck < $Beast->Luck) {
                               echo "Beast atacks first <br>";

                       //Calculating Beast DMG
                          $BeastDamage = $Beast->Power - $Carl ->Defence; 

                          //Shield power refers to the Beast DMG output if Carl's passive shieldPower activates
                          $ShielPowerActive = $BeastDamage /2;

                          //Calling shieldPower
                         $BeastDamage = $Carl->shieldPower($BeastDamage);
                         if ($BeastDamage == $ShielPowerActive) {
                                   echo "Shield Power Active!! <br>";
                         }

                         //Making sure the DMG is in the 0 - 100 Range
                         if ($BeastDamage > 100) {
                                    $BeastDamage = 100;
                         } elseif ($BeastDamage < 0) {
                                   $BeastDamage = 0;
                         } 

                          //Luck stat function
                         $arr = range(1, $Carl->Luck);
                         if (in_array(rand(1,100),$arr)) 
                         {
                          $BeastDamage = 0;
                          echo "Beast attack has been dodged <br> ";
                          }

                         //Calculating Carl's remaining life after atack
                          $Carl->Life = $Carl->Life - $BeastDamage ;

                          //Outputing the results after atack
                          echo "Carl received ".$BeastDamage." Damage <br>"."Carl remaining life ".$Carl->Life."<br>";

                          //Outputing the Beast's victory if Carl has no HP left
                          if ($Carl -> Life <= 0) {
                                    echo "<p class= 'lost'> The Beast Won </p>";

                                    //Switching Roles and Continuing
                          } else{
                                  echo "Carl turn to atack <br>";

                                   //Power with dragon refers to Carl's power if his passive activates 
                                  $PowerWithDragon = $Carl->Power * 2 ;

                                  //Calling dragonPower Function
                                  $Carl->Power = $Carl->dragonPower($Carl->Power);
                                  if ($Carl->Power == $PowerWithDragon) {
                                  echo "Dragon Power has been activated!! <br>";
                                } 

                                //Calculating Carl's DMG
                                  $CarlDamage = $Carl->Power - $Beast ->Defence; 

                                  //Making sure it remains in the 0 - 100 range
                                  if ($CarlDamage > 100) {
                                  $CarlDamage = 100;
                                } elseif ($CarlDamage < 0) {
                                   $CarlDamage = 0;
                                   } 

                                    //Luck stat function
                                    $arr = range(1, $Beast->Luck);
                                    if (in_array(rand(1,100),$arr)) {
                                    $CarlDamage = 0;
                                   echo "Carl's attack has been dodged <br> ";}

                                   //Calculating beast remaining life
                                  $Beast->Life = $Beast->Life - $CarlDamage ;

                                  //Outputing results 
                                  echo "Beast received ".$CarlDamage." Damage <br> "."Beast's remaining life ".$Beast->Life."<br>";

                                  //Revesing Carl's Power to normal if DragonPower Activates
                                  if ($Carl->Power == $PowerWithDragon) {
                                   $Carl->Power = $PowerWithDragon / 2;
                                   }

                                  //Outputing Carl's victory if beast has no HP left
                                  if ($Beast->Life <= 0) {
                                  echo "<p class='win'>Carl is Victorious!!! </p>";  
                                  }

                    }
                     //If the Round limit has been reached
                          if ($round >19 ) {
                                    echo "Limit number of Rounds has been reached <br>";
                                    if ( $Carl->Life > $Beast->Life) {
                                              echo "Carl Has won <br>";
                                    }elseif ( $Carl->Life < $Beast->Life) {
                                              echo "The Beast has won <br>";
                                    }elseif ($Carl->Life == $Beast->Life) {
                                              echo "The battle was a draw <br>";
                                    }
                          } 
                    }
          }
}
?>
<H2>The END.</H2>
</body>
</html>