<?PHP
$sideLength = 9;
$inputArr = array();
$outputArray = array(array());

for($i = 0; $i < $sideLength * $sideLength; $i++){
	array_push($inputArr, $i);
}

makeTopMost($inputArr, 0, $sideLength - 1, $sideLength - 1, 0, $outputArray);

function makeTopMost($inputArr, $cT, $cB, $cR, $cL, &$outputArray){
	if(sizeof($inputArr) != 0){
		//echo "top ";
		for($i = $cL; $i <= $cR; $i++){
			$outputArray[$cT][$i] = array_shift($inputArr);
		}
		$cT++;
		makeRightMost($inputArr, $cT, $cB, $cR, $cL, $outputArray);
	}
}
function makeRightMost($inputArr, $cT, $cB, $cR, $cL, &$outputArray){
	if(sizeof($inputArr) != 0){
		//echo "right ";
		for($i = $cT; $i <= $cB; $i++){
			$outputArray[$i][$cR] = array_shift($inputArr);
		}
		$cR--;
		makeBottomMost($inputArr, $cT, $cB, $cR, $cL, $outputArray);
	}
}
function makeBottomMost($inputArr, $cT, $cB, $cR, $cL, &$outputArray){
	if(sizeof($inputArr) != 0){
		//echo "bottom ";
		for($i = $cR; $i >= $cL; $i--){
			$outputArray[$cB][$i] = array_shift($inputArr);
		}
		$cB--;
		makeLeftMost($inputArr, $cT, $cB, $cR, $cL, $outputArray);
	}
}
function makeLeftMost($inputArr, $cT, $cB, $cR, $cL, &$outputArray){
	if(sizeof($inputArr) != 0){
		//echo "left ";
		for($i = $cB; $i >= $cT; $i--){
			$outputArray[$i][$cL] = array_shift($inputArr);
		}
		$cL++;
		makeTopMost($inputArr, $cT, $cB, $cR, $cL, $outputArray);
	}
}
//print_r($outputArray);
echo "<br>Start: <br>";
for($i = 0; $i < $sideLength; $i++){
	for($j = 0; $j < $sideLength; $j++){
		printf("%02s\n", $outputArray[$i][$j]);
	}
	echo "<br>";
}
