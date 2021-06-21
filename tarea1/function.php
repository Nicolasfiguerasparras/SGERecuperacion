<?php 
    ob_start();
    class func {
        /*
         * Function that checks if a user is logged in
         *   @dbh  DBConnection Instance 
         */
        public static function checkLogin($dbh) {
            
            if (!isset($_SESSION)) {
                // Si no existe, la creamos
                session_start();
            }
    
            // Comprobamos si hay guardados datos del usuario en cookies
            // Los campos de las cookies user_id, token y serial
            if(isset($_COOKIE['user_id']) && isset($_COOKIE['token']) && isset($_COOKIE['serial'])) {
                // Harvesting de los datos
                $user_id = $_COOKIE['user_id'];
                $token = $_COOKIE['token'];
                $serial = $_COOKIE['serial'];
    
                // Consultamos la BBDD con sentencias preparadas
                $query = "SELECT * FROM sessions WHERE userid = :userid AND token = :token AND serial = :serial";
                // Con la conexión recibida por parámetro, preparamos la consulta
                $stmt = $dbh->prepare($query);
                $stms->execute(
                    array(
                        ':userid' => $user_id,
                        ':token' => $token,
                        ':serial' => $serial
                    )
                );
    
                // Almacenamos los resultados en una variable
                $resultados = $stmt->fetch(PDO::FETCH_ASSOC);
    
                // Comprobamos que existen datos en la variable resultados
                if(!empty($resultados)) {
                    // Hacemos persistente la sesión
                    setcookie('user_id', $user_id, time() + (3600*24*7), "/");
                    setcookie('token', createserial(40), time() + (3600*24*7), "/");
                    setcookie('serial', $user_id, createserial(40), time() + (3600*24*7), "/");
                
                    // Llegados a este punto, podemos verificar que estamos loggeados y se ha reiniciado la persistencia de la sesión
                    return true;
                }

                if($user_id){
                    // Hacemos persistente la sesión
                    setcookie('user_id', $user_id, time() + (3600*24*7), "/");
                    setcookie('token', createserial(40), time() + (3600*24*7), "/");
                    setcookie('serial', $user_id, createserial(40), time() + (3600*24*7), "/");
                    return true;
                }
    
            // Si no existe la cookies, comprobamos si existen datos en $_SESSION
            } elseif(isset($_SESSION['user_id']) && isset($_SESSION['token']) && isset($_SESSION['serial'])) {
                // Harvesting de los datos
                $user_id = $_SESSION['user_id'];
                $token = $_SESSION['token'];
                $serial = $_SESSION['serial'];
    
                // Consultamos la BBDD con sentencias preparadas
                $query = "SELECT * FROM sessions WHERE session_userid = :userid AND session_token = :token AND session_serial = :serial";
                // Con la conexión recibida por parámetro, preparamos la consulta
                $stmt = $dbh->prepare($query);
                $stmt->execute(
                    array(
                        ':userid' => $user_id,
                        ':token' => $token,
                        ':serial' => $serial
                    )
                );
    
                // Almacenamos los resultados en una variable
                $resultados = $stmt->fetch(PDO::FETCH_ASSOC);                
    
                if(!empty($resultados)){
                    return true;
                }

                if(isset($_SESSION['user_id'])){
                    return true;
                }
            }else{
                return false;
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