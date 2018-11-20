<html>
<head>
	<style>
	html{
		overflow: none;
	}
	body{
		margin:50px auto;
        overflow: none;
        background-size: cover;
        height:100%;
        width: 100%;
	}
	h1{
		font-family: 'Montserrat',,sans-serif;
		color:#42ab9e;
		text-align: center;
	}
	h1 span{
		color:#777;
	}
	h2{
		font-family: 'Montserrat',sans-serif;
		text-align: center;
		color:#777;
	}
	h2 span{
		font-family: 'Montserrat',,sans-serif;
		color:rgb(255,82,82);
		text-align: center;
		font-weight: 800;
		font-size: 72px;
	}
	*{  
		font-family: 'Montserrat';
		color:#777;
		font-size: 24px;
		font-weight: bolder;
	}
	p{
		text-align: center;
        opacity: 0.7;
		padding: 2px;
		margin: auto;
	}
	p span{
		color: rgb(255,82,82);
	}
	</style>
</head>
<body>
<?php
if (PHP_SAPI != 'cli') {
	echo "<pre>";
}
$msg=$_GET['lines'];
$strings = array(
	1 => $msg,
);
/* $strings = array(
	1 => 'vit is very bad university',
);
*/




require_once __DIR__ . '/../autoload.php';
$sentiment = new \PHPInsight\Sentiment();
foreach ($strings as $string) {

	// calculations:
	$scores = $sentiment->score($string);
	$class = $sentiment->categorise($string);
    if ($class=='pos')
    {
    	$class='For the Motion';
    }
    else if($class='neg')
    {
    	$class='Against the Motion';
    }
    else{
    	$class='NEUTRAL';
    }
	// output:
	
	echo "<h1>The lines spoken by user are: <span> '$string' </span>\n</h1>";
	echo "<h1>The user is : <span><strong>'$class'</strong></span></h1>";
	$max=0;
	foreach ($scores as $viewpoint => $value) {
		if($max<$value)
		{
			$max=$value;
		}
		
	}
	$finalScore=$max*100;
	echo "<br/><br/><h2>The score out of 100 is <br/><br/><span>$finalScore</spa></h2>";
	echo "\n";
	$i=0;
	foreach ($scores as $viewpoint => $value) {
		$value=$value*100;
		echo "<p>";
		if($i==0)
		{   
			echo "</br>The user seems to be<br/><br/> <span>$value% - <span> POSITIVE &nbsp;";
		}
		else if($i==1)
		{
			echo "<span>$value% - <span> NEGATIVE</br>";
		}
		else{
			echo "<span>$value% - <span> NEUTRAL</br>";
		}
		//echo "$viewpoint=>$value";
		echo "</p>";
		$i++;
	}
}
?>
</body>
</html>