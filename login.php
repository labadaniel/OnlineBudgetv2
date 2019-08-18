<?php
	session_start ();
	require_once "connect.php";
	
	
	
	if($_SESSION['user_logedin'])
	{
		header('location: main.php');
		exit();
	}
	
	$_SESSION['user_logedin'] = false;
	
	$connectionSQL = new mysqli($host, $db_user, $db_password, $db_name);
	
	try
	{
		if($connectionSQL->connect_errno !=0)
		{
			throw new exception (mysqli_connect_errno);
			
			
		}
		else
		{
			$email = $_POST['email'];
			$password = $_POST['password'];
			
			if($result = @$connectionSQL->query(sprintf("SELECT * FROM users WHERE email='%s'",
			mysqli_real_escape_string($connectionSQL, $email))))
			{
				$ilu_userow = $result->num_rows;
				if($ilu_userow>0)
				{
					$user_row = $result->fetch_assoc();
					if(password_verify($password, $user_row['password']))
					{
						$_SESSION['user_logedin'] = true;
						unset($_SESSION['blad']);
						$result->free_result();
						header('location: main.php');	
					
					}
					else
					{
						$_SESSION['blad'] = '<span style="color:red">Nieprawidłowy login lub hasło</span>';
						header('location: index.php');
					}
				}
				else
				{
					$_SESSION['blad'] = '<span style="color:red">Nieprawidłowy login lub hasło</span>';
					header('location: index.php');
				}
			
			}else
			{
				throw new Exception ($connectionSQL->error);
			}
		}
		
	}
	catch (exception $e)
	{
		echo '<span style="color:red;">Błąd serwera. Przepraszamy za niedogodności i prosimy o rejestrację w innym terminie</span>';
		echo '<br /> Informacja deweloperska: '.$e;
	}
	$connectionSQL->close();
?>
