<?php
header('Content-Type: text/plain');
$testedString = '<tag>';
$iterations = 50000000;
$outputArray = [];

function test($string1, $string2, $identical = false) {
	
	global $outputArray, $iterations;
	$testIterations = $iterations;
	
	$startTime = microtime(true);
	if($identical) {
		while($testIterations-->0) {
			if($string1 === $string2);
		}
	} else {
		while($testIterations-->0) {
			if($string1 == $string2);
		}
	}
	$endTime = microtime(true);
	$time = round($endTime-$startTime,2);

	$sign = $identical ? '===' : '==';
	$outputArray[(string)$time.chr(rand(0,254))] = str_pad($string1." $sign ".$string2, 30, " ").$time.PHP_EOL;
}

test($testedString, '<');
test($testedString, '<', true);
test($testedString, '<tag');
test($testedString, '<tag)');
test($testedString, '<tag>');
test($testedString, '<tag>', true);
test($testedString, '<tag>1');
test($testedString, '<tag>111');
test($testedString, '111111111111111');
test($testedString, 'asjd0iwejfiwhnifup');
test($testedString, '-=112zx"c]sadp$^%$');
test($testedString, '');
test($testedString, 't');

krsort($outputArray);

foreach($outputArray as $output) {
	echo $output;
}