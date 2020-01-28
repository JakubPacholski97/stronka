<?php
	
	session_start();
	
	require_once "connect.php";
	
	$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
	
	if($polaczenie->connect_errno!=0)
	{
		echo "Error:".$polaczenie->connect_errno;
	}
	else
	{
		$login = $_POST['login'];
		$haslo = $_POST['haslo'];
		
		$sql="SELECT * FROM uzytkownicy WHERE Nick='$login' AND Password='$haslo'";
		
		if($rezultat = @$polaczenie->query($sql))
		{
			$ilu_userow=$rezultat->num_rows;
			if($ilu_userow>0)
			{
				$wiersz=$rezultat->fetch_assoc();
				$_SESSION['Nick']=$wiersz['Nick'];
				
				$rezultat->close();
				header('Location: gra.php');
			}
			else
			{
				
			}
		}
		
		
		$polaczenie->close();
	}
	
?>