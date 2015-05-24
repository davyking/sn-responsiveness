<?php

/**
  * UNITED-NUKE CMS: Just Manage!
  * http://united-nuke.openland.cz/
  * http://united-nuke.openland.cz/forums/
  *
  * 2002 - 2005, (c) Jiri Stavinoha
  * http://united-nuke.openland.cz/weblog/
  *
  * Portions of this software are based on PHP-Nuke
  * http://phpnuke.org - 2002, (c) Francisco Burzi
  *
  * This program is free software; you can redistribute it and/or
  * modify it under the terms of the GNU General Public License
  * as published by the Free Software Foundation; either version 2
  * of the License, or (at your option) any later version.
**/

if (stristr($_SERVER['SCRIPT_NAME'], basename(__FILE__))) {
    Header("Location: ../index.php");
    die();
}

##################################################
# Include for Meta Tags generation               #
##################################################

echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset="._CHARSET."\">\n";
echo "<meta http-equiv=\"expires\" content=\"0\">\n";
echo "<meta http-equiv=\"imagetoolbar\" content=\"no\">\n";
echo "<meta name=\"resource-type\" content=\"document\">\n";
echo "<meta name=\"distribution\" content=\"global\">\n";
echo "<meta name=\"author\" content=\"".$sitename."\">\n";
echo "<meta name=\"copyright\" content=\"Copyright (c) by ".$sitename."\">\n";
echo "<meta name=\"keywords\" content=\"\">\n";
echo "<meta name=\"description\" content=\"".$slogan."\">\n";
echo "<meta property=\"fb:admins\" content=\"1400179786\" />\n";
if (basename($_SERVER['SCRIPT_NAME']) == UN_FILENAME_ADMIN) {
	echo "<meta name=\"robots\" content=\"noindex, follow\">\n";
} else {
	echo "<meta name=\"robots\" content=\"index, follow\">\n";
}
echo "<meta name=\"revisit-after\" content=\"1 days\">\n";
echo "<meta name=\"rating\" content=\"general\">\n";

###############################################
# DO NOT REMOVE THE FOLLOWING COPYRIGHT LINE! #
# YOU'RE NOT ALLOWED TO REMOVE NOR EDIT THIS. #
###############################################

echo "<meta name=\"generator\" content=\"UNITED-NUKE 4.2ms2 Series (PHP-Nuke ".$Version_Num." compatible) - Copyright 2005 by Jiri Stavinoha - http://united-nuke.openland.cz v roce 2015 úprava CSS šablony Vojta Tranta, do kódu zadal David Ocetník\">\n";
?>
