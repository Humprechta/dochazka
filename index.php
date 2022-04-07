
<!DOCTYPE html>
<html>

<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<style>
	.flex{
	display: flex;
  text-align:center;
	 justify-content: center;
   width:100%;
	}
</style>

<title>PrichodyOdchody</title>
</head>

<body>

<div class = "prihlasovani flex">
<form action="php/zapisdochazky.php" method="post">
  <fieldset>
  <legend>Přihašování:</legend>
  <label for="fname">Jmeno</label>
  <input type="text" id="jm" name="fname" required><br><br>
  <label for="psswd">Heslo</label>
  <input type="password" id="" name="psswd" required><br><br> 
  <input type="submit" name="prihlasit" value="Zapsat se">
</fieldset>
</form>
</div>
<hr>
<a>pro administraci:</a>
<a>jmeno: admin@admin.com</a>
<a>heslo: admin1</a>
<hr>
<a>pro vyzkoušení absence:</a>
<a>jmeno: test</a>
<a>heslo: test</a>
<hr>
<a>pro vyzkoušení role ucitele:</a>
<a>jmeno: Karel</a>
<a>heslo: Karel123</a>
<hr>
<div class = "ucitel" ></div>

<div class = "admin" ></div>

</body>