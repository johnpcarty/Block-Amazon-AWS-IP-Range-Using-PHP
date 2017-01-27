<?php

/*
Exported: 2017-01-27 11:35:27

Note:
- I block Amazon AWS, because I need to protect the time and investment
  I made in building a thesaurus of job titles.  One person could use AWS to 
  scrape my site, and that is a risk I cannot accept.

Limitations:
 - ***This is only a demonstration of how to block AWS IP Addresses.***
    The AWS list IP Addresses may be out of date.
    The most recent list of Amazon AWS ip addresses can be found at:
        https://ip-ranges.amazonaws.com/ip-ranges.json
 - This function only handles IPv4 addresses. An IPv6 Address will say that it is not Amazon.
    Amazon AWS does contain IPv6 addresses.

Usage: 
1. Include this php in your php program.  For example:

    include 'block-amazon-using-php.php';

2. Call the check_amazon function:

    $bIPIsAmazon = check_amazon_using_tree( [The_IP_Address_to_Check]);
    
3. The $bIPIsAmazon will be equal to True if the given IP address is from Amazon.

    if ($bIPIsAmazon == True) {... [Your Code for an Amazon IP Address] ...}

*/

function check_amazon_using_tree($client_ip_address) {

$bIPIsAmazon = False;

if (filter_var($client_ip_address, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4 )) {

     $ip_array = explode('.', $client_ip_address);
     $client_ip_address0 = $ip_array[0];

     if (strlen($client_ip_address0) == 1) {
          $client_ip_address0_first_character = '0';
          $client_ip_address0_second_character = '00';
     } elseif (strlen($client_ip_address0) == 2) {
          $client_ip_address0_first_character = '0';
          $client_ip_address0_second_character = '0' . substr($client_ip_address0,0,1) ;
     } else {
          $client_ip_address0_first_character = substr($client_ip_address0,0,1) ;
          $client_ip_address0_second_character = substr($client_ip_address0,0,2) ;
     }


     switch ($client_ip_address0_first_character) { 
     case '0': // First Character
          switch ($client_ip_address0_second_character) { 
          case '01': // case second number
               switch ($client_ip_address0) { 
               case '013': // case third number
                    if ($ip_array[1] >= 32 && $ip_array[1] <= 33){
                         $bIPIsAmazon = true;
                    } elseif ($ip_array[1] >= 54 && $ip_array[1] <= 56){
                         $bIPIsAmazon = true;
                    } elseif ($ip_array[1] >= 112 && $ip_array[1] <= 115){
                         $bIPIsAmazon = true;
                    } elseif ($ip_array[1] == 124){
                         $bIPIsAmazon = true;
                    }  // end 0 + 1
                    break; // break ip address 0
               }
               break; // break second digit
          case '02': // case second number
               switch ($client_ip_address0) { 
               case '023': // case third number
                    if ($ip_array[1] >= 20 && $ip_array[1] <= 23){
                         $bIPIsAmazon = true;
                    }  // end 0 + 1
                    break; // break ip address 0
               case '027': // case third number
                    if ($ip_array[1] == 0){
                         if ($ip_array[2] >= 0 && $ip_array[2] <= 3){
                              $bIPIsAmazon = true;
                         }  // end 0 + 1 + 2
                    }  // end 0 + 1
                    break; // break ip address 0
               }
               break; // break second digit
          case '03': // case second number
               switch ($client_ip_address0) { 
               case '034': // case third number
                    if ($ip_array[1] >= 192 && $ip_array[1] <= 207){
                         $bIPIsAmazon = true;
                    } elseif ($ip_array[1] >= 248 && $ip_array[1] <= 255){
                         $bIPIsAmazon = true;
                    }  // end 0 + 1
                    break; // break ip address 0
               case '035': // case third number
                    if ($ip_array[1] == 154){
                         $bIPIsAmazon = true;
                    } elseif ($ip_array[1] >= 156 && $ip_array[1] <= 167){
                         $bIPIsAmazon = true;
                    }  // end 0 + 1
                    break; // break ip address 0
               }
               break; // break second digit
          case '04': // case second number
               switch ($client_ip_address0) { 
               case '043': // case third number
                    if ($ip_array[1] == 250){
                         if ($ip_array[2] >= 192 && $ip_array[2] <= 193){
                              $bIPIsAmazon = true;
                         }  // end 0 + 1 + 2
                    }  // end 0 + 1
                    break; // break ip address 0
               case '046': // case third number
                    if ($ip_array[1] == 51){
                         if ($ip_array[2] >= 128 && $ip_array[2] <= 207){
                              $bIPIsAmazon = true;
                         } elseif ($ip_array[2] >= 216 && $ip_array[2] <= 255){
                              $bIPIsAmazon = true;
                         }  // end 0 + 1 + 2
                    } elseif ($ip_array[1] == 137){
                         $bIPIsAmazon = true;
                    }  // end 0 + 1
                    break; // break ip address 0
               }
               break; // break second digit
          case '05': // case second number
               switch ($client_ip_address0) { 
               case '050': // case third number
                    if ($ip_array[1] >= 16 && $ip_array[1] <= 19){
                         $bIPIsAmazon = true;
                    } elseif ($ip_array[1] == 112){
                         $bIPIsAmazon = true;
                    }  // end 0 + 1
                    break; // break ip address 0
               case '052': // case third number
                    if ($ip_array[1] >= 0 && $ip_array[1] <= 45){
                         $bIPIsAmazon = true;
                    } elseif ($ip_array[1] == 46){
                         if ($ip_array[2] >= 0 && $ip_array[2] <= 63){
                              $bIPIsAmazon = true;
                         }  // end 0 + 1 + 2
                    } elseif ($ip_array[1] >= 48 && $ip_array[1] <= 60){
                         $bIPIsAmazon = true;
                    } elseif ($ip_array[1] >= 62 && $ip_array[1] <= 74){
                         $bIPIsAmazon = true;
                    } elseif ($ip_array[1] >= 76 && $ip_array[1] <= 80){
                         $bIPIsAmazon = true;
                    } elseif ($ip_array[1] >= 84 && $ip_array[1] <= 91){
                         $bIPIsAmazon = true;
                    } elseif ($ip_array[1] == 92){
                         if ($ip_array[2] >= 0 && $ip_array[2] <= 35){
                              $bIPIsAmazon = true;
                         } elseif ($ip_array[2] >= 39 && $ip_array[2] <= 91){
                              $bIPIsAmazon = true;
                         } elseif ($ip_array[2] >= 248 && $ip_array[2] <= 255){
                              $bIPIsAmazon = true;
                         }  // end 0 + 1 + 2
                    } elseif ($ip_array[1] == 93){
                         if ($ip_array[2] >= 0 && $ip_array[2] <= 5){
                              $bIPIsAmazon = true;
                         } elseif ($ip_array[2] >= 8 && $ip_array[2] <= 16){
                              $bIPIsAmazon = true;
                         }  // end 0 + 1 + 2
                    } elseif ($ip_array[1] == 94){
                         if ($ip_array[2] >= 0 && $ip_array[2] <= 15){
                              $bIPIsAmazon = true;
                         } elseif ($ip_array[2] == 17){
                              $bIPIsAmazon = true;
                         } elseif ($ip_array[2] >= 24 && $ip_array[2] <= 67){
                              $bIPIsAmazon = true;
                         } elseif ($ip_array[2] >= 80 && $ip_array[2] <= 115){
                              $bIPIsAmazon = true;
                         } elseif ($ip_array[2] >= 192 && $ip_array[2] <= 197){
                              $bIPIsAmazon = true;
                         } elseif ($ip_array[2] == 198){
                              if ($ip_array[3] >= 0 && $ip_array[3] <= 159){
                                   $bIPIsAmazon = true;
                              }  // end 0 + 1 + 2 + 3
                         } elseif ($ip_array[2] >= 199 && $ip_array[2] <= 200){
                              $bIPIsAmazon = true;
                         } elseif ($ip_array[2] >= 204 && $ip_array[2] <= 247){
                              $bIPIsAmazon = true;
                         } elseif ($ip_array[2] == 248){
                              if ($ip_array[3] >= 0 && $ip_array[3] <= 239){
                                   $bIPIsAmazon = true;
                              }  // end 0 + 1 + 2 + 3
                         } elseif ($ip_array[2] == 249){
                              if ($ip_array[3] >= 0 && $ip_array[3] <= 15){
                                   $bIPIsAmazon = true;
                              }  // end 0 + 1 + 2 + 3
                         } elseif ($ip_array[2] >= 252 && $ip_array[2] <= 255){
                              $bIPIsAmazon = true;
                         }  // end 0 + 1 + 2
                    } elseif ($ip_array[1] == 95){
                         if ($ip_array[2] >= 0 && $ip_array[2] <= 28){
                              $bIPIsAmazon = true;
                         } elseif ($ip_array[2] >= 30 && $ip_array[2] <= 31){
                              $bIPIsAmazon = true;
                         } elseif ($ip_array[2] >= 34 && $ip_array[2] <= 40){
                              $bIPIsAmazon = true;
                         } elseif ($ip_array[2] >= 48 && $ip_array[2] <= 107){
                              $bIPIsAmazon = true;
                         } elseif ($ip_array[2] == 110){
                              $bIPIsAmazon = true;
                         } elseif ($ip_array[2] >= 112 && $ip_array[2] <= 138){
                              $bIPIsAmazon = true;
                         } elseif ($ip_array[2] >= 142 && $ip_array[2] <= 150){
                              $bIPIsAmazon = true;
                         } elseif ($ip_array[2] >= 192 && $ip_array[2] <= 207){
                              $bIPIsAmazon = true;
                         } elseif ($ip_array[2] >= 212 && $ip_array[2] <= 215){
                              $bIPIsAmazon = true;
                         } elseif ($ip_array[2] >= 240 && $ip_array[2] <= 253){
                              $bIPIsAmazon = true;
                         } elseif ($ip_array[2] == 255){
                              if ($ip_array[3] >= 0 && $ip_array[3] <= 159){
                                   $bIPIsAmazon = true;
                              }  // end 0 + 1 + 2 + 3
                         }  // end 0 + 1 + 2
                    } elseif ($ip_array[1] == 119){
                         if ($ip_array[2] >= 216 && $ip_array[2] <= 239){
                              $bIPIsAmazon = true;
                         }  // end 0 + 1 + 2
                    } elseif ($ip_array[1] >= 192 && $ip_array[1] <= 193){
                         $bIPIsAmazon = true;
                    } elseif ($ip_array[1] >= 196 && $ip_array[1] <= 218){
                         $bIPIsAmazon = true;
                    } elseif ($ip_array[1] == 219){
                         if ($ip_array[2] >= 0 && $ip_array[2] <= 47){
                              $bIPIsAmazon = true;
                         } elseif ($ip_array[2] >= 56 && $ip_array[2] <= 95){
                              $bIPIsAmazon = true;
                         }  // end 0 + 1 + 2
                    } elseif ($ip_array[1] >= 220 && $ip_array[1] <= 222){
                         $bIPIsAmazon = true;
                    }  // end 0 + 1
                    break; // break ip address 0
               case '054': // case third number
                    if ($ip_array[1] >= 64 && $ip_array[1] <= 95){
                         $bIPIsAmazon = true;
                    } elseif ($ip_array[1] >= 144 && $ip_array[1] <= 179){
                         $bIPIsAmazon = true;
                    } elseif ($ip_array[1] >= 182 && $ip_array[1] <= 221){
                         $bIPIsAmazon = true;
                    } elseif ($ip_array[1] == 222){
                         if ($ip_array[2] >= 0 && $ip_array[2] <= 31){
                              $bIPIsAmazon = true;
                         } elseif ($ip_array[2] == 57){
                              $bIPIsAmazon = true;
                         } elseif ($ip_array[2] == 58){
                              if ($ip_array[3] >= 0 && $ip_array[3] <= 15){
                                   $bIPIsAmazon = true;
                              }  // end 0 + 1 + 2 + 3
                         } elseif ($ip_array[2] >= 128 && $ip_array[2] <= 255){
                              $bIPIsAmazon = true;
                         }  // end 0 + 1 + 2
                    } elseif ($ip_array[1] >= 223 && $ip_array[1] <= 230){
                         $bIPIsAmazon = true;
                    } elseif ($ip_array[1] == 231){
                         if ($ip_array[2] >= 0 && $ip_array[2] <= 207){
                              $bIPIsAmazon = true;
                         } elseif ($ip_array[2] >= 224 && $ip_array[2] <= 253){
                              $bIPIsAmazon = true;
                         }  // end 0 + 1 + 2
                    } elseif ($ip_array[1] >= 232 && $ip_array[1] <= 238){
                         $bIPIsAmazon = true;
                    } elseif ($ip_array[1] == 239){
                         if ($ip_array[2] >= 2 && $ip_array[2] <= 39){
                              $bIPIsAmazon = true;
                         } elseif ($ip_array[2] >= 48 && $ip_array[2] <= 71){
                              $bIPIsAmazon = true;
                         } elseif ($ip_array[2] == 96){
                              $bIPIsAmazon = true;
                         } elseif ($ip_array[2] >= 98 && $ip_array[2] <= 101){
                              $bIPIsAmazon = true;
                         } elseif ($ip_array[2] >= 104 && $ip_array[2] <= 105){
                              $bIPIsAmazon = true;
                         } elseif ($ip_array[2] >= 108 && $ip_array[2] <= 111){
                              $bIPIsAmazon = true;
                         } elseif ($ip_array[2] == 114){
                              $bIPIsAmazon = true;
                         } elseif ($ip_array[2] >= 116 && $ip_array[2] <= 223){
                              $bIPIsAmazon = true;
                         }  // end 0 + 1 + 2
                    } elseif ($ip_array[1] == 240){
                         if ($ip_array[2] >= 128 && $ip_array[2] <= 200){
                              $bIPIsAmazon = true;
                         } elseif ($ip_array[2] >= 202 && $ip_array[2] <= 223){
                              $bIPIsAmazon = true;
                         } elseif ($ip_array[2] >= 225 && $ip_array[2] <= 240){
                              $bIPIsAmazon = true;
                         } elseif ($ip_array[2] >= 244 && $ip_array[2] <= 255){
                              $bIPIsAmazon = true;
                         }  // end 0 + 1 + 2
                    } elseif ($ip_array[1] >= 241 && $ip_array[1] <= 255){
                         $bIPIsAmazon = true;
                    }  // end 0 + 1
                    break; // break ip address 0
               }
               break; // break second digit
          case '06': // case second number
               switch ($client_ip_address0) { 
               case '067': // case third number
                    if ($ip_array[1] == 202){
                         if ($ip_array[2] >= 0 && $ip_array[2] <= 63){
                              $bIPIsAmazon = true;
                         }  // end 0 + 1 + 2
                    }  // end 0 + 1
                    break; // break ip address 0
               }
               break; // break second digit
          case '07': // case second number
               switch ($client_ip_address0) { 
               case '072': // case third number
                    if ($ip_array[1] == 21){
                         if ($ip_array[2] >= 192 && $ip_array[2] <= 223){
                              $bIPIsAmazon = true;
                         }  // end 0 + 1 + 2
                    } elseif ($ip_array[1] == 44){
                         if ($ip_array[2] >= 32 && $ip_array[2] <= 63){
                              $bIPIsAmazon = true;
                         }  // end 0 + 1 + 2
                    }  // end 0 + 1
                    break; // break ip address 0
               case '075': // case third number
                    if ($ip_array[1] == 101){
                         if ($ip_array[2] >= 128 && $ip_array[2] <= 255){
                              $bIPIsAmazon = true;
                         }  // end 0 + 1 + 2
                    }  // end 0 + 1
                    break; // break ip address 0
               case '079': // case third number
                    if ($ip_array[1] == 125){
                         if ($ip_array[2] >= 0 && $ip_array[2] <= 127){
                              $bIPIsAmazon = true;
                         }  // end 0 + 1 + 2
                    }  // end 0 + 1
                    break; // break ip address 0
               }
               break; // break second digit
          case '08': // case second number
               switch ($client_ip_address0) { 
               case '087': // case third number
                    if ($ip_array[1] == 238){
                         if ($ip_array[2] >= 80 && $ip_array[2] <= 87){
                              $bIPIsAmazon = true;
                         }  // end 0 + 1 + 2
                    }  // end 0 + 1
                    break; // break ip address 0
               }
               break; // break second digit
          case '09': // case second number
               switch ($client_ip_address0) { 
               case '096': // case third number
                    if ($ip_array[1] == 127){
                         if ($ip_array[2] >= 0 && $ip_array[2] <= 127){
                              $bIPIsAmazon = true;
                         }  // end 0 + 1 + 2
                    }  // end 0 + 1
                    break; // break ip address 0
               }
               break; // break second digit
          }
          break; // break first digit
     case '1': // First Character
          switch ($client_ip_address0_second_character) { 
          case '10': // case second number
               switch ($client_ip_address0) { 
               case '103': // case third number
                    if ($ip_array[1] == 4){
                         if ($ip_array[2] >= 8 && $ip_array[2] <= 15){
                              $bIPIsAmazon = true;
                         }  // end 0 + 1 + 2
                    } elseif ($ip_array[1] == 8){
                         if ($ip_array[2] >= 172 && $ip_array[2] <= 175){
                              $bIPIsAmazon = true;
                         }  // end 0 + 1 + 2
                    } elseif ($ip_array[1] == 246){
                         if ($ip_array[2] >= 148 && $ip_array[2] <= 151){
                              $bIPIsAmazon = true;
                         }  // end 0 + 1 + 2
                    }  // end 0 + 1
                    break; // break ip address 0
               case '107': // case third number
                    if ($ip_array[1] >= 20 && $ip_array[1] <= 23){
                         $bIPIsAmazon = true;
                    }  // end 0 + 1
                    break; // break ip address 0
               }
               break; // break second digit
          case '12': // case second number
               switch ($client_ip_address0) { 
               case '122': // case third number
                    if ($ip_array[1] == 248){
                         if ($ip_array[2] >= 192 && $ip_array[2] <= 255){
                              $bIPIsAmazon = true;
                         }  // end 0 + 1 + 2
                    }  // end 0 + 1
                    break; // break ip address 0
               }
               break; // break second digit
          case '17': // case second number
               switch ($client_ip_address0) { 
               case '172': // case third number
                    if ($ip_array[1] == 96){
                         if ($ip_array[2] == 97){
                              $bIPIsAmazon = true;
                         }  // end 0 + 1 + 2
                    }  // end 0 + 1
                    break; // break ip address 0
               case '174': // case third number
                    if ($ip_array[1] == 129){
                         $bIPIsAmazon = true;
                    }  // end 0 + 1
                    break; // break ip address 0
               case '175': // case third number
                    if ($ip_array[1] == 41){
                         if ($ip_array[2] >= 128 && $ip_array[2] <= 255){
                              $bIPIsAmazon = true;
                         }  // end 0 + 1 + 2
                    }  // end 0 + 1
                    break; // break ip address 0
               case '176': // case third number
                    if ($ip_array[1] == 32){
                         if ($ip_array[2] >= 64 && $ip_array[2] <= 123){
                              $bIPIsAmazon = true;
                         } elseif ($ip_array[2] == 125){
                              if ($ip_array[3] >= 0 && $ip_array[3] <= 127){
                                   $bIPIsAmazon = true;
                              }  // end 0 + 1 + 2 + 3
                         }  // end 0 + 1 + 2
                    } elseif ($ip_array[1] == 34){
                         $bIPIsAmazon = true;
                    }  // end 0 + 1
                    break; // break ip address 0
               case '177': // case third number
                    if ($ip_array[1] == 71){
                         if ($ip_array[2] >= 128 && $ip_array[2] <= 255){
                              $bIPIsAmazon = true;
                         }  // end 0 + 1 + 2
                    } elseif ($ip_array[1] == 72){
                         if ($ip_array[2] >= 240 && $ip_array[2] <= 247){
                              $bIPIsAmazon = true;
                         }  // end 0 + 1 + 2
                    }  // end 0 + 1
                    break; // break ip address 0
               case '178': // case third number
                    if ($ip_array[1] == 236){
                         if ($ip_array[2] >= 0 && $ip_array[2] <= 15){
                              $bIPIsAmazon = true;
                         }  // end 0 + 1 + 2
                    }  // end 0 + 1
                    break; // break ip address 0
               }
               break; // break second digit
          case '18': // case second number
               switch ($client_ip_address0) { 
               case '184': // case third number
                    if ($ip_array[1] >= 72 && $ip_array[1] <= 73){
                         $bIPIsAmazon = true;
                    } elseif ($ip_array[1] == 169){
                         if ($ip_array[2] >= 128 && $ip_array[2] <= 255){
                              $bIPIsAmazon = true;
                         }  // end 0 + 1 + 2
                    }  // end 0 + 1
                    break; // break ip address 0
               case '185': // case third number
                    if ($ip_array[1] == 48){
                         if ($ip_array[2] >= 120 && $ip_array[2] <= 123){
                              $bIPIsAmazon = true;
                         }  // end 0 + 1 + 2
                    } elseif ($ip_array[1] == 143){
                         if ($ip_array[2] == 16){
                              $bIPIsAmazon = true;
                         }  // end 0 + 1 + 2
                    }  // end 0 + 1
                    break; // break ip address 0
               }
               break; // break second digit
          }
          break; // break first digit
     case '2': // First Character
          switch ($client_ip_address0_second_character) { 
          case '20': // case second number
               switch ($client_ip_address0) { 
               case '203': // case third number
                    if ($ip_array[1] == 83){
                         if ($ip_array[2] >= 220 && $ip_array[2] <= 223){
                              $bIPIsAmazon = true;
                         }  // end 0 + 1 + 2
                    }  // end 0 + 1
                    break; // break ip address 0
               case '204': // case third number
                    if ($ip_array[1] == 236){
                         if ($ip_array[2] >= 128 && $ip_array[2] <= 255){
                              $bIPIsAmazon = true;
                         }  // end 0 + 1 + 2
                    } elseif ($ip_array[1] == 246){
                         if ($ip_array[2] >= 160 && $ip_array[2] <= 171){
                              $bIPIsAmazon = true;
                         } elseif ($ip_array[2] >= 174 && $ip_array[2] <= 191){
                              $bIPIsAmazon = true;
                         }  // end 0 + 1 + 2
                    }  // end 0 + 1
                    break; // break ip address 0
               case '205': // case third number
                    if ($ip_array[1] == 251){
                         if ($ip_array[2] >= 192 && $ip_array[2] <= 245){
                              $bIPIsAmazon = true;
                         } elseif ($ip_array[2] >= 247 && $ip_array[2] <= 255){
                              $bIPIsAmazon = true;
                         }  // end 0 + 1 + 2
                    }  // end 0 + 1
                    break; // break ip address 0
               case '207': // case third number
                    if ($ip_array[1] == 171){
                         if ($ip_array[2] >= 160 && $ip_array[2] <= 191){
                              $bIPIsAmazon = true;
                         }  // end 0 + 1 + 2
                    }  // end 0 + 1
                    break; // break ip address 0
               }
               break; // break second digit
          case '21': // case second number
               switch ($client_ip_address0) { 
               case '216': // case third number
                    if ($ip_array[1] == 137){
                         if ($ip_array[2] >= 32 && $ip_array[2] <= 63){
                              $bIPIsAmazon = true;
                         }  // end 0 + 1 + 2
                    } elseif ($ip_array[1] == 182){
                         if ($ip_array[2] >= 224 && $ip_array[2] <= 239){
                              $bIPIsAmazon = true;
                         }  // end 0 + 1 + 2
                    }  // end 0 + 1
                    break; // break ip address 0
               }
               break; // break second digit
          }
          break; // break first digit
     }
}

return $bIPIsAmazon;
}


?>
