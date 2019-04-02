<!DOCTYPE html>
<html>
<head>
	<title>Implementacja algorytmu kryptograficznego DES.</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	</br><h1 style="text-align:center">Implementacja algorytmu kryptograficznego DES.</h1></br></br></br></br></br></br></br></br></br></br></br></br>
	<div class="container">
		<div class="row">
			<div class="col-sm-6 offset-sm-3">
				<form class="form-inlin justify-content-center" action="index.php" method="POST">
					<div class="form-group">
						<label for="exampleInputText">Tekst do szyfrowania/deszyfrowania</label>
						<input type="text" class="form-control" id="exampleInputText" placeholder="Wpisz tekst do szyfrowania lub deszyfrowania" name="text" required>
					</div>
					<div class="form-group">
						<label for="exampleInputKey">Klucz</label>
						<input type="tekst" class="form-control" id="exampleInputKey" placeholder="Klucz" name="key" required>
					</div>
					<div class="clearfix">
					<button type="submit" class="btn btn-light" name="encrypt">Szyfruj</button>
					<button type="submit" class="btn btn-light pull-right" name="decrypt">Deszufruj</button>
					</div>
				</form>
			</div>
		</div>
	</div></br></br>

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
            echo '<p class="text-center"><b>Zaszyfrowany tekst przez algorytm DES:</b></p>';
            $encryptedText = encryption($text, $key);
            echo '<div class="container">
                        <div class="row">
                                <div class="col-2 border text-right"><b>Szyfrowany tekst: </b></div>
                                <div class="col border">'.$encryptedText.'</div>
                        </div>
                    </div>';
        }
        else if (isset($_POST['decrypt'])) {
            echo '<p class="text-center"><b>Rozszyfrowany tekst przez algorytm DES:</b></p>';
            $decryptedText = decryption($text, $key);
            echo '<div class="container">
                      <div class="row">
                        <div class="col-2 border text-right"><b>Rozszyfrowany tekst: </b></div>
                        <div class="col border">'.$decryptedText.'</div>
                      </div>';
        }
    }
?>

</body>
</html>