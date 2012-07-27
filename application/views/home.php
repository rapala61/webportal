<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Home</title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(). 'css/gportal.css'?>"  media="screen"/>
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
    <div id="canvas">
    </div>
        
    </div>
</body>
</html>