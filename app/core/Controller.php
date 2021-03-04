<?PHP 

//parent class
class Controller {
    //create view method
    public function view($view, $data = []) {
        //../app/views/display/index.php
        require_once '../app/views/'. $view .'.php';
    }

    //create model method
    public function model($model) {
        require_once '../app/models/' . $model . '.php';
        //instantiate the model class (in this case User_model.php)
        return new $model;
    }
}
