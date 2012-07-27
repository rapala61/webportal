<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* Name: GeePortal Webapp
 * Description: GEEPortal is the main interface between GEE's client data and
 * the logistics processes that take place during the life cycle of each client,
 * these include:
 *  > the submission of the lead
 *  > the presentation and follow up process
 *  > Scheduling Pre-Inspections
 *  > moving the account to in-contract
 *  > then in-contract installed
 *  > Listing the installed technologies
 *  > Filing of service tickets, etc.
 *
 * author: Rafael Pacas
 *
 */

class Gportal_ctrl extends CI_Controller	{
    protected $vars;

    public function __construct(){

//     sets the needed variables
//     to contruct the main menu bar of the portal and the userdata cookie

        parent::__construct();

        $this->vars['logged_in'] = $this->is_logged_in();
        $user = $this->session->userdata('username');
        $this->vars['menu_list']= array(anchor('/gportal_ctrl/user_area', 'Welcome ' . $user ),
                                        anchor('/gportal_ctrl/database','Database',array('class'=> 'xtrig dotted_link')),
                                        anchor('/gportal_ctrl/tools','Tools',array('class'=> 'xtrig dotted_link')),
                                        anchor('/login/log_out','Log Out',array('class'=> 'xtrig dotted_link')));

        $this->load->vars($this->vars);
    }

/*### INDEX - FUNCTION ###*/            /*Main function of the controller, redirects User to Database page after he/she logs in */
    public function index(){
    $yes = $this->is_logged_in();
    if ($yes)
    {
        $this->database();




    }else { $msg['user_notfound'] = "Our Records don't match with your login credentials.";


//>>> LOGIN - VIEW <<<//
    $this->load->view('login',$msg);
    }
    }

                                /*### IS LOGGED IN - FUNCTION ###*/     /*This function allows the controller to check if the user is authorized to access the information in the database*/
                                    public function is_logged_in(){
                                    $is_logged_in = $this->session->userdata('is_logged_in');
                                    if($is_logged_in != true){

                                    $msg['user_notfound'] = "Our Records don't match with your login credentials.";
                                    redirect('login');


                                    }elseif($is_logged_in == true){

                                   return TRUE;

                                    }

                                }





/*### USER AREA - FUNCTION ###*/      //Function to load the view for the User_area section of the GEEportal
public function user_area(){
$yes = $this->is_logged_in();

    if ($yes){

    $data['menu_list'] = $this->vars['menu_list'];


//>>> USER_AREA - VIEW <<<//
    $this->load->view('user_area',$data);
        }
 else {
	 $data['user_notfound'] = "Our Records don't match with your login credentials.";
    $this->load->view('login',$data);
}

}


                                /*### DATABASE - FUNCTION ###*/ //Function to load the view for the Database section of the GEEportal
                                    public function database(){
                                        $yes = $this->is_logged_in();
                                        if ($yes){
                                            $this->load->library('Database_search');
                                            $data = $this->database_search->default_map();

                                //>>> DATABASE - VIEW <<<//
                                            $this->load->view('database',$data);
                                        }else{
                                            $msg['user_notfound'] = "Our Records don't match with your login credentials.";
                                            $this->load->view('login',$msg);
                                        }
                                    }


/*### DATABASE SEARCH - FUNCTION ###*/    //Function to load the view for the Database-search section of the GEEportal

/*Database_search Class is in charge of handling the requests of the browser so that it passes the search parameters to the necessary database model,
After the results are received , it thens delivers the query results to the browser, together with the necessary Markers to show in the map.*/

    public function database_search(){
        $yes = $this->is_logged_in();
        if ($yes){
            $this->load->library('Database_search');
            $input['find'] = $this->input->post('find');
            $input['field'] = $this->input->post('field');
            $data = $this->database_search->search_results($input);

//>>> DATABASE SEARCH - VIEW <<<//
             $this->load->view('database', $data);
        }else{
            $msg['user_notfound'] = "Our Records don't match with your login credentials.";
            $this->load->view('login',$msg);
        }
    }


