<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Database_search{

    protected $vars;
    protected $database_model_name = "database_mdl";


    public function __construct(){

        $this->vars['search_container_attrb']=array('id'=>'searchform');
        $this->vars['field_var_options']=array('CUSTOMER_ID' => 'File Id',
                'BUSINESS_NAME' => 'Business Name',
                'BUSINESS_CORP' => 'Corp Name',
                'BUSINESS_OWNER' => 'Owner',
                'ADDRESS_ST' => 'St Address',
                'ADDRESS_CITY' => 'City',
                'ADDRESS_STATE_PROVINCE' => 'State',
                'ADDRESS_ZIP' => 'Zip',
                'BUSINESS_TEL' => 'Telephone #');
      //  $this->vars['checkbox_1_var'] = array('name' =>'include_rest', 'value' =>'Restaurants','id'=>'rest_box');
      //  $this->vars['checkbox_2_var'] = array('name' =>'include_int', 'value' =>'International','id'=>'int_box');
        $this->vars['submit_btn_var'] = array('name' => 'submit','value' => 'Search','id' => 'btn-search');
        $this->vars['find_var'] = array('name'=> 'find','id' => 'search-text');
        $this->vars['default_map_config'] = array( 'center' => '40.868986, -73.916788',
                'zoom' => 15,'maxzoom'=> 18);
        $this->vars['default_map_gee_marker'] = array( 'lat' => '40.868986',
                                                   'lng' => '-73.916788',
                                                   'title' => 'Global Energy Efficiency',
                                                   'body' => '<p style="font-type:arial; margin-bottom:2px;">
                                                              <i><b>Working for a sustainable future</b></i><br />
                                                              5030 Broadway, Suite 803<br />
                                                              Manhattan, NY 10034',
                                                    'icon' => base_url() . "images/gee_marker.png"
                                                   );
        $this->vars['default_map_ges_marker'] = array( 'lat' => '40.864929',
                                                   'lng' => '-73.862329',
                                                   'title' => 'GES Logistics',
                                                   'body' => '<p style="text-align:center; font-type:arial; margin-bottom:2px;">
                                                              <i><b>Efficient project management</b></i><br />
                                                              2556 Matthews Ave<br />
                                                              Bronx, NY 10467',
                                                    'icon' => base_url() . "images/ges_marker.png"
                                                   );


    }

    public function default_map(){

        $d_array = array();
        $data['default_center'] = '40.868986, -73.916788';
        $marker = $this->vars['default_map_gee_marker'];
        array_push($d_array, $marker);
        $marker = $this->vars['default_map_ges_marker'];
        array_push($d_array, $marker);
        $data['default_markers']  =  json_encode($d_array);
        $data['search_container_attrb'] = $this->vars['search_container_attrb'];
        $data['field_var_options'] = $this->vars['field_var_options'];
        $data['submit_btn_var'] = $this->vars['submit_btn_var'];
        $data['find_var'] = $this->vars['find_var'];
        $data['default_map_config'] = $this->vars['default_map_config'];
      //  $data['checkbox_1_var'] = $this->vars['checkbox_1_var'];
      //  $data['checkbox_2_var'] = $this->vars['checkbox_2_var'];
        return $data;
    }

    public function search_results($input){

        $CI =& get_instance();

        $search['find'] = $input['find'];
        $search['field'] = $input['field'];

        $CI->load->model('Database_mdl');
        $query = $CI->Database_mdl->search_db($search);

        if(!empty($query['query_status'])){

            $data = $this->default_map();
            $data['query_status'] = $query['query_status'];

            return $data;

        }elseif(empty ($query['query_status'])){


        $marker = array();
        $array_push = array();

        foreach ($query as $results):
            //name switch AVOIDS to show an empty corporate name by showing the DBA instead.
            $name_switch;
            $fixed_stage_name;
            $fixed_stage_name = $this->stage_name_prep($results->STAGE);
            if(empty($results->BUSINESS_NAME)){
                $name_switch = $results->BUSINESS_CORP;
            }else{
                $name_switch = $results->BUSINESS_NAME;
            }

        $data['query_center'] =  $results->LAT . "," . $results->LNG ;
        $hidden_attrbs = array(
                                'name' => $results->CUSTOMER_ID
                                 );
        $form_attrbs = array(
                                'id' => 'update_form'

                                );

        $content =   "<table style='text-align:left; width:400px; font-size:12px;'>".
                        "<tr><td>".
                            "<table style='width:398px; margin: 0px;'>".
                                "<tr><td><p id='service_ticket'><a class='popup_form fancybox.iframe' href='service_ticket/" . $results->CUSTOMER_ID . "' style='text-decoration: none; color: white;'>Service ticket</a></p></td>" .
                                "<td><p id='service_ticket'><a class ='popup_form fancybox.iframe' href='pre_inspection/" . $results->CUSTOMER_ID . "/" . $results->STAGE . "' style='text-decoration: none; color: white;'>Pre Inspection</a></p></td>".
                                "<td><p id='service_ticket'><a class ='popup_form fancybox.iframe' href='e_mail/" . $results->CUSTOMER_ID . "' style='text-decoration: none; color: white;'>E-mail</a></p></td>".
                                "<td><p id='more_info'><a class ='popup_form fancybox.iframe' href='more_info/" . $results->CUSTOMER_ID . "/" . $results->STAGE . "' style='text-decoration: none; color: white;'>More Info</a></p></td></tr>".
                                "</table>".
                                "<table style='width:398px; margin: 0px;'>".
                                "<tr><td style='width: 90px;'><span style='font-size:12px;'><b>CORP NAME:</b></span></td><td style='width: 234px;'>". $results->BUSINESS_CORP."</td></tr>".
                                "<tr><td style='width: 90px;'><span style='font-size:12px;'><b>OWNER/S:</b></span></td><td style='width: 234px;'>". $results->OWNER_A_FIRSTNAME." ". $results->OWNER_A_LASTNAME . ", " .$results->OWNER_B_FIRSTNAME. " ". $results->OWNER_B_LASTNAME . "</td></tr>".
                                "<tr><td style='width: 90px;'><span style='font-size:12px;'><b>MAIN TEL:</b></span></td><td style='width: 234px;'>".$results->BUSINESS_TEL."</td></tr>".
                                "<tr><td style='width: 90px;'><span style='font-size:12px;'><b>UTILITY COMPANY:</b></span></td><td style='width: 234px;'>".$results->UTILITY_COMPANY."</td></tr>".
                                "<tr><td style='width: 90px;'><span style='font-size:12px;'><b>ACCT #:</b></span></td><td style='width: 234px;'>".$results->UTILITY_ACCOUNT."</td></tr>".
                                "<tr><td><p></p></td></tr>".
                            "</table>".
                        "</td></tr>".
//                        "<tr><td><p></p></td></tr>".
                          "</table>".
                     "<div><table style='width:422px; font-size:12px;'>".
                                "<tr><td style='width:60px; text-align: left;'><span style='font-size:12px;'><b>STATUS:</b></span></td><td style='width:243px;'><p style='width: 239px;'>". $fixed_stage_name . "</p></td>".

                                "</tr>".
                            "</table>".
                        "</div>";

        $marker = array( 'lat' => (float)$results->LAT ,
                            'lng' => (float)$results->LNG ,
                            'title' =>  $results->CUSTOMER_ID . "<BR />" . $name_switch ."<BR />" . $results->ADDRESS_ST . "<BR />" . $results->ADDRESS_CITY . ", " . $results->ADDRESS_STATE_PROVINCE . " " . $results->ADDRESS_ZIP ,
                            'body' => $content ,
                            'icon' => base_url() . $results->ICON_PATH
                                         );
         array_push($array_push, $marker);

     endforeach;

        $data['query_markers'] = json_encode($array_push);
        $data['search_container_attrb'] = $this->vars['search_container_attrb'];
        $data['field_var_options'] = $this->vars['field_var_options'];
        $data['submit_btn_var'] = $this->vars['submit_btn_var'];
        $data['find_var'] = $this->vars['find_var'];
        $data['default_map_config'] = $this->vars['default_map_config'];
      //  $data['checkbox_1_var'] = $this->vars['checkbox_1_var'];
      //  $data['checkbox_2_var'] = $this->vars['checkbox_2_var'];

        $n = $CI->Database_mdl->get_numrows($search);
        $data['query_status'] = $n['numrows'];

        return $data;
}



    }

        protected function stage_name_prep($stage){
        $result ='';
        if($stage == "INSTALLED"){ $result = "IN CONTRACT - INSTALLED";}
        if($stage == "PRESENTATION_AND_FOLLOW-UP"){ $result = "PRESENTATION AND FOLLOW-UP";}
        if($stage == "IN_CONTRACT"){ $result = "IN CONTRACT";}
        if($stage == "SOLD_RETAIL"){ $result = "SOLD RETAIL";}
        if($stage == "SERVICING"){ $result = "BEING SERVICED";}


        return $result;
    }


}

