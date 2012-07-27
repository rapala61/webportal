<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<?php header("Cache-Control: no-cache, no-store, must-revalidate");?>
<?php header("Pragma: no-cache"); ?>
<title>Database</title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(). 'css/gportal.css';?>"  media="screen"/>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false" ></script>
<script type="text/javascript" src="<?php echo base_url(). 'js/fancybox/jquery.easing-1.3.pack.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url(). 'js/jquery-ui-1.8.16.custom.min.js'?>"></script>
<link type="text/css" href="<?php echo base_url(). 'css/smoothness/jquery-ui-1.8.16.custom.css'?>" rel="Stylesheet" />


<link rel="stylesheet" href="<?php echo base_url(). 'js/fancybox/jquery.fancybox.css?v=2.0.3'?>" type="text/css" media="screen" />
<script type="text/javascript" src="<?php echo base_url(). 'js/fancybox/jquery.fancybox.pack.js?v=2.0.3'?>"></script>


<script type="text/javascript" src="<?php echo base_url(). 'js/jquery.form.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url(). 'js/bmap.js';?>" ></script>
</head>
<body>

        <div id="nav_container">
           <ul id="nav_menu"> <?php foreach ($menu_list as $path ):?>
             <li>
                <?php echo $path; ?>
             </li>
             <?php endforeach;?>
           </ul>
        </div>
    <div id="header_logo_banner">

<!--    <img src="<?php// echo base_url() . 'images/gee_holdings.png'?>" id="lucca_logo" />-->

    <img src="<?php echo base_url() . 'images/GEE.png'?>" id="gee_logo" />

<!--    <img src="<?php// echo base_url() . 'images/GES.png'?>" id="ges_logo" />-->


    </div>

         <div id="wrapper">

    <div id="canvas">




    <div id="map"></div>
    <div id="search_container">
    <?php echo form_open('/gportal_ctrl/database_search',$search_container_attrb);
          echo form_label('Search by :','field');
          echo form_dropdown('field', $field_var_options, 'id');
          echo form_input($find_var);?>
<!--        <div id="include_check_box">-->
    <?php
/*echo form_label('Restaurants ','include_rest');
echo form_checkbox($checkbox_1_var);
echo form_label('International ','include_int');
echo form_checkbox($checkbox_2_var); */ ?>

                    <!--</div>-->

    <?php
          echo form_submit($submit_btn_var);?>
    </div>

    <div id="results">

            <?php if(isset ($query_status)){
             echo "<p class='r' style='text-align:center;'>" . $query_status . "</p>";
             }?>

    </div>

    <div id="sidebar_results">

    </div>
    </div>

         </div>


    <script type="text/javascript" charset="utf-8">




       $(document).ready(function(){



            $(".popup_form").fancybox({

                maxWidth	: 800,
		maxHeight	: 600,
		fitToView	: false,
		width		: '70%',
		height		: '70%',
		autoSize	: false,
		closeClick	: false,
		openEffect	: 'none',
		closeEffect	: 'none'

            });



                    jQuery(function(){


                        $("#btn-search").click(function(){
                            $(".r").detach();
                            $(".error").detach();
                            var hasError = false;
                            var searchReg = /^[a-zA-Z0-9-\s]+$/;
                            var searchVal = $("#search-text").val();
                                if(searchVal == '')
                                {
                                    $("#results").append('<span class="error">Please enter a search term.</span>');
                                    hasError = true;

                                }   else if(!searchReg.test(searchVal))
                                    {
                                         $("#results").append('<span class="error">Enter valid text.</span>');
                                        hasError = true;
                                    }
                        if(hasError == true)
                        {
                            return false;
                        }
                        });
                    });

                $("#map").bMap({
                        mapZoom: 12,
                        mapCenter:[<?php if(isset($default_center)){echo $default_center;}else{echo $query_center;}?>],
                        mapSidebar:"sidebar_results", //id of the div to use as the sidebar
                        markers:{"data":<?php if(isset($default_markers)){echo $default_markers; }else{echo $query_markers;}?>},
                        loadMsg:"<h3>Locating...</h3>"
                });


        });
     </script>
</body>
</html>