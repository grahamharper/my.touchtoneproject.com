<?php

/* create a string containing a file's data  */
$string = file_get_contents("recordings/recordings.txt") or die("Can't access file");

$line = explode("\n",$string);

/* This creates an array with a string for each line*/

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>My TouchTone</title>
</head>

<link rel="SHORTCUT ICON" href="images/tt_favicon.ico"/>

<link rel="stylesheet" href="css/reset.css" type="text/css" />
<link rel="stylesheet" href="css/text.css" type="text/css" />
<link rel="stylesheet" href="css/960.css" type="text/css" />
<link rel="stylesheet" href="css/main.css" type="text/css" />

<script type="text/javascript">
<!-- Function that can check what type of button is being rolled over but also have a unique identifier for that soecific incidence of twitter or facebook button -->
<!-- I'm using full URLs for your images, you can make this smaller and neater by using document-relative paths instead! -->

<!-- MEGA JANKY!!!!!111!! -->

<!-- array for each type of button where item 0 in the array is the normal state and item 1 is the rollover state -->
var dl_src = new Array("http://www.chocolateboxmedia.com/mytouchtone/images/download.png", "http://www.chocolateboxmedia.com/mytouchtone/images/downloadON.png");
var fb_src = new Array("http://www.chocolateboxmedia.com/mytouchtone/images/facebook.png", "http://www.chocolateboxmedia.com/mytouchtone/images/facebookON.png");
var tw_src = new Array("http://www.chocolateboxmedia.com/mytouchtone/images/twitter.png", "http://www.chocolateboxmedia.com/mytouchtone/images/twitterON.png");
var lk_src = new Array("http://www.chocolateboxmedia.com/mytouchtone/images/like.png", "http://www.chocolateboxmedia.com/mytouchtone/images/likeON.png");


<!-- This function expects two parameters; the unique id and the rollover state (whether it's rolled over, or rolled out. This state parameter will be a 0 or 1 and will sorrespond to the item in the array above, passing a zero when you want to swap back to the original button and a 1 when you want the alternative image) -->
function ZOMG_rollover(button_id, button_state)
{
	<!-- See what kind of button this is so the right src can be swapped in -->	
	if (button_id.match("tw"))
	{
		<!-- This ID is for a twitter button -->
		document.getElementById(button_id).src = tw_src[button_state]; 
	}
	
	if (button_id.match("fb"))
	{
		<!-- This ID is for a facebook button -->
		document.getElementById(button_id).src = fb_src[button_state];
	}
	
	if (button_id.match("dl"))
	{
		<!-- This ID is for a twitter button -->
		document.getElementById(button_id).src = dl_src[button_state]; 
	}
	
	if (button_id.match("lk"))
	{
		<!-- This ID is for a twitter button -->
		document.getElementById(button_id).src = lk_src[button_state];
		document.body.style.cursor = 'pointer';
	}
}




</script>



<body>

	<div class="container_12">
    
    <div id="logo" class="grid_3 suffix_11">
    <img src="images/logo.png" width="220" height="60"/>
    </div>
    
    <div class="clear"></div>
    
    
    <?php
    
	for($i=(sizeof($line))-2;$i>=0;$i--)
	{
    
    	echo '<div id="yoke" class="grid_4">';
        echo '<div id="item">';
        	
        		echo '<a href="recordings/'.$line[$i].'.png"><img src="recordings/'.$line[$i].'.png" title="'.$line[$i].'" alt="'.$line[$i].'" width="280px" /></a>';
          		
                echo '<object class="player" type="application/x-shockwave-flash" data="dewplayer-mini.swf?mp3=recordings/'.$line[$i].'.mp3" width="140" height="20" id="dewplayer-mini"><param name="wmode" value="transparent" /><param name="movie" value="dewplayer-mini.swf?mp3=recordings/'.$line[$i].'.mp3" /></object>';
                
				echo '<span class="tools">';
                		echo '<a href="http://www.chocolateboxmedia.com/mytouchtone/recordings/'.$line[$i].'.mp3" class="icon"><img id="dl'.$i.'" onmouseover="ZOMG_rollover(\'dl'.$i.'\', 1)" onmouseout="ZOMG_rollover(\'dl'.$i.'\', 0)" src="images/download.png" title=\'Download: Right-click and select "Save link as"\' alt"Download" width="20" height="20"/></a>';
                        
                        echo '<a href="http://www.facebook.com/sharer.php?u=http://www.chocolateboxmedia.com/mytouchtone/recordings/'.$line[$i].'.mp3&t=My TouchTone" class="icon"><img id="fb'.$i.'" onmouseover="ZOMG_rollover(\'fb'.$i.'\', 1)" onmouseout="ZOMG_rollover(\'fb'.$i.'\', 0)" src="images/facebook.png" title="Share on Facebook" alt"Share on Facebook" width="20" height="20"/></a>';
                        
                        echo '<a href="http://twitter.com/home?status=My TouchTone http://www.chocolateboxmedia.com/mytouchtone/recordings/'.$line[$i].'.mp3" class="icon"><img id="tw'.$i.'" onmouseover="ZOMG_rollover(\'tw'.$i.'\', 1)" onmouseout="ZOMG_rollover(\'tw'.$i.'\', 0)" src="images/twitter.png" title="Share on Twitter" alt"Share on Twitter" width="20" height="20"/></a>';
                        
                        echo '<img class="icon" id="lk'.$i.'" onmouseover="ZOMG_rollover(\'lk'.$i.'\', 1)" onmouseout="ZOMG_rollover(\'lk'.$i.'\', 0)" src="images/like.png"  title="Like" alt"Like" width="20" height="20"/>';

                echo '</span>';
          	echo '</div>';   
        echo '</div>';
		
	}
    ?>
    
    

	</div><!--close container 12-->
    
</body>
</html>
