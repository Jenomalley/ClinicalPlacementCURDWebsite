<?php
/* 
 * Class - generic model class
 *
 * @author jennifer o malley
 * 
 */

class Model {
	//class properties
        protected $loggedin;
	
	//constructor method
	function __construct($loggedin) {  //constructor  
            //initialise the model
            $this->loggedin=$loggedin;
	} //end METHOD - constructor
        

} //end CLASS

