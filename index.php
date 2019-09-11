<?php
	session_start();
	
	if(isset($_SESSION['user_logedin']) && $_SESSION['user_logedin']== true)
	{
		header('location: main.php');
		exit();
	}

?>


<!doctype html>
<html lang="PL" class="h-100">
  <head>
    <title>Personal Budget</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 
    <!-- Bootstrap CSS -->
	<link href="https://getbootstrap.com/docs/4.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
  <link href="sticky-footer.css" rel="stylesheet">
  </head>
  <body class="d-flex flex-column h-100">
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
	
	<main class="tlo1 h-100">
		<div class="container-fluid no-gutters pt-5 " >
			<div class="row justify-content-center" >
				<div class="col-lg-5 col-sm-8  p-4  text-white  h4 shadow-lg rounded" style="background-color: #4F788D">
					<p class="text-center">Zaloguj się</p>
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
								<label for="password"> Podaj hasło: </label>
							</div>
							<div class="col-12">
								<input type="password" id="password" name="password" class="form-control" placeholder="hasło">
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
		<div class=" mt-auto text-center tlo3 py-3">
			Wszelkie prawa zastrzeżone &copy; 2019 Dziękuję za wizytę!
		</div>
	</footer>

	
 
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>