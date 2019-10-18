<?php
namespace KylaBendt\ObjectOrientedProgramming;

require_once("autoload.php");
require_once(dirname(__DIR__) ."/vendor/autoload.php");

use Ramsey\Uuid\Uuid;


/**
 * This class represents an author (who is also a user)
 *
 * @author Kyla Bendt
 * @version 0.0.1
 */

class Author  {
	use \KylaBendt\ObjectOrientedProgramming\ValidateUuid;

//Write and document all state variables in the class
//authorId, authorActivationToken, authorAvatarUrl, authorEmail, authorHash, authorUsername

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


//Write and document constructor method
/**
 * constructor for this Author
 *
 * @param string|Uuid $newAuthorId id of this author or null if a new author
 * @param string $newAuthorActivationToken activation token of this author(string len = 32)
 * @param string $newAuthorAvatarUrl avatar url of this author
 * @param string $newAuthorEmail email of this author
 * @param string $newAuthorHash hash of this author
 * @param string $newAuthorUsername username of this author
 **/

public function __construct($newAuthorId, $newAuthorActivationToken, $newAuthorAvatarUrl, $newAuthorEmail, $newAuthorHash, $newAuthorUsername) {
	try{
		$this->setAuthorId($newAuthorId);
		$this->setAuthorActivationToken($newAuthorActivationToken);
		$this->setAuthorAvatarUrl($newAuthorAvatarUrl);
		$this->setAuthorEmail($newAuthorEmail);
		$this->setAuthorHash($newAuthorHash);
		$this->setUsername($newAuthorUsername);
	}
	catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
		$exceptionType = get_class($exception);
		throw(new $exceptionType($exception->getMessage(), 101, $exception));
	}
}

//Write and document an accessor/getter method for each state variable
//Write and document a mutator/setter method for each state variable

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
	/**
	 * accessor/getter method for authorActivationToken
	 *
	 * @return string value of $authorActivationToken
	 **/
public function getAuthorActivationToken() : string {
	return($this->authorActivationToken);
}

/**
 * mutator/setter method for authorActivationToken
 *
 * @param string $newAuthorActivationToken new value of author activation token
 * @throws \InvalidArgumentException if $newAuthorActivationToken is not a string
 **/
