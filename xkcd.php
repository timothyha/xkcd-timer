<?php

$s = split("\n", file_get_contents("https://c.xkcd.com/random/comic/"));

for($i=0; $i<count($s); $i++) {
    if(strpos($s[$i], "</title>")) {
        $title = trim($s[$i]);
        $title = substr($s[$i], strlen("<title>"), strlen($s[$i])-strlen("<title>")-strlen("</title>"));
    }
    if(strpos($s[$i], "link to this comic")) {
        $words = split(" ", $s[$i]);
        $url = $words[count($words)-2];
        $url = substr($url,0,strlen($url)-strlen("<br"));
    }
    if(strpos($s[$i], "(for hotlinking/embedding):")) {
        $words = split(" ", $s[$i]);
        $pic = $words[count($words)-1];
    }
}

echo "<center>";
echo $title.", <a target=_blank href=".$url.">$url</a><br>";
echo "<img src=".$pic."></img><br>";
echo "</center>";