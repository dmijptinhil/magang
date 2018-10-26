<!DOCTYPE html>
<html>
<head>
<link href='https://fonts.googleapis.com/css?family=Raleway:400,500,300' rel='stylesheet' type='text/css'>

<title>	</title>
</head>
<body>
		<div id="mainButton">
	<div class="btn-text" onclick="openForm()">Sign In</div>
	<div class="modal">
		<div class="close-button" onclick="closeForm()">x</div>
		<div class="form-title">Sign In</div>
		<div class="input-group">
			<input type="email" id="email" onblur="checkInput(this)" />
			<label for="email">Email</label>
		</div>
		<div class="input-group">
			<input type="password" id="password" onblur="checkInput(this)" />
			<label for="password">Kata Sandi</label>
		</div>
		<div class="form-button" onclick="closeForm()">Go</div>
		<div class="codepen-by">CodePen by Cole Waldrip</div>
	</div>
</div>
<div class="codepen-by">Aplikasi Surat Masuk dan Surat Keluar</div>

<script src="{{ asset('js/js.js') }}"></script>

</body>
</html>