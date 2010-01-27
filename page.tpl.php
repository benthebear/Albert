<!doctype html>
	<?php
	// Helper function
	function nodecreationform(){
		if((arg(0)=='node' and arg(1)=='add') or (arg(0)=='node' and arg(2)=='edit')){
			return true;
		}else{
			return false;
		}
	}

	// creating the classes for the body
	if(arg(0)!="" and arg(1)==""){$classes[] = "homepage";}
	if(arg(0)!=""){$classes[] = "arg0-".arg(0);}
	if(arg(1)!=""){$classes[] = "arg1-".arg(1);}
	if(arg(2)!=""){$classes[] = "arg2-".arg(2);}
	if(nodecreationform()){$classes[]='nodecreationform';}
	if(arg(0)!="" and arg(1)!=""){$classes[] = "arg01-".arg(0)."-".arg(1);}
	$sidebarcounter = 0;
	if($left){
		$classes[] = "sidebar-left";
		$sidebarcounter ++;
	}
	if($right){
		$classes[] = "sidebar-right";
		$sidebarcounter ++;
	}
	$classes[] = "sidebars-".$sidebarcounter;

	$bodyclass = implode(" ", $classes);




	?>
<head>
    <title><?php print $head_title ?></title>
  	<?php print $head ?>
  	<?php print $styles ?>
  	<?php print $scripts ?>
	<?php if (!nodecreationform()){ ?>
	<script type="text/javascript" src="http://jqueryjs.googlecode.com/files/jquery-1.3.2.min.js"></script>
	<script type="text/javascript" src="http://anmutunddemut.de/sites/default/themes/albert/albert.js"></script>
	<?php }?>
  	<script type="text/javascript"><?php /* Needed to avoid Flash of Unstyle Content in IE */ ?> </script>	
</head>


<body class="<?=$bodyclass?>">

    <div id="header" class="region">  
      <?php if ($logo) { ?><a href="<?php print $base_path ?>" title="<?php print t('Home') ?>"><img src="<?php print $logo ?>" alt="<?php print t('Home') ?>" /></a><?php } ?>
      <?php if ($site_name) { ?><h1 class='site-name'><a href="<?php print $base_path ?>" title="<?php print t('Home') ?>"><?php print $site_name ?></a></h1><?php } ?>
      <?php if ($site_slogan) { ?><div class='site-slogan'><?php print $site_slogan ?></div><?php } ?>    
      <?php if (isset($secondary_links)) { ?><?php print theme('links', $secondary_links, array('class' => 'links', 'id' => 'subnavlist')) ?><?php } ?>
      <?php if (isset($primary_links)) { ?><?php print theme('links', $primary_links, array('class' => 'links', 'id' => 'navlist')) ?><?php } ?>
      <?php print $search_box ?>   
  		<?php print $header ?>
		</div>
		
		
		<?php if ($left) { ?>
    <div id="sidebar-left" class="region sidebar">
      <?php print $left ?>
    </div><?php } ?>
      
    <?php if ($right and !(nodecreationform())) { ?>
    <div id="sidebar-right" class="region sidebar">	
    	<?php print $right ?>    	
    </div>
    <?php } ?>   
    
    <div id="arena">
    
    	<?php if($pre){?>
    	<div id="pre" class="region">
    		<?php print $pre ?>
    	</div>
    	<?php }?>
    	
      <?php if ($mission) { ?><div id="mission"><?php print $mission ?></div><?php } ?>
      <div id="content" class="region">
        <?php //print $breadcrumb ?>
        <h2 class="title"><?php print $title ?></h2>       
       	<?php if (!empty($tabs)): ?><div class="tabs"><?php print $tabs; ?></div><?php endif; ?>
        <?php print $help ?>
        <?php if ($show_messages) { print $messages; } ?>
        <?php print $content; ?>
        <?php print $feed_icons; ?>
      </div>
      
      <?php if($post){?>      
    	<div id="pre" class="region">
    		<?php print $post ?>
    	</div> 
    	<?php }?>
    	
    </div>  
    
    <div id="footer" class="region">
  		<?php print $footer_message ?>
  		<?php print $footer ?>
	</div>
    
</body>