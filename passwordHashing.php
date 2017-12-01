<?php
/**
 * Created by PhpStorm.
 * User: Utshaw
 * Date: 12/1/2017
 * Time: 4:34 PM
 */


function getEncryptedPass($enteredPass){
    $hashForamt = "$2y$10$";

    $salt = "iAmUtshawAndiLikePHP20";

    $hash_and_salt = $hashForamt . $salt ;

    return $encrypt_password = crypt($enteredPass, $hash_and_salt);
}


//include "db.php";
//
//echo $query = "UPDATE admin SET password = '{$encrypt_password}' ;";
//
//$rslt = mysqli_query($connect, $query);
//
//if(!$rslt){
//    mysqli_error($connect);
//}