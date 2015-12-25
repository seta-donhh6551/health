<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Utility
{
	public function fillter($str){
		$str = str_replace("<", "&lt;", $str);
		$str = str_replace(">", "&gt;", $str);
		$str = str_replace("&", "&amp;", $str);
		$str = str_replace("|", "&brvbar;", $str);
		$str = str_replace("~", "&tilde;", $str);
		$str = str_replace("`", "&lsquo;", $str);
		$str = str_replace("#", "&curren;", $str);
		$str = str_replace("%", "&permil;", $str);
		$str = str_replace("'", "&rsquo;", $str);
		$str = str_replace("\"", "&quot;", $str);
		$str = str_replace("\\", "&frasl;", $str);
		$str = str_replace("--", "&ndash;&ndash;", $str);
		$str = str_replace("ar(", "ar&Ccedil;", $str);
		$str = str_replace("Ar(", "Ar&Ccedil;", $str);
		$str = str_replace("aR(", "aR&Ccedil;", $str);
		$str = str_replace("AR(", "AR&Ccedil;", $str);

		return htmlspecialchars($str);
	}

	public function cut_str($str, $length)
	{
		return mb_substr($str, 0, $length, 'utf-8').'...';
	}

	public function debug($val)
	{
		echo "<pre>";
		print_r($val);
		echo "</pre>";
		die();
	}
}