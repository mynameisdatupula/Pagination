<?php

include('storage.php');
$totalPages = 23;
?>

<html>
	<head>
		<title>Pagination sample</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		<script>
			$(document).ready(function()
			{
				 leftMost = $('<button/>', {

					text: '<<',
					click: function()
					{
						$.ajax({
								type: 'POST',
								url:  './storage.php',
								data: {
									'page' : 1

								},
								success: function(data)
								{
									if(data.status == 'ok')
									{
										$('#tableList').html('');
										$.each(data.slicedData,function(index, value)
										{
											$('#tableList').append('<p>'+value.Name+' '+value.Age+'</p>' );
										});
										$('#buttonsList').html('');
										eval(data.buttonss);
									}
								},
								dataType : 'json'
							});
					}
				});

				$('#buttonsList').append(leftMost);

				<?php
					$totalPages = 5;
					for($ctr = 1; $ctr <= $totalPages; $ctr++)
					{ 
				?>
						 createdButton = $('<button/>', {
							text: <?php echo $ctr; ?>,
							click: function()
							{
								$.ajax({
									type: 'POST',
									url:  './storage.php',
									data: {
										'page' : <?php echo $ctr; ?>
									},
									success: function(data)
									{
										if(data.status == 'ok')
										{
											$('#tableList').html('');
											$.each(data.slicedData,function(index, value)
											{
												$('#tableList').append('<p>'+value.Name+' '+value.Age+'</p>' );
											});
											$('#buttonsList').html('');
											eval(data.buttonss);
										}
									},
									dataType: 'json'
								});
							}
						});
						$('#buttonsList').append(createdButton);

		<?php } ?>
					
					

				 rightMost = $('<button/>', {

					text: '>>',
					click: function()
					{
						$.ajax({
								type: 'POST',
								url:  './storage.php',
								data: {
									'page' : <?php echo $totalPages; ?> // change the value of this depending on the number of total data / rowPerPage

								},
								success: function(data)
								{
									if(data.status == 'ok')
									{
										$('#tableList').html('');
										$.each(data.slicedData, function(index, value)//change this part to suit pssuq_table.php
										{

											$('#tableList').append('<p>'+value.Name+' '+value.Age+'</p>' );
										});
										$('#buttonsList').html('');
										eval(data.buttonss);
									}
								},
								dataType:'json'
							});
					}
				});
				$('#buttonsList').append(rightMost);
			
			})
		</script>
	</head>
	<body>

		<div id = "tableList">
			Wewewewewe

		</div>

		<div id= "buttonsList">
		</div>

	</body>


</html>