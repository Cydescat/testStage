<?php

function createClass($file, $name)
{
    $class = file_get_contents('class/exampleClass.txt');
    $arrValues =
    [
        '{{exampleClass}}' => $name
    ];
    
    fwrite($file, strtr($class, $arrValues));
}

function __autoload($toto)
{
    $dir = 'class/' . $toto . '.php';
    if(file_exists($dir))
        require_once $dir;
    else
    {
        createClass(fopen($dir, "w"), $toto);
        require_once $dir;
    }
}