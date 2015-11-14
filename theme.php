<?php

/********************************************************/
/* Theme information								                   	*/
/********************************************************/
/* Theme name: Slávistické noviny 2016					        */
/* Theme version: 2015.01								                */
/* Theme engine: extensible theme engine by United Nuke	*/
/* Created by: HJ&BW	- Vojta Tranta - David Ocetník	  */
/* Website: http://blassenweb.net						            */
/* Website2: http://hjosef.net							*/
/* Website2: http://www.a114.cz							*/
/* Copyright: HJ&BW 2005+								*/
/* System: United Nuke 4.2 ms2							*/
/* Úprava kódu (responzive Tranta & Ocetník				*/
/********************************************************/
define("UN_NEWTHEME_LOADED", "Blassen"); //1.1
global $main_width, $width, $body_bgcolor, $theme_name, $space_between_cells, $bgcolor5;
global $currentlang, $language;
/**************************************************************************/
/* Zde si definujeme pár věcí aby je nebylo potřeba znovu opakovat v kódu */
/* main_width je celková šíře stránky bez hlavičky auth:DO				  */
/**************************************************************************/

$theme_name = "SN2016";
$main_width = "80%"; //zde bylo původně 1024
$width = "170"; // šíře většiny bloků ale některé jsou dány pevně, nejsou totiž systémové viz. tweety
$space_between_cells = "4px";

/**************************************************************************/
/* Základní nastavení barev které pak používají také bloky a moduly       */
/**************************************************************************/

$bgcolor1 = "#B3B3B3";  // světlá #fbfbfb například komentáře PRVNI příspěvěk
$bgcolor2 = "#eeeeee";  // prostřední #eeeeee /například hlavičky bloků/
$bgcolor3 = "#fbfbfb";  // světlá #fbfbfb / pozadí článků a komentářů celkové /
$bgcolor4 = "#fbfbfb";  // footer color #fbfbfb
$bgcolor5 = "#DF3826";  // tmavá #DF3826v /hlavičky článků /
$bgcolor99 = "#00F23B"; // šílená zelená pro testování - nastavil jsem ji
$textcolor1 = "#ff0000";// FFFFFF #ff0000
$textcolor2 = "#000000"; // #000000
$textcolor3 = "#F8ECD0"; // #F8ECD0
define('UN_NEWTHEME_COMMENTS_ALTCOLOR', '#F77B6B'); //barva pro komentáře

/************************************************************/
/* inicializace souborů s jazyky CZ SK EN etc.              */
/*                                                          */
/************************************************************/

	if (file_exists("themes/".$theme_name."/language/Blassen_theme-".$currentlang.".php")) {
		include_once("themes/".$theme_name."/language/Blassen_theme-".$currentlang.".php");
	}

/************************************************************/
/* Function OpenTable()                                     */
/* OpenTable() je tabulka aktualit  auth DO                 */
/************************************************************/

function OpenTable() {
    global $bgcolor5, $bgcolor3;
    echo "<table width=\"100%\" border=\"0\" cellspacing=\"1\" cellpadding=\"1\" bgcolor=\"$bgcolor5\" align=\"center\">\n<tr>\n<td>\n";
    echo "  <table width=\"100%\" border=\"0\" cellspacing=\"1\" cellpadding=\"4\" bgcolor=\"$bgcolor3\">\n<tr>\n<td>\n";
}

function OpenTable2() {
    global $bgcolor5, $bgcolor3;
    echo "<table border=\"0\" cellspacing=\"1\" cellpadding=\"0\" bgcolor=\"$bgcolor5\" align=\"center\">\n<tr>\n<td>\n";
    echo "  <table border=\"0\" cellspacing=\"1\" cellpadding=\"8\" bgcolor=\"$bgcolor3\">\n<tr>\n<td>\n";
}

function CloseTable() {
    echo "  \n</td>\n</tr>\n</table>\n";
    echo "\n</td>\n</tr>\n</table>\n";
}

function CloseTable2() {
    echo "  \n</td>\n</tr>\n</table>\n";
    echo "\n</td>\n</tr>\n</table>\n";
}

