<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <title>More Info</title>
        <script type="text/javascript" src="<?php //echo base_url(). 'js/jquery-ui-1.8.16.custom.min.js'?>"></script>
        <link type="text/css" href="<?php //echo base_url(). 'css/smoothness/jquery-ui-1.8.16.custom.css'?>" rel="Stylesheet" />
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>



    </head>
    <body>-->

                        <div>

                            <div>
                                <p>Date:<input type="text" id="datepicker"></p>


                            </div>




                            <div id="accordion">

                                <h3><a href="#">More Info</a></h3>
                                <div>
                                                <?php echo $business_stage . "<br><br>" .
                                                           $id . "<BR>" .
                                                           $business_name . "<BR>".
                                                           $business_type . "<BR>" .
                                                           $business_corp . "<BR>" .
                                                           $owner . "<BR>" .
                                                           $tel . "<BR>" .
                                                           $alt_tel . "<br>" .
                                                           $fax . "<br>" .
                                                           $email . "<br>" .
                                                           $alt_email . "<br>" .
                                                           $address_st . "<br>" .
                                                           $address_city . "<br>" .
                                                           $address_state . "<br>" .
                                                           $address_zip . "<br>" .
                                                           $address_country . "<br>" .
                                                           $website;

                                                ?>
                                </div>
                                <h3><a href="#">Presentation and Follow-Up</a></h3>
                                <div>test</div>


                            </div>
                            <div>

                                <?php




                                ?>

                            </div>

                        </div>




<!--<script type="text/javascript" charset="utf-8">

    $(function(){

        $("#datepicker").datepicker();
        $("#accordion").accordion();
    });
</script>-->


<!--
    </body>
</html>-->