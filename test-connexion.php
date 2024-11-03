<?php
require ("connexpdo.inc.php");
require_once ("js.php");

try 
{
    $objdb = connexpdo("voiture");
} 
catch (PDOException $e) 
{
    displayException($e);
}
?>