<?PHP 

class App {
    //property to determined controller default and parameter
    protected $controller = "Display"; //we make Display as a controller default
    protected $method = 'index';
    protected $params = [];

    //rewrite the url, so it'll be more clean
    public function parseURL() {
        if(isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
            //rtrim is a function, it'll delete the last item

            //clean the url form unexpected character
            $url = filter_var($url, FILTER_SANITIZE_URL);

            //break down the url per '/'
            $url = explode('/', $url);

            return $url;
        }
    }

    //construct function will automatically called without being called
    public function __construct() {
        $url = $this->parseURL();
        
        //that $url, return array, if you type: http://localhost/project-blog-mvc/public/about/index
        //return: array(2) { [0]=> string(5) "about" [1]=> string(5) "index" }
        
        //we want to take out that controller and the first method, so the url will be more shorter
        //And we unset the method  here and controller; so in array we'll be remain the parameter (if there are parameter)

        
        //initiate the Display.app (the controller default)
        //url:.../display/index => Display: controller; index: method
        //$url[0] => means first index in array
        if(file_exists('../app/controllers/' . $url[0] . '.php')) {
            $this->controller = $url[0];
            unset($url[0]); // because the display already a controller, we will unset this from array 
            //so you don't have to type the controller name in url
        }

        require_once '../app/controllers/' . $this->controller . '.php';
        $this->controller = new $this->controller;

        
        //instantiate the method default
        if(isset($url[1])) {
            if(method_exists($this->controller, $url[1])) {
                $this->method = $url[1];
                unset($url[1]); //we unset the method here and controller in above; so in array we'll be remain the parameter (if there are parameter)
            }
        }

        //Parameter
        //example: localhost/phpmvc/about/page/10/20
        //about: controller; page: method; 10 and 20 are the parameter
        //it's okay if you dan't have any parameter
        //we take parameter from url to the params array
        if(!empty($url)) {
            $this->params = array_values($url);
        }


        //Jalankan Controller dan method, serta kirimkan params jika ada
        call_user_func_array([$this->controller, $this->method], $this->params);
    }
}