<?php





// number of cluster
$k = 4;

$criteria = 2.25;

$data = array();


for($i=0; $i<50; $i++){

  $data[$i] = array(rand(0,10),rand(0,10),rand(0,10));
  
}

//print_r($data); die("data done\n");

$total_rows = count($data);

$random_selection = array();

// select initial k random seed!!

while($k != count($random_selection)) {

	$r = rand(0,$total_rows-1);
	
	if(!in_array($r,$random_selection)){
		$random_selection[] = $r;
	}
	
}

//print_r($random_selection); die("Random Selection done\n");
// Assignment Step: calculate the distance

	$Clusters = array();

	foreach($random_selection  as $i => $row){
		
		
		$centroid = $data[$row];
		$Clusters[$i] = array();

		foreach($data as $a => $b)
		{
			
			if($row == $a) continue;
			
			//print_r($b);
			$d = distance($centroid,$b);
			//echo $d+" is the distance: \n";
			if($d <= $criteria)
			{
				if(count($Clusters) == 0)
					$Clusters[$i][] = $centroid;
				
				$Clusters[$i][] = $b;
			}		
		}

		//print_r($centroid);

	}
	
	//print_r($Clusters); 

//update the centroids

	foreach($Clusters as $i => $arr)
	{
	
		//print_r(CalculateNewCentroid($arr));
		//die("First new centroid");
		
		$random_selection[$i] = CalculateNewCentroid($arr);
	
	}
	 
	echo "One Pass is done...\n";
	
	print_r($random_selection);
	
	$random =  $random_selection;
	$d =  $data;
	
	$GLOBALS['random']      = $random_selection;
    $GLOBALS['d']      = $data;
	
	for($j=0; $j<=20;$j++){
	
		echo "iteration ....".$j." \n";
		
		//print_r($random_selection);
		////print_r($data);
		
		//global $random, $d;
		
		//$random =  $random_selection;
		//$d =  $data;
		
		$c = clusterAssignment( $random_selection, $data,$criteria);
		$random_selection = updateCentroid($c);
		
		//echo "Clusters: \n";
		//print_r($c);
		echo "New Random \n";
		print_r($random_selection);
		//die("... END ...");
	
	}
	 
	 //die("ALL Cluster done\n");
	 
	 
	 function clusterAssignment($random,$data,$criteria){
	 
	 	$Clusters = array();

		foreach($random  as $i => $row){
		
		
		$centroid = $row; //$data[$row];
		$Clusters[$i] = array();

			foreach($data as $a => $b)
			{
			
				if($row == $a) continue;
			
			//print_r($b);
			$d = distance($centroid,$b);
			//echo $d." is the distance: \n";
				if($d <= $criteria)
				{
				if(count($Clusters) == 0)
					$Clusters[$i][] = $centroid;
				
				$Clusters[$i][] = $b;
				}		
			}

		//print_r($centroid);

		}
		
		return $Clusters;
	 
	 }
	 
	 function updateCentroid($Clusters){
	 	
	 	$random_selection = array();
	 	
	 	foreach($Clusters as $i => $arr)
		{
	
		//print_r(CalculateNewCentroid($arr));
		//die("First new centroid");
		
			echo $i." has  count ".count($arr)." \n";
		
			$random_selection[$i] = CalculateNewCentroid($arr);
	
		}
		
	 	return $random_selection;
	 	
	 }


function CalculateNewCentroid($arr)
{
	$avg= array();
	$newCentroid = array();
	$pointsInCluster = 0;
	
	foreach($arr as $i => $v){
		//$avg[] =0
		foreach($v as $j => $js){
		
			@$avg[$j]+= $js ;
		
		}
	 $pointsInCluster+=1;
	
	}
	
	
	foreach($avg as $v){
	
		//echo ($v/$pointsInCluster)+", \n";
	    $newCentroid[]=$v/$pointsInCluster;
	}
	
	//print_r($avg);
	//die("... Die");
 
 return $newCentroid;

}

function distance($A, $B){
 
  return sqrt(abs($A[0]-$B[0]) + abs($A[1]-$B[1]) + abs($A[2]-$B[2]));
    
  
}




?>
