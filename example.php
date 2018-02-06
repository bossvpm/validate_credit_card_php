<?php 
require('CreditCard.php');
$card = new CreditCard;
$card->validateInput('4995347179697655');
echo $card->outputMessage;
// Other valid credit card number examples: 4324570061470939, 5353789601317274, 4438467573682759, 6011823331534684
// Invalid card number examples: 4589458945894589, 7598759875987598, 2486245624562456
?>