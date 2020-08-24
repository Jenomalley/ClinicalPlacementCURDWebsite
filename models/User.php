<?php

/**
 * Class: User
 *
 * The user class represents the end user of the application.
 *

 */
class User extends Model
{

    //put your code here
    //class properties
    private $session;
    private $db;
    private $userID;
    private $userName;
    // private $userLastName;
    private $userType;
    private $postArray;

    //constructor
    function __construct($session, $database)
    {
	parent::__construct($session->getLoggedinState());
	$this->db = $database;
	$this->session = $session;
	//get properties from the session object
	$this->userID = $session->getUserID();
	$this->userFirstName = $session->getUserFirstName();
	$this->userLastName = $session->getUserLastName();
	$this->userType = $session->getUserType();
	$this->postArray = array();
    }

    //end METHOD - Constructor

    public function login($userID, $password)
    {
//	echo "<h1>$password</h1>";

	$password = hash('ripemd160', $password);

	$SQL1 = "SELECT " .
		DatabaseFields::UserId . ", " .
		DatabaseFields::Role .
		" FROM " . DatabaseFields::LoginTable .
		" WHERE " . DatabaseFields::UserId . "='" . $userID . "' " .
		" AND " . DatabaseFields::Password . "='$password'";


//	echo "<h1>$SQL1</h1>";
//	return;
	$resultSet1 = $this->db->query($SQL1); //query the  placement coordinator table

	if ($resultSet1 == null)
	{
	    $this->session->setLoggedinState(FALSE);
	    $this->loggedin = FALSE;
	    return FALSE;
	}
	else if ($resultSet1->num_rows === 0)
	{
	    $this->session->setLoggedinState(FALSE);
	    $this->loggedin = FALSE;
	    return FALSE;
	}
	elseif ($resultSet1->num_rows === 1)
	{
	    $row = $resultSet1->fetch_assoc();

	    $username = $row[DatabaseFields::UserId];
	    $role = $row[DatabaseFields::Role];


	    $this->session->setUserID($userID);
	    $this->session->setUserFirstName($username);
	    $this->session->setUserType($role);
	    $this->session->setLoggedinState(TRUE);

	    $this->userID = $userID;
	    $this->userName = $username;
	    $this->userType = $role;

	    $this->loggedin = TRUE;
	    return TRUE;
	}

	//close the resultsets
	$resultSet1->close();
    }

    public function logout()
    {
	//
	$this->session->logout();
    }

    //end METHOD - User login

    public function register($postArray)
    {
	//get the values entered in the registration form
	$coordinatorid = $this->db->real_escape_string($postArray['coordinatorid']);
	$coordinatorusername = $this->db->real_escape_string($postArray['coordinatorname']);

	$email = $this->db->real_escape_string($postArray['coordinatoremail']);
	$tel = $this->db->real_escape_string($postArray['coordinatortel']);

	// $lastName=$this->db->real_escape_string($postArray['coordinatorLastName']);
	$password = $this->db->real_escape_string($postArray['ClinicalCoordinatorPass1']);
	//encrypt the password
	$password = hash('ripemd160', $password);
	//construct the INSERT SQL

	$insertUserSql = "INSERT INTO `placement_fyp`.`login`
(`user_id`,
`password`)
VALUES
(
" . $coordinatorid . ", '" . $password . "');
";
	$sql = "INSERT INTO `placement_fyp`.`coordinator`
(`coordinator_id`,
`coordinator_name`,
`coordinator_phonenum`,
`coordinator_email`)
VALUES('$coordinatorid','$coordinatorusername','$tel','$email')";

	//$sql="INSERT INTO lecturer (LectID,FirstName,LastName,PassWord) VALUES ('".$postArray['lectID']."','".$postArray['lectFirstName']."','".$postArray['lectLastName']."','".$postArray['lectPass1']."')";
	//execute the insert query
	//echo "<h1>" . $sql . "</h1>";
	$rs1 = $this->db->query($insertUserSql);
	$rs = $this->db->query($sql);
	//check the insert query worked
	if ($rs)
	{
	    return TRUE;
	}
	else
	{
	    return FALSE;
	}
    }

    //end METHOD - Register User
    //setters
    public function setLoginAttempts($num)
    {
	$this->session->setLoginAttempts($num);
    }

    //getters
    public function getLoggedInState()
    {
	return $this->session->getLoggedinState();
    }

//end METHOD - getLoggedInState

    public function getcoordinatorID()
    {
	return $this->userID;
    }

    public function getcoordinatorName()
    {
	return $this->userFirstName;
    }

    // public function getcoordinatorLastName(){return $this->userLastName;}
    public function getUserType()
    {
	return $this->userType;
    }

    public function getLoginAttempts()
    {
	return $this->session->getLoginAttempts();
    }

}
