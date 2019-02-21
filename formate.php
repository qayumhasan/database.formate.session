<?php
    class Formate
    {
        public function formatedate($date)
        {
           return date('F j, Y, g:i a',strtotime($date));
        
        }

        public function textshotener($text , $limit = 800)
        {
            $text = $text." ";
            $text = substr($text , 0, $limit);
            $text = substr($text, 0, strrpos($text , ' '));
            $text = $text." ";
            return $text;
        }

        public function validation($data){
            $data = trim($data);
            $data = stripcslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
    }
    
?>