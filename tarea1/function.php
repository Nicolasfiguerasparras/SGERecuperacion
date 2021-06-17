<?php 
    ob_start();
    class func {
        /*
         * Function that checks if a user is logged in
         *   @dbh  DBConnection Instance 
         */
        public static function checkLogin($dbh) {
            
            if (!isset($_SESSION)) {
                // echo '<p class="error1">crea la sesion en checkLOGIn</p>';
                session_start();
                
            }
            /* The user only will be considered logged in when 
               1. The sessions cookies exists and match the session record (PERSISTENT SESSION)
               2. The sessions cookies doesn't exist but we have sessions variables that match the session record (NON PERSISTENT SESSION)
            */
            if (isset($_COOKIE['user_id']) && isset($_COOKIE['token'])  && isset($_COOKIE['serial']) ){
                //Check the Data Base
                $user_id = $_COOKIE['user_id'];
                $token = $_COOKIE['token'];
                $serial = $_COOKIE['serial'];
         
                $query = "SELECT * FROM sessions WHERE session_userid = :userid AND session_token = :token AND session_serial = :serial;";
                $stmt = $dbh->prepare($query);
                $stmt->execute(array(':userid' => $user_id, ':token'=>$token, ':serial'=>$serial));
              
                $row = $stmt->fetch(PDO::FETCH_ASSOC);

                if ( $row['session_userid'] > 0) {
                        // The session come from the previous persistence
                        // Create Session
                        func::createSession($_COOKIE['user_id'],$_COOKIE['username'],$_COOKIE['token'],$_COOKIE['serial']);
                        return true;
                }   
            } else {
                //We try to check log with the session variables 
                if (isset($_SESSION['user_id'])){
                    
                    $user_id = $_SESSION['user_id'];
                    $token = $_SESSION['token'];
                    $serial = $_SESSION['serial'];
                    
                    $query = "SELECT * FROM sessions WHERE session_userid = :userid AND session_token = :token AND session_serial = :serial;";
                    $stmt = $dbh->prepare($query);
                    $stmt->execute(array(':userid' => $user_id, ':token'=>$token, ':serial'=>$serial));
                    $row = $stmt->fetch(PDO::FETCH_ASSOC);
                    if ( $row['session_userid'] > 0 ) {
                            return true;
                    }
                }
            }
        }
        
        
        /*
         *    Function that erases the session cookies
         */
        public static function deleteCookie(){
            setcookie('user_id', '', time() - 3600, "/");
            setcookie('username', '', time() - 3600, "/");
            setcookie('token', '', time() - 3600, "/");
            setcookie('serial', '', time() - 3600, "/");
            setcookie('PHPSESSID', '', time() - 3600, "/");
        }
        
        /*
         *    Function that creates the session cookies
         */
        public static function createCookie( $user_id, $user_username, $token, $serial){
            // echo "Creando cookie para userid:".$user_id;
            // echo "Creando cookie para username:".$user_username;
            setcookie('user_id', $user_id, time() + (3600 * 24 * 7), "/");
            setcookie('username', $user_username, time() + (3600 * 24 * 7), "/");
            setcookie('token', $token, time() + (3600 * 24 * 7), "/");
            setcookie('serial', $serial, time() + (3600 * 24 * 7), "/");
        }
        
        /*
         *    Function that creates the session variables
         */
        public static function createSession($user_id, $user_username, $token, $serial){
            // if the session is not already set
            if (!isset($_SESSION)){
                session_start();
            }
            
            $_SESSION['user_id'] = $user_id;
            $_SESSION['username'] = $user_username;
            $_SESSION['token'] = $token;
            $_SESSION['serial'] = $serial;
        }


        public static function recordSession($dbh, $user_id, $user_username, $remember){
            
            // Delete the old session for that user if exists
            $dbh->prepare("DELETE FROM sessions WHERE session_userid = :session_userid")->execute(array(':session_userid'=>$user_id));
            
            // create token and serial strings
            $token = func::createSerial(40);
            $serial = func::createSerial(40);
        
            // Create sessions cookies makes the session persistent
            if ($remember == 1) {
                func::createCookie($user_id, $user_username, $token, $serial);
            }
            
            func::createSession($user_id, $user_username, $token, $serial);
         
            // Restore session in DB with the new data
            $stmt = $dbh->prepare("INSERT INTO `sessions`(`session_id`, `session_token`, `session_serial`, `session_date`, `session_userid`) VALUES (NULL, :token, :serial, now(), :session_userid);");
            $stmt->execute(array(':token'=>$token, ':serial'=>$serial, ':session_userid'=>$user_id));
           
        }

        /*
         * Function that returns a random string from a random phrase
         *   @len  Length of the random string 
         */
        public static function createSerial($len = 40){
            $phrase = "Soccerlovermotherof2drummerRECLAIMEDWOODCOLLECTORandcollaboratorin345678901sites.PerformingattheJUNCTIONofartandintellectualpuritytoanswerdesignproblemswithhonestsolutions";
            $s= ''; $serial = '';
            // return substr(str_shuffle($phrase),0,32);
            for ($i = 1; $i <= $len; $i++) {
                $number = mt_rand(0, strlen($phrase) - 1);
                $s = substr($phrase, $number, 1);
                $serial .= $s;
            }
            return $serial;
        }

    }
?>