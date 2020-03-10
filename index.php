<?php
/* 
 * 
 * @author Jennifer O Malley
 * 
 * 
 */

session_start(); //join/start a session between thhebrowser client and Apache web server

//load application configuration
include_once 'config/config.php';
include_once 'config/database.php';

//load classes required by the application
include_once 'classlib/Controller.php';
include_once 'classlib/Model.php';
include_once 'models/Session.php';
include_once 'controllers/GeneralController.php';
include_once 'controllers/StudentController.php';
include_once 'controllers/ClinicalCoordinatorController.php';
include_once 'models/Home.php';
include_once 'models/UnderConstruction.php';
include_once 'models/Navigation.php';
include_once 'models/Student.php';
include_once 'models/User.php';
include_once 'models/Login.php';
include_once 'models/Register.php';
include_once 'models/Placements.php';

//connect to the MySQL Server (with error reporting supression '@')
@$db=new mysqli($DBServer,$DBUser,$DBPass,$DBName);
@$db->query("SET NAMES 'utf8'"); //make sure database connection is set to support UTF8 characterset 
if($db->connect_errno){  //check if there is an error in the connection
    $msg='Error making connection to MySQL Server using MySQLi- check your server is running and you have the correct host IP address.<br>MySQLi Error message: '.$conn->connect_error.'<br>'; 
    exit($msg);  
}

//Create the new session object
$session=new Session();

$user=new User($session,$db);

if($user->getLoggedInState()){
    //load the appropriate controller for student or lecturer
    //
    switch($user->getUserType()){
        case "coordinator":  //create new  clinicalCoordinator controller
            $controller=new ClinicalCoordinatorController($user,$db);
        break;
    
        case "STUDENT":  //create new STUDENT controller
            $controller=new StudentController($user,$db);
        break;
    
        default :  //create new general/not logged in controller
            $controller=new GeneralController($user,$db);
        break;
    }
    
}
else{
    //user is not logged in
    //create new general/not logged in controller
    $controller=new GeneralController($user,$db);
}

//run the application
$controller->run();


//close or release any open connections/resources

//Debug information
if(DEBUG_MODE){ //two METHODS of getting debug info from the MainController CLass are illustrated here:
    //Comment out whichever method you dont want to use.

    $controller->debug();
    
    echo '<pre><h5>SESSION Class</h5>';
    var_dump($session);
    echo '</pre>';

    echo '<pre><h5>USER Class</h5>';
    var_dump($user);
    echo '</pre>';
    
    echo '<pre><h5>$_COOKIE Array</h5>';
    var_dump($_COOKIE);
    echo '</pre>';
    
    echo '<pre><h5>$_SESSION Array</h5>';
    var_dump($_SESSION);
    echo '</pre>';
    
};

echo '</body></html>'; //end of HTML Document

//close the DB Connection
$db->close();