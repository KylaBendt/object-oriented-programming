<?php
require_once("../Classes/Author.php");
use KylaBendt\ObjectOrientedProgramming\Author;

$authorObject = new Author('bb10b8ac-92e2-4085-aa2d-54d1dcc9a97d', '987udufjroek49385udjr83ujclvmnb0', "www.authoravatarurl.com", "author@kmail.com", "987udufjroek49385udjr83ujclvmnb0987udufjroek49385udjr83ujclvmnb0987udufjroek49385udjr83ujclvmnb09", "bestauthorever43");

echo("Author ID: ");
echo($authorObject->getAuthorId());
echo(" Author Activation Token: ");
echo($authorObject->getAuthorActivationToken());
echo(" Author Avatar url: ");
echo($authorObject->getAuthorAvatarUrl());
echo(" Author email: ");
echo($authorObject->getAuthorEmail());
echo(" Author hash: ");
echo($authorObject->getAuthorHash());
echo(" Author username: ");
echo ($authorObject->getAuthorUsername());


