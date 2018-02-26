/*

Kmeans

*/

$arr = array();


for($i=0; $i<50; $i++){

  if($i%5)
   $arr[$i] = array(1,2,3);
  else
   $arr[$i] = array(rand(0,10),rand(0,10),rand(0,10));
  
  
  if($i%7)
   $arr[$i] = array(1,rand(0,9),rand(0,9));
  else
   $arr[$i] = array(1,rand(2,6),rand(0,10));
  
  
  if($i%3)
   $arr[$i] = array(3,2,1);
  else
   $arr[$i] = array(2,rand(2,7),rand(0,10));
  
}

//print_r($arr[0]);

$f = kmeans($arr);

//print_r($f);

// cluster assignment

$c = array();
$c2 =array();

foreach($f as $i => $v){
  
  foreach($v as $j => $p){
     
      if($i!=$j){
        $c[$i][$j] = $p>0?1:2;
  
              if(!in_array($i,$c2[$p>0?1:2])){
                 $c2[$p>0?1:2][]=$i;                
              }
              
              
              if(!in_array($j,$c2[$p>0?1:2])){
                 $c2[$p>0?1:2][]=$j;
              }
              
             
               
        }
    }
}

echo "<pre>";
print_r($c2);


function kmeans($arr){
  
  $trans = array();
  
  foreach($arr as $i => $v){
      
      foreach($arr as $j => $p ){
       
          
          $trans[$i][$j] = 0;
                      
          if($i!=$j)
            $trans[$i][$j] = distance($arr[$i],$arr[$j]);
          else
            $trans[$i][$j] = 0;
                      
                      
      }
      
    }
  
  
  return $trans;
  //  echo distance($arr[0],$arr[1]);
  
}


function distance($A, $B){
 
  return sqrt(abs($A[0]-$B[0]) + abs($A[1]-$B[1]) + abs($A[2]-$B[2]));
    
  
}
