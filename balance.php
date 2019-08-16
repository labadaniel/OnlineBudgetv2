<!doctype html>
<html lang="PL">
  <head>
    <title>Personal Budget</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="style.css">
 
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
  <script  src="script.js"></script>
	<script src="https://www.gstatic.com/charts/loader.js"></script>
  </head>
  <body onload="drawPieChart()">
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
					<a class="nav-link" href="#">Dodaj przychód</a>
				</li>
				
				<li class="nav-item px-3 ">
					<a class="nav-link" href="expense.html">Dodaj wydatek</a>
				</li>
				
				<li class="nav-item px-3 ">
					<a class="nav-link" href="balance.html">Przeglądaj bilans</a>
				</li>
				
				<li class="nav-item px-3 ">
					<a class="nav-link" href="#">Ustawienia</a>
				</li>
				
				<li class="nav-item px-3 ">
					<a class="nav-link" href="login.html">Wyloguj się</a>
				</li>
			</ul>
		</div>
	</nav>
	
	<main class="d-block tlo1" style="height: 100%;">
		<div class="container-fluid no-gutters pt-4  " >
			
			<div class="row " style="min-height:400px" >
				<div class=" col-lg-8 col-md-8 col-sm-8 col-7 d-inline-block">
					<div class="col-lg-5 pt-2  mt-3 ml-3 pb-2 text-white  shadow-lg rounded d-inline-block" style="background-color: #4F788D">
						<p class="text-center h4">Przychody</p>
					</div>
					
					<div class="col-lg-5 pt-2  pb-2 ml-3 mt-3 text-white  shadow-lg rounded d-inline-block" style="background-color: #4F788D">
						<p class="text-center h4">Wydatki</p>
					</div>
				</div>
				
				<div class=" col-lg-3 col-md-3 col-sm-3 col-3  pb-2 ml-1 mt-2 justify-content-center dropdown d-inline-block">
					<button type="button" class="btn dropdown-toggle btn-primary tlo2" data-toggle="dropdown">
						Wybierz datę
					</button>
					<div class="col dropdown-menu shadow-lg text-white" style="background-color: #4F788D">
						<div class="form-check mx-2">
							<input type="radio" class="form-check-input" name="period">
							<label class="form-check-label">Bieżący miesiąc</label>
						</div>
						<div class="form-check mx-2">
							<input type="radio" class="form-check-input" name="period">
							<label class="form-check-label">Poprzedni miesiąc</label>
						</div>
						<div class="form-check mx-2">
							<input type="radio" class="form-check-input" name="period">
							<label class="form-check-label">Bieżący rok</label>
						</div>
						<div class="form-check mx-2">
							<input type="radio" class="form-check-input" name="period">
							<label class="form-check-label">Niestandardowy okres:</label>
						</div>
						<div class="form-group mt-1"> 
							<label for="fromDate" class="col px-1"> Od kiedy</label>
							<input type="date" name="date"  id="fromDate" class="form-control w-75 mx-auto col-9" required>
						</div>
						<div class="form-group"> 
							<label for="toDate" class="col  px-1"> Do kiedy</label>
							<input type="date" name="date"  id="toDate" class="form-control w-75 mx-auto  col-9" required>
						</div>
						
						<div class="float-right mt-1 mr-2 ">
							<button type="button" class="btn btn-primary tlo2" >
								Pokaz
							</button>
						</div>
					</div>
					<div class="mt-4 " id="piechart">
					</div>
					
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