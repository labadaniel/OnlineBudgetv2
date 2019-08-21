<!doctype html>
<html lang="PL">
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
  <body onload="currentDate()"  class="d-flex flex-column">
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
					<a class="nav-link" href="logout.php">Wyloguj się</a>
				</li>
			</ul>
		</div>
	</nav>
	
	<main class="d-block tlo1" style="height: 100%;">
		<div class="container-fluid no-gutters pt-2  " >
			
			<div class="row justify-content-center mt-2 mb-2" >
			
				<div class="col-9 pt-1  pb-1 text-white  shadow-lg rounded mb-5" style="background-color: #4F788D">
					<form method="post" action="adding_expenes.php">
						
						<div class="text-center h4 pb-3">Dodaj wydatek</div>
					
						<div class="col-sm-12 col-lg-5 p-2 float-left">
							<div class="h5 border-bottom rounded">Wydatek	</div>
							<div class="col-md-10">
									<div class="form-group">
										<div class="col">
											<label for="amount">Podaj kwote: </label>
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
							<div class="h5 border-bottom rounded">Sposób płatności</div>
							<div class=" col-md-2 pt-1">
								<div class="form-check">
									<div >
										<input type="radio" name="method" class="form-check-input" value="Cash" required> Gotówka
									</div>
								</div>
								<div class="form-check">
									<div>
										<input type="radio" name="method" class="form-check-input" value="Debit Card" required> Karta debetowa
									</div>
								</div>
								<div class="form-check">
									<div>
										<input type="radio" name="method" class="form-check-input" value="Credit card" required> Karta kredytowa
									</div>
								</div>
							</div>
						</div>
						<div class=" col-md-12 col-lg-6 float-left">
							<div class="h5 border-bottom rounded">Kategoria</div>
							<div class="col-lg-5 float-left">
								<div class="form-check">
										<input type="radio" name="category" value="Food" class="form-check-input" required> Jedzenie
								</div>
								<div class="form-check">
									<div>
										<input type="radio" name="category" value="Apartments" class="form-check-input" required> Mieszkanie
									</div>
								</div>
								<div class="form-check">
									<div>
										<input type="radio" name="category" value="Transport" class="form-check-input" required> Transport
									</div>
								</div>
								<div class="form-check">
									<div>
										<input type="radio" name="category" value="Telecommunication" class="form-check-input" required> Telekomunikacja
									</div>
								</div>
								<div class="form-check">
									<div>
										<input type="radio" name="category" value="Health" class="form-check-input" required> Opieka zdrowotna
									</div>
								</div>
								<div class="form-check">
									<div>
										<input type="radio" name="category" value="Hygiene" class="form-check-input" required> Higiena
									</div>
								</div>
								<div class="form-check">
									<div>
										<input type="radio" name="category" value="Kids" class="form-check-input" required> Dzieci
									</div>
								</div>
								<div class="form-check">
									<div>
										<input type="radio" name="category" value="Recreation" class="form-check-input" required> Rozrywka
									</div>
								</div>
								<div class="form-check">
									<div>
										<input type="radio" name="category" value="Trip" class="form-check-input" required> Wycieczka
									</div>
								</div>
							</div>
							<div class="col-lg-6 float-left" >
								<div class="form-check">
									<div>
										<input type="radio" name="category" value="Cloths" class="form-check-input" required> Odzież
									</div>
								</div>
								<div class="form-check">
									<div>
										<input type="radio" name="category" value="Books" class="form-check-input" required> Książki
									</div>
								</div>
								<div class="form-check">
									<div>
										<input type="radio" name="category" value="Savings" class="form-check-input" required> Oszczędności
									</div>
								</div>
								<div class="form-check">
									<div>
										<input type="radio" name="category" value="For Retirement"class="form-check-input" required> Na złotą jesień, czyli emeryturę
									</div>
								</div>
								<div class="form-check">
									<div>
										<input type="radio" name="category" value="Debt Retirement" class="form-check-input" required> Spłata długów
									</div>
								</div>
								<div class="form-check">
									<div>
										<input type="radio" name="category" value="Gift" class="form-check-input" required> Darowizna
									</div>
								</div>
								<div class="form-check">
									<div>
										<input type="radio" name="category"  value="Another" class="form-check-input" required> Inne wydatki
										<div class="form-group"> 
											<textarea name="comment" class="form-control" rows="1"></textarea>
										</div>
									</div>
								</div>
							</div>
							<div class=" float-right mb-5">
								<button class="tlo2 btn btn-primary float-right ml-4 hoverable" type="submit" name="submit" formnovalidate>Anuluj</button>
								<button class="tlo2 btn btn-primary float-right ml-4 hoverable" type="submit" name="submit">Dodaj</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		
	</main>
	
	<footer class=" tlo3  mt-auto py-3  fixed-bottom text-center">
		
			<div>
				Wszelkie prawa zastrzeżone &copy; 2019 Dziękuję za wizytę!
			</div>
	
	</footer>

	
 
   
  </body>
</html>