<?php
	session_start();
	
	if(isset($_SESSION['user_logedin']) && $_SESSION['user_logedin']== true)
	{
		header('location: main.php');
		exit();
	}

?>


<!doctype html>
<html lang="pPL">
  <head>
    <title>Personal Budget</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="style.css">
 
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <header class="d-block">
		<div class="container-fluid no-gutters">
			<div class="row" >
				<div class="col text-white tlo3" >
						<p class="h1 text-center mt-4 mb-4"> Your Personal Budget </p>
				</div>
			</div>
			
			<div class="row ">
				<div class="col" style="background-color: #2F4A57; height:10px;"></div>
			</div>
			
			<div class="row" >
				<div class="col" style="background-color: #4F788D; height:10px;"></div>
			</div>
			
			<div class="row">
				<div class="col" style="background-color: #7BA6B4; height:10px;"></div>
			</div>
		</div>
	</header>
	
	<main class="d-block tlo1" style="height: 100%;">
		<div class="container-fluid no-gutters pt-5 " >
			<div class="row justify-content-center" >
				<div class="col-lg-5 col-sm-8  p-4  text-white  h4 shadow-lg rounded" style="background-color: #4F788D">
					<p class="text-center">Zaloguj sie</p>
					<form class="h6 pt-2 " method="post" action="login.php">
						<div class="form-group">
							<div class="col-5">
								<label for="email">Podaj adres Email: </label>
							</div>
							<div class="col-12">
								<input type="text" id="email" name="email" class="form-control" placeholder="adres Email">
							</div>
						</div>
						<div class="form-group">
							<div class="col-5">
								<label for="password"> Podaj haslo: </label>
							</div>
							<div class="col-12">
								<input type="password" id="password" name="password" class="form-control" placeholder="haslo">
							</div>
							<?php
								if(isset($_SESSION['blad'] ))
								{
									echo $_SESSION['blad'] ;
								}
							?>
						</div>
						<button type="submit" class="tlo2 btn btn-primary float-right ml-5 hoverable">Logowanie</button>
						<div>
							Nie posiadasz konta?   
							<a href="register.php" class="text-danger">REJESTRACJA</a>
						</div>
					</form>
				</div>
			</div>
		</div>
	</main>
	
	<footer>
		<div class="fixed-bottom tlo3 w-100 pt-3 pb-3 text-center">
			Wszelkie prawa zastrzeżone &copy; 2019 Dziękuję za wizytę!
		</div>
	</footer>

	
 
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
  </body>
</html>