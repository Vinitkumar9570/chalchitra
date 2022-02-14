<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>LogIn</title>

		<link rel="stylesheet" type="text/css" href="style.css">
	</head>

	<body>
		<div class="box">
			<h2>Sign In</h2>
			<p>Use Your Google Account</p>
			<form>
				<div class="inputbox">
					<input type="email" name="email" required onkeyup="this.setAttribute('value',this.value);" value="">
					<label>Email</label>
				</div>

				<div class="inputbox">
					<input type="password" name="password" required onkeyup="this.setAttribute('value',this.value);" value="">
					<label>Password</label>
				</div>

				<input type="submit" name="Sign In" value="Sign In">
			</form>
		</div>
	</body>
</html>