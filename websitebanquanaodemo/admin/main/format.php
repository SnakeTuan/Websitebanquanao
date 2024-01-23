<?php
class format {
    public function formatDate($date){
        return date('F j, Y, g:i, a', strtotime($date));
    }

    public function textShorten($text, $limit = 400){
        $text = $text." ";
        $text = substr($text, 0, $limit);
        $text = substr($text, 0, strpos($text, ' '));
        $text = $text.".....";
        return $text;
    }

    public function validation($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    public function tittle(){
        $path = $_SERVER['SCRIPT_FILENAME'];
        $tittle = basename($path, '.php');
        //$tittle = str_replace('_', ' ', $tittle);
        if($tittle == 'index'){
            $tittle = 'home';
        }
        elseif($tittle == 'contact'){
            $tittle = 'contact';
        }
        return $tittle = ucfirst($tittle);
    }
}
?>