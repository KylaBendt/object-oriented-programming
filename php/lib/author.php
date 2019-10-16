<?php
require_once("../Classes/Author.php");
use KylaBendt\ObjectOrientedProgramming\Author;

$authorObject = new Author('bb10b8ac-92e2-4085-aa2d-54d1dcc9a97d');

echo($authorObject->getAuthorId());