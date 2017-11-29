<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="{{ asset('css/app.css') }}">

	<meta name="csrf-token" content="{{ csrf_token() }}">
	<script>
        window.Laravel = <?php echo json_encode([
	'csrfToken' => csrf_token(),
]); ?>
</script>
</head>
<body>

<div id="app"></div>

<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>