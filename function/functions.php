<?php
function show($data)
{

	echo "<pre>";
	print_r($data);
	echo "</pre>";

}

function escape($string)
{

    return htmlspecialchars($string);

}

function redirect($path)
{

	header("Location: ". 'http://localhost/EasyMatch-Transport/public/?action='.$path);

}