function FormatStory($thetext, $notes, $aid, $informant) {
    global $anonymous;
    if ($notes != "") {
	$notes = "<b>"._NOTE."</b> $notes\n";
    } else {
	$notes = "";
    }
    if ("$aid" == "$informant") {
	echo "<font size=\"2\">$thetext</font><br />\n";//$notes
    } else {
	if($informant != "") {
	    $boxstuff = "<a href=\"/modules.php?name=Your_Account?op=userinfo&amp;username=$informant\">$informant</a> ";
	} else {
	    $boxstuff = "$anonymous ";
	}
	$boxstuff .= ""._WRITES."<br /> <i>\"$thetext\"</i><br>\n";//$notes
	echo "<font size=\"2\">$boxstuff</font>\n";
    }
}

/************************************************************/
/* Function themeheader()                                   */
/*                                                          */
/************************************************************/
function themeheader() {
//bez tohoto řádku nebudou fungovat proměnné !
global $nukeurl, $main_width, $theme_name, $bgcolor1, $bgcolor2, $bgcolor3, $bgcolor4, $banners, $sitename, $space_between_cells, $width;
global $user, $cookie;

echo "<body class=\"bgbody\">\n";
echo "	<a id=\"nahoru\"></a>\n";
$public_msg = public_message(); // zde se definuje zobrazování veřejné zprávy

//echo "<div style=\"position: absolute; z-index: 0; margin-left: 135px; margin-top: 20px; border: 2px solid red; text-align: center; margin-bottom: 3px;\" class=\"no\">\n";
//echo ads(0); //zobrazit banner
//echo "</div>\n";

echo " <div id=\"container2009bw\">\n";

/* Zobrazení loga SN */
echo " <div id=\"header2009bw\">\n";
echo " <a href=\"../index.php\">\n";
echo " <img src=\"http://www.slavistickenoviny.cz/themes/".$theme_name."/pictures/logo.png\" class=\"logo2009bw\" border=\"0\">\n";
echo " </a>\n";

/* rotace hráčů na logu */
echo " <div id=\"player2009bw\">\n";
echo " <img src=\"http://www.slavistickenoviny.cz/themes/".$theme_name."/pictures/image/o".rand(1,4).".jpg\">\n";
echo " </div>\n";
echo " </div>\n";

/* menu pod hlavičkou */
/* S NOVÝM CSS SOUBOREM JE ROZHOZENÉ. TIPOVAČKA A FOTO JE VPRAVO MÍSTO V LEVO*/
echo " <div id=\"menu_left2009bw\">\n";
echo " <li><a href=\"http://tipovacka.slavistickenoviny.cz\">Tipovačka</a></li>\n";
echo " <li><a href=\"http://foto.slavistickenoviny.cz\">Fotogalerie</a></li>\n";
echo " </div>\n";
echo " \n";
echo " \n";
echo " \n";
echo " \n";
echo " <div id=\"banner\">\n";
echo ads(0);
echo " </div>\n";
echo " <div id=\"menu_right2009bw\">\n";
echo " <li><a href=\"http://www.facebook.com/slavistickenoviny\">Facebook SN</a></li>\n";
echo " <li><a href=\"../modules.php?name=Your_Account&op=new_user\">Registrace</a></li>\n";
echo " </div>\n";
echo " </div>\n";
echo " <br>\n";

/********* LOGOS *******************************/
/*
echo  "<h1 class=\"logo_left\">\n";
echo  "<a href=\"/\" class=\"no\" title=\"Slávistické noviny\"><img src=\"/themes/$theme_name/pictures/logo_left.gif\" width=\"182\" height=\"138\" border=\"0\" alt=\"Slávistické noviny\"></a>\n";
echo  "</h1>\n";
*/
//echo  "<h1 class=\"logo_left\"><a href=\"/index.php\" title=\"Slávistické noviny\"><span>Slávistické noviny - Fotbal SK Slavia Praha</span></a></h1>\n";
/********* END LOGOS *******************************/

/********* BUTTONS *******************************
echo  "<h5 class=\"button_jedna\">\n";
echo  ""._BW_link1."\n";
echo  "</h5>\n";
echo  "<h5 class=\"button_dva\">\n";
echo  ""._BW_link2."\n";
echo  "</h5>\n";
echo  "<h5 class=\"button_tri\">\n";
echo  ""._BW_link3."\n";
echo  "</h5>\n";
if (is_user($user)) {
echo  "<h5 class=\"button_ctyri\">\n";
echo  ""._BW_link4."\n";
echo  "</h5>\n";
} else {
echo  "<h5 class=\"button_ctyri\">\n";
echo  ""._BW_link5."\n";
echo  "</h5>\n";

}
/********* END BUTTONS *******************************/

/**************** end logo ***********************/
echo " $public_msg\n"; // zde se veřejná zpráva bude zobrazovat
/********************************************************************************************************/
/* toto je definování zobrazení levých bloků až po začátek prostředního sloupce kde se zobrazují moduly */
/********************************************************************************************************/

echo "<table border=\"0\" cellspacing=\"0\" cellpadding=\"2\" width=\"$main_width\" align=\"center\">\n<tr>\n<td>&nbsp;</td>\n<td valign=\"top\" width=\"$width\" bgcolor=\"$bgcolor3\" class=\"bgbody\">";
blocks(left);
echo "</td>\n<td valign=\"top\" width=\"100%\">\n";

/********* BANNERS *******************************/
//echo "<div style=\"text-align: center; margin-bottom: 3px;\" class=\"no\">\n";
//echo ads(0); //toto zajistí zobrazování banneru
//echo "</div>\n";
/********* END BANNERS *******************************/
}

