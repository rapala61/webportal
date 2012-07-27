<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Database_mdl extends CI_Model {

    public function __construct() {}

    public function search_db($search) {

     $find = strtoupper($search['find']);
     $field = strtoupper($search['field']);

     $this->db->select('*')->from(array('customer_master_table','ref_business_icon'))->where('customer_master_table.BUSINESS_ICON = ref_business_icon.ICON_NAME')->like($field,$find);

     $q = $this->db->get();

     if($q->num_rows() > 0){

        foreach ($q->result() as $row) {

            $data []= $row;
        }

            return $data;


	}else{
         $msg['query_status'] = " No record matches your request.";
         return $msg;

        }



}
public function get_numrows($search){

     $find = strtoupper($search['find']);
     $field = strtoupper($search['field']);

		$q = $this->db->query("SELECT * FROM customer_master_table WHERE $field LIKE '%$find%' ");

            $v = $q->num_rows();
           $data['numrows'] = $v . " Records Found";
         return $data;

}

public function more_info($ctrl_data){

    $customer_id = $ctrl_data['id'];
    $stage = $ctrl_data['stage'];

    $join = "";
    if($stage == "PRESENTATION_AND_FOLLOW-UP"){$join = "join_presentation_and_followup";}
    if($stage == "IN_CONTRACT"){$join = "join_in_contract";}
    if($stage == "SOLD_RETAIL"){$join = "join_sold_retail";}
    if($stage == "INSTALLED"){$join = "join_installed";}
    if($stage == "SERVICING"){$join = "join_servicing";}

    $where = "customer_master_table.CUSTOMER_ID = " . $join . "." . "CUSTOMER_ID";


    $this->db->select('*')->from(array('customer_master_table',$join));
    $this->db->where($where);


    $q = $this->db->get();

    foreach ($q->result() as $row) {

                    $data []= $row;


                }

                return $data;

}


}

