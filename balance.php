<?php
	
	session_start();
	
	if(!isset($_SESSION['user_logedin']))
	{
		header('location: index.php');
	}
	
	function show_table($result)
	{
		echo '<table class="table">
					<thead>
						<tr>
							  <th scope="col">#</th>
							  <th scope="col">Kategoria</th>
							  <th scope="col">Wartość</th>
						</tr>
					</thead>
					<tbody>';
		$no_records = 0;
		$sum = 0;
		while($rows = $result->fetch_assoc())
		{
			++$no_records; 
			$i = 1;
			echo '<tr><th scope="row">'.$no_records.'</th>';
			foreach($rows as $row)
			{
				if($i ==2)
				{
					echo '<td>'.$row.' zł </td>';
					$sum += $row;
				}
				else
					echo '<td>'.$row.'</td>';
				$i++;
			}
			echo '</tr>';
		}
		echo '</tbody></table>';
		echo '<div class="h6">Całkowita wartość: '.number_format($sum, 2, ".", " ").' zł</div>';
	}
	
	function show_expenses($date)
	{	
		require "connect.php";
		$connection_sql = new mysqli($host, $db_user, $db_password, $db_name);
		try
		{
			if($connection_sql->connect_errno !=0)
			{
				throw new exception (mysqli_connect_errno);
			}else
			{	
				$id = $_SESSION['logged_user_id'];
				if($result = $connection_sql->query("SELECT expuser.name, SUM(exp.amount)
															FROM expenses  AS exp
															INNER JOIN expenses_category_assigned_to_users AS expuser
															WHERE expuser.id = exp.expense_category_assigned_to_user_id
															AND exp.user_id = '$id'
															AND exp.date_of_expense LIKE '%$date%'
															GROUP BY expuser.name
															ORDER BY exp.date_of_expense DESC"))
				{
					show_table($result);
					$result->close();
				}
			}
		}
		catch(exception $e)
		{
			echo $e->getMessage();
			echo '<span style="color:red;">Błąd serwera. Przepraszamy za niedogodności i prosimy o rejestrację w innym terminie</span>';
			echo '<br /> Informacja deweloperska: '.$e;
		}
		$connection_sql->close();
	}
	function show_incomes($date)
	{	
		require "connect.php";
		$connection_sql = new mysqli($host, $db_user, $db_password, $db_name);
		try
		{
			if($connection_sql->connect_errno !=0)
			{
				throw new exception (mysqli_connect_errno);
			}else
			{	
				$id = $_SESSION['logged_user_id'];
				if($result = $connection_sql->query("SELECT incuser.name, SUM(inc.amount)
															FROM incomes  AS inc
															INNER JOIN incomes_category_assigned_to_users AS incuser
															WHERE incuser.id = inc.income_category_assigned_to_user_id
															AND inc.user_id = '$id'
															AND inc.date_of_income LIKE '%$date%'
															GROUP BY incuser.name
															ORDER BY inc.date_of_income DESC"))
				{
					show_table($result);
					$result->close();
				}
			}
		}
		catch(exception $e)
		{
			echo $e->getMessage();
			echo '<span style="color:red;">Błąd serwera. Przepraszamy za niedogodności i prosimy o rejestrację w innym terminie</span>';
			echo '<br /> Informacja deweloperska: '.$e;
		}
		$connection_sql->close();
	}
	
	function show_incomes_user_period($date1, $date2)
	{	
		require "connect.php";
		$connection_sql = new mysqli($host, $db_user, $db_password, $db_name);
		try
		{
			if($connection_sql->connect_errno !=0)
			{
				throw new exception (mysqli_connect_errno);
			}else
			{	
				$id = $_SESSION['logged_user_id'];
				if($result = $connection_sql->query("SELECT incuser.name, SUM(inc.amount)
															FROM incomes  AS inc
															INNER JOIN incomes_category_assigned_to_users AS incuser
															WHERE incuser.id = inc.income_category_assigned_to_user_id
															AND inc.user_id = '$id'
															AND inc.date_of_income >= '$date1'
															AND inc.date_of_income <= '$date2'
															GROUP BY incuser.name
															ORDER BY inc.date_of_income DESC"))
				{
					show_table($result);
					$result->close();
				}
			}
		}
		catch(exception $e)
		{
			echo $e->getMessage();
			echo '<span style="color:red;">Błąd serwera. Przepraszamy za niedogodności i prosimy o rejestrację w innym terminie</span>';
			echo '<br /> Informacja deweloperska: '.$e;
		}
		$connection_sql->close();
	}
	function show_expenses_user_period($date1, $date2)
	{	
		require "connect.php";
		$connection_sql = new mysqli($host, $db_user, $db_password, $db_name);
		try
		{
			if($connection_sql->connect_errno !=0)
			{
				throw new exception (mysqli_connect_errno);
			}else
			{	
				$id = $_SESSION['logged_user_id'];

				if($result = $connection_sql->query("SELECT expuser.name, SUM(exp.amount)
															FROM expenses  AS exp
															INNER JOIN expenses_category_assigned_to_users AS expuser
															WHERE expuser.id = exp.expense_category_assigned_to_user_id
															AND exp.user_id = '$id'
															AND exp.date_of_expense >= '$date1'
															AND exp.date_of_expense <= '$date2'
															GROUP BY expuser.name
															ORDER BY exp.date_of_expense DESC"))
				{
					show_table($result);
					$result->close();
				}
			}
		}
		catch(exception $e)
		{
			echo $e->getMessage();
			echo '<span style="color:red;">Błąd serwera. Przepraszamy za niedogodności i prosimy o rejestrację w innym terminie</span>';
			echo '<br /> Informacja deweloperska: '.$e;
		}
		$connection_sql->close();
	}
	
	if(isset($_POST['balance']))
	{
		switch($_POST['balance'])
		{
			case "current_month":
				$_SESSION['current1'] = true;
				$_SESSION['current2'] = true;
				break;
			case "previouse_month":
				$_SESSION['previous1'] = true;
				$_SESSION['previous2'] = true;
				break;
			case "current_year":
				$_SESSION['year1'] = true;
				$_SESSION['year2'] = true;
				break;
			case "user_period":
				$_SESSION['user_period1'] = true;
				$_SESSION['user_period2'] = true;
				break;
		}		
	}
?>

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
	
	<main class="d-block tlo1" style="height: 100%;">
		<div class="container-fluid no-gutters pt-4  " >
			
			<div class="row " >
				<div class=" col-lg-8 col-md-8 col-sm-8 col-7 ">
					<div class="col-lg-5 pt-2  mt-3 ml-3 pb-2 text-white  shadow-lg rounded d-inline- float-left" style="background-color: #4F788D; min-height:400px">
						<p class="text-center h4" >Przychody</p>
						
						<?php
							
							$id = $_SESSION['logged_user_id'];
							if(isset($_SESSION['current1']))
							{
								$date = date('Y-m');
								echo  '<div class="text-center"><u>'.date('F').'</u></div>';
								show_incomes($date);								
								unset($_SESSION['current1']);
							}
							if(isset($_SESSION['previous1'] ))
							{
								$date = date('Y-m', strtotime('-1 month'));
								show_incomes($date);
								unset($_SESSION['previous1']);
							}
							if(isset($_SESSION['year1'] ))
							{
								$date = date('Y');
								show_incomes($date);
								unset($_SESSION['year1']);
							}
							if(isset($_SESSION['user_period1'] ))
							{
								$_SESSION['date1'] = $_POST['from_date'];
								$_SESSION['date2']  = $_POST['to_date'];
								show_incomes_user_period($_SESSION['date1'], $_SESSION['date2']);
								unset($_SESSION['user_period1']);
							}
						?>
					</div>
					
					<div class="col-lg-5 pt-2  pb-2 ml-3 mt-3 text-white  shadow-lg rounded d-inline-block" style="background-color: #4F788D; min-height:400px">
						<p class="text-center h4">Wydatki</p>
						<?php
						
							$id = $_SESSION['logged_user_id'];
							if(isset($_SESSION['current2']))
							{
								$date = date('Y-m');
								echo  '<div class="text-center"><u>'.date('F').'</u></div>';
								show_expenses($date);								
								unset($_SESSION['current2']);
							}
							if(isset($_SESSION['previous2'] ))
							{
								$date = date('Y-m', strtotime('-1 month'));
								show_expenses($date);
								unset($_SESSION['previous2']);
							}
							if(isset($_SESSION['year2'] ))
							{
								$date = date('Y');
								show_expenses($date);
								unset($_SESSION['year2']);
							}
							if(isset($_SESSION['user_period2'] ))
							{
								$_SESSION['date1'] = $_POST['from_date'];
								$_SESSION['date2']  = $_POST['to_date'];
								show_expenses_user_period($_SESSION['date1'], $_SESSION['date2']);
								unset($_SESSION['user_period2']);
							}
						?>
					</div>
				</div>
				
				<div class=" col-lg-3 col-md-3 col-sm-3 col-3  pb-2 ml-1 mt-2 justify-content-center dropdown d-inline-block">
					<button type="button" class="btn dropdown-toggle btn-primary tlo2" data-toggle="dropdown">
						Wybierz datę
					</button>
					<div class="col dropdown-menu shadow-lg text-white" style="background-color: #4F788D">
						<form  method="post">
							<div class="form-check mx-2">
								<input type="radio" class="form-check-input" name="balance" value="current_month" required>
								<label class="form-check-label">Bieżący miesiąc</label>
							</div>
							<div class="form-check mx-2">
								<input type="radio" class="form-check-input" name="balance" value="previouse_month" required>
								<label class="form-check-label">Poprzedni miesiąc</label>
							</div>
							<div class="form-check mx-2">
								<input type="radio" class="form-check-input" name="balance" value="current_year" required>
								<label class="form-check-label">Bieżący rok</label>
							</div>
							<div class="form-check mx-2">
								<input type="radio" class="form-check-input" name="balance" value="user_period" required>
								<label class="form-check-label">Niestandardowy okres:</label>
							</div>
							<div class="form-group mt-1"> 
								<label for="fromDate" class="col px-1"> Od kiedy</label>
								<input type="date" name="from_date"  id="fromDate" class="form-control w-75 mx-auto col-9">
							</div>
							<div class="form-group"> 
								<label for="toDate" class="col  px-1"> Do kiedy</label>
								<input type="date" name="to_date"  id="toDate" class="form-control w-75 mx-auto  col-9">
							</div>
							
							<div class="float-right mt-1 mr-2 ">
								<button  type="submit" class="btn btn-primary tlo2" >
									Pokaz
								</button>
							</div>
						</form>
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