<?php
	session_start();
	
	if(isset($_POST['username']))
	{
		$validated = true;
		
		//spradzamy imie
		$username = $_POST['username'];
		if(ctype_alnum($username)==false)
		{
			$validated = false;
			$_SESSION['e_username'] = "Nazwa użytkownika musi składać się tylko z liter i cyfr (bez polskich znaków).";
		}
		
		if(strlen($username) <3 || strlen($username)>10)
		{
			$validated = false;
			$_SESSION['e_username'] = "Nazwa użytkownika musi posiadać od 3 do 10 znaków!";
		}
		
		//sprawdzamy email
		$email = $_POST['email'];
		$email2 = filter_var($email, FILTER_SANITIZE_EMAIL);
		
		if(filter_var($email2, FILTER_VALIDATE_EMAIL)==false || $email2!=$email)
		{
			$validated = false;
			$_SESSION['e_email'] = "Podaj poprawny adres email.";
		}
		
		//sprawdzamy poprawnosc hasla
		$password1 = $_POST['password1'];
		$password2 = $_POST['password2'];
		$hashedPassword = password_hash($password1, PASSWORD_DEFAULT);
		
		if(strlen($password1)<8 || strlen($password1)>20)
		{
			$validated = false;
			$_SESSION['e_password'] = "Hasło musi składać się od 8 do 20 znaków";
		}
		if($password1!=$password2)
		{
			$validated = false;
			$_SESSION['e_password'] = "Podane hasła nie są identyczzne";
		}
		
		require_once "connect.php";
		
		mysqli_report(MYSQLI_REPORT_STRICT);
		
		try
		{
			$connectionSQL = new mysqli($host, $db_user, $db_password, $db_name);
			
			if($connectionSQL->connect_errno !=0)
			{
				throw new exception (mysqli_connect_errno);
			}
			else
			{
				
				//czy istnieje email w bazie danych
				$result = $connectionSQL->query("SELECT id FROM users WHERE email='$email'");
				
				if(!$result) throw new Exception ($connectionSQL->error);
				
				$numbers_emails = $result->num_rows;
				if($numbers_emails > 0)
				{
					$validated = false;
					$_SESSION['e_email'] = "Istnieje juz konto pod tym adresem email.";
				}
				
				if($validated == true)
				{
					if($connectionSQL->query("INSERT INTO users VALUES (NULL, '$username', '$email', '$hashedPassword')"))
					{
						header ('location: index.php');
					}
					else
					{
						throw new Exception ($connectionSQL->error);
					}
				}
			}
		}
		catch (exception $e)
		{
			echo '<span style="color:red;">Błąd serwera. Przepraszamy za niedogodności i prosimy o rejestrację w innym terminie</span>';
			echo '<br /> Informacja deweloperska: '.$e;
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
	<link rel="stylesheet" href="C:\xampp\htdocs\Personal_Budget_Online/style.css">
 
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
			
				<div class="col-4 p-4  text-white  h4 shadow-lg rounded" style="background-color: #4F788D">
					<p class="text-center">Rejestracja</p>
					<form class="h6 pt-2" method="post">
						<div class="form-group">
							<div class="col-5">
								<label for="text">Podaj swoje imie: </label>
							</div>
						
							<div class="col-12">
								<input type="text" id="text" class="form-control" name="username" placeholder="Twoje imie">
							</div>
							<?php
								if(isset($_SESSION['e_username']))
								{
									echo '<div class="col-12 blad" style="color: red;">'.$_SESSION['e_username'].'</div>';
									unset($_SESSION['e_username']);
								}
							?>
						</div>
						
						<div class="form-group">
							<div class="col-5">
								<label for="email"> Podaj swoj email: </label>
							</div>
						
							<div class="col-12">
								<input type="text" id="email" name="email" class="form-control" placeholder="Twoj email">
							</div>
							
							<?php
								if(isset($_SESSION['e_email']))
								{
									echo '<div class="col-12 blad" style="color: red;">'.$_SESSION['e_email'].'</div>';
									unset($_SESSION['e_email']);
								}
							?>
						</div>
						
						<div class="form-group">
							<div class="col-5">
								<label for="password1"> Podaj haslo: </label>
							</div>
						
							<div class="col-12">
								<input type="password" id="password1" name="password1" class="form-control" placeholder="haslo">
							</div>
							<?php
								if(isset($_SESSION['e_password']))
								{
									echo '<div class="col-12 blad" style="color: red;">'.$_SESSION['e_password'].'</div>';
									unset($_SESSION['e_password']);
								}
							?>
							<div class="col-5">
								<label for="password2"> Powtórz haslo: </label>
							</div>
						
							<div class="col-12">
								<input type="password" id="password2" name="password2" class="form-control" placeholder="haslo">
							</div>
							<?php
								if(isset($_SESSION['e_password']))
								{
									echo '<div class="col-12 blad" style="color: red;">'.$_SESSION['e_password'].'</div>';
									unset($_SESSION['e_password']);
								}
							?>
						</div>
						<button type="submit" class="tlo2 btn btn-primary float-right ml-5 hoverable" >Dodaj konto</button>
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