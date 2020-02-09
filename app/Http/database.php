<?php
    namespace App\Http ;

    class database{
       
        public static function getdata($data){
            $url = 'http://localhost:8090/bloodservice/index.php'; 
            $options = array(
                'http' => array(
                    'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                    'method'  => 'POST',
                    'content' => http_build_query($data)
                )
            );
            $context  = stream_context_create($options);
            $result = file_get_contents($url, false, $context);
            return database::perpareStatement($result) ;    
        }

        public static function perpareStatement($response) {
            $close = '}';
            $token ='{"data":[';
            for ( $i = 1;  $i < strlen($response)-1;  $i++) {

                 if ($close == $response[$i]) {
                    $token=$token."},";
                } else {
                    $token=$token.$response[$i];
                }
            }

            return $token."}]}"  ;
        }
    }