public function setAuthorActivationToken($newAuthorActivationToken) : void {
	//verify content is secure
	$newAuthorActivationToken = trim($newAuthorActivationToken);
	$newAuthorActivationToken = filter_var($newAuthorActivationToken, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
	if(empty($newAuthorActivationToken) === true) {
		throw(new \InvalidArgumentException("author activation token is empty or insecure"));
	}

	//verify Activation token is the right length
	if(strlen($newAuthorActivationToken) != 32) {
		throw(new \RangeException("activation token is the wrong length"));
		}

	//store the activation token
	$this->authorActivationToken = $newAuthorActivationToken;
}


/**
 * accessor/getter method for authorAvatarUrl
 *
 * @return string value of $authorAvatarUrl
 **/
public function getAuthorAvatarUrl() : string {
	return($this->authorAvatarUrl);
}

/**
 * mutator/setter method for authorAvatarUrl
 *
 * @param string $newAuthorAvatarUrl new value of author avatar url
 * @throws \InvalidArgumentException if $newAuthorAvatarUrl is insecure
 **/
public function setAuthorAvatarUrl($newAuthorAvatarUrl) : void {
	//verify content is secure
	$newAuthorAvatarUrl = trim($newAuthorAvatarUrl);
	$newAuthorAvatarUrl = filter_var($newAuthorAvatarUrl,FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
	if(empty($newAuthorAvatarUrl) === true) {
		throw(new \InvalidArgumentException("author avatar url is empty or insecure"));
	}

	//store the author avatar url
	$this->authorAvatarUrl = $newAuthorAvatarUrl;
}


/**
 * accessor/getter method for authorEmail
 *
 * @return string value of $authorEmail
 **/
public function getAuthorEmail() : string {
	return($this->authorEmail);
}

/**
 * mutator/setter method for authorEmail
 *
 * @param string $newAuthorEmail new value of author email
 * @throws \InvalidArgumentException if $newAuthorEmail is insecure
 **/
public function setAuthorEmail($newAuthorEmail) : void {
	//verify content is secure
	$newAuthorEmail = trim($newAuthorEmail);
	$newAuthorEmail = filter_var($newAuthorEmail,FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
	if(empty($newAuthorEmail) === true) {
		throw(new \InvalidArgumentException("author email is empty or insecure"));
	}

	//store the author avatar url
	$this->authorEmail = $newAuthorEmail;
}

/**
 * accessor/getter method for authorHash
 *
 * @return string value of $authorHash
 **/
public function getAuthorHash() : string {
	return($this->authorHash);
}

/**
 * mutator/setter method for authorHash
 *
 * @param string $newAuthorHash new value of author hash
 * @throws \InvalidArgumentException if $newAuthorHash is not a string or is insecure
 * @throws \RangeException if $newAuthorHash is the wrong length (not 97 chars)
 **/
public function setAuthorHash($newAuthorHash) : void {
//verify content is secure
$newAuthorHash = trim($newAuthorHash);
$newAuthorHash = filter_var($newAuthorHash, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
if(empty($newAuthorHash) === true) {
	throw(new \InvalidArgumentException("author hash is empty or insecure"));
}

//verify Activation token is the right length
if(strlen($newAuthorHash) != 97) {
	throw(new \RangeException("hash is the wrong length"));
}

//store the hash
$this->authorHash = $newAuthorHash;
}

/**
 * accessor/getter method for authorUsername
 *
 * @return string value of $authorUsername
 **/
public function getAuthorUsername() : string {
	return($this->authorUsername);
}

/**
 * mutator/setter method for authorUsername
 *
 * @param string $newAuthorUsername new value of author username
 * @throws \InvalidArgumentException if $newUsername is insecure or empty
 **/
public function setUsername($newAuthorUsername) : void {
	//verify content is secure
	$newAuthorUsername = trim($newAuthorUsername);
	$newAuthorUsername = filter_var($newAuthorUsername,FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
	if(empty($newAuthorUsername) === true) {
		throw(new \InvalidArgumentException("author username is empty or insecure"));
	}

	//store the author username
	$this->authorUsername = $newAuthorUsername;
}


/*
 * inserts info from this author into DB
 *
 * @param \PDO $pdo PDO connection object
 * @throws \PDOException when mySQL related errors occur
 * @throws \TypeError if $pdo is not a PDO connection object
 */

public function insert(\PDO $pdo) : void {

	// create query template
	$query = "INSERT INTO author(authorId, authorActivationToken, authorAvatarUrl, authorEmail, authorHash, authorUsername) VALUES(:authorId, :authorActivationToken, :authorAvatarUrl, :authorEmail, :authorHash, :authorUsername)";
	$statement = $pdo->prepare($query);

	// bind the member variables to the place holders in the template
	$parameters = ["authorId" => $this->authorId->getBytes(), "authorActivationToken" => $this->authorActivationToken, "authorAvatarUrl" =>$this->authorAvatarUrl, "authorEmail" => $this->authorEmail, "authorHash" => $this->authorHash, "authorUsername" => $this->authorUsername];
	$statement->execute($parameters);
}


/*
 * updates this Author in mySQL
 *
 * @param \PDO $pdo PDO connection object
 * @throws \PDOException when mySQL related errors occur
 * @throws \TypeError if $pdo is not a PDO connection object
 */

public function update(\PDO $pdo, $tweetId) : void {
	//create query template
	$query = " UPDATE author SET authorActivationToken = :authorActivationToken, authorAvatarUrl = :authorAvatarUrl, authorEmail = :authorEmail, authorHash = :authorHash , authorUsername = :authorUsername WHERE authorId = :authorID";
	$statement = $pdo->prepare($query);

	//bind member variable to placeholders
	$parameters = ["authorId" => $tweetId.getBytes(), "authorActivationToken" => $this->authorActivationToken, "authorAvatarUrl" =>$this->authorAvatarUrl, "authorEmail" => $this->authorEmail, "authorHash" => $this->authorHash, "authorUsername" => $this->authorUsername];
	$statement->execute($parameters);
}

/*
 * deletes this Author in mySQL
 *
 * @param \PDO $pdo PDO connection object
 * @throws \PDOException when mySQL related errors occur
 * @throws \TypeError if $pdo is not a PDO connection object
 */

public function delete(\PDO $pdo) : void {
	//create query template
	$query = "DELETE FROM author WHERE authorId = :authorID";
	$statement = $pdo->prepare($query);

	//bind member variable to placeholder
	$parameters = ["authorId" => $this->authorId->getBytes()];
	$statement->execute($parameters);
}

/*
 * gets author by email
 *
 * @param \PDO $pdo PDO connection object
 * @param string $authorEmail author email
 * @throws \PDOException when mySQL related errors occur
 * @throws \TypeError if $pdo is not a PDO connection object
 * @throws \InvalidArgumentException if $authorEmail is empty or insecure
 */

public static function getAuthorByEmail(\PDO $pdo, $authorEmail) : ?Author {
	//verify content is secure
	$authorEmail = trim($authorEmail);
	$authorEmail = filter_var($authorEmail,FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
	if(empty($authorEmail) === true) {
		throw(new \InvalidArgumentException("author username is empty or insecure"));
	}

	//create query template
	$query = "SELECT authorId, authorActivationToken, authorAvatarUrl, authorEmail, authorHash, authorUsername WHERE authorEmail = :authorEmail";
	$statement = $pdo->prepare($query);

	//bind the author email to placeholder
	$parameters = ["authorEmail" => $authorEmail];
	$statement->execute($parameters);

	//grab the author from MySQL
	try {
		$author = null;
		$statement->setFetchMode(\PDO::FETCH_ASSOC);
		$row = $statement->fetch();
		if($row !== false) {
			$author = new Author($row["authorId"], $row["authorActivationToken"], $row["authorAvatarUrl"], $row["authorEmail"], $row["authorHash"], $row["authorUsername"] );
		}
	} catch (\Exception $exception) {
		//if the row couldn't be converted, rethrow it
		throw(new \PDOException($exception->getMessage(), 0, $exception));
	}
	 return($author);
}

//TODO: Write and document a getFooByBar method that returns a full array

}

