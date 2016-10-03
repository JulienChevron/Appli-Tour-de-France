<?php

include('formatage.php');


$str ='ffze  - ---- fez fezfze fez';
$nom ='    ----- - -- - éz --- ------ -    -------  fnzoejfnpez ';
$str = formaterPrenom($str);
$nom = formaterNom($nom);
echo '<PRE>';
print_r($str . '|' .$nom);
echo '</	PRE>';

?>