/************************************************************/
/* Function themefooter()                                   */
/*                                                          */
/************************************************************/
function themefooter() {

   global $index, $bgcolor5, $bgcolor2, $bgcolor3, $bgcolor4, $banners, $theme_name, $main_width, $width, $space_between_cells, $foot1, $foot2, $foot3, $total_time, $start_time, $prefix, $dbi;
    $mtime = microtime();
    $mtime = explode(" ",$mtime);
    $mtime = $mtime[1] + $mtime[0];
    $end_time = $mtime;
    $total_time = ($end_time - $start_time);
    $total_time = ""._PAGEGENERATION." ".substr($total_time,0,5)." "._SECONDS."";

    if ($index == 1) {
	echo "\n</td>\n<td valign=\"top\" bgcolor=\"$bgcolor3\" width=\"$width\" class=\"bgbody\">\n";
	blocks(right);
    }
    echo "</td>\n<td>&nbsp;</td>\n</tr>\n</table>\n";
    echo "<div class=\"footer_menu\" style=\"border-top: 4px solid $bgcolor5; border-bottom: 4px solid $bgcolor5; background-color: $bgcolor4;\">\n";
    echo "<div class=\"footmsg\">\n";
    echo "$total_time\n";
    echo "<br />$foot1 $foot2 $foot3\n";
// prosím nemažte tyto řádky
//echo "<br />Vytvořil <a href=\"http://blassenweb.net\" class=\"noborder\">HJ&amp;BW</a> pomocí redakčního systému UNITED-NUKE &#169; 2005\n"; // smazano :-p  --kronn
    echo "</div>\n";
    echo "  </div>\n";
    echo "<br>\n";
}

function formatAidXtheme($aid, $un_filter = 0) {
    global $prefix, $db, $textcolor2;
    $result = $db->sql_query("SELECT url, email FROM ".$prefix."_authors WHERE aid='$aid'");
    $row = $db->sql_fetchrow($result);
    $url = stripslashes($row['url']);
    $email = stripslashes($row['email']);
    if ($un_filter != "0") {
    $aid = str_replace ("_", " ", $aid);
    }    
    if ($email != "") {
        $aid = "<a href=\"mailto:$email\">$aid</a>";
    } elseif ($url != "" && ($url != "http://")) {
	$aid = "<a href=\"$url\" color=\"$textcolor2\">$aid</a>";
    } else {
	$aid = $aid;
    }
    echo "$aid";
}

function un_is_bodytext($un_fullcount) {
  if ($un_fullcount > 0) {
  return 1;
  } else {
  return 0;
  }
}

function un_get_story_link($story_id, $comments_mode, $style, $linkname, $link_param = "", $tl_hack_title = "") {
/* TL SEO HACK */
$clanek_tl_link = custom_seo_links($tl_hack_title);
//$un_story_link = "<a href=\"modules.php?name=News&amp;file=article&amp;sid=".$story_id."".$comments_mode."".$link_param."\" class=\"$style\">".$linkname."</a>";
$un_story_link = "<a href=\"/clanek/".$story_id."-".$clanek_tl_link."".$comments_mode."".$link_param."\" class=\"$style\">".$linkname."</a>";
/* -- TL SEO HACK */
return $un_story_link;
}


