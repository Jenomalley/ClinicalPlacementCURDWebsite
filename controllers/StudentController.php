<?php

/**
 * Class: StudentController
 * This is the controller for the STUDENT user type
 *
 *
 *
 */
class StudentController extends Controller
{

    //properties
    private $postArray;     //a copy of the content of the $_POST superglobal array
    private $getArray;      //a copy of the content of the $_GET superglobal array
    private $viewData;   //an array containing page content generated using models
    private $controllerObjects;   //an array containing models used by the controller
    private $user; //session object
    private $db;
    private $pageTitle;

    //methods

    function __construct($user, $db)
    { //constructor
	parent::__construct($user->getLoggedinState());
	$this->user = $user;
	//initialise all the class properties
	$this->postArray = array();
	$this->getArray = array();
	$this->viewData = array();
	$this->controllerObjects = array();
	$this->user = $user;
	$this->db = $db;
	$this->pageTitle = 'Placements ONLINE';
    }

//end METHOD - constructor

    public function run()
    {  // run the controller
	$this->getUserInputs();
	$this->updateView();
    }

//end METHOD - run the controller

    public function getUserInputs()
    { // get user input
	//
        //This method is the main interface between the user and the controller.
	//
        //Get the $_GET array values
	$this->getArray = filter_input_array(INPUT_GET); //used for PAGE navigation
	//Get the $_POST array values
	$this->postArray = filter_input_array(INPUT_POST);  //used for form data entry and buttons
    }

//end METHOD - get user input

