<?php
/**
 * Class: Navigation
 
 * 
 */

class Navigation extends Model{
	//class properties
        private $pageID;   //currently selected page
        private $menuNav;  //array of menu items    
        private $user;
	
	//constructor
	function __construct($user,$pageID) {   
            parent::__construct($user->getLoggedInState());
            $this->user=$user;
            $this->pageID=$pageID;
            $this->setmenuNav();

	}  //end METHOD constructor
      
        //setter methods
        public function setmenuNav(){//set the menu items depending on the users selected page ID
            
            //empty string for menu items
            $this->menuNav='';
            
            //dropdown menu items for MODULES
            $dropdownMenu='<li class="dropdown">';
            $dropdownMenu.='<a class="dropdown-toggle" data-toggle="dropdown" href="#">Placements<span class="caret"></span></a>';
            $dropdownMenu.='<ul class="dropdown-menu">';
            $dropdownMenu.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=placementsViewEdit">View/Edit</a></li>';
            $dropdownMenu.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=placementsAdd">Add</a></li>';
            $dropdownMenu.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=placementsDelete">Delete</a></li>';
            $dropdownMenu.='</ul></li>'; 
 
         
                        
            if($this->loggedin){  //if user is logged in   

                
                if ($this->user->getUserType()==='coordinator'){
                    switch ($this->pageID) {
                    case "home":
                        //$this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=home">Home</a></li>';
                        $this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=studentQuery">Student Query</a></li>';
                        $this->menuNav.="$dropdownMenu";  //the modules drop down menu
                        $this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=messages">Messages</a></li>';  
                        $this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=grades">Grades</a></li>';  
                        $this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=account">My Account</a></li>';
                        $this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=calculator">Calendar</a></li>';
                        $this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=logout">Log Out</a></li>';
                        break;
                    case "messages":
                        $this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=home">Home</a></li>';
                        $this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=studentQuery">Student Query</a></li>';
                        $this->menuNav.="$dropdownMenu";  //the modules drop down menu
                        //$this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=messages">Messages</a></li>';  
                        $this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=grades">Grades</a></li>';  
                        $this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=account">My Account</a></li>';
                        $this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=calendar">Calendar</a></li>';
                        $this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=logout">Log Out</a></li>';
                        break;                    
                    case "studentQuery":
                        $this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=home">Home</a></li>';
                        //$this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=studentQuery">Student Query</a></li>';
                        $this->menuNav.="$dropdownMenu";  //the modules drop down menu
                        $this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=messages">Messages</a></li>';  
                        $this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=grades">Grades</a></li>';  
                        $this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=account">My Account</a></li>';
                        $this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=calendar">Calendar</a></li>';
                        $this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=logout">Log Out</a></li>';
                        break;                    
                    case "placements":
                        $this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=home">Home</a></li>';
                        $this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=studentQuery">Student Query</a></li>';
                        $this->menuNav.="$dropdownMenu";  //the modules drop down menu
                        $this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=messages">Messages</a></li>';  
                        $this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=grades">Grades</a></li>';  
                        $this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=account">My Account</a></li>';
                        $this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=calendar">Calendar</a></li>';
                        $this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=logout">Log Out</a></li>';
                        break;                    
                    case "mygrades":
                        $this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=home">Home</a></li>';
                        $this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=studentQuery">Student Query</a></li>';
                        $this->menuNav.="$dropdownMenu";  //the modules drop down menu
                        $this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=messages">Messages</a></li>';  
                        //$this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=grades">Grades</a></li>';  
                        $this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=account">My Account</a></li>';
                        $this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=calendar">Calendar</a></li>';
                        $this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=logout">Log Out</a></li>';
                        break;
                    case "account":
                        $this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=home">Home</a></li>';
                        $this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=studentQuery">Student Query</a></li>';
                        $this->menuNav.="$dropdownMenu";  //the modules drop down menu
                        $this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=messages">Messages</a></li>';  
                        $this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=grades">Grades</a></li>';  
                        //$this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=account">My Account</a></li>';
                        //$this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=calendar">Calendar</a></li>';
                        $this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=logout">Log Out</a></li>';
                        break;
                    case "calendar":
                        $this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=home">Home</a></li>';
                        $this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=studentQuery">Student Query</a></li>';
                        $this->menuNav.="$dropdownMenu";  //the modules drop down menu
                        $this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=messages">Messages</a></li>';  
                        $this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=grades">Grades</a></li>';  
                        $this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=account">My Account</a></li>';
                        $this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=calendar">Calendar</a></li>';
                        $this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=logout">Log Out</a></li>';
                        break;                    
                    case "logout":  //DUMMY CASE - this case is not actually needed!!
                        $this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=home">Home</a></li>';
                        $this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=register">Register</a></li>';
                        $this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=login">Login</a></li>';
                        break;
                    default:
                        $this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=home">Home</a></li>';
                        $this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=studentQuery">Student Query</a></li>';
                        $this->menuNav.="$dropdownMenu";  //the modules drop down menu
                        $this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=messages">Messages</a></li>';  
                        $this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=grades">Grades</a></li>';  
                        $this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=account">My Account</a></li>';
                        //$this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=calendar">Calendar</a></li>';
                        $this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=logout">Log Out</a></li>';
                        break;
                
                }//end switch
                }
                else{  //STUDENT menu items
                    switch ($this->pageID) {
                    case "home":
                        //$this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=home">Home</a></li>';
                        $this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=messages">My Messages</a></li>';
                        $this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=mygrades">My Grades</a></li>';  
                        $this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=account">My Account</a></li>';
                        $this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=calendar">Calendar</a></li>';
                        $this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=logout">Log Out</a></li>';
                        break;
                    case "messages":
                        $this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=home">Home</a></li>';
                        //$this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=messages">My Messages</a></li>';
                        $this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=mygrades">My Grades</a></li>';  
                        $this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=account">My Account</a></li>';
                        $this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=calendar">Calendar</a></li>';
                        $this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=logout">Log Out</a></li>';
                        break;                                    
                    case "mygrades":
                        $this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=home">Home</a></li>';
                        $this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=messages">My Messages</a></li>';
                        $this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=mygrades">My Grades</a></li>';  
                        $this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=account">My Account</a></li>';
                        $this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=calculator">Calendar</a></li>';
                        $this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=logout">Log Out</a></li>';
                        break;
                    case "account":
                        $this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=home">Home</a></li>';
                        $this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=messages">My Messages</a></li>';
                        $this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=mygrades">My Grades</a></li>';  
                        //$this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=account">My Account</a></li>';
                        $this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=calendar">Calendar</a></li>';
                        $this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=logout">Log Out</a></li>';
                        break;
//                    case "calendar":
//                        $this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=home">Home</a></li>';
//                        $this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=messages">My Messages</a></li>';
//                        $this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=mygrades">My Grades</a></li>';  
//                        $this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=account">My Account</a></li>';
//                        $this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=calculator">Calendar</a></li>';
//                        $this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=logout">Log Out</a></li>';
//                        break;                    
                    case "logout":  //DUMMY CASE - this case is not actually needed!!
                        $this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=home">Home</a></li>';
                        $this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=messages">My Messages</a></li>';
                        $this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=mygrades">My Grades</a></li>';  
                        $this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=account">My Account</a></li>';
                        $this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=calendar">Calendar</a></li>';
                        //$this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=logout">Log Out</a></li>';
                        break;
                    default:
                        //$this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=home">Home</a></li>';
                        $this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=messages">My Messages</a></li>';
                        $this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=mygrades">My Grades</a></li>';  
                        $this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=account">My Account</a></li>';
                        $this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=calendar">Calendar</a></li>';
                        $this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=logout">Log Out</a></li>';
                        break;
                
                }//end switch
                }
                

            }
            else{ //user is NOT logged in
                
                  switch ($this->pageID) {
                    case "home":
                        //$this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=home">Home</a></li>';
                        $this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=register">Register</a></li>';
                        $this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=login">Login</a></li>';
                        break;
                    case "register":
                        $this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=home">Home</a></li>';
                        //$this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=register">Register</a></li>';
                        $this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=login">Login</a></li>';
                        break;         
                    case "login":
                        $this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=home">Home</a></li>';
                        $this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=register">Register</a></li>';
                        //$this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=login">Login</a></li>';
                        break;  
                    default:
                        //$this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=home">Home</a></li>';
                        $this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=register">Register</a></li>';
                        $this->menuNav.='<li><a href="'.$_SERVER['PHP_SELF'].'?pageID=login">Login</a></li>';
                        break;
            }
        }   
        } //end METHOD - set the menu items depending on the users selected page ID
        
        //getter methods
        public function getMenuNav(){return $this->menuNav;}    //end METHOD - get the navigation menu string   
  
}//end class
        