<html>
 <head>
  <title>PHP Test</title>
 </head>
 <body>
 <?php 

$phrase = 'çıkmasına';
$output = '';
$output = shell_exec('echo "' . $phrase . '" |flookup /home/abylay/projects/morph/TRmorph/stem.fst');
$lines = preg_split('/\n/', $output);
$alternatives = array();
$stems = array();	
	
foreach($lines as $line) {
	$parts = $parts = preg_split('/\t+/', $line);
	$stem = $parts[1];
	$stem = preg_replace('/<.*>/', '', $stem);
	if($stem != "?+" && $stem != ""){
		array_push($stems, $stem);
	}
}
if(count($stems) > 0){
	$alternatives = $stems;
	rsort($alternatives);
	array_push($alternatives, $phrase);
	$phrase = $alternatives[0];
}

echo htmlspecialchars('-' . $phrase) . '<br/>';
foreach($alternatives as $st) {
	echo htmlspecialchars('-' . $st) . '<br/>';	
}


 ?> 
 </body>
</html>