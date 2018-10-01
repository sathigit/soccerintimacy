<?php
function Removelines($desc)
{
	$content = str_replace("/'/", "'",  $desc);
	$content = str_replace('/"/', '"',  $content);
	$content = str_replace("\'",  "'",  $content);
	$content = str_replace('\"',  '"',  $content);
	return $content;
}

function left_word_wrap($text)
{
	$chars = "210";
	$text  = wordwrap($text , $chars, "<br/>", 1);
	return $text;
}

function cms_word_wrap($text)
{
	$chars = "60";
	$text  = wordwrap($text , $chars, "\n", 1);
	return $text;
}

function ad_word_wrap($text)
{
	$chars = "25";
	$text  = wordwrap($text , $chars, "\n", 1);
	return $text;
}

function custom_echo($x, $length)
{
  if(strlen($x)<=$length)
  {
    echo $x;
  }
  else
  {
    $y=substr($x,0,$length) . '...';
    echo $y;
  }
}
?>