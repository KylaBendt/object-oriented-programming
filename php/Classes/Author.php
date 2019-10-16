<?php
namespace KylaBendt\ObjectOrientedProgramming;

require_once("autoload.php");
require_once(dirname(__DIR__) ."/vendor/autoload.php");
require_once("ValidateUuid.php");
require_once("ValidateDate.php");

use Ramsey\Uuid\Uuid;

/**
 * This class represents an author (who is also a user)
 *
 * @author Kyla Bendt
 * @version 0.0.1
 */

class Author  {
	use ValidateDate;
	use ValidateUuid;

//Write and document all state variables in the class

/**
 * id for this author, primary key
 * @var Uuid $authorId
 */
private $authorId;
/**
 * activation token for this author
 * @var string
 */
private $authorActivationToken;
/**
 * avatar url for this author
 * @var string
 */
private $authorAvatarUrl;
/**
 * author email for this author
 * @var string
 **/
private $authorEmail;
/**
 * author Hash: hashed & salted pw for this author
 * @var string
 **/
private $authorHash;
/**
 * author username: username for this author
 * @var string
 */
private $authorUsername;


//TODO: Write and document constructor method
/**
 * constructor for this Author
 *
 * @param string|Uuid $newAuthorId id of this author or null if a new author
 **/

public function __construct($newAuthorId) {
	try{
		$this->setAuthorId($newAuthorId);
	}
	catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
		$exceptionType = get_class($exception);
		throw(new $exceptionType($exception->getMessage(), 101, $exception));
	}
}

//TODO: Write and document an accessor/getter method for each state variable
//TODO: Write and document a mutator/setter method for each state variable

/**
 * accessor/getter method for authorId
 *
 * @return Uuid value of authorId
 **/
public function getAuthorId() : Uuid {
	return($this->authorId);
}

/**
 * mutator/setter method for authorId
 *
 * @param Uuid|string $newAuthorId new value of author id
 * @throws \RangeException if $newAuthorId is not positive
 * @throws \TypeError  $newAuthorId is not a uuid or string
 **/
public function setAuthorId($newAuthorId) : void {
	try {
		$uuid = self::validateUuid($newAuthorId);
	} catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
		$exceptionType = get_class($exception);
		throw(new $exceptionType($exception->getMessage(), 102, $exception));
	}
	//store the id
	$this->authorId = $uuid;
}


}