                                    /*### TOOLS - FUNCTION ###*/

                                        public function tools(){
                                            $yes = $this->is_logged_in();
                                            if ($yes){
                                                $data['menu_list'] = $this->vars['menu_list'];

                                    //>>> TOOLS - VIEW <<<//
                                                $this->load->view('tools',$data);
                                            }else{
                                                $msg['user_notfound'] = "Our Records don't match with your login credentials.";
                                                $this->load->view('login',$msg);
                                            }
                                        }


/*### MORE INFO - FUNCTION ###*/

    function more_info($customer_id,$stage){
        $yes = $this->is_logged_in();
        if ($yes){
            $data['id'] = $customer_id;
            $data['stage'] = $stage;
            $this->load->model('Database_mdl');
            $db_results = $this->Database_mdl->more_info($data);
            $this->load->library('Business',$db_results);
            $results = $this->business->main_info();

    //*** MORE INFO - VIEW ***//
            $this->load->view('more_info', $results);
        }else{
            $msg['user_notfound'] = "Our Records don't match with your login credentials.";
            $this->load->view('login',$msg);
        }
    }
}

    function price_list(){
        $yes = $this->is_logged_in();
        if ($yes){
            $level = $this->session->userdata('user_level');
                if($level == 'a' OR $level == 'b'){






                }







        }else {
            $msg['user_notfound'] = "Our Records don't match with your login credentials.";
            $this->load->view('login',$msg);
            }


    }

    function customer_management(){
        $yes = $this->is_logged_in();
        if ($yes){
            $level = $this->session->userdata('user_level');
            if($level == 'a' OR $level == 'b'){
                $this->grocery_crud->set_table('');




            }

        } else {
             $msg['user_notfound'] = "Our Records don't match with your login credentials.";
             $this->load->view('login',$msg);
            }

    }

function audit(){
    $yes = $this->is_logged_in();
    if ($yes){
        $this->load->view('tools');
    } else {
             $msg['user_notfound'] = "Our Records don't match with your login credentials.";
             $this->load->view('login',$msg);
            }



}



//    function output($output = null)    {
//        $this->load->view('management',$output);
//    }


//function customer_management(){
//$yes = $this->is_logged_in();
//
//    if ($yes){
//    $level = $this->session->userdata('user_level');
//
//
//        if($level == 'a' OR $level == 'b'){
//    try{
//        /* This is only for the autocompletion */
//       $crud = new grocery_CRUD();
//
//        $crud->set_theme('flexigrid');
//        $crud->set_table('customers');
//        $crud->set_subject('Customer');
//        $crud->required_fields('BUSINESS_NAME','BUSINESS_OWNER','TEL','ADDRESS_ST','ADDRESS_CITY','ADDRESS_STATE','ADDRESS_ZIP','CONSULTANT','SALES_DIRECTOR','BILL_ACCOUNT');
//        $crud->columns('CUSTOMER_ID','BUSINESS_NAME','BUSINESS_CORP','BUSINESS_OWNER','TEL','ADDRESS_ST','ADDRESS_CITY','ADDRESS_STATE','ADDRESS_ZIP','CONSULTANT','SALES_DIRECTOR','STATUS','BILL_ACCOUNT');
//
//        $crud->unset_delete();
//        $output['menu_list'] = $this->vars['menu_list'];
//        $output = $crud->render();
//
//        $this->output($output);
//
//}catch(Exception $e){
//        show_error($e->getMessage().' --- '.$e->getTraceAsString());
//}
//
//       }else {  $msg['level_error'] = "You are not authorized to access this area. <br /> If you think this is an error, please contact your database manager.";  $this->load->view('tools',$msg); }
//
//}  else {
//                 $msg['user_notfound'] = "Our Records don't match with your login credentials.";
//    $this->load->view('login',$msg);
//            }
//}