    public function updateView()
    { //update the VIEW based on the users page selection
	//echo "<h1>" . "StudentController.updateView" . "</h1>";
	if (isset($this->getArray['pageID']))
	{ //ch1eck if a page id is contained in the URL
	    //echo "<h1>" . "#Findme05#" . $this->getArray['pageID'] . "</h1>";
	    switch ($this->getArray['pageID'])
	    {
		case "home":
		    //create objects to generate view content
		    $home = new Home($this->user, $this->pageTitle, strtoupper($this->getArray['pageID']));
		    $navigation = new Navigation($this->user, $this->getArray['pageID']);
		    array_push($this->controllerObjects, $home, $navigation);

		    //get the content from the navigation model - put into the $data array for the view:
		    $data['menuNav'] = $navigation->getMenuNav();       // an array of menu items and associated URLS
		    //get the content from the page content model  - put into the $data array for the view:
		    $data['pageTitle'] = $home->getPageTitle();
		    $data['pageHeading'] = $home->getPageHeading();
		    $data['panelHeadRHS'] = $home->getPanelHead_3(); // A string containing the RHS panel heading/title
		    $data['panelHeadLHS'] = $home->getPanelHead_1(); // A string containing the LHS panel heading/title
		    $data['panelHeadMID'] = $home->getPanelHead_2();
		    $data['stringLHS'] = $home->getPanelContent_1();     // A string intended of the Left Hand Side of the page
		    $data['stringMID'] = $home->getPanelContent_2();     // A string intended of the Left Hand Side of the page
		    $data['stringRHS'] = $home->getPanelContent_3();     // A string intended of the Right Hand Side of the page
		    $this->viewData = $data;  //put the content array into a class property for diagnostic purposes
		    //update the view
		    include_once 'views/view_navbar_3_panel.php';  //load the view
		    break;
		    //	case "messages":
		    //get the model
		    //    $messages = new UnderConstruction($this->user, $this->pageTitle, strtoupper($this->getArray['pageID']));
		    //    $navigation = new Navigation($this->user, $this->getArray['pageID']);
		    //    array_push($this->controllerObjects, $messages, $navigation);
		    //get the content from the model - put into the $data array for the view:
		    //get the content from the navigation model - put into the $data array for the view:
		    $data['menuNav'] = $navigation->getMenuNav();       // an array of menu items and associated URLS
		//   //get the content from the model - put into the $data array for the view:
		//   $data['pageTitle'] = $messages->getPageTitle();
		//   $data['pageHeading'] = $messages->getPageHeading();
		//   $data['panelHeadRHS'] = $messages->getPanelHead_3(); // A string containing the RHS panel heading/title
		//   $data['panelHeadLHS'] = $messages->getPanelHead_1(); // A string containing the LHS panel heading/title
		//   $data['panelHeadMID'] = $messages->getPanelHead_2();
		//   $data['stringLHS'] = $messages->getPanelContent_1();     // A string intended of the Left Hand Side of the page
		//   $data['stringMID'] = $messages->getPanelContent_2();     // A string intended of the Left Hand Side of the page
		//   $data['stringRHS'] = $messages->getPanelContent_3();     // A string intended of the Right Hand Side of the page
		//   $this->viewData = $data;  //put the content array into a class property for diagnostic purposes
		//update the view
		//  include_once 'views/view_navbar_3_panel.php'; //load the view
		// break;

		case "account":
		    //create objects to generate view content
		    $account = new UnderConstruction($this->user, $this->pageTitle, strtoupper($this->getArray['pageID']));
		    $navigation = new Navigation($this->user, $this->getArray['pageID']);
		    array_push($this->controllerObjects, $account, $navigation);

		    //get the content from the navigation model - put into the $data array for the view:
		    $data['menuNav'] = $navigation->getMenuNav();       // an array of menu items and associated URLS
		    //get the content from the page content model  - put into the $data array for the view:
		    $data['pageTitle'] = $account->getPageTitle();
		    $data['pageHeading'] = $account->getPageHeading();
		    $data['panelHeadRHS'] = $account->getPanelHead_3(); // A string containing the RHS panel heading/title
		    $data['panelHeadLHS'] = $account->getPanelHead_1(); // A string containing the LHS panel heading/title
		    $data['panelHeadMID'] = $account->getPanelHead_2();
		    $data['stringLHS'] = $account->getPanelContent_1();     // A string intended of the Left Hand Side of the page
		    $data['stringMID'] = $account->getPanelContent_2();     // A string intended of the Left Hand Side of the page
		    $data['stringRHS'] = $account->getPanelContent_3();     // A string intended of the Right Hand Side of the page
		    $this->viewData = $data;  //put the content array into a class property for diagnostic purposes
		    //update the view
		    include_once 'views/view_navbar_3_panel.php'; //load the view
		    break;

		case "calendar":
		    //create objects to generate view content
		    $calendar = new Calendar($this->user, $this->postArray, $this->pageTitle, strtoupper($this->getArray['pageID']));
		    $navigation = new Navigation($this->user, $this->getArray['pageID']);
		    array_push($this->controllerObjects, $calculator, $navigation);
		    //get the content from the navigation model - put into the $data array for the view:
		    $data['menuNav'] = $navigation->getMenuNav();       // an array of menu items and associated URLS
		    //get the content from the page content model  - put into the $data array for the view:
		    $data['pageTitle'] = $calendar->getPageTitle();
		    $data['pageHeading'] = $calendar->getPageHeading();
		    $data['panelHeadRHS'] = $calendar->getPanelHead_2(); // A string containing the RHS panel heading/title
		    $data['panelHeadLHS'] = $calendar->getPanelHead_1(); // A string containing the LHS panel heading/title
		    $data['stringLHS'] = $calendar->getPanelContent_1();     // A string intended of the Left Hand Side of the page
		    $data['stringRHS'] = $calendar->getPanelContent_2();     // A string intended of the Right Hand Side of the page
		    $this->viewData = $data;  //put the content array into a class property for diagnostic purposes
		    //update the view
		    include_once 'views/view_navbar_2_panel.php'; //load the view
		    break;

		case "placementsViewEdit":
		    //create objects to generate view content
		    $placements = new placements($this->user, $this->postArray, $this->pageTitle, strtoupper($this->getArray['pageID']), $this->db, $this->getArray['pageID']);
		    $navigation = new Navigation($this->user, $this->getArray['pageID']);
		    array_push($this->controllerObjects, $placements, $navigation);


		    //get the content from the navigation model - put into the $data array for the view:
		    $data['menuNav'] = $navigation->getMenuNav();       // an array of menu items and associated URLS
		    //get the content from the page content model  - put into the $data array for the view:
		    $data['pageTitle'] = $placements->getPageTitle();
		    $data['pageHeading'] = $placements->getPageHeading();
		    $data['panelHeadRHS'] = $placements->getPanelHead_2(); // A string containing the RHS panel heading/title
		    $data['panelHeadLHS'] = $placements->getPanelHead_1(); // A string containing the LHS panel heading/title
		    $data['panelHeadMID'] = $placements->getPanelHead_2();
		    $data['stringLHS'] = $placements->getPanelContent_1();     // A string intended of the Left Hand Side of the page
		    $data['stringMID'] = $placements->getPanelContent_2();     // A string intended of the Left Hand Side of the page
		    $data['stringRHS'] = $placements->getPanelContent_2();     // A string intended of the Right Hand Side of the page
		    $this->viewData = $data;  //put the content array into a class property for diagnostic purposes
		    //update the view
		    include_once 'views/view_navbar_2_panel.php'; //load the view
		    break;
		case "placementsAdd":
		    //create objects to generate view content
		    $placements = new Placements($this->user, $this->postArray, $this->pageTitle, strtoupper($this->getArray['pageID']), $this->db, $this->getArray['pageID']);
		    $navigation = new Navigation($this->user, $this->getArray['pageID']);
		    array_push($this->controllerObjects, $placements, $navigation);


		    //get the content from the navigation model - put into the $data array for the view:
		    $data['menuNav'] = $navigation->getMenuNav();       // an array of menu items and associated URLS
		    //get the content from the page content model  - put into the $data array for the view:
		    $data['pageTitle'] = $placements->getPageTitle();
		    $data['pageHeading'] = $placements->getPageHeading();
		    $data['panelHeadRHS'] = $placements->getPanelHead_2(); // A string containing the RHS panel heading/title
		    $data['panelHeadLHS'] = $placements->getPanelHead_1(); // A string containing the LHS panel heading/title
		    $data['panelHeadMID'] = $placements->getPanelHead_2();
		    $data['stringLHS'] = $placements->getPanelContent_1();     // A string intended of the Left Hand Side of the page
		    $data['stringMID'] = $placements->getPanelContent_2();     // A string intended of the Left Hand Side of the page
		    $data['stringRHS'] = $placements->getPanelContent_2();     // A string intended of the Right Hand Side of the page
		    $this->viewData = $data;  //put the content array into a class property for diagnostic purposes
		    //update the view
		    include_once 'views/view_navbar_2_panel.php'; //load the view
		    break;
		case "placementsEdit":
		    //create objects to generate view content
		    $placements = new placements($this->user, $this->postArray, $this->pageTitle, strtoupper($this->getArray['pageID']), $this->db, $this->getArray['pageID']);
		    $navigation = new Navigation($this->user, $this->getArray['pageID']);
		    array_push($this->controllerObjects, $placements, $navigation);

		    //get the content from the navigation model - put into the $data array for the view:
		    $data['menuNav'] = $navigation->getMenuNav();       // an array of menu items and associated URLS
		    //get the content from the page content model  - put into the $data array for the view:
		    $data['pageTitle'] = $placements->getPageTitle();
		    $data['pageHeading'] = $placements->getPageHeading();
		    $data['panelHeadRHS'] = $placements->getPanelHead_2(); // A string containing the RHS panel heading/title
		    $data['panelHeadLHS'] = $placements->getPanelHead_1(); // A string containing the LHS panel heading/title
		    $data['panelHeadMID'] = $placements->getPanelHead_2();
		    $data['stringRHS'] = $placements->getPanelContent_2();     // A string intended of the Right Hand Side of the page
		    $data['stringMID'] = $placements->getPanelContent_2();     // A string intended of the Left Hand Side of the page
		    $data['stringLHS'] = $placements->getPanelContent_1();     // A string intended of the Left Hand Side of the page
		    $this->viewData = $data;  //put the content array into a class property for diagnostic purposes
		    //update the view
		    include_once 'views/view_navbar_1_panel.php'; //load the view
		    break;
		case "placementsDelete":
		    //create objects to generate view content
		    $placements = new Modules($this->user, $this->postArray, $this->pageTitle, strtoupper($this->getArray['pageID']), $this->db, $this->getArray['pageID']);
		    $navigation = new Navigation($this->user, $this->getArray['pageID']);
		    array_push($this->controllerObjects, $placements, $navigation);


		    //get the content from the navigation model - put into the $data array for the view:
		    $data['menuNav'] = $navigation->getMenuNav();       // an array of menu items and associated URLS
		    //get the content from the page content model  - put into the $data array for the view:
		    $data['pageTitle'] = $placements->getPageTitle();
		    $data['pageHeading'] = $placements->getPageHeading();
		    $data['panelHeadRHS'] = $placements->getPanelHead_2(); // A string containing the RHS panel heading/title
		    $data['panelHeadLHS'] = $placements->getPanelHead_1(); // A string containing the LHS panel heading/title
		    $data['panelHeadMID'] = $placements->getPanelHead_2();
		    $data['stringLHS'] = $placements->getPanelContent_1();     // A string intended of the Left Hand Side of the page
		    $data['stringMID'] = $placements->getPanelContent_2();     // A string intended of the Left Hand Side of the page
		    $data['stringRHS'] = $placements->getPanelContent_2();     // A string intended of the Right Hand Side of the page
		    $this->viewData = $data;  //put the content array into a class property for diagnostic purposes
		    //update the view
		    include_once 'views/view_navbar_2_panel.php'; //load the view
		    break;

		case "logout":

		    //Change the login state to false
		    //echo "<h1>" . "logout-student" . "</h1>";
		    $this->user->logout();
		    $this->loggedin = FALSE;

		    //create objects to generate view content
		    $home = new Home($this->user, $this->pageTitle, 'HOME');
		    $navigation = new Navigation($this->user, 'home');
		    array_push($this->controllerObjects, $home, $navigation);

		    //get the content from the navigation model - put into the $data array for the view:
		    $data['menuNav'] = $navigation->getMenuNav();       // an array of menu items and associated URLS
		    //get the content from the page content model  - put into the $data array for the view:
		    $data['pageTitle'] = $home->getPageTitle();
		    $data['pageHeading'] = $home->getPageHeading();
		    $data['panelHeadRHS'] = $home->getPanelHead_3(); // A string containing the RHS panel heading/title
		    $data['panelHeadLHS'] = $home->getPanelHead_1(); // A string containing the LHS panel heading/title
		    $data['panelHeadMID'] = $home->getPanelHead_2();
		    $data['stringLHS'] = $home->getPanelContent_1();     // A string intended of the Left Hand Side of the page
		    $data['stringMID'] = $home->getPanelContent_2();     // A string intended of the Left Hand Side of the page
		    $data['stringRHS'] = $home->getPanelContent_3();     // A string intended of the Right Hand Side of the page
		    $this->viewData = $data;  //put the content array into a class property for diagnostic purposes
		    //update the view
		    include_once 'views/view_navbar_3_panel.php'; //load the view

		    break;

		case "mygrades":
		    echo "<h1>" . "#Findme01#" . "</h1>";

		    //create objects to generate view content
		    $grades = new UnderConstruction($this->loggedin, $this->pageTitle, strtoupper($this->getArray['pageID']));
		    $navigation = new Navigation($this->user, $this->getArray['pageID']);
		    array_push($this->controllerObjects, $grades, $navigation);

		    //get the content from the navigation model - put into the $data array for the view:
		    $data['menuNav'] = $navigation->getMenuNav();       // an array of menu items and associated URLS
		    //get the content from the page content model  - put into the $data array for the view:
		    $data['pageTitle'] = $grades->getPageTitle();
		    $data['pageHeading'] = $grades->getPageHeading();
		    $data['panelHeadRHS'] = $grades->getPanelHead_3(); // A string containing the RHS panel heading/title
		    $data['panelHeadLHS'] = $grades->getPanelHead_1(); // A string containing the LHS panel heading/title
		    $data['panelHeadMID'] = $grades->getPanelHead_2();
		    $data['stringLHS'] = $grades->getPanelContent_1();     // A string intended of the Left Hand Side of the page
		    $data['stringMID'] = $grades->getPanelContent_2();     // A string intended of the Left Hand Side of the page
		    $data['stringRHS'] = $grades->getPanelContent_3();     // A string intended of the Right Hand Side of the page
		    $this->viewData = $data;  //put the content array into a class property for diagnostic purposes
		    //update the view
		    include_once 'views/view_navbar_3_panel.php'; //load the view
		    break;

		default:
		    //no page selected
		    //create objects to generate view content
		    $home = new Home($this->user, $this->pageTitle, strtoupper($this->getArray['pageID']));
		    $navigation = new Navigation($this->user, $this->getArray['pageID']);
		    array_push($this->controllerObjects, $home, $navigation);

		    //get the content from the navigation model - put into the $data array for the view:
		    $data['menuNav'] = $navigation->getMenuNav();       // an array of menu items and associated URLS
		    //get the content from the page content model  - put into the $data array for the view:
		    $data['pageTitle'] = $home->getPageTitle();
		    $data['pageHeading'] = $home->getPageHeading();
		    $data['panelHeadRHS'] = $home->getPanelHead_3(); // A string containing the RHS panel heading/title
		    $data['panelHeadLHS'] = $home->getPanelHead_1(); // A string containing the LHS panel heading/title
		    $data['panelHeadMID'] = $home->getPanelHead_2();
		    $data['stringLHS'] = $home->getPanelContent_1();     // A string intended of the Left Hand Side of the page
		    $data['stringMID'] = $home->getPanelContent_2();     // A string intended of the Left Hand Side of the page
		    $data['stringRHS'] = $home->getPanelContent_3();     // A string intended of the Right Hand Side of the page
		    $this->viewData = $data;  //put the content array into a class property for diagnostic purposes
		    //update the view
		    include_once 'views/view_navbar_3_panel.php';
		    break;
	    }
	}
	else
	{//no page selected and NO page ID passed in the URL
	    //no page selected - default loads HOME page
	    //create objects to generate view content
	    $home = new Home($this->user, $this->pageTitle, 'HOME');
	    $navigation = new Navigation($this->user, 'home');
	    array_push($this->controllerObjects, $home, $navigation);

	    //get the content from the navigation model - put into the $data array for the view:
	    $data['menuNav'] = $navigation->getMenuNav();       // an array of menu items and associated URLS
	    //get the content from the page content model  - put into the $data array for the view:
	    $data['pageTitle'] = $home->getPageTitle();
	    $data['pageHeading'] = $home->getPageHeading();
	    $data['panelHeadRHS'] = $home->getPanelHead_3(); // A string containing the RHS panel heading/title
	    $data['panelHeadLHS'] = $home->getPanelHead_1(); // A string containing the LHS panel heading/title
	    $data['panelHeadMID'] = $home->getPanelHead_2();
	    $data['stringLHS'] = $home->getPanelContent_1();     // A string intended of the Left Hand Side of the page
	    $data['stringMID'] = $home->getPanelContent_2();     // A string intended of the Left Hand Side of the page
	    $data['stringRHS'] = $home->getPanelContent_3();     // A string intended of the Right Hand Side of the page
	    $this->viewData = $data;  //put the content array into a class property for diagnostic purposes
	    //update the view
	    include_once 'views/view_navbar_3_panel.php';  //load the view
	}
    }

//end METHOD - update the VIEW based on the users page selection




