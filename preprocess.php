<?php


//cluster the jargon, key words, class and sub class, relations between keywords



$sample = "Some text here
";


//TO-DO: UTF-8 Text

parseTextAndReturnBOW($sample);

function parseTextAndReturnBOW($text){

	$markers = array(' ',',',';','.');
	
	$rawDataArray = explode(' ',$text);
	
	$cleanDataArray = cleanIteratively($rawDataArray);	
	
	
	//echo "<pre>";
	print_r($cleanDataArray);
	

}


function cleanIteratively($dataArray){

	$markers = array(" ",",",";",".","\n\r","\n","\r");  // <--- exhaustive list of funny characters
	
	foreach($dataArray as $ind => $txt){
		
		$dataArray[$ind] = str_replace($markers,'',trim($txt));	 // <--- replace with preg_replace
	
	}
	
	foreach($dataArray as $key => $link) 
	{ 
    	if($link === '') 
    	{ 
        unset($dataArray[$key]); 
    	} 
	} 
	
	return $dataArray;
}

function cleanRecursively(){



}

?>
