<?php
$id=$_GET['id'];
$xml=simplexml_load_file('protected/data/menu.xml');
$c_action2=array();
foreach($xml->controller as $c){
	$c_action=(int)$c->menuname->attributes()->id;
	if($id==$c_action){
	$c_action2[]=$c_action;
		foreach($c->action as $a){
			$c_action2[]=(int)$a->navname->attributes()->id;
		}
		echo json_encode($c_action2);
		break;
	}
	else{
		foreach($c->action as $a){
		$arr=array();

			$a_action=(int)$a->navname->attributes()->id;
			if($id==$a_action){
				$controller=(int)$c->menuname->attributes()->id;
				$arr[]=$controller;
				foreach($xml->controller as $c2){
				if((int)$c2->menuname->attributes()->id==$controller){
				   foreach($c2->action as $a2){
					  $arr[]=(int)$a2->navname->attributes()->id;
					 }
					 echo json_encode($arr);
					 break;
				}
				}
			}
		}
	}
}

?>