function un_get_story_title($story_id, $comments_mode, $fullcount, $story_title) {
    if (un_is_bodytext($fullcount)) {
/* TL SEO HACK */
$clanek_tl_link = custom_seo_links($story_title);
//       $un_story_link = "<h3 class=\"news\"><a href=\"modules.php?name=News&amp;file=article&amp;sid=".$story_id."".$comments_mode."\" class=\"un_story_title_link\">".$story_title."</a></h3>";
    $un_story_link = "<h3 class=\"news\"><a href=\"/clanek/".$story_id."-".$clanek_tl_link."".$comments_mode."\" class=\"un_story_title_link\">".$story_title."</a></h3>";
/* -- TL SEO HACK */
    } else {
    $un_story_link = "<h1><font class=\"un_story_title_text\">$story_title</font></h1>";    
    }
return $un_story_link;
}


/************************************************************/
/* Function un_themeindex()                                 */
/*                                                          */
/************************************************************/

function un_themeindex ($aid, $informant, $time, $title, $counter, $topic, $thetext, $notes, $morelink, $topicname, $topicimage, $topictext, $un_story_details) {
    global $main_width, $anonymous, $admin, $bgcolor5, $bgcolor2, $bgcolor3, $bgcolor4, $textcolor1, $textcolor2, $tipath, $theme_name;
    if ($un_story_details['cat_id'] != 0) {
    $cat_link = ", <b>"._Rubric.":</b> <a href=\"/modules.php?name=News&amp;file=categories&amp;op=newindex&amp;catid=".$un_story_details['cat_id']."\" class=\"un_story_subtitle_cat\">".$un_story_details['cat_title']."</a>";
    } else {
    $cat_link = "";
    }
    if ($un_story_details['c_count'] > 0 AND $un_story_details['acomm'] == "0") {
    $comments_link = un_get_story_link($un_story_details['story_id'], $un_story_details['comments_mode'], "un_story_general_link" , "".UN_NEWS_MAINCOMMENTSLINK." (".$un_story_details['c_count'].")", "#comments", $un_story_details['story_title']) . "";
    } elseif ($un_story_details['acomm'] == "0") {
    $comments_link = "<a href=\"/modules.php?name=News&amp;file=comments&amp;op=Reply&amp;sid=".$un_story_details['story_id']."\" class=\"un_story_general_link\" rel=\"nofollow\">"._COMMENTSQ."</a>";
    } else {
    $comments_link = "";
    }
   /* if ($un_story_details['rated'] == "0" AND un_is_bodytext($un_story_details['fullcount'])) 
    $article_rating = "".UN_NEWS_STORYNOTRAITED."";
    } elseif ($un_story_details['rated'] != "0") {
    $article_rating = ""._RATEARTICLE.": ".$un_story_details['rated']."";
    } else {
    $article_rating = "";
    }*/
    if ($topic != 0) {
/* TL SEO HACK */
$rubrika_tl_link = custom_seo_links($topictext);
//    $topic_link = "<a href=\"modules.php?name=News&amp;new_topic=$topic\" class=\"un_story_general_link\">$topictext</a>";
    $topic_link = "<a href=\"/rubrika/".$topic."-".$rubrika_tl_link."\" class=\"un_story_general_link\">$topictext</a>";
/* -- TL SEO HACK */
    } else {
    $topic_link = "";
    }
    if (un_is_bodytext($un_story_details['fullcount'])) {
    $counter_fixed = "$counter "._READS.",";
    } else {
    $counter_fixed = "";
    }
$ThemeSel = get_theme();
    if (file_exists("themes/$ThemeSel/images/topics/$topicimage")) {
	$t_image = "/themes/$ThemeSel/images/topics/$topicimage";
    } else {
	$t_image = "$tipath$topicimage";
    }


/****** MAIN TABLE *************************/

echo  "<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"center\" bgcolor=\"$bgcolor5\" width=\"100%\"><tr><td bgcolor=\"$bgcolor5\">";
echo  "<table border=\"0\" cellpadding=\"3\" cellspacing=\"1\" width=\"100%\"><tr><td bgcolor=\"$bgcolor5\">";

####################### nadpis článku - odkaz #################################

    echo "".un_get_story_title($un_story_details['story_id'], $un_story_details['comments_mode'], $un_story_details['fullcount'], $un_story_details['story_title'])."\n";

########################################################

if ($admin) {
    echo "&nbsp;&nbsp;[ <a href=../".UN_FILENAME_ADMIN."?op=EditStory&sid=".$un_story_details['story_id']." class=\"edit\">"._Edit."</a> | <a href=../".UN_FILENAME_ADMIN."?op=RemoveStory&sid=".$un_story_details['story_id']." class=\"edit\">"._Delete."</a> ]</font>";
	}

if ($topicimage != "") {

echo "							<div class=\"topic\"> \n";
echo "								<div class=\"topic_img\"> \n";
echo "								 <img src=\"".$t_image."\" alt=\""._Topic.": $topictext\" />\n";
echo "								</div> \n";
echo "							</div> \n";
    }
echo  "        </td></tr><tr><td bgcolor=\"$bgcolor3\">";
echo "    <div style=\"background-color: $bgcolor4; width: 99%; margin: 2px 0 0 0; padding-left: 5px;\">\n";
echo""._PUBLICC." :&nbsp;<b>";

    formatAidXtheme($aid, 1); 
    echo "</b> "._ON." $time $timezone ($counter "._READS.")";
/* TL SEO HACK */
$rubrika_tl_link = custom_seo_links($topictext);
//echo "<br><b>"._Topic.":</b> <a href=\"modules.php?name=NewsXXX1&amp;new_topic=$topic\">$topictext</a> ".$cat_link."<br></div>";
echo "<br><b>"._Topic.":</b> <a href=\"/rubrika/".$topic."-".$rubrika_tl_link."\">$topictext</a> ".$cat_link."<br></div>";
/* -- TL SEO HACK */
    echo "    <div align=\"justify\" style=\"background-color: $bgcolor3; width: 99%; height: 99%; padding-top: 5px; padding-left: 4px; padding-right: 4px; padding-bottom: 2px;\">\n";
FormatStory($thetext, $notes, $aid, $informant);
    echo "<br>\n";
    if (un_is_bodytext($un_story_details['fullcount'])) {
    $footer_storylink =" ".un_get_story_link($un_story_details['story_id'], $un_story_details['comments_mode'], "un_story_general_link", ""._READMORE."", "",  $un_story_details['story_title'])."\n";
    }
    $footer_linksarray['0'] = $article_rating;
    $footer_linksarray['1'] = $topic_link;
    $footer_linksarray['2'] = $comments_link;
    $footer_linksarray['3'] = $footer_storylink;
    foreach($footer_linksarray as $value) {
      if ($value != "") {
      $footer_linksexist = "1";
      break;
      }
    }
    if ($footer_linksexist == "1") {
    echo "    <div style=\"text-align: right;\">\n";
    echo "    <font color=\"$textcolor2\">[&nbsp;\n";
      for ($i=0; $i < sizeof($footer_linksarray); $i++) {   
        if ($footer_linksarray[$i] != "") {
        $footer_linkfiltered[] = $footer_linksarray[$i];
        }   
      }
      for ($i=0; $i < sizeof($footer_linkfiltered); $i++) {    
        if ($i != 0 AND $i != sizeof($footer_linkfiltered)) {
        $sep = " | ";
        } else {
        $sep = "";
        }    
      echo $sep . $footer_linkfiltered[$i];       
      }    
    echo "    &nbsp;]</font></div></div>\n";
    }
echo  "        </td>";
echo  "    </tr>";
echo  "</table>";
echo  "        </td>";
echo  "    </tr>";
echo  "</table>";
echo "<br>\n";

/****** END MAIN TABLE *********************/
}


