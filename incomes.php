<?php
	session_start();
	if(!isset($_SESSION['user_logedin']))
	{
		header('location: index.php');
	}
?>
<!doctype html>
<html lang="PL" class="h-100">
  <head>
    <title>Personal Budget</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="style.css">
	<script src="script.js"></script>
 
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="style.css">
	<script src="script.js"></script>
	<script src="https://www.gstatic.com/charts/loader.js"></script>
  </head>
  <body onload="currentDate()"  class="d-flex flex-column h-100">
  
  
    <header class="d-block">
		<div class="container-fluid no-gutters">
			<div class="row" >
				<div class="col text-white tlo3">
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
	
	<nav class="navbar tlo2 navbar-dark navbar-expand-lg ">
		<div	class="  pb-1">
			<button class="navbar-toggler navbar-toggler-left " type="button" data-toggle="collapse" data-target="#navb">
				<span class="navbar-toggler-icon"></span>
			</button>
		</div>
		<div class="mx-auto">
			<ul class="navbar-nav mx-auto collapse navbar-collapse" id="navb">
				<li class="nav-item px-3">
					<a class="nav-link" href="incomes.php">Dodaj przychód</a>
				</li>
				
				<li class="nav-item px-3 ">
					<a class="nav-link" href="expense.php">Dodaj wydatek</a>
				</li>
				
				<li class="nav-item px-3 ">
					<a class="nav-link" href="balance.php">Przeglądaj bilans</a>
				</li>
				
				<li class="nav-item px-3 ">
					<a class="nav-link" href="#">Ustawienia</a>
				</li>
				
				<li class="nav-item px-3 ">
					<a class="nav-link" href="logout.php">Wyloguj się</a>
				</li>
			</ul>
		</div>
	</nav>
	
	<main class="d-block tlo1 h-100">
		<div class="container-fluid no-gutters pt-2  " >
			
			<div class="row justify-content-center mt-2 mb-2" >
			
				<div class="col-9 pt-1  pb-1 text-white  shadow-lg rounded mb-5" style="background-color: #4F788D">
					<form method="post" action="adding_incomes.php">
						
						<div class="text-center h4 pb-3">Dodaj przychód</div>
					
						<div class="col-sm-12 col-lg-5 p-2 float-left">
							<div class="h5 border-bottom rounded">Przychód	</div>
							<div class="col-md-10">
									<div class="form-group">
										<div class="col">
											<label for="amount">Podaj kwotę: </label>
										</div>
										<div class="col-md-7 col-lg-12">
											<input type="number" name="amount"  id="amount" step=0.01 class="form-control" placeholder="kwota" required>
										</div>
									</div>
									<div class="form-group">
										<div class="col">
											<label for="date"> Data: </label>
										</div>
										<div class="col-md-7 col-lg-12">
											<input type="date" name="date" id="date"  class="form-control"  required>
										</div>
									</div>
							</div>	
						</div>
						<div class=" col-md-12 col-lg-6 p-2 float-left">
							<div class="h5 border-bottom rounded">Kategoria</div>
								<div class="col-lg-12 float-left" >
									<div class="form-check">
										<div>
											<input type="radio" name="category" value="Wynagrodzenie" class="form-check-input" required> Wynagrodzenie
										</div>
									</div>
									<div class="form-check">
										<div>
											<input type="radio" name="category" value="Odsetki bankowe" class="form-check-input" required> Odsetki bankowe
										</div>
									</div>
									<div class="form-check">
										<div>
											<input type="radio" name="category" value="Allegro" class="form-check-input" required> Sprzedaż na Allegro
										</div>
									</div>
									<div class="form-check">
										<input type="radio" name="category"  value="Inne" class="form-check-input" required> Inne przychody
										<div class="form-group mt-2"> 
											<textarea name="comment" class="form-control" rows="1"></textarea>
										</div>
									</div>
								</div>
							</div>
							<div class=" float-right mb-3">
								<button class="tlo2 btn btn-primary float-right ml-4 hoverable" type="submit" name="submit" value="cancel" formnovalidate>Anuluj</button>
								
								<button class="tlo2 btn btn-primary float-right ml-4 hoverable" type="submit" name="submit"  id="myBtn">Dodaj</button>
								
								
								

<!-- The Modal -->


  <!-- Modal content -->
 
    
    
  


								
								
							</div>
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

	
 
   
  </body>
  <script src="script.js"></script>
</html>