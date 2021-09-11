<?php
class Customer_model extends CI_Model
{

    function get_customer($id = NULL, $search = '', $limit = '', $start = '', $sort_col = 0, $sort = 'asc')
    {

        $this->db->select('SQL_CALC_FOUND_ROWS *, (SELECT name FROM state s WHERE s.id = state)as statename, (SELECT name FROM cities c WHERE c.id = city)as cityname', FALSE);
        $this->db->from('customer');
        if ($id != NULL) {
            // Getting only ONE row
            $this->db->where('customer.id', $id);
            $query = $this->db->get();
            if ($query->num_rows() == 1) {
                // One row, match!
                return $query->row();
            } else {
                return false;
            }
        } else {
            $this->db->limit($limit, $start);
            if (!empty($search)) {
                $this->db->or_like(array('first_name' => $search, 'last_name' => $search ));
            }
            $this->db->order_by($sort_col . " " . $sort);
            $query = $this->db->get();
            $data["data"] = array();
            if ($query->num_rows() > 0) {
                $data["data"] = $query->result();
            }
            $count = $this->db->query('SELECT FOUND_ROWS() AS Count');
            $data["recordsTotal"] = $this->db->count_all('customer');
            $data["recordsFiltered"] = $count->row()->Count;
            return $data;
        }
    }

    function Add($data)
    {
        $this->db->insert('customer', $data);

        // Get id of inserted record
        $id = $this->db->insert_id();
        return $id;
    }

    function Edit($id, $data)
    {
        $this->db->where('id', $id);
        $result = $this->db->update('customer', $data);

        // Return
        if ($result) {
            return $id;
        } else {
            return false;
        }
    }

    function Delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('customer');
    }

    function getTotalCustomer()
    {
        $query = $this->db->select('*', FALSE)->from('customer')->get();
        return $query->num_rows();
    }

    function GetFromField($where)
    {
        $this->db->select('*', FALSE)->from('city');
        $query = $this->db->where($where)->get();
        $data = $query->result();
        return $data;
    }

    function GetAllState() {
        return $this->db->from('state')->get()->result_array();
    }

    function GetCities($id) {
        return $this->db->from('cities')->where('state_id', $id)->get()->result_array();
    }

    function CheckNumber($Number, $id) {
        if ($id != 0) {
            $this->db->where("id", $id);
            $this->db->where("primary_mobile_number !=", $Number);
        } else {
            $this->db->where("primary_mobile_number", $Number);
        }
        $query = $this->db->from('customer')->get();

        return $query->num_rows();
    }
}
