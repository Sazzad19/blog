<?php

class format{
public function formatDate($date){
return date('F d,Y  g:i a',strtotime($date));
}



public function textShorten($text,$limit=400){
$text=$text." ";
$text=substr($text,0,$limit);
$text=substr($text,0,strrpos($text, ' '));
return $text=$text."....";

}
public function validation($data){
	$data=trim($data);
	$data=stripcslashes($data);
	$data=htmlspecialchars($data);
	return $data;

}

public function title(){
$path=$_SERVER['SCRIPT_FILENAME'];
$title=basename($path,'.php');
if($title=='index'){
	$title='Home';
}elseif($title=='contact'){
	$title='Contact';
}
return ucwords($title);



}



}


?>