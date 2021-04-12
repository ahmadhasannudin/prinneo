<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_login');
        $this->load->model('M_metas');
        $this->load->model('M_product_categorys');
        $this->load->model('M_product_sub_categorys');
        $this->load->model('M_sliders');
        $this->load->model('M_contacts');
        $this->load->model('M_users');
        $this->load->library('facebook');
    }

    public function index()
    {
        if ($this->session->userdata('user_role') == '1') {
            redirect(site_url('manage/dasbor'));
        } elseif ($this->session->userdata('user_role') == '2') {
            redirect(site_url('manage/dasbor/admin'));
        } elseif ($this->session->userdata('user_role') == '3') {
            redirect(site_url('manage/dasbor/desainer'));
        } elseif ($this->session->userdata('user_role') == '4') {
            redirect(site_url('manage/dasbor/produksi'));
        } elseif ($this->session->userdata('user_role') == '5') {
            redirect(site_url('user/dasbor'));
        } else {
            $valid = $this->form_validation;
            $valid->set_rules(
                'user_email',
                'user_email',
                'trim|required|valid_email',
                array(
                    'required' => 'Email harus diisi',
                )
            );
            $valid->set_rules(
                'user_password',
                'user_password',
                'required|min_length[6]',
                array(
                    'required' => 'Password harus diisi',
                    'min_length' => 'Password minimal 6 karakter',
                )
            );

            if ($valid->run() == false) {
                //init auth facebook token
                require_once 'vendor/autoload.php';

                // init configuration google
                $clientID = getenv('CLIENT_ID');
                $clientSecret = getenv('CLIENT_SECRET');
                $redirectUri = getenv('APP_URL') . '/login';

                // create Client Request to access Google API
                $client = new Google_Client();
                $client->setClientId($clientID);
                $client->setClientSecret($clientSecret);
                $client->setRedirectUri($redirectUri);
                //  Set the scopes required for the API you are going to call
                $client->addScope("email");
                $client->addScope("profile");

                $meta_datas = array(
                    'meta_location' => 'home',
                );
                $product_categorys = $this->M_product_categorys->get_all()->result();
                $product_sub_categorys = $this->M_product_sub_categorys->get_all()->result();
                $sliders = $this->M_sliders->get_all()->result();
                $contacts = $this->M_contacts->get_all()->row();
                $data =
                    array(
                        'facebook_oauth' =>  $this->facebook->login_url(),
                        'google_oauth' => $client->createAuthUrl(),
                        'isi' => 'pages/guest/v_login',
                        'title' => 'Login',
                        'product_categorys' => $product_categorys,
                        'product_sub_categorys' => $product_sub_categorys,
                        'sliders' => $sliders,
                        'contacts' => $contacts,
                    );
                $this->load->view("layouts/guest/wrapper", $data, false);

                // cek google login
                require_once 'vendor/autoload.php';
                // init configuration
                // $clientID = '23549795370-8vodrlurb53lau5u4jcr6ekr7kjivef3.apps.googleusercontent.com';
                // $clientSecret = 'bIs0RgN1Mdv3y488iczll6ry';
                // $redirectUri = 'https://prinneo.com/login';

                // create Client Request to access Google API
                $client = new Google_Client();
                $client->setClientId($clientID);
                $client->setClientSecret($clientSecret);
                $client->setRedirectUri($redirectUri);
                //  Set the scopes required for the API you are going to call
                $client->addScope("email");
                $client->addScope("profile");

                // authenticate code from Google OAuth Flow
                if (isset($_GET['code'])) {
                    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
                    $client->setAccessToken($token['access_token']);

                    // get profile info
                    $google_oauth = new Google_Service_Oauth2($client);
                    $google_account_info = $google_oauth->userinfo->get();
                    $email = $google_account_info->email;
                    $name = $google_account_info->name;
                    $check_login = $this->M_login->login_google($email);
                    if (!empty($check_login)) {
                        $this->session->set_userdata('email_user', $email);
                        $this->session->set_userdata('user_id', $check_login->user_id);
                        $this->session->set_userdata('user_name', $check_login->user_name);
                        $this->session->set_userdata('user_phone', $check_login->user_phone);
                        $this->session->set_userdata('user_gender', $check_login->user_gender);
                        $this->session->set_userdata('user_role', $check_login->user_role);
                        $this->session->set_userdata('user_photo', $check_login->user_photo);
                        if ($this->session->userdata('user_role') == '1') {
                            $this->session->set_flashdata('notifikasi', '
		                <div class="alert alert-success alert-dismissible fade show position-fixed" role="alert" style="position: absolute; top: 0; right: 0; margin:50px;">
		                <strong>Berhasil!</strong> Anda telah login.
		                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		                <span aria-hidden="true">&times;</span>
		                </button>
		                </div>');
                            redirect(site_url('manage/dasbor'), 'refresh');
                        } else if ($this->session->userdata('user_role') == '5') {
                            $this->session->set_flashdata('notifikasi', '
		                <div class="alert alert-success alert-dismissible fade show position-fixed" role="alert" style="position: absolute; top: 0; right: 0; margin:50px;">
		                <strong>Berhasil!</strong> Anda telah login.
		                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		                <span aria-hidden="true">&times;</span>
		                </button>
		                </div>');
                            redirect(site_url('user/dasbor'), 'refresh');
                        }
                    } else {
                        // now you can use this profile info to create account in your website and make user logged in.
                        $data = array(
                            'user_name' => $name,
                            'user_email' => $email,
                            'user_password' => '',
                            'user_phone' => '',
                            'user_gender' => '-',
                            'address_id' => '0',
                            'user_role' => '5',
                            'user_photo' => 'user.jpg',
                        );
                        $this->send_konfirmasi($data['user_email'], $data['user_name']);
                        // echo $data['user_email'].$data['user_name'];
                        // exit();
                        $this->M_users->add_user($data);

                        $check_login = $this->M_login->login_google($email);
                        $this->session->set_userdata('email_user', $email);
                        $this->session->set_userdata('user_id', $check_login->user_id);
                        $this->session->set_userdata('user_name', $check_login->user_name);
                        $this->session->set_userdata('user_phone', $check_login->user_phone);
                        $this->session->set_userdata('user_gender', $check_login->user_gender);
                        $this->session->set_userdata('user_role', $check_login->user_role);
                        $this->session->set_userdata('user_photo', $check_login->user_photo);
                        if (!empty($check_login)) {
                            if ($this->session->userdata('user_role') == '1') {
                                $this->session->set_flashdata('notifikasi', '
		                  <div class="alert alert-success alert-dismissible fade show position-fixed" role="alert" style="position: absolute; top: 0; right: 0; margin:50px;">
		                  <strong>Berhasil!</strong> Anda telah login.
		                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		                  <span aria-hidden="true">&times;</span>
		                  </button>
		                  </div>');
                                redirect(site_url('manage/dasbor'), 'refresh');
                            } else if ($this->session->userdata('user_role') == '5') {
                                $this->session->set_flashdata('notifikasi', '
		                  <div class="alert alert-success alert-dismissible fade show position-fixed" role="alert" style="position: absolute; top: 0; right: 0; margin:50px;">
		                  <strong>Berhasil!</strong> Anda telah login.
		                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		                  <span aria-hidden="true">&times;</span>
		                  </button>
		                  </div>');
                                redirect(site_url('user/dasbor'), 'refresh');
                            }
                        }
                    }
                }
                // end cek google login


                //start cek facebook login


                // Authenticate user with facebook 
                if ($this->facebook->is_authenticated()) {
                    // Get user info from facebook 


                    $fbUser = $this->facebook->request('get', '/me?fields=id,first_name,last_name,email,link,gender,picture');

                    // Preparing data for database insertion 

                    $first_name_fb    = !empty($fbUser['first_name']) ? $fbUser['first_name'] : '';
                    $last_name_fb    = !empty($fbUser['last_name']) ? $fbUser['last_name'] : '';
                    $gender_fb        = !empty($fbUser['gender']) ? $fbUser['gender'] : '';
                    $picture_fb   = !empty($fbUser['picture']['data']['url']) ? $fbUser['picture']['data']['url'] : '';
                    $email_fb = !empty($fbUser['email']) ? $fbUser['email'] : '';

                    // Insert or update user data to the database 
                    $check_login_fb = $this->M_login->login_facebook($email_fb);

                    // Check user data insert or update status 
                    if (!empty($check_login_fb)) {
                        echo 'test';
                        /* $this->session->set_userdata('email_user', $email_fb );
                        $this->session->set_userdata('user_id', $check_login_fb->user_id);
                        $this->session->set_userdata('user_name', $check_login_fb->user_name);
                        $this->session->set_userdata('user_phone', $check_login_fb->user_phone);
                        $this->session->set_userdata('user_gender', $check_login_fb->user_gender);
                        $this->session->set_userdata('user_role', $check_login_fb->user_role);
                        $this->session->set_userdata('user_photo', $check_login_fb->user_photo);
                         if ($this->session->userdata('user_role') == '1') {
                            $this->session->set_flashdata('notifikasi', '
                            <div class="alert alert-success alert-dismissible fade show position-fixed" role="alert" style="position: absolute; top: 0; right: 0; margin:50px;">
                            <strong>Berhasil!</strong> Anda telah login.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                            </div>');
                            redirect(site_url('manage/dasbor'), 'refresh');
                        } else if ($this->session->userdata('user_role') == '5') {
                            $this->session->set_flashdata('notifikasi', '
                            <div class="alert alert-success alert-dismissible fade show position-fixed" role="alert" style="position: absolute; top: 0; right: 0; margin:50px;">
                            <strong>Berhasil!</strong> Anda telah login.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                            </div>');
                            redirect(site_url('user/dasbor'), 'refresh');
                        } */
                    }
                    /* else{ 
	               // now you can use this profile info to create account in your website and make user logged in.
	                   $data_fb = array(
	                        'user_name' => $first_name_fb,
	                        'user_email' => $email_fb,
	                        'user_password' => '',
	                        'user_phone' => '',
	                        'user_gender' => $gender_fb,
	                        'address_id' => '0',
	                        'user_role' => '5',
	                        'user_photo' => $picture_fb,
	                    );
	                    $this->send_konfirmasi($data_fb ['user_email'], $data_fb ['user_name']);
	                    // echo $data['user_email'].$data['user_name'];
	                    // exit();
	                    $this->M_users->add_user($data_fb );
	
	                    $check_login_fb = $this->M_login->login_facebook($email);
	                    $this->session->set_userdata('email_user', $email);
	                    $this->session->set_userdata('user_id', $check_login_fb ->user_id);
	                    $this->session->set_userdata('user_name', $check_login_fb ->user_name);
	                    $this->session->set_userdata('user_phone', $check_login_fb ->user_phone);
	                    $this->session->set_userdata('user_gender', $check_login_fb ->user_gender);
	                    $this->session->set_userdata('user_role', $check_login_fb ->user_role);
	                    $this->session->set_userdata('user_photo', $check_login_fb ->user_photo);
	                    if (!empty($check_login_fb )) {
	                        if ($this->session->userdata('user_role') == '1') {
	                                $this->session->set_flashdata('notifikasi', '
	                                <div class="alert alert-success alert-dismissible fade show position-fixed" role="alert" style="position: absolute; top: 0; right: 0; margin:50px;">
	                                <strong>Berhasil!</strong> Anda telah login.
	                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	                                <span aria-hidden="true">&times;</span>
	                                </button>
	                                </div>');
	                                redirect(site_url('manage/dasbor'), 'refresh');
	                        } else if ($this->session->userdata('user_role') == '5') {
	                                $this->session->set_flashdata('notifikasi', '
	                                <div class="alert alert-success alert-dismissible fade show position-fixed" role="alert" style="position: absolute; top: 0; right: 0; margin:50px;">
	                                <strong>Berhasil!</strong> Anda telah login.
	                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	                                <span aria-hidden="true">&times;</span>
	                                </button>
	                                </div>');
	                                redirect(site_url('user/dasbor'), 'refresh');
	                        }
	                    }
	                   
	            } 
	             */
                    // Facebook logout URL 
                    //$data['logoutURL'] = $this->facebook->logout_url(); 
                }
                //else{ 
                // Facebook authentication url 
                //$data['authURL'] =  $this->facebook->login_url(); 
                //}   	 	


                //end cek facebook login



            } else {
                $i = $this->input;
                $email_user = $i->post('user_email');
                $password_user = md5($i->post('user_password'));
                $check_login = $this->M_login->login($email_user, $password_user);
                // echo "<pre>";
                // print_r($email_user);
                // print_r($password_user);
                // print_r($check_login);
                // exit();
                if (!empty($check_login)) {
                    $this->session->set_userdata('email_user', $email_user);
                    $this->session->set_userdata('user_id', $check_login->user_id);
                    $this->session->set_userdata('user_name', $check_login->user_name);
                    $this->session->set_userdata('user_phone', $check_login->user_phone);
                    $this->session->set_userdata('user_gender', $check_login->user_gender);
                    $this->session->set_userdata('user_role', $check_login->user_role);
                    $this->session->set_userdata('user_photo', $check_login->user_photo);
                    if ($this->session->userdata('user_role') == '1') {
                        $this->session->set_flashdata('notifikasi', '
              <div class="alert alert-success alert-dismissible fade show position-fixed" role="alert" style="position: absolute; top: 0; right: 0; margin:50px;">
              <strong>Berhasil!</strong> Anda telah login.
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
              </div>');
                        redirect(site_url('manage/dasbor'), 'refresh');
                    } else if ($this->session->userdata('user_role') == '5') {
                        $this->session->set_flashdata('notifikasi', '
              <div class="alert alert-success alert-dismissible fade show position-fixed" role="alert" style="position: absolute; top: 0; right: 0; margin:50px;">
              <strong>Berhasil!</strong> Anda telah login.
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
              </div>');
                        redirect(site_url('user/dasbor'), 'refresh');
                    }
                } else {
                    $this->session->set_flashdata('notifikasi', '
            <div class="alert alert-danger alert-dismissible fade show position-fixed" role="alert" style="position: absolute; top: 0; right: 0; margin:50px;">
            <strong>Gagal!</strong> Email dan Password tidak sesuai.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');
                    redirect(site_url('login'), 'refresh');
                }
            }
        }
    }
    public function logout()
    {
        $this->session->unset_userdata('email_user');
        $this->session->unset_userdata('user_name');
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('user_phone');
        $this->session->unset_userdata('user_gender');
        $this->session->unset_userdata('user_photo');
        $this->session->unset_userdata('user_role');
        $this->session->set_flashdata('notifikasi', '
      <div class="alert alert-success alert-dismissible fade show position-fixed" role="alert" style="position: absolute; top: 0; right: 0; margin:50px;">
      <strong>Berhasil!</strong> Anda telah logout.
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      </button>
      </div>');
        redirect(site_url('home'), 'refresh');
    }

    public function send_konfirmasi($email, $nama_lengkap)
    {
        $data['email'] = $email;
        $data['nama_lengkap'] = $nama_lengkap;
        // echo "<pre>";
        // print_r($data);
        // $this->load->view('email/email_register_', $data);
        // exit();
        $subject = "Pendaftaran Akun Prinneo";
        $message = $this->load->view('email/email_registrasi', $data, true);
        $config = array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://mail.prinneo.com',
            'smtp_port' => '465',
            'smtp_user' => 'info@prinneo.com',
            'smtp_pass' => '@Prinneo123',
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'wordwrap' => true,
        );
        $this->load->library('email');
        $this->email->initialize($config);
        $this->email->set_newline("\r\n");
        $this->email->from('info@prinneo.com', 'Customer Service Prinneo');
        $this->email->to($data['email']);
        $this->email->subject($subject);
        $this->email->message($message);

        if ($this->email->send()) {
            $this->session->set_flashdata('notifikasi', '<div class="alert alert-success alert-dismissible fade show position-fixed" role="alert" style="position: absolute; top: 0; right: 0; margin:50px;z-index:999">
        <strong>Pendaftaran akun berhasil!</strong>, Kami akan mengirimkan balasan melalui email ' . $data['email'] . ' anda
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        } else {
            # code...
            $this->session->set_flashdata('notifikasi', '<div class="alert alert-danger alert-dismissible fade show position-fixed" role="alert" style="position: absolute; top: 0; right: 0; margin:50px;z-index:999">
       Pengiriman Email Gagal!!
       <button type="button" class="close" data-dismiss="alert" aria-label="Close">
       <span aria-hidden="true">&times;</span>
       </button>
       </div>');
            // echo $this->email->print_debugger();
            // exit();
        }
    }

    public function forgot()
    {
        $data = [
            'isi' => 'pages/guest/v_forgot_pass',
            'pageFooter'            => 'pages/guest/v_forgot_pass_footer',
            'title' => 'Login',
            'contacts' => $this->M_contacts->get_all()->row(),
            'product_categorys' => $this->M_product_categorys->get_all()->result(),
            'product_sub_categorys' => $this->M_product_sub_categorys->get_all()->result()
        ];
        $this->load->view("layouts/guest/wrapper", $data, false);
    }

    public function forgotEmail()
    {
        if (!$this->input->is_ajax_request()) {
            exit('No direct script access allowed');
        }
        $valid = $this->form_validation;
        $valid->set_error_delimiters('', '');
        $valid->set_rules('user_email', 'Email', 'required|valid_email');

        if ($valid->run() == FALSE) {
            return resp(false,  validation_errors());
        }
        $user = $this->M_users->get_conditions([
            'user_email' => $this->input->post('user_email')
        ])->row();

        // print_r($user);
        if (!empty($user)) {
            $user->confirmation_code = bin2hex(random_bytes(20));
            // generate random hash
            $this->M_users->update([
                'user_id' => $user->user_id,
                'confirmation_code' => $user->confirmation_code
            ]);

            $this->sendEmail([
                'user_email' => $user->user_email,
                'user_name' => $user->user_name,
                'confirmation_code' => urlencode(base64_encode($user->confirmation_code))
            ]);
        }
        return resp(true, 'Email confirmed. Please check your email inbox !');
    }

    public function sendEmail($dataEmail)
    {
        $data['email'] = $dataEmail['user_email'];
        $data['nama_lengkap'] = $dataEmail['user_name'];
        $data['confirmation_code'] = $dataEmail['confirmation_code'];
        // echo "<pre>";
        // print_r($data);
        return  $this->load->view('email/email_forgot_password', $data);
        exit();
        $subject = "Pendaftaran Akun Prinneo";
        $message = $this->load->view('email/email_forgot_password', $data, true);
        $config = array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://mail.prinneo.com',
            'smtp_port' => '465',
            'smtp_user' => 'info@prinneo.com',
            'smtp_pass' => '@Prinneo123',
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'wordwrap' => true,
        );
        $this->load->library('email');
        $this->email->initialize($config);
        $this->email->set_newline("\r\n");
        $this->email->from('info@prinneo.com', 'Customer Service Prinneo');
        $this->email->to($data['email']);
        $this->email->subject($subject);
        $this->email->message($message);

        if ($this->email->send()) {
            return true;
        } else {
            return false;
        }
    }

    public function new_password()
    {
        $user = $this->M_users->get_conditions([
            'user_email' => $this->input->get('email'),
            'confirmation_code' => base64_decode(urldecode($this->input->get('code')))
        ])->row();

        if (empty($user)) {
            redirect(site_url('home'), 'refresh');
        }

        $data = [
            'isi' => 'pages/guest/v_new_password',
            'pageFooter'            => 'pages/guest/v_new_password_footer',
            'title' => 'New Password',
            'contacts' => $this->M_contacts->get_all()->row(),
            'product_categorys' => $this->M_product_categorys->get_all()->result(),
            'product_sub_categorys' => $this->M_product_sub_categorys->get_all()->result(),
            'dataUser' => $user
        ];
        $this->load->view("layouts/guest/wrapper", $data, false);
    }
}