/************************************************************/
/* Function un_themearticle()                               */
/*                                                          */
/************************************************************/







function un_themearticle ($aid, $informant, $datetime, $title, $thetext, $topic, $topicname, $topicimage, $topictext, $un_story_details, $album) {
    global $main_width, $bgcolor1, $bgcolor5, $bgcolor2, $bgcolor3, $bgcolor4, $textcolor1, $textcolor2, $admin, $sid, $theme_name, $tipath;
    global $dbname; //kronn - pridano dbname, abychom ho mohli vratit
    if ($un_story_details['cat_id'] != 0) {
    $cat_link = ", <b>"._Rubric.":</b> <a href=\"/modules.php?name=News&amp;file=categories&amp;op=newindex&amp;catid=".$un_story_details['cat_id']."\" class=\"un_story_subtitle_cat\">".$un_story_details['cat_title']."</a>";
    } else {
    $cat_link = "";
    }
$ThemeSel = get_theme();
    if (file_exists("themes/$ThemeSel/images/topics/$topicimage")) {
	$t_image = "/themes/$ThemeSel/images/topics/$topicimage";
    } else {
	$t_image = "/themes/$ThemeSel/images/topics/$topicimage";
    }
    if ("$aid" == "$informant") {
echo  "<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"center\" bgcolor=\"$bgcolor5\" width=\"100%\"><tr><td bgcolor=\"$bgcolor5\">";
echo  "<table border=\"0\" cellpadding=\"3\" cellspacing=\"1\" width=\"100%\"><tr><td bgcolor=\"$bgcolor5\">";
echo  "        <h1><font class=\"un_story_title_text\"><b>$title</b></font></h1>";
    if ($admin) {
	    echo "&nbsp;&nbsp;[ <a href=../".UN_FILENAME_ADMIN."?op=EditStory&sid=".$un_story_details['story_id']." class=\"edit\">"._Edit."</a> | <a href=../".UN_FILENAME_ADMIN."?op=RemoveStory&sid=".$un_story_details['story_id']." class=\"edit\">"._Delete."</a> ]</font>";
	}
echo "							<div class=\"topic\"> \n";
echo "								<div class=\"topic_img\"> \n";
echo "								 <img src=\"/themes/$theme_name/images/mic.gif\" width=\"50\" height=\"51\" alt=\""._Topic.": $topictext\" />\n";
echo "								</div> \n";
echo "							</div> \n";
echo  "        </td></tr><tr><td bgcolor=\"$bgcolor3\" style=\"border-bottom: 1px solid $bgcolor1;\">";
    echo "    <div style=\"background-color: $bgcolor4; width: 99%; margin: 0px; padding-left: 5px;\">\n";
	echo ""._Posted.": $datetime<br />"._PUBLICC.":&nbsp;";
formatAidHeader($aid);


/* TL SEO HACK */
$rubrika_tl_link = custom_seo_links($topictext);
//    echo "&nbsp;&nbsp;&nbsp;"._Topic.":&nbsp;<a href=modules.php?name=NewsXXX2&amp;new_topic=$topic>$topictext</a> ".$cat_link."   </div>\n";



    echo "&nbsp;&nbsp;&nbsp;"._Topic.":&nbsp;<a href=\"/rubrika/".$topic."-".$rubrika_tl_link."\">$topictext</a> ".$cat_link."   </div>\n";
/* -- TL SEO HACK */
echo "</div>";
echo "</td></tr><tr><td bgcolor=\"$bgcolor3\">\n";
    echo "    <div align=\"justify\" style=\"background-color: $bgcolor3; width: 99%; height: 99%; padding-top: 5px; padding-left: 4px; padding-right: 4px; padding-bottom: 2px;\">\n";
    if ($topicimage != "") {
/* TL SEO HACK */
$rubrika_tl_link = custom_seo_links($topictext);
//    echo "  <a href=\"modules.php&#63;name&#61;News&amp;new_topic=$topic\"><img src=\"".$t_image."\" alt=\"$topictext\" border=\"0\" align=\"right\"></a>";
    echo "  <a href=\"/rubrika/".$topic."-".$rubrika_tl_link."\"><img src=\"../".$t_image."\" alt=\"$topictext\" border=\"0\" align=\"right\"></a>";
/* -- TL SEO HACK */
    }
echo "$thetext  </div></td></tr>\n";
$AlbumDB = MySQL_Query("SELECT album FROM unnuke_stories WHERE sid LIKE '$sid';");
$album = mysql_result($AlbumDB,0); //pozor, funguje jenom kdyz $AlbumDB vraci jednu hodnotu
if ($album != '0' && !empty($album)) { //ma prirazenou fotogalerii
	echo "<tr><td bgcolor=\"$bgcolor3\"><div align=\"left\">\n";
	echo "<strong>FOTOGALERIE:</strong><br>";
	require "nastaveni.php";
$i = -1;
	mysql_select_db("slavistickenovinyFcz");
	$foto_query = mysql_query("SELECT * FROM cpg148_pictures WHERE aid LIKE '$album' ORDER by filename"); //kronn - pridan nazev databaze
	while ($foto_arr = MySQL_Fetch_Array($foto_query)) {
		$foto_path = $foto_arr["filepath"];
		$foto_name = $foto_arr["filename"];
$i++;
		echo "<a href=\"http://foto.slavistickenoviny.cz/displayimage.php?album=$album&pos=$i\"><img src=\"http://foto.slavistickenoviny.cz/albums/$foto_path/thumb_$foto_name\" border=\"0\"></a> ";
	}
	mysql_select_db($dbname);
}
echo "</div></tr></td>\n";
echo "<tr><td bgcolor=\"$bgcolor3\" style=\"padding: .5ex;\">\n";
$fb_link = urlencode("http://slavistickenoviny.cz/clanek/" . $un_story_details['story_id'] . "-" . custom_seo_links($title));
//var_dump($fb_link);
echo '<iframe src="http://www.facebook.com/plugins/like.php?href=' . $fb_link . '&amp;layout=standard&amp;show_faces=false&amp;width=625&amp;action=recommend&amp;font=arial&amp;colorscheme=light&amp;height=35" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:625px; height:35px;" allowTransparency="true"></iframe>';
echo "\n</tr></td>\n";
echo "<tr><td bgcolor=\"$bgcolor3\">\n";
include_once("themes/SN2009/banner-google.txt");
echo "</tr></td>\n";
echo "<tr><td bgcolor=\"$bgcolor3\">\n";
include_once("themes/SN2006/banner-adfox.txt");
echo "</tr></td>\n";
echo  "        </td>";
echo  "    </tr>";
echo  "</table>";
echo  "        </td>";
echo  "    </tr>";
echo  "</table>";
echo "<br>\n";
    } else {

	if($informant != "") $informant = "<a href=\"/modules.php?name=Your_Account&amp;op=userinfo&amp;username=$informant\">$informant</a> ";
	else $boxstuff = "$anonymous ";
	$boxstuff .= "writes $thetext $notes";
echo  "<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"center\" bgcolor=\"$bgcolor5\" width=\"100%\"><tr><td bgcolor=\"$bgcolor5\">";
echo  "<table border=\"0\" cellpadding=\"3\" cellspacing=\"1\" width=\"100%\"><tr><td bgcolor=\"$bgcolor5\">";
echo  "        <h1><font class=\"un_story_title_text\"><b>$title</b></font></h1>";
	if ($admin) {
	    echo "&nbsp;&nbsp;[ <a href=../".UN_FILENAME_ADMIN."?op=EditStory&sid=".$un_story_details['story_id']." class=\"edit\">"._Edit."</a> | <a href=../".UN_FILENAME_ADMIN."?op=RemoveStory&sid=".$un_story_details['story_id']." class=\"edit\">"._Delete."</a> ]</font>";
	}
echo "							<div class=\"topic\"> \n";
echo "								<div class=\"topic_img\"> \n";
echo "								 <img src=\"/themes/$theme_name/images/mic.gif\" width=\"50\" height=\"51\" alt=\""._Topic.": $topictext\" />\n";
echo "								</div> \n";
echo "							</div> \n";
echo  "        </td></tr><tr><td bgcolor=\"$bgcolor3\" style=\"border-bottom: 1px solid $bgcolor1;\">";
    echo "    <div style=\"background-color: $bgcolor4; width: 99%; margin: 0px; padding-left: 5px;\">\n";
	echo ""._Contributed.":  $informant - $datetime<br />"._PUBLICC.":&nbsp;";

formatAidHeader($aid);

/* TL SEO HACK */
$rubrika_tl_link = custom_seo_links($topictext);
//    echo "&nbsp;&nbsp;&nbsp;"._Topic.":&nbsp;<a href=modules.php?name=NewsXXX3&amp;new_topic=$topic>$topictext</a> ".$cat_link."   </div>\n";
   echo "&nbsp;&nbsp;&nbsp;"._Topic.":&nbsp;<a href=\"/rubrika/".$topic."-".$rubrika_tl_link."\">$topictext</a> ".$cat_link."   </div>\n";
/* -- TL SEO HACK */

echo "</div>";
echo "</td></tr><tr><td bgcolor=\"$bgcolor3\">\n";
    echo "    <div align=\"justify\" style=\"background-color: $bgcolor3; width: 99%; height: 99%; padding-top: 5px; padding-left: 4px; padding-right: 4px; padding-bottom: 2px;\">\n";
    if ($topicimage != "") {
/* TL SEO HACK */
$rubrika_tl_link = custom_seo_links($topictext);
//    echo "  <a href=\"modules.php&#63;name&#61;News&amp;new_topic=$topic\"><img src=\"$tipath$topicimage\" alt=\"$topictext\" border=\"0\" align=\"right\"></a>";
    echo "  <a href=\"/rubrika/".$topic."-".$rubrika_tl_link."\"><img src=\"../$tipath$topicimage\" alt=\"$topictext\" border=\"0\" align=\"right\"></a>";
/* -- TL SEO HACK */
    }
echo "$thetext        </div>\n";
$AlbumDB = MySQL_Query("SELECT album FROM unnuke_stories WHERE sid LIKE '$sid';");
$album = mysql_result($AlbumDB,0); //pozor, funguje jenom kdyz $AlbumDB vraci jednu hodnotu
if ($album != '0' && !empty($album)) { //ma prirazenou fotogalerii
	echo "<tr><td bgcolor=\"$bgcolor3\"><div align=\"left\">\n";
	echo "<strong>FOTOGALERIE:</strong><br>";
	require "nastaveni.php";
$i = -1;
	mysql_select_db("slavistickenovinyFcz");
	$foto_query = mysql_query("SELECT * FROM cpg148_pictures WHERE aid LIKE '$album' ORDER by filename"); //kronn - pridan nazev databaze
	while ($foto_arr = MySQL_Fetch_Array($foto_query)) {
		$foto_path = $foto_arr["filepath"];
		$foto_name = $foto_arr["filename"];
$i++;
		echo "<a href=\"http://foto.slavistickenoviny.cz/displayimage.php?album=$album&pos=$i\"><img src=\"http://foto.slavistickenoviny.cz/albums/$foto_path/thumb_$foto_name\" border=\"0\"></a> ";
	}
	mysql_select_db($dbname);
}
echo "</div></tr></td>\n";
echo "<tr><td bgcolor=\"$bgcolor3\">\n";
include_once("themes/SN2009/banner-google.txt");
echo "</tr></td>\n";
echo "<tr><td bgcolor=\"$bgcolor3\">\n";
include_once("themes/SN2006/banner-adfox.txt");
echo  "        </td>";
echo  "    </tr>";
echo  "</table>";
echo  "        </td>";
echo  "    </tr>";
echo  "</table>";
echo "<br>\n";
    }
}

