<?PHP 

//controller default

class Display extends Controller {
    //method default
    public function index() {
        //this view method is from phpmvc > app > core > Controller.php
        $data['title'] = "Display";

        //Use model method (note)
        $data['note'] = $this->model('Note_model')->getAllNote();

        $this->view('templates/header', $data);
        $this->view('display/index', $data);
        $this->view('templates/footer');
    }

    //for detail in Note. page (in the website)
    public function detail ($id) { //$id from url
        //this view method is from phpmvc > app > core > Controller.php
        $data['title'] = "Detail of Note";

        //get data from Note_model.php
        $data['note'] = $this->model('Note_model')->getNoteById($id); //getNoteById is a method from Note_model.php
        $this->view('templates/header', $data);
        $this->view('display/detail', $data);
        $this->view('templates/footer');
    }

    
    //For insert data
    public function addnote() {
        if($this->model('Note_model')->addDataNote($_POST) > 0) {
            // Add flash massage, if works
            Flasher::setFlash('Success', 'Added', 'success'); 
            header('Location: ' . BASEURL . '/display');
            exit;
        } else {
            // Add flash massage, if not works
            Flasher::setFlash('Fail', 'Added', 'fail'); 
            header('Location: ' . BASEURL . '/display');
            exit;
        }
    }

    //for delete data
    public function delete($id) {
        var_dump($_POST);
        if($this->model('Note_model')->deleteDataNote($id) > 0) {
            // Add flash massage, if works
            Flasher::setFlash('Success', 'delete', 'success'); 
            //This data will send to  app > views > display > index.php
            
            header('Location: ' . BASEURL . '/display');
            exit;
        } else {
            // Add flash massage, if not works
            Flasher::setFlash('Fail', 'delete', 'fail');
            //This data will send to  app > views > display > index.php

            header('Location: ' . BASEURL . '/display');
            exit;
        }
    }



    //for update
    //for edit in Note. page (in the website)
    public function edit ($id) { //$id from url
        //this view method is from phpmvc > app > core > Controller.php
        $data['title'] = "Edit Note";

        //get data from Note_model.php
        $data['note'] = $this->model('Note_model')->getNoteById($id); //getNoteById is a method from Note_model.php
        $this->view('templates/header', $data);
        $this->view('display/edit', $data);
        $this->view('templates/footer');
    }

    // public function getedit() {
    //     //this will get the id from script.js through post
    //     //and script.js get the data from method in Note_model.php
    //     //to make array assoc -> json, use: json_encode
    //     echo json_encode($this->model('Note_model')->getNoteById($_POST['id']));
    // }

    public function editnote() {
        //var_dump($this->model('Note_model')->editDataNote($_POST));
        if($this->model('Note_model')->editDataNote($_POST) > 0) {
            // Add flash massage, if works
            Flasher::setFlash('Success', 'edit', 'success'); 
            //This data will send to app > views > display > index.php
            
            header('Location: ' . BASEURL . '/display');
            exit;
        } else {
            // Add flash massage, if not works
            Flasher::setFlash('Fail', 'edit', 'fail');
            //This data will send to app > views > display > index.php

            header('Location: ' . BASEURL . '/display');
            exit;
        }
    }

}
