<!DOCTYPE html> 
<head>

<meta charset="utf-8"/>
<title> Forum o psach </title> 
<link rel="stylesheet" href="styl4.css" type="text/css"/>
</head> 

<body>

   <div id="baner">
   <h1> Forum wielbicieli psów </h1> 
   
   </div> 
               
			 <div id="lewy">
			 <img src="obraz.jpg" alt="foksterier"/>
              </div>

                    <div id="prawy1">
					<h2> Zapisz się </h2>
					<div id="formularz">
						<form action="logowanie.php" method="post">
					<label> login </label>
					<input type="text" name="login" id="login"/> <br />
					<br />
					<label> hasło </label>
					<input type="password" name="password" id="password"/> <br />
					<br />
					<label> powtórz hasło </label>
					<input type="password" name="password2" id="password2"/> <br />
					<input type="submit" value="Zapisz"/>
						</form>
					</div>
                          <?php
                          
						  $server = "localhost";
						  $user = "root";
						  $password = "";
						  $dbname = "psy";

                        // utworzenie polaczenia 
						$conn = mysqli_connect($server,$user,$password,$dbname);

                        //formularz 
						if (empty($_POST['login']) || empty($_POST['password']) || empty($_POST['password2'])) {
							echo "<p>Wypelnij wszystkie pola</p>";
						}
						else {
						   $login = $_POST ['login'];
						   $password = $_POST ['password'];
						   $password2 = $_POST ['password2'];

						   $zapytanie = " SELECT login FROM uzytkownicy WHERE login like '$login' ";
						   $rezultat = mysqli_query($conn,$zapytanie);
						   $ilosc = mysqli_num_rows($rezultat);
						   if ($ilosc>0) {
							echo "<p>login wystepuje w bazie danych, konto nie zostalo dodane</p>";
						   } else if ($password !=$password) {
							echo "<p>Hasla nie sa takie same, konto nie zostalo dodane</p>";
						   } else {
							$szyfr_haslo = sha1($password);
							$send = "INSERT INTO uzytkownicy VALUES (NULL $login, $szyfr_haslo)";
							$rezultat2 = mysqli_query($conn,$send);
							if ($rezultat2) 							
							echo "<p>Konto zostalo dodane</p>";
						   }
						}



                       


						//zamkniecie polaczenia 
						mysqli_close($conn);
                     ?>

					<p> Status: </p>
					</div>
					
					     <div id="prawy2">
						 <h2> Zapraszamy wszystkich </h2>
						 <ol>
						 <li> właścicieli psów </li>
						 <li> weterynarzy </li>
						 <li> tych, co chcą kupić psa </li>
						 <li> tych, co lubią psy </li>
						 </ol>
                                <a href="regulamin.html">Przeczytaj regulamin forum</a>
                               

						 </div>
						 
						      <div id="stopka">
							  <p> Stronę wykonał: 000000000 </p>
                 			  </div>


























					
</body>