    public function debug()
    {   //Diagnostics/debug information - dump the application variables if DEBUG mode is on
	echo '<section>';
	echo '<!-- The Debug SECTION -->';
	echo '<div class="container-fluid"   style="background-color: #AAAAAA">'; //outer DIV

	echo '<h2>Student Controller Class - Debug information</h2><br>';

	echo '<div class="container">';  //INNER DIV
	//SECTION 1
	echo '<section style="background-color: #AAAAAA">';
	echo '<h3>Student Controller (CLASS) properties</h3>';
	echo '<section style="background-color: #BBBBB">';
	echo '<h4>User Logged in Status:</h4>';
	echo '<section style="background-color: #FFFFFF">';
	if ($this->loggedin)
	{
	    echo 'User Logged In state is TRUE ($loggedin) <br>';
	}
	else
	{
	    echo 'User Logged In state is FALSE ($loggedin) <br>';
	}
	echo '</section>';

	echo '<h4>$postArray Values</h4>';
	echo '<pre>';
	var_dump($this->postArray);
	echo '</pre>';
	echo '<br>';

	echo '<h4>$getArray Values</h4>';
	echo '<pre>';
	var_dump($this->getArray);
	echo '</pre>';
	echo '<br>';

	echo '<h4>$data Array Values</h4>';
	echo '<pre>';
	var_dump($this->viewData);
	echo '</pre>';
	echo '<br>';
	echo '</section>';
	echo '</section>';


	//SECTION 2
	echo '<section style="background-color: #AAAAAA">';
	echo '<h3>SERVER - Super Global Arrays</h3>';

	echo '<section style="background-color: #AAAAAA">';
	echo '<h4>$_GET Arrays</h4>';
	echo '<section style="background-color: #FFFFFF">';
	echo '<table class="table table-bordered"><thead><tr><th>KEY</th><th>VALUE</th></tr></thead>';
	foreach ($_GET as $key => $value)
	{
	    echo '<tr><td>' . $key . '</td><td>' . $value . '</td></tr>';
	}
	echo '</table>';
	echo '</section>';

	echo '<h4>$_POST Array</h4>';
	echo '<section style="background-color: #FFFFFF">';
	echo '<table class="table table-bordered"><thead><tr><th>KEY</th><th>VALUE</th></tr></thead>';
	foreach ($_POST as $key => $value)
	{
	    echo '<tr><td>' . $key . '</td><td>' . $value . '</td></tr>';
	}
	echo '</table>';
	echo '</section>';
	echo '</section>';
	echo '</section>';

	echo '</div>';  //END INNER DIV
	echo '</div>';  //END outer DIV
	echo '</section>';
    }

// end METHOD - Diagnostics/debug information
}

//end CLASS
