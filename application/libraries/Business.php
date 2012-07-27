<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Business {

    protected $main_info;
    public  $lat;
    public  $lng;

public function __construct($info = array()) {
   // $bstage;
    $CI = & get_instance();
    foreach($info as $v):
        $this->main_info['id'] = $v->CUSTOMER_ID;
        $this->main_info['business_name'] = $v->BUSINESS_NAME;
        $this->main_info['business_type'] = $v->BUSINESS_TYPE;
        $this->main_info['business_corp'] = $v->BUSINESS_CORP;
        $stage = $v->STAGE;
        $this->main_info['owner'] = $v->BUSINESS_OWNER;
        $this->main_info['tel'] = $v->BUSINESS_TEL;
        $this->main_info['alt_tel'] = $v->ALT_TEL;
        $this->main_info['fax'] = $v->FAX;
        $this->main_info['email'] = $v->BUSINESS_EMAIL;
        $this->main_info['alt_email'] = $v->ALT_EMAIL;
        $this->main_info['address_st'] = $v->ADDRESS_ST;
        $this->main_info['address_city'] = $v->ADDRESS_CITY;
        $this->main_info['address_state'] = $v->ADDRESS_STATE_PROVINCE;
        $this->main_info['address_zip'] = $v->ADDRESS_ZIP;
        $this->main_info['address_country'] = $v->ADDRESS_COUNTRY;
        $this->main_info['website'] = $v->WEBSITE;
        $this->lat = $v->LAT;
        $this->lng = $v->LNG;
    endforeach;

    $this->main_info['business_stage'] = $this->stage_name_prep($stage);
}


//Makes business stage name more readable
    protected function stage_name_prep($stage){
        $result ='';
        if($stage == "LEAD"){ $result = "LEAD";}
        if($stage == "PRESENTATION_AND_FOLLOW-UP"){ $result = "PRESENTATION AND FOLLOW-UP";}
        if($stage == "IN_CONTRACT"){ $result = "IN CONTRACT";}
        if($stage == "SOLD_RETAIL"){ $result = "SOLD RETAIL";}
        if($stage == "SERVICING"){ $result = "BEING SERVICED";}

        return $result;
    }

    public function main_info(){
        $info = $this->main_info;
        return $info;

    }



}
