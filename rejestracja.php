<?php

	session_start();

	if (isset($_POST['email']))
	{
		$a_ok=true;

		$nick = $_POST['nick'];
		$haslo = $_POST['haslo'];
		$phaslo = $_POST['phaslo'];
		$email = $_POST['email'];
		$emailB = filter_var($email, FILTER_SANITIZE_EMAIL);

		if((strlen($nick)<5) || (strlen($nick)>15))
		{
			$a_ok=false;
			$_SESSION['zly_nick']="Nic musi posiadać od 5 do 15 znaków";
		}

		

		if((filter_var($emailB, FILTER_VALIDATE_EMAIL)==false) || ($emailB!=$email))
		{
			$a_ok=false;
			$_SESSION['zly_email']="Podaj poprawny adres email";
		}

		if(strlen($haslo)<6)
		{
			$a_ok=false;
			$_SESSION['zly_haslo']="Hasło nie może mieć mniej niż 6 znaków";
		}

		if($haslo!=$phaslo)
		{
			$a_ok=false;
			$_SESSION['zly_phaslo']="Hasła muszą być takie same";

		}

		require_once "connect.php";
		mysqli_report(MYSQLI_REPORT_STRICT);

		try
		{
			$polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
			if($polaczenie->connect_errno!=0)
			{
				throw new Exception(mysql_connect_erno());
			}
			else
			{

				$wynik = $polaczenie->query("SELECT id FROM uzytkownicy WHERE email='$email'");
				if(!$wynik) throw new Exception($polaczenie->error);

				$ilosce=$wynik->num_rows;
				if($ilosce>0)
				{
					$a_ok=false;
					$_SESSION['zly_email']="Podany email został już użyty";

				}
				$wynik = $polaczenie->query("SELECT id FROM uzytkownicy WHERE Nick='$nick'");
				if(!$wynik) throw new Exception($polaczenie->error);

				$iloscn=$wynik->num_rows;
				if($iloscn>0)
				{
					$a_ok=false;
					$_SESSION['zly_nick']="Podany nick został już użyty";

				}

				if($a_ok==true)
					{	
						if($polaczenie->query("INSERT INTO uzytkownicy VALUES(NULL, '$nick', '$haslo','$email')"))
							{
								$_SESSION['rejestracjaok']=true;
								header('Location: index.html');
							}
							else
							{
								throw new Exception($polaczenie->error);
							}

					}

				$polaczenie->close();
			}

		}
		catch(Exception $e)
		{
			echo '<span style="color:red;">Błąd serwera! Przepraszamy za niedogodności i prosimy o rejestrację w innym terminie!</span>';
			echo '<br />Informacja developerska: '.$e;
		}

	}


?>

<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Osadnicy - załóż darmowe konto!</title>
	<style>
		.blad
		{
			color:red;
			margin-top: 10px;
			margin-bottom: 10px;
		}

	</style>
</head>

<body>

	<form method="post">

		Nick: <br/> <input type="text" name="nick"/><br/>
		<?php 
		if (isset($_SESSION['zly_nick']))
		{
			echo'<div class="blad">'.$_SESSION['zly_nick'].'</div>';
			unset($_SESSION['zly_nick']);

		}
		?>

		E-mail: <br/> <input type="text" name="email"/><br/>
		<?php 
		if (isset($_SESSION['zly_email']))
		{
			echo'<div class="blad">'.$_SESSION['zly_email'].'</div>';
			unset($_SESSION['zly_email']);

		}
		?>

		Hasło: <br/> <input type="password" name="haslo"/><br/>
		<?php 
		if (isset($_SESSION['zly_haslo']))
		{
			echo'<div class="blad">'.$_SESSION['zly_haslo'].'</div>';
			unset($_SESSION['zly_haslo']);

		}
		?>

		Powtórz hasło: <br/> <input type="password" name="phaslo"/><br/>
		<?php 
		if (isset($_SESSION['zly_phaslo']))
		{
			echo'<div class="blad">'.$_SESSION['zly_phaslo'].'</div>';
			unset($_SESSION['zly_phaslo']);

		}
		?>


		<input type="submit" value="Załóż konto"/>