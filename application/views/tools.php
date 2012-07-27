<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <title>Tools</title>
<!--        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>-->
<!--        <script type="text/javascript" src="<?php //echo base_url(). 'js/fancybox/jquery.fancybox-1.3.4.pack.js';?>"></script>-->
<!--        <link rel="stylesheet" href="<?php// echo base_url(). 'js/fancybox/jquery.fancybox-1.3.4.css';?>" type="text/css" media="screen" />-->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(). 'css/gportal.css'?>"  media="screen"/>

        <style>
            #options
            {
              float:left;
              width: 700px;
              margin-top: 0px;
              margin-left: auto;
              margin-right: auto;
            }
            #options tr td
            {

             width:100px;
             background: rgb(16,128,168);
             cursor: pointer;
             -webkit-border-radius: 3px;
             -moz-border-radius: 3px;
             color:white;
             list-style: none;

            }
            #options tr td a
            {

                padding: 5px;
                display: block;
                text-decoration: none;
                color: white;
            }
            #options tr td a:hover
            {
                background: rgb(13,105,145);

            }

        </style>




    </head>
    <body>
    <div id="nav_container">

        <ul id="nav_menu">
            <?php if(isset($menu_list)){ foreach ($menu_list as $path ):?>
                <li>
                    <?php echo $path; ?>
                </li>
            <?php endforeach;}?>
        </ul>

    <div id="header_logo_banner">

<!--    <img src="<?php// echo base_url() . 'images/gee_holdings.png'?>" id="lucca_logo" />-->

    <img src="<?php echo base_url() . 'images/GEE.png'?>" id="gee_logo" />

<!--    <img src="<?php// echo base_url() . 'images/GES.png'?>" id="ges_logo" />-->


    </div>
    </div>
    <div id="wrapper">
    <div id="canvas">
        <div>
            <div style=" height: 75px; float: left; margin-top: 10px; margin-left: 250px;">
            <p style=" font-family: arial;"> </p>
            </div>
            <table id="options">
                <tbody><tr>
                    <td>
                       <a href="<?php echo base_url() . 'gportal_ctrl/customer_management'?>" id="cdm">Customer Database Management</a>
                    </td>
                    <td>
                        <a href="<?php echo base_url() . 'gportal_ctrl/price_list'?>" id="cdm">Price List Management</a>
                    </td>
                    <td style="background-color: white;
                        border:none;">

                    </td>
                    <td style="background-color: white;
                        border:none;">

                    </td>
                </tr>
            </tbody></table>

        </div>

    </div>

    </div>

    </body>
</html>