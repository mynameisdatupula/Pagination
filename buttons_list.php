<?php

	$button = endButton();

	$pageMinus1 = $page - 1;
	$pageMinus2 = $page - 2;
	$pagePlus1  = $page + 1;
	$pagePlus2  = $page + 2;

	if($totalPages < 5)
	{
		for($ctr = 1; $ctr <= $totalPages; $ctr++)
			$button .= returnButton($ctr);
	}

	elseif($page > 2 && $page < ($totalPages-1))
	{
		$button .= returnButton($pageMinus2);
		$button .= returnButton($pageMinus1);
		$button .= returnButton($page);
		$button .= returnButton($pagePlus1);
		$button .= returnButton($pagePlus2);
	}
	elseif ($page == 2)
	{
		$button .= returnButton($pageMinus1);
		$button .= returnButton($page);
		$button .= returnButton($pagePlus1);
		$button .= returnButton($pagePlus2);
		$button .= returnButton($pagePlus2+1);
	}
	elseif ($page == 1)
	{
		$button .= returnButton($page);
		$button .= returnButton($pagePlus1);
		$button .= returnButton($pagePlus2);
		$button .= returnButton($pagePlus2+1);
		$button .= returnButton($pagePlus2+2);
	}
	elseif( $page == ($totalPages-1))
	{
		$button .= returnButton($pageMinus2-1);
		$button .= returnButton($pageMinus2);
		$button .= returnButton($pageMinus1);
		$button .= returnButton($page);
		$button .= returnButton($pagePlus1);
	}
	elseif( $page == $totalPages)
	{
		$button .= returnButton($pageMinus2-2);
		$button .= returnButton($pageMinus2-1);
		$button .= returnButton($pageMinus2);
		$button .= returnButton($pageMinus1);
		$button .= returnButton($page);
	}
	$button .= endButton('>>', $totalPages);
	echo $button;
	?>
					
						
<?php	

	function returnButton($page)
	{

		return "
					button = $('<button/>', 
					{
						text: $page,
						click: function()
						{
							$.ajax({
									type: 'POST',
									url:  './storage.php',
									data: {
										'page' : $page
									},
									success: function(data)
									{
										if(data.status == 'ok')
										{
											$('#tableList').html('');
											$.each(data.slicedData,function(index, value)
											{	
												$('#tableList').append('<p>'+value.Name+' '+value.Age+'</p>');
											});
											$('#buttonsList').html('');
											eval(data.buttonss);
										}
										
									},
									dataType : 'json'
								});
						}
					});	
					$('#buttonsList').append(button);	
				";
	}

	function endButton($page = '<<', $totalPages = 0)
	{
		if($page == '<<')
		{
			$page = 1;
			$pageText = '<<';
		}
		elseif($page == '>>')
		{
			$page = $totalPages;
			$pageText = '>>';
		}

		return "
					button = $('<button/>', 
					{
						text: '".$pageText."' ,
						click: function()
						{
							$.ajax({
									type: 'POST',
									url:  './storage.php',
									data: {
										'page' : $page
									},
									success: function(data)
									{
										if(data.status == 'ok')
										{
											$('#tableList').html('');
											$.each(data.slicedData,function(index, value)
											{	
												$('#tableList').append('<p>'+value.Name+' '+value.Age+'</p>');
											});
											$('#buttonsList').html('');
										}
										eval(data.buttonss);
									},
									dataType : 'json'
								});
						}
					});	
					$('#buttonsList').append(button);	
				";
	}

?>


