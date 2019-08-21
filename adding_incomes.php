<?php
	session_start();
	require_once "connect.php";
	$connection_sql = new mysqli($host, $db_user, $db_password, $db_name);
	
	try
	{
		if($connection_sql->connect_errno !=0)
		{
			throw new exception (mysqli_connect_errno);
		}
		else
		{
			$amount = $_POST['amount'];
			$date = date('Y-m-d',strtotime($_POST['date']));
			$category = $_POST['category'];
			$id = $_SESSION['logged_user_id'];
			$comment = $_POST['comment'];
			
			if($result = $connection_sql->query("SELECT id FROM incomes_category_assigned_to_users WHERE name = '$category' AND user_id = '$id'"))
			{
				$row = $result->fetch_assoc();
				$id_category = $row['id'];
				$result->free_result();
			}
			$connection_sql->query("INSERT INTO incomes VALUES (NULL, '$id', '$id_category',  '$amount', '$date', '$comment')");
			header("location: main.php");
		}
	}
	catch (exception $e)
	{
		echo $e->getMessage();
		echo '<span style="color:red;">Błąd serwera. Przepraszamy za niedogodności i prosimy o rejestrację w innym terminie</span>';
		echo '<br /> Informacja deweloperska: '.$e;
	}
	$connection_sql->close();

?>