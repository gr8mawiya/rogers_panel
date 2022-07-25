<?php
// Rogers DRM PANEL by PYTHON911

// Logout user after 1900 seconds
header("Refresh:1900; url=rogerslogout.php");
include "rogers_config.php";
include "tools.php";
session_start();
if (!isset($_SESSION["ROGERS_SERVICES_LOGIN"]) || $_SESSION["ROGERS_SERVICES_LOGIN"] !== true) {
    header("location: rogers_auth.php");
    exit;
}
$SERVER_HTTP = (isset($_SERVER["HTTPS"]) ? "https" : "http") . "://" . $_SERVER["HTTP_HOST"];
echo "<center>\n  <a href=\"#\"><img src=\"http://boomboomhosting.net/logo\$/rogers.png\" width=\"15%\"></a>\n</center>\n\n<!DOCTYPE html>\n<html lang=\"en\">\n<head>\n  <title>Rogers| Control Panel</title>\n  <meta charset=\"utf-8\">\n  <meta name=\"viewport\" content=\"width=device-width; initial-scale=1\">\n  <link rel=\"stylesheet\" href=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css\">\n  <link rel=\"stylesheet\" href=\"https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap.min.css\">\n  <link rel=\"stylesheet\" href=\"https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css\">\n  <link rel=\"stylesheet\" href=\"https://pro.fontawesome.com/releases/v5.10.0/css/all.css\">\n  <link href=\"https://vjs.zencdn.net/7.2.3/video-js.css\" rel=\"stylesheet\">\n  <script src=\"https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js\"></script>\n  <script src=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js\"></script>\n  <script src=\"https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js\"></script>\n  <script src=\"https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap.min.js\"></script>\n  <script>\n\n\$( document ).ready(function() {\n\t\n\tUPDATE_SERVER_STATS();\n\t\n\tvar video = document.getElementById('video');\n\n\tvar config = {\n\t\tautoStartLoad: true,\n\t\tstartPosition: -1,\n\t\tdebug: false,\n\t\tinitialLiveManifestSize: 10,\n\t\tmaxBufferLength: 60,\n\t\tlowLatencyMode: true,\n\t};\n\tvar hls = new Hls(config);\n\n\tsetInterval(TIMER_RUNNER, 15000);\n\t\n\tfunction TIMER_RUNNER() {\n\t\t\n\t\tconsole.log('#### AUTO UPDATING STATS');\n\t\t\n\t\tUPDATE_SERVER_STATS();\n\t\t\n\t}\n\n\n\n\n\tfunction UPDATE_SERVER_STATS() {\n\t\t\n\t\tconsole.log('UPDATING SERVER INFORMATION');\n\t\t\n\t\t\$.ajax({\n\t\t\turl: '";
echo $SERVER_HTTP;
echo "/stats.php',\n\t\t\ttype: \"GET\",\n\t\t\tdataType: \"json\",\n\t\t\tsuccess: function (DATA) {\n\n\t\t\t\t\$('#cpu').text(DATA.CPU);\n\t\t\t\t\$('#mused').text(DATA.RAM_USED);\n\t\t\t\t\$('#mtotal').text(DATA.RAM_TOTAL);\n\t\t\t\t\$('#pro').text(DATA.PROCESSES);\n\t\t\t\t\$('#fspace').text(DATA.FREE_STORAGE);\n\t\t\t\t\$('#uptime').text(DATA.SYSTEM_UPTIME);\n\t\t\t\t\$('#upload').text(DATA.UPLOAD_BANDWIDTH);\n\t\t\t\t\$('#download').text(DATA.DOWNLOAD_BANDWIDTH);\n\t\t\t\t\n\t\t\t}\n\t\t\t\n\t\t});\n\t}\n\t\n \n});\n\t\n </script>\n  <link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css\">\n</head>\n<body>\n\n\n          <td class=\"news-section\">\n\t\t\t\t<section id=\"statistic\" class=\"statistic-section one-page-section\">\n\t\t\t\t\t\t<div class=\"container\">\n\t\t\t\t\t\t\t<div class=\"row text-center\">\n\t\t\t\t\t\t\t\t<div class=\"col-sm\">\n\t\t\t\t\t\t\t\t\t<div class=\"counter\">\n\t\t\t\t\t\t\t\t\t\t<i class=\"fa fa-microchip fa-2x stats-icon\"></i>\n\t\t\t\t\t\t\t\t\t\t<h2 class=\"timer count-title count-number\" id=\"cpu\">0</h2>\n\t\t\t\t\t\t\t\t\t\t<div class=\"stats-line-black\"></div>\n\t\t\t\t\t\t\t\t\t\t<p class=\"stats-text\">CPU USAGE</p>\n\t\t\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t\t\t<div class=\"col-sm\">\n\t\t\t\t\t\t\t\t\t<div class=\"counter\">\n\t\t\t\t\t\t\t\t\t\t<i class=\"fa fa-memory fa-2x stats-icon\"></i>\n\t\t\t\t\t\t\t\t\t\t<h2 class=\"timer count-title count-number\" id=\"mused\">0\n\t\t\t\t\t\t\t\t\t\t</h2>\n\t\t\t\t\t\t\t\t\t\t<div class=\"stats-line-black\"></div>\n\t\t\t\t\t\t\t\t\t\t<p class=\"stats-text\">RAM USAGE</p>\n\t\t\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t\t\t<div class=\"col-sm\">\n\t\t\t\t\t\t\t\t\t<div class=\"counter\">\n\t\t\t\t\t\t\t\t\t\t<i class=\"fa fa-memory fa-2x stats-icon\"></i>\n\t\t\t\t\t\t\t\t\t\t<h2 class=\"timer count-title count-number\" id=\"mtotal\">0</h2>\n\t\t\t\t\t\t\t\t\t\t<div class=\"stats-line-black\"></div>\n\t\t\t\t\t\t\t\t\t\t<p class=\"stats-text\">RAM TOTAL</p>\n\t\t\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t\t\t<div class=\"col-sm\">\n\t\t\t\t\t\t\t\t\t<div class=\"counter\">\n\t\t\t\t\t\t\t\t\t\t<i class=\"fa fa-hdd fa-2x stats-icon\"></i>\n\t\t\t\t\t\t\t\t\t\t<h2 class=\"timer count-title count-number\" id=\"fspace\">0</h2>\n\t\t\t\t\t\t\t\t\t\t<div class=\"stats-line-black\"></div>\n\t\t\t\t\t\t\t\t\t\t<p class=\"stats-text\">STORAGE TOTAL</p>\n\t\t\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t\t\t<div class=\"col-sm\">\n\t\t\t\t\t\t\t\t\t<div class=\"counter\">\n\t\t\t\t\t\t\t\t\t\t<i class=\"fa fa-clock fa-2x stats-icon\"></i>\n\t\t\t\t\t\t\t\t\t\t<h2 class=\"timer count-title count-number\" id=\"uptime\">0</h2>\n\t\t\t\t\t\t\t\t\t\t<div class=\"stats-line-black\"></div>\n\t\t\t\t\t\t\t\t\t\t<p class=\"stats-text\">UPTIME</p>\n\t\t\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t\t\t<div class=\"col-sm\">\n\t\t\t\t\t\t\t\t\t<div class=\"counter\">\n\t\t\t\t\t\t\t\t\t\t<i class=\"fa fa-download fa-2x stats-icon\"></i>\n\t\t\t\t\t\t\t\t\t\t<h2 class=\"timer count-title count-number\" id=\"download\">0</h2>\n\t\t\t\t\t\t\t\t\t\t<div class=\"stats-line-black\"></div>\n\t\t\t\t\t\t\t\t\t\t<p class=\"stats-text\">DOWNLOAD</p>\n\t\t\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t\t\t<div class=\"col-sm\">\n\t\t\t\t\t\t\t\t\t<div class=\"counter\">\n\t\t\t\t\t\t\t\t\t\t<i class=\"fa fa-upload fa-2x stats-icon\"></i>\n\t\t\t\t\t\t\t\t\t\t<h2 class=\"timer count-title count-number\" id=\"upload\">0</h2>\n\t\t\t\t\t\t\t\t\t\t<div class=\"stats-line-black\"></div>\n\t\t\t\t\t\t\t\t\t\t<p class=\"stats-text\">UPLOAD</p>\n\t\t\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t\t\t</div>\n\n\n\n\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</section>\n\n          </td>\n\n        </tr>\n        \n        <tr>\n          \n          <td class=\"news-section\">  \n\n\n           \n          </td>\n          \n        </tr>\n\n        <tr>\n</head>\n<body>\n<script>\n\n</script>\n\n<div class=\"container\">\n  <hr/>\n  <p></p>\n  <p>\n\t&nbsp;&nbsp;&nbsp;&nbsp;\n\t&nbsp;&nbsp;&nbsp;&nbsp;\n\t&nbsp;&nbsp;&nbsp;&nbsp;\n\t&nbsp;&nbsp;|&nbsp;&nbsp;\n    \t<a href=\"#\" onclick=\"refresh();\">[ Refresh ]</a>\n  \t&nbsp;&nbsp;|&nbsp;&nbsp;\n  \t<a href=\"rogersnewchannels.php\" target=\"_blank\">[ New Channels ]</a>\n\t&nbsp;&nbsp;|&nbsp;&nbsp;\n   \t<a href=\"rogersm3u.php\" target=\"_blank\">[ Rogers M3u ]</a>\n\t &nbsp;&nbsp;|&nbsp;&nbsp;\n\t<a href=\"rogersremovechannel.php\" target=\"_blank\">[ Remove Active Channels ]</a>\n\t&nbsp;&nbsp;|&nbsp;&nbsp;\n  \t<a href=\"rogerswarning.php\" target=\"_blank\">[ Deactivate All Channels ]</a>\n\t&nbsp;&nbsp;|&nbsp;&nbsp;\n  \t<a href=\"rogersreadme.php\" target=\"_blank\">[ Read Me ]</a>\n\t&nbsp;&nbsp;|&nbsp;&nbsp;\n  \t<a href=\"rogerslogout.php\" target=\"_blank\">[ Log Out ]</a>\n\t&nbsp;&nbsp;|&nbsp;&nbsp;\n\n <br/><br/>\n        <td>\n\t<div style=\"border:1px dotted blue;padding:2%;\">\n\t<form action=\"rogersactivate.php\" method=\"POST\">\n \tEnter the Channel ID you want to Activate >> <input type=\"text\" name=\"channelid\" required size=\"60\">\n  \t<input type=\"submit\" value=\"Activate\">\n\t<br/><br/>\n\t<center><p style=\"color:blue;\">Channel ID Example:</p> <p style=\"color:red;\">CBC-0000000000000000000000000000</p></center>\n\t</div>\n\n\t</td>\n    </p>\n\n  

