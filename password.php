<?php
$password= '123wpw#OK';

//password hash
$hash= password_hash($password,PASSWORD_DEFAULT,['COST'=>10] );
echo $hash;
//password verify
if (password_verify($password, $hash)){

}
?>