<?php
require_once("../Classes/Author.php");
use KylaBendt\ObjectOrientedProgramming\Author;

$authorObject = new Author('bb10b8ac-92e2-4085-aa2d-54d1dcc9a97d', '987udufjroek49385udjr83udjclvmnb');

echo("Author ID: ");
echo($authorObject->getAuthorId());
echo(" Author Activation Token: ");
echo($authorObject->getAuthorActivationToken());