/************************************************************/
/* Function themesidebox()                                  */
/* UPRAVUJE BLOKY       VŠECHNY BOLKY NA WEBU               */
/************************************************************/


function themesidebox($title, $content) {

    global $bgcolor5, $bgcolor2, $bgcolor3, $textcolor1, $textcolor2, $theme_name, $width, $img_nametwo,$blockblass ;
    echo "<table border=\"0\" cellspacing=\"0\" cellpadding=\"0\" width=\"$width\" class=\"ramecek\" bgcolor=\"$bgcolor2\">\n<tr>\n<td>"
        ."<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"2\">\n<tr>\n<td class=\"blok-logo\">\n"
        ."<h3>$title</h3>\n</td>\n</tr>\n<tr>\n<td class=\"blok\">\n<div class=\"content\">\n"
        ."$content\n"
	."</div>\n</td>\n</tr>\n</table>\n</td>\n</tr>\n</table>\n<br />";
}
/************************************************************/
/* Function un_themecenterbox()                             */
/* pro správné zobrazování aktualit na úvodu                */
/************************************************************/

function un_themecenterbox($title, $content) {
global $bgcolor1, $bgcolor2, $bgcolor3, $bgcolor4, $bgcolor5;
    OpenTable();
    echo "<center><font color=\"$bgcolor5\"><b>$title</b></font></center><br />\n"
	."$content\n";
    CloseTable();
    echo "<br />";
}
?>
