    <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class OpenId_Controller extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('login_model');
    }

    public function index()
    {
        require_once 'openid.php';
        $openid = new LightOpenID(filter_input(INPUT_SERVER, 'HTTP_HOST'));
        $openid->identity = 'https://www.google.com/accounts/o8/id';
        $openid->required = array(
            'namePerson/first',
            'namePerson/last',
            'contact/email',
            'birthDate', 
            'person/gender',
            'contact/postalCode/home',
            'contact/country/home',
            'pref/language',
            'pref/timezone',  
        );
  //$openid->returnUrl = 'http://localhost/login_thirdparty/login_google.php';

    $openid->returnUrl = 'http://localhost/login_thirdparty/codeigniterlogin/index.php/logingoogle/loginAuth';

  //echo '<a href="'.$openid->authUrl().'">Login with Google</a>';

        $data['openid'] = $openid;
        $this->load->view('templates/header.php');
        $this->load->view('templates/navbar.php');
        $this->load->view('googleloginview', $data);
        $this->load->view('templates/footer.php');
    }

    public function loginAuth()
    {
        $this->login_model->index();
    }
}