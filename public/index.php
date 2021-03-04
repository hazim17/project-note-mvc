<?PHP 

//run the session
if(!session_id()) {
    session_start();
}

//this index.php file will call every file from init.php, which is from the app folder
//this is called bootsrapping
require_once '../app/init.php';


//call class / create object, from the phpmvc > app > core > App.php
$app = new App;
