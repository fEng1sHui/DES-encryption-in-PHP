## Simple website with cipher function DES

- [PHP encryption function](https://www.php.net/manual/en/function.openssl-encrypt.php).
- [PHP decryption function](https://www.php.net/manual/en/function.openssl-decrypt.php).
- [All available cipher methods](https://www.php.net/manual/en/function.openssl-get-cipher-methods.php).

For changing cipher you need to change line with $cipher = "des-ecb". Use openssl_get_cipher_methods() to see all available cipher methods.