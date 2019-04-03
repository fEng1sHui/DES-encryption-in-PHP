<!DOCTYPE html>
<html>
<head>
	<title>Implementacja algorytmu kryptograficznego DES.</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
	<h1>Implementacja algorytmu kryptograficznego DES</h1>
	<div class="container">
		<div class="col-sm-8 offset-sm-2">
			<form class="form-inlin justify-content-center" action="/" method="POST">
				<div class="form-group">
					<label for="exampleInputText">Tekst do szyfrowania/deszyfrowania</label>
					<input type="text" class="form-control" id="exampleInputText" placeholder="Wpisz tekst do szyfrowania lub deszyfrowania" name="text" required>
				</div>
				<div class="form-group">
					<label for="exampleInputKey">Klucz</label>
					<input type="tekst" class="form-control" id="exampleInputKey" placeholder="Podaj klucz" name="key" required>
				</div>
				<button type="submit" class="btn btn-outline-dark padding-lf-rg" name="encrypt"><b>Szyfruj</b></button>
				<button type="submit" class="btn btn-outline-dark padding-lf-rg" name="decrypt"><b>Deszufruj</b></button>
			</form></br>
			<?php
    //funkcja szyfrowania
    function encryption($text, $key){
        $cipher = "des-ecb"; //przypisujemy nazwe naszego szyfru
        $ivlen = openssl_cipher_iv_length($cipher);
        $iv = openssl_random_pseudo_bytes($ivlen);
        $encryptedText = openssl_encrypt($text, $cipher, $key, $options=0, $iv); //funkcja zaszyfrujaca tekst
        return $encryptedText; //zwracamy zaszyfrowany tekst
    }

    //funkcja rozszyfrowania
    function decryption($text, $key){
        $cipher = "des-ecb"; //przypisujemy nazwe naszego szyfru
        $ivlen = openssl_cipher_iv_length($cipher);
        $iv = openssl_random_pseudo_bytes($ivlen);
        $decryptedText = openssl_decrypt($text, $cipher, $key, $options=0, $iv); //funkcja rozszyfrujaca zaszyfrowany tekst
        return $decryptedText; //zwracamy rozszyfrowany tekst
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $text = $_POST['text'];
        $key = $_POST['key'];
        if (isset($_POST['encrypt'])) {
            echo '<h5 class="text-center">Zaszyfrowany tekst przez algorytm DES:</h5>';
            $encryptedText = encryption($text, $key);
            echo '<div class="col border new-line">'.$encryptedText.'</div>';
        }
        else if (isset($_POST['decrypt'])) {
            echo '<h5 class="text-center">Rozszyfrowany tekst przez algorytm DES:</h5>';
            $decryptedText = decryption($text, $key);
            echo '<div class="col new-line">'.$decryptedText.'</div>';
        }
    }
?>
		</div>
	</div>
	</br></br>
</body>
</html>