<?php

function alert($msg)
{
    echo "<script type='text/javascript'>alert('$msg');</script>";
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function purge($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    return $data;
}