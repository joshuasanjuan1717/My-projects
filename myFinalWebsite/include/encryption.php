<?php
  
// Store a string into the variable which
// need to be Encrypted
//$simple_string = "joshuasanjuan";
  
// Display the original string
//echo "Original String: " . $simple_string;
  


function Encrypting($password){

// Store the cipher method
$ciphering = "AES-128-CTR";
  
// Use OpenSSl Encryption method
$iv_length = openssl_cipher_iv_length($ciphering);
$options = 0;
  
// Non-NULL Initialization Vector for encryption
$encryption_iv = '4254684614278813548';
  
// Store the encryption key
$encryption_key = "jxkiller17xd";
  
// Use openssl_encrypt() function to encrypt the data

$encryption = openssl_encrypt($password, $ciphering,
            $encryption_key, $options, $encryption_iv);

return $encryption;
}
// Display the encrypted string
//echo "Encrypted String: " . $encryption . "\n";
  
// Non-NULL Initialization Vector for decryption

  
// Use openssl_decrypt() function to decrypt the data
function Decrypting($password){

// Store the cipher method
$ciphering = "AES-128-CTR";
  
// Use OpenSSl Encryption method
$iv_length = openssl_cipher_iv_length($ciphering);
$options = 0;
  
// Non-NULL Initialization Vector for encryption
$decryption_iv = '4254684614278813548';
  
// Store the decryption key
$decryption_key = "jxkiller17xd";

   // $encryption = Encrypting($password);
$decryption=openssl_decrypt ($password, $ciphering, 
        $decryption_key, $options, $decryption_iv);

return $decryption;
}
// Display the decrypted string
//echo "Decrypted String: " . $decryption;



//$test = Encrypting("joshuasanjuan");

//echo $test;

//echo Decrypting("rwoiXd6RarP+KkXTuQ==");

  
?>