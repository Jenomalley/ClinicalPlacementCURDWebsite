<?php

/**
 * Class: User
 * 
 * The user class represents the end user of the application. 
 * 

 */
class User extends Model {

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
    function __construct($session, $database) {
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

    public function login($userID, $password) {
        //This login function checks both the student and coordinator tables for valid login credentials
        //encrypt the password
//        $password = hash('ripemd160', $password);

        //set up the SQL query strings
        $SQL1 = "SELECT coordinator_name FROM coordinator WHERE coordinator_id='$userID' AND password='$password'";
        $SQL2 = "SELECT student_name FROM student WHERE student_id='$userID'";

        //execute the queries to get the 2 resultsets
        echo "<h1>" . $SQL1 . "</h1>";
        echo "<h1>" . $SQL2 . "</h1>";

        $resultSet1 = $this->db->query($SQL1); //query the  placement coordinator table
        $resultSet2 = $this->db->query($SQL2); //query the student table

        echo "<h1>debug</h1>";

        echo "<h1>" . $resultSet1->num_rows  . "</h1>";
        echo "<h1>" . $resultSet2->num_rows  . "</h1>";
        echo "<h1>debug</h1>";
        //use the resultsets to determine if login is valid and which type of user has logged on. 
        if (($resultSet1->num_rows === 1)OR ( $resultSet2->num_rows === 1)) {

            if (($resultSet1->num_rows === 1)AND ( $resultSet2->num_rows === 0)) { //lecturer has logged on
                $row = $resultSet1->fetch_assoc(); //get the users record from the query result             
                $this->session->setUserID($userID);
                $this->session->setUserFirstName($row['coordinator_name']);
                //$this->session->setUserLastName($row['LastName']);
                $this->session->setUserType('coordinator');
                $this->session->setLoggedinState(TRUE);

                $this->userID = $userID;
                $this->userName = $row['coordinator_name'];
                //$this->userLastName=$row['LastName'];
                $this->userType = 'coordinator';


                $this->loggedin = TRUE;
                return TRUE;
            } elseif (($resultSet2->num_rows === 1)AND ( $resultSet1->num_rows === 0)) { //student has logged on
                $row = $resultSet2->fetch_assoc(); //get the users record from the query result             
                $this->session->setUserID($userID);
                $this->session->setUserName($row['Name']);
                //$this->session->setUserLastName($row['LastName']);
                $this->session->setUserType('STUDENT');
                $this->session->setLoggedinState(TRUE);

                $this->userID = $userID;
                $this->userName = $row['Name'];
                // $this->userLastName=$row['LastName'];
                $this->userType = 'STUDENT';

                $this->loggedin = TRUE;
                return TRUE;
            } else {  //something has gone wrong - there should not be duplicate entries in the two tables - student and lecturer
                $this->session->setLoggedinState(FALSE);
                $this->loggedin = FALSE;
                return FALSE;
            }
        } else { //invalid login credentials entered 
            $this->session->setLoggedinState(FALSE);
            $this->loggedin = FALSE;
            return FALSE;
        }

        //close the resultsets
        $resultSet1->close();
        $resultSet2->close();
    }

    //end METHOD - User login

    public function logout() {
        //
        $this->session->logout();
    }

    //end METHOD - User login

    public function register($postArray) {
        //get the values entered in the registration form
        $coordinatorid = $this->db->real_escape_string($postArray['coordinatorid']);
        $coordinatorusername = $this->db->real_escape_string($postArray['coordinatorname']);

        // $lastName=$this->db->real_escape_string($postArray['coordinatorLastName']);
        $password = $this->db->real_escape_string($postArray['password']);
        //encrypt the password
        $password = hash('ripemd160', $password1);
        //construct the INSERT SQL
        $sql = "INSERT INTO  coordinator (coordinatorid,coordinatorname,password) VALUES ('$coordinatorid','$coordinatorname','$password')";

        //$sql="INSERT INTO lecturer (LectID,FirstName,LastName,PassWord) VALUES ('".$postArray['lectID']."','".$postArray['lectFirstName']."','".$postArray['lectLastName']."','".$postArray['lectPass1']."')";
        //execute the insert query
        $rs = $this->db->query($sql);
        //check the insert query worked
        if ($rs) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    //end METHOD - Register User 
    //setters
    public function setLoginAttempts($num) {
        $this->session->setLoginAttempts($num);
    }

    //getters
    public function getLoggedInState() {
        return $this->session->getLoggedinState();
    }

//end METHOD - getLoggedInState        

    public function getcoordinatorID() {
        return $this->userID;
    }

    public function getcoordinatorName() {
        return $this->userFirstName;
    }

    // public function getcoordinatorLastName(){return $this->userLastName;}
    public function getUserType() {
        return $this->userType;
    }

    public function getLoginAttempts() {
        return $this->session->getLoginAttempts();
    }

}
