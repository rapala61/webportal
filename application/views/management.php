
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Database Management</title>
	<meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(). 'css/gportal.css'?>"  media="screen"/>

        <?php
        foreach($css_files as $file): ?>
                <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
        <?php endforeach; ?>
        <?php foreach($js_files as $file): ?>
                <script src="<?php echo $file; ?>"></script>
        <?php endforeach; ?>


<style type='text/css'>
body
{
	font-family: Arial;
	font-size: 14px;
}
a {
    color: blue;
    text-decoration: none;
    font-size: 14px;
}
a:hover
{
	text-decoration: underline;
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

<!--    <img src="<?php// echo base_url() . 'images/lucca.png'?>" id="lucca_logo" />-->

    <img src="<?php echo base_url() . 'images/GEE.png'?>" id="gee_logo" />

<!--    <img src="<?php// echo base_url() . 'images/GES.png'?>" id="ges_logo" />-->


    </div>
    </div>
    <div id="wrapper">






    	<div>
		<a href='<?php echo site_url('gportal_ctrl/customer_management')?>'>Customers</a>

	</div>


	<div style='height:20px;'></div>
    <div>
		<?php //echo $output; ?>
    </div>

    <!--<div id="canvas"></div>-->


    </div>














</body>
</html>

