<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Customer extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('customer_model');
    }

    public function index()
    {
        $data['title'] = $this->session->userdata('company_name') . " | Customer";

        $data['state'] = $this->customer_model->GetAllState();
        $data['city'] = $this->customer_model->GetCities(21);

        $this->load->view('template/header', $data);
        $this->load->view('customer/index', $data);
        $this->load->view('template/footer', $data);
    }

    public function get_customer()
    {
        $JSON = array();
        $city_id = $this->input->post('customer_id');
        if ($city_id) {
            $city_data = $this->customer_model->get_customer($city_id);
            $JSON['flag'] = true;
            $JSON['data'] = $city_data;
        } else {
            $JSON['flag'] = false;
            $JSON['msg'] = 'Something went wrong Please try again after reloading page';
        }
        echo json_encode($JSON);
        exit(0);
    }

    public function get_customer_data()
    {
        $start = $this->input->get('iDisplayStart');
        $limit = $this->input->get('iDisplayLength');
        $search = $this->input->get('sSearch');
        $sort_col = $this->input->get('iSortCol_0');
        $sort = $this->input->get('sSortDir_0');
        if ($sort_col == 0) {
            $sort_col = 'id';
        }
        $result = $this->customer_model->get_customer('', $search, $limit, $start, $sort_col, $sort);
        $record = array();
        $k = 0;
        foreach ($result['data'] as $value) {
            $record[$k]['first_name'] = $value->first_name;
            $record[$k]['last_name'] = $value->last_name;
            $record[$k]['primary_mobile_number'] = $value->primary_mobile_number;
            $record[$k]['secondary_mobile_number'] = $value->secondary_mobile_number;
            $record[$k]['email'] = $value->email;
            $record[$k]['state'] = $value->statename;
            $record[$k]['city'] = $value->cityname;
            $record[$k]['pin_code'] = $value->pin_code;
            $record[$k]['date_installation'] = date("d-m-Y", strtotime($value->date_installation));
            $record[$k]['model_name'] = $value->model_name;
            $record[$k]['pricing'] = $value->pricing;
            $record[$k]['remarks'] = $value->remarks;
            $record[$k]['warranty_status'] = $value->warranty_status;
            $record[$k]['action'] = '<a href="javascript:void(0)" class="btn btn-success btn-flat btn-xs edit-customer" data-id="' . $value->id . '"><i class="fa fa-edit"></i>&nbsp;&nbsp;Edit</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:void(0)" class="btn btn-danger btn-flat btn-xs delete-customer" data-id="' . $value->id . '"><i class="fa fa-trash"></i>&nbsp;&nbsp;Delete</a>';
            $k++;
        }
        $result['data'] = $record;
        // exit(0);
        $result['sEcho'] = $this->input->get('sEcho');
        echo json_encode($result);
        exit(0);
    }

    public function add_edit_city()
    {
        $JSON = array();
        $this->load->library('form_validation');
        $action = $this->input->post('form-action');
        $formConfig = array(
            array(
                'field' => 'first_name',
                'label' => 'First Name',
                'rules' => 'trim|required',
                array(
                    'required'   => '%s required',
                )
            ),
            array(
                'field' => 'last_name',
                'label' => 'Last Name',
                'rules' => 'trim|required',
                array(
                    'required'   => '%s required',
                )
            ),
            array(
                'field' => 'primary_mobile_number',
                'label' => 'Primary Mobile Number',
                'rules' => 'trim|required',
                array(
                    'required'   => '%s required',
                )
            ),
            array(
                'field' => 'state',
                'label' => 'State',
                'rules' => 'trim|required',
                array(
                    'required'   => '%s required',
                )
            ),
            array(
                'field' => 'city',
                'label' => 'City',
                'rules' => 'trim|required',
                array(
                    'required'   => '%s required',
                )
            ),
            array(
                'field' => 'pin_code',
                'label' => 'Pin Code',
                'rules' => 'trim|required',
                array(
                    'required'   => '%s required',
                )
            ),
            array(
                'field' => 'date_installation',
                'label' => 'Date Installation',
                'rules' => 'trim|required',
                array(
                    'required'   => '%s required',
                )
            ),
            array(
                'field' => 'model_name',
                'label' => 'Model Name/ Number',
                'rules' => 'trim|required',
                array(
                    'required'   => '%s required',
                )
            ),
            array(
                'field' => 'warranty_status',
                'label' => 'Warranty Status',
                'rules' => 'trim|required',
                array(
                    'required'   => '%s required',
                )
            ),
        );
        $this->form_validation->set_rules($formConfig);
        if ($this->form_validation->run() == FALSE) {
            $JSON['flag'] = false;
            $JSON['msg'] = 'Please Check Form!!';
        } else {
            $data = array();
            $customer_id = $this->input->post('customer_id');
            $data['first_name'] =  $this->input->post('first_name');
            $data['last_name'] =  $this->input->post('last_name');
            $data['primary_mobile_number'] =  $this->input->post('primary_mobile_number');
            $data['secondary_mobile_number'] =  $this->input->post('secondary_mobile_number');
            $data['email'] =  $this->input->post('email');
            $data['state'] =  $this->input->post('state');
            $data['city'] =  $this->input->post('city');
            $data['pin_code'] =  $this->input->post('pin_code');
            $data['date_installation'] =  $this->input->post('date_installation');
            $data['model_name'] =  $this->input->post('model_name');
            $data['pricing'] =  $this->input->post('pricing');
            $data['remarks'] =  implode(",",$this->input->post('remarks'));
            $data['warranty_status'] =  $this->input->post('warranty_status');

            $NumberData = $this->customer_model->CheckNumber($data['primary_mobile_number'], $customer_id);

            if ($NumberData > 0) {
                $JSON['flag'] = false;
                $JSON['msg'] = 'Your mobile number already exists, Please try another number';
                echo json_encode($JSON);
                exit(0);
            }

            if ($action && $action == 'add') {
                $data['created_date'] =  date('Y-m-d H:i:s');
                $id = $this->customer_model->Add($data);
                if (!empty($id)) {
                    $JSON['flag'] = true;
                    $JSON['msg'] = 'Successfully Added !!';
                } else {
                    $JSON['flag'] = false;
                    $JSON['msg'] = 'Something went wrong Please try again after reloading page';
                }
            } else if ($action == 'edit') {
                $data['updated_date'] =  date('Y-m-d H:i:s');
                
                if ($customer_id && !empty($customer_id)) {
                    $this->customer_model->Edit($customer_id, $data);
                    $JSON['flag'] = true;
                    $JSON['msg'] = 'Successfully Edited !!';
                } else {
                    $JSON['flag'] = false;
                    $JSON['msg'] = 'Something went wrong Please try again after reloading page';
                }
            } else {
                $JSON['flag'] = false;
                $JSON['msg'] = 'Something went wrong Please try again after reloading page';
            }
        }
        echo json_encode($JSON);
        exit(0);
    }

    public function delete_customer()
    {
        $JSON = array();

        $customer_id = $this->input->post('customer_id');
        if ($customer_id) {
            $this->customer_model->Delete($customer_id);
            $JSON['flag'] = true;
            $JSON['msg'] = 'Successfully Deleted !!';
        } else {
            $JSON['flag'] = false;
            $JSON['msg'] = 'Something went wrong Please try again after reloading page';
        }
        echo json_encode($JSON);
        exit(0);
    }

    function getCities() 
    {
        $StateId = $this->input->post('StateId');
        $data = $this->customer_model->GetCities($StateId);

        echo json_encode($data);
    }
}
