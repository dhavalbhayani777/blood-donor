<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('user_model');
    }

    public function index() {
        /* $Details = $this->user_model->get(1);
        $this->session->set_userdata(array(
            'company_name' => $Details->company_name
        ));
        $data['company_name'] = $Details->company_name; */
        $data['company_name'] = 'Blood Donor';
        $this->load->view('login', $data);
    }

    public function validate() {
        //Including validation library
        $this->load->library('form_validation');

        $this->form_validation->set_error_delimiters('<div class="alert alert-danger"><span>', '</div></span>');

        //Validating Fields
        $rules[] = array('field' => 'phone', 'label' => 'Phone', 'rules' => 'required');
        $rules[] = array('field' => 'password', 'label' => 'Password', 'rules' => 'required|callback_validate_login', 'errors' => array('validate_login' => 'Incorrect username or password.'));

        $this->form_validation->set_rules($rules);

        if ($this->form_validation->run() == FALSE) {
            // Validation failed
            return $this->index();
        } else {
            // Validation succeeded!
            redirect('dashboard', 'redirect');
        }
    }

    public function validate_login($str) {
        $this->load->helper('cookie');
        // Create array for database fields & data
        $data = array();
        $data['phone'] = $this->input->post('phone');
        $data['password'] = base64_encode($str);

        $user = $this->user_model->ValidateLogin($data);
        $data = array();
        if (count($user['records']) == 1) {
            $this->session->set_userdata(array(
                'mobile_no' => $user['records'][0]->mobile_no,
                'id' => $user['records'][0]->id
            ));

            /* if ($this->input->post('remember')) {
                set_cookie(array(
                    'name' => 'username',
                    'value' => $data['email'],
                    'expire' => '86500',
                    'prefix' => 'lark_'
                ));
                set_cookie(array(
                    'name' => 'password',
                    'value' => $data['password'],
                    'expire' => '86500',
                    'prefix' => 'lark_'
                ));
            } */
            $data['flag'] = true;
        } else {
            $data['flag'] = false;
        }

        echo json_encode($data);
        exit;
    }

    public function changepassword() {
        $user_id = $this->input->post('user_id');
        $password = $this->input->post('current_password');
        $new_password = $this->input->post('new_password');
        $JSON = array();

        $checkPass = $this->user_model->get($user_id);
        $data = json_decode(json_encode($checkPass), JSON_OBJECT_AS_ARRAY);
        
        if ($data['password'] != $password) {
            $JSON['flag'] = false;
            $JSON['msg'] = 'The current password does not exist in our system, please try again';
        } else {
            $edit = $this->user_model->Edit($user_id, array('password' => $new_password));
            if ($edit) {
                $JSON['flag'] = true;
                $JSON['msg'] = 'Password has been updated successfully';
            } else {
                $JSON['flag'] = false;
                $JSON['msg'] = 'Could not update password, please try again';
            }
        }
        
        echo json_encode($JSON);
    }

    public function changecompanyname() {
        $user_id = $this->input->post('user_id');
        $company_name = $this->input->post('company_name');
        $JSON = array();


        $edit = $this->user_model->Edit($user_id, array('company_name' => $company_name));
        if ($edit) {
            $JSON['flag'] = true;
            $JSON['msg'] = 'Company name has been updated successfully';
        } else {
            $JSON['flag'] = false;
            $JSON['msg'] = 'Could not update company name, please try again';
        }
        
        echo json_encode($JSON);
    }

    public function register()
    {
        $data['company_name'] = 'Blood Donor';
        $this->load->view('register', $data);
    }

    public function forgot()
    {
        $data['company_name'] = 'Blood Donor';
        $this->load->view('forgot', $data);
    }

    public function registration()
    {
        $firstname = $this->input->post('firstname');
        $lastname = $this->input->post('lastname');
        $phone_no = $this->input->post('phone_no');
        $district = $this->input->post('district');
        $panchayath = $this->input->post('panchayath');
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $JSON = array();

        $checkPass = $this->user_model->Add(array(
            'firstname' => $firstname,
            'lastname' => $lastname,
            'email' => $email,
            'mobile_no' => $phone_no,
            'password' => base64_encode($password),
            'district' => $district,
            'panchayath' => $panchayath,
            'type' => 3,
            'created_on' => date('Y-m-d H:i:s')
        ));

        if ($checkPass) {
            $JSON['flag'] = true;
            $JSON['msg'] = 'Your donor account has been created successfully';
        } else {
            $JSON['flag'] = false;
            $JSON['msg'] = 'Your donor account has been not created, Please try again or check your form';
        }

        echo json_encode($JSON);
    }
}