// Display channels status if online show m3u8 links else show ACTIVATE
<table id=\"channels\" class=\"table\">\n    <thead>\n\t\t<tr>\n\t\t\t<th>ID</th>\n\t\t\t<th>Channel Group</th>\n\t\t\t<th>Channel Title</th>\n\t\t\t<th>Status</th>\n\t\t\t<th>Action</th>\n\t\t</tr>\n    </thead>\n    <tbody>\n\t";
$rr = json_decode(file_get_contents("http://127.0.0.1:18001/index.php"), true);
$ids = [];
foreach ($rr["channels"] as $key => $r) {
    $ids[] = $key;
}
// Get rogers drm key server token 
$pssh_token = file_get_contents("http://127.0.0.1:19001/key_server/pssh.php?token=$id");
// Get rogers mpd playable url.
$mpd = file_get_contents("http://127.0.0.1:19001/key_server/get_mpd.php?channelid=$id");

// Activate file when passed with arg[channelid]
$path_start = 'activate.php';
// STOP channel when passed with arg[update_channel]
$path_stop = "deactivate.php";
// Get rogers Channels NAME and ID
$row = explode(PHP_EOL, file_get_contents("rogers.txt"));
$group = "Rogers";
for ($i = 0; $i < count($row); $i++) {
    $path = explode(";", $row[$i]);
    list($id, $name, $mpd, $pssh) = $path;
    $status = "OFF";
    if (in_array($id, $ids)) {
        $status = "ON";
    }
    if (trim($id) != "") {
        if (trim($group) == "") {
            $group = "Unassigned";
        }
        echo "      <tr class=\"";
        echo $name;
        echo " ";
        echo $group;
        echo "\">\n        <td>";
        echo $id;
        echo "</td>\n\t\t<td>";
        echo ucwords(strtolower($group));
        echo "</td>\n\t\t<td>";
        echo ucwords(strtolower($name));
        echo "</td>\n\t\t<td>";
        echo $status == "ON" ? "<span class=\"label label-success\">Online</span>" : "<span class=\"label label-warning\">Offline</span>";
        echo "</td>\n        <td>\n\t\t\t";
        if ($status == "OFF") {
            echo "\t\t\t<a href=\"#\" onclick=\"DoAction('";
            echo $path_start . "?channelid=" . $id . "";
            echo "');\" title=\"Click here to start the channel\">ACTIVATE</a>\n\t\t\t";
        } else {
            echo "\t\t\t<a href=\"#\" onclick=\"DoAction('";
            echo $path_stop . "?update=" . $id . "&submit=Update Active Channels";
            echo "');\" title=\"Click here to shutdown the channel\">STOP</a>\n\t\t\t&nbsp;&nbsp;|&nbsp;&nbsp;\n\t\t\t<a target=\"_blank\" href=\"";
          // Display m3u8 or txt of channel once activated both can be activated.
             echo "http://" . $_SERVER["SERVER_ADDR"] . ":80/" . $key . "/hls/playlist.m3u8";
           // echo "http://" . $_SERVER["SERVER_ADDR"] . ":80/" . $key . "/hls/playlist.txt";

            echo "\" title=\"Click here to open the channel M3U link\">M3U link</a>\n\t\t\t";
        }
        echo "\t\t</td>\n      </tr>\n\t";
    }
}
echo "    </tbody>\n  </table>\n</div>\n\n<script>\n\tvar table;\n\n\t\$(document).ready(function() {\n\t\ttable = \$('#channels').DataTable({ stateSave: true });\n\t\ttable.order( [ 1, 'asc' ], [ 2, 'asc' ] ).draw();\n\t} );\n\n\tfunction showOnlyON()\n\t{\n\t\ttable.search( \"Online\" ).draw();\n\t\treturn false;\n\t}\n\n\tfunction showOnlyOFF()\n\t{\n\t\ttable.search( \"Offline\" ).draw();\n\t\treturn false;\n\t}\n\n\tfunction showALL()\n\t{\n\t\ttable.search( \"\" ).draw();\n\t\treturn false;\n\t}\n\n\tfunction refresh()\n\t{\n\t\tlocation.reload();\n\t\treturn false;\n\t}\n\n\tfunction DoAction(url)\n\t{\n\t\tvar xmlHttp = new XMLHttpRequest();\n\t\txmlHttp.open( \"GET\", url, false );\n\t\txmlHttp.send( null );\n\t\tvar response =  JSON.parse(xmlHttp.responseText);\n\t\tif (response.status == true)\n\t\t{\n\t\t\t\$.toast({\n\t\t\t\theading: 'Information',\n\t\t\t\ttext: 'The requested action is being executed, please wait around 30-60 secs.',\n\t\t\t\ticon: 'success',\n\t\t\t\tloader: true,\n\t\t\t\tloaderBg: '#9EC600'\n\t\t\t});\n\t\t\trefresh();\n\t\t}\n\t\telse\n\t\t{\n\t\t\t\$.toast({\n\t\t\t\theading: 'Error',\n\t\t\t\ttext: 'Oops!, something goes wrong when trying to do the requested action.',\n\t\t\t\ticon: 'error',\n\t\t\t\tloader: true,\n\t\t\t\tloaderBg: '#9EC600'\n\t\t\t});\n\t\t}\n\t}\n\n</script>\n\n</body>\n</html>";



?>
