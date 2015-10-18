<?php

$page = 1;

if(isset($_POST['page']) && is_numeric($_POST['page']))
{
	$page = (int)$_POST['page'];


	$array = array(

		array('Name' => 'Daniel', 'Age' => 20),
		array('Name' => 'Wreck',  'Age' => 20),
		array('Name' => 'Roar',  'Age' => 20),
		array('Name' => 'Wew',  'Age' => 20),
		array('Name' => 'Youtube',  'Age' => 20),
		array('Name' => 'Nice',  'Age' => 30),
		array('Name' => 'Batu',  'Age' => 40),
		array('Name' => 'Catu',  'Age' => 50),
		array('Name' => 'Fatu',  'Age' => 60),
		array('Name' => 'Gatu',  'Age' => 70),
		array('Name' => 'Hatu',  'Age' => 80),
		array('Name' => 'Iatu',  'Age' => 90),
		array('Name' => 'Jatu',  'Age' => 10),
		array('Name' => 'Katu',  'Age' => 21),
		array('Name' => 'Latu',  'Age' => 22),
		array('Name' => 'Matu',  'Age' => 23),
		array('Name' => 'Natu',  'Age' => 24),
		array('Name' => 'Oatu',  'Age' => 25),
		array('Name' => 'Patu',  'Age' => 26),
		array('Name' => 'Qatu',  'Age' => 27),
		array('Name' => 'Ratu',  'Age' => 28),
		array('Name' => 'Satu',  'Age' => 29),
		array('Name' => 'Tatu',  'Age' => 13),

		array('Name' => 'Luna', 'Age' => 20),
		array('Name' => 'Rina',  'Age' => 20),
		array('Name' => 'Slardar',  'Age' => 20),
		array('Name' => 'BS',  'Age' => 20),
		array('Name' => 'Google',  'Age' => 20),
		array('Name' => 'asasa',  'Age' => 30),
		array('Name' => '34wdas',  'Age' => 40),
		array('Name' => 'bounty',  'Age' => 50),
		array('Name' => 'igwopio',  'Age' => 60),
		array('Name' => 'xcvcxvcxvx',  'Age' => 70),
		array('Name' => 'Ha2321321tu',  'Age' => 80),
		array('Name' => '35',  'Age' => 90),
		array('Name' => '36',  'Age' => 10),
		array('Name' => '37',  'Age' => 21),
		array('Name' => '38',  'Age' => 22),
		array('Name' => '39',  'Age' => 23),
		array('Name' => '40',  'Age' => 24),
		array('Name' => '41',  'Age' => 25),
		array('Name' => '42',  'Age' => 26),
		array('Name' => '43',  'Age' => 27),
		array('Name' => '44',  'Age' => 28),
		array('Name' => '45',  'Age' => 29),
		array('Name' => '46',  'Age' => 13),

	);

	$itemsPerPage 	= 3;
	$itemsCount		= count($array);
	$totalPages 	= ceil($itemsCount/$itemsPerPage);	

	if($page < 1)
		$page = 1;
	
	elseif($page > $totalPages)
		$page = $totalPages;

	$slicedData		= array_slice($array, ($page-1)*$itemsPerPage, $itemsPerPage);

	ob_start();
	include('buttons_list.php');
	$buttonsList = ob_get_contents();
	ob_get_clean();

	$toBeEncoded = array(
			'itemsCount' 	=> $itemsCount,
			'slicedData'	=> $slicedData,
			'page'			=> $page,
			'status'		=> 'ok',
			'buttonss'		=> $buttonsList		
			);

	 echo json_encode($toBeEncoded);
}


?>