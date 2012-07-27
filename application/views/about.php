<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <title>About</title>
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

<!--    <img src="<?php// echo base_url() . 'images/gee_holdings.png'?>" id="lucca_logo" />-->

    <img src="<?php echo base_url() . 'images/GEE.png'?>" id="gee_logo" />

<!--    <img src="<?php //echo base_url() . 'images/GES.png'?>" id="ges_logo" />-->


    </div>
    </div>
    <div id="wrapper">
    <div id="canvas">
        <div style="font-size: 14px;">
            <br />

<!--	<p style="text-align: center;"><span style=" font-weight: bold;">V1.1</span>	</p>
        <div style="text-align: left; margin-left: 300px;">
	CHANGELOG<br />
	**<br />
	* &nbsp&nbsp	Quality control Management front-end <br />
	* &nbsp&nbsp	Additional icons of supermarkets<br />
	* &nbsp&nbsp    Restaurant files will be included in the database map and in Database Management<br />
	*<br />
	*<br />
	*****************************<br />
        </div>-->
        	<p style="text-align: center;"><span style=" font-weight: bold;">V1a</span>	9/6/2011</p>
        <div style="text-align: left; margin-left: 300px;">
	CHANGELOG<br />
	**<br />
	* &nbsp&nbsp	Customer Database Management front-end (Authorized users)<br />
	* &nbsp&nbsp	Addition of Supermarket Icons to the map<br />
	* &nbsp&nbsp    Regular code maintenance and fixes<br />
	*<br />
	*<br />
	*****************************<br />
        </div>

        <p style="text-align: center;"><span style=" font-weight: bold;">V1</span>	8/24/2011</p>
        <div style="text-align: left; margin-left: 300px;">
	CHANGELOG<br />
	**<br />
        * &nbsp&nbsp	Secured Login system<br />
	* &nbsp&nbsp	Complete rewrite of code<br />
	* &nbsp&nbsp	Single map centralized results of database<br />
	* &nbsp&nbsp	Full searchable database of our customers<br />
	*<br />
	*****************************<br />
        </div>
</div>

    </div>

    </div>
    </body>
</html>