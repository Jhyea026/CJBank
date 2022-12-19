<?php

try
{
    $connection = new PDO('mysql:host=localhost;dbname=cjBank_DB', 'root', '');

}

catch(PDOException $ex)

{
    echo 'Unable to connect';
}
    
?>