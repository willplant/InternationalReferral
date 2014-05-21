<!doctype html>
<html lang="en">
	<head>
		<title>International Referral | Download</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="refresh" content="5;/download/file/{{ $file }}" />
	</head>
	<body>
	<?php
		if (!Auth::check())
		{
			die('Unauthorized.');
		}
		else if(Session::get('download_limit') - time() > 30)
		{
			die('Unauthorized');
		}

		header('Content-disposition: attachment; filename=' . $file);
		header('Content-type: ' . $content_type); 
		readfile($file);
	?>
	</body>
</html>
