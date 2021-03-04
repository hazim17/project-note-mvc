<?php 

class Flasher {
    //method static, so you don't have to initiate the class
    public static function setFlash($message, $action, $type) {

        //set session
        $_SESSION['flash'] = [
            'message' => $message,
            'action' => $action,
            'type' => $type 
        ];
    }

    //method static
    public static function flash() {
        //check if there is a session or not
        if(isset($_SESSION['flash'])) {
            echo '<div class="alert alert-' . $_SESSION['flash']['type'] . '">
            <button type="button" id="closebtn">
                <span>&times;</span>
            </button>
            <strong>'. $_SESSION['flash']['message'] .'</strong> '. $_SESSION['flash']['action'] .' Note!
            </div>';

            //delete the session, so the session only works one time when this method flash works. When you refresh the website / try to delete 
            unset($_SESSION['flash']);
        }
    }


}



