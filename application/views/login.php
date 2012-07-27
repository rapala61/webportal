<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <title>Gportal Log-In</title>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(). 'css/login.css'?>"  media="screen"/>

    </head>
<body>


<div id="nav_container"></div>

    <div id="header_logo_banner">

<!--    <img src="<?php// echo base_url() . 'images/gee_holdings.png'?>" id="lucca_logo" />-->

    <img src="<?php echo base_url() . 'images/GEE.png'?>" id="gee_logo" />

<!--    <img src="<?php// echo base_url() . 'images/GES.png'?>" id="ges_logo" />-->


    </div>

<div id="wrapper" style="position: relative;">
<div id="canvas">

<div id="formcontainer">
<h3>Log In</h3>
<?php echo form_open('login/validate_credentials');?>
<?php echo form_input('username');?>
<?php echo form_password('password');?>
<?php  echo form_submit('submitlg','Log In')?>
</div>
    <div id='validation' style='text-align:center;'>
<?php if (!empty($user_notfound)){echo "<p>".$user_notfound. "</p>";}?>
<?php echo "<p>" . validation_errors() . "</p>";?>
</div>

</div>


</div>
</body>
</html>