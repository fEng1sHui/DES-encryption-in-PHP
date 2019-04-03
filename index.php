<!DOCTYPE html>
<html>
<head>
	<title>Implementacja algorytmu kryptograficznego DES.</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<h1 style="text-align:center; margin-top:30px; margin-bottom:300px;">Implementacja algorytmu kryptograficznego DES</h1>
	<div class="container">
		<div class="col-sm-8 offset-sm-2">
			<form class="form-inlin justify-content-center" action="index.php" method="POST">
				<div class="form-group">
					<label for="exampleInputText" style="font-size: 20px;">Tekst do szyfrowania/deszyfrowania</label>
					<input type="text" class="form-control" id="exampleInputText" placeholder="Wpisz tekst do szyfrowania lub deszyfrowania" name="text" required>
				</div>
				<div class="form-group">
					<label for="exampleInputKey" style="font-size: 20px;">Klucz</label>
					<input type="tekst" class="form-control" id="exampleInputKey" placeholder="Podaj klucz" name="key" required>
				</div>
				<button type="submit" class="btn btn-outline-dark" name="encrypt" style="padding-left: 144px; padding-right: 144px;"><b>Szyfruj</b></button>
				<button type="submit" class="btn btn-outline-dark" name="decrypt" style="padding-left: 144px; padding-right: 144px;"><b>Deszufruj</b></button>
			</form>
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
            echo '  <div class="container">
						<div class="col-sm-8 offset-sm-2">
	                        <div class="col border" style="overflow-wrap: break-word;
    word-wrap: break-word;
    -ms-word-break: break-all;
    word-break: break-all;
    word-break: break-word;
    -ms-hyphens: auto;
    -moz-hyphens: auto;
    -webkit-hyphens: auto;
    hyphens: auto;
    display: inline-block; 
    vertical-align: middle
    margin-top: 0px;
    ">'.$encryptedText.'</div>
	                    </div>
                  	</div></br></br></br>';
        }
        else if (isset($_POST['decrypt'])) {
            echo '<p class="text-center"><b>Rozszyfrowany tekst przez algorytm DES:</b></p>';
            $decryptedText = decryption($text, $key);
            echo '  <div class="container">
						<div class="col-sm-8 offset-sm-2">
	                        <div class="col border" style="overflow-wrap: break-word;
    word-wrap: break-word;
    -ms-word-break: break-all;
    word-break: break-all;
    word-break: break-word;
    -ms-hyphens: auto;
    -moz-hyphens: auto;
    -webkit-hyphens: auto;
    hyphens: auto;
    display: inline-block; 
    vertical-align: middle
    margin-top: 0px;
    ">'.$decryptedText.'</div>
	                    </div>
                  	</div></br></br></br>';
        }
    }
?>

</body>
</html>