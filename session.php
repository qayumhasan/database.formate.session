<?php
    class Session{
        public static function init(){
            session_start();
        }

      public static function checkSession(){
          self::init();
          if ($_SESSION['login'] == false) {
              session_destroy();
              header('location:login.php');
          }
      }
    }


?>