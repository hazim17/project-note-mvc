<?PHP 

class About extends Controller{
    //method default
    public function index($name = "Hazim17") {
        $data['name'] = $name;

        $data['title'] = "About Index";
        $this->view('templates/header', $data);
        $this->view('about/index', $data);
        $this->view('templates/footer');
    }
}