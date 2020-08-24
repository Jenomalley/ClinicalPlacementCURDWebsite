<?php

/**
 * Data Transfer Object for a Placement
 */
class PlacementDTO
{

    function __construct()
    {

    }

    public static function Construct($email, $gps, $id, $name, $phone, $type)
    {
	$placement = new PlacementDTO();
	$placement->email = $email;
	$placement->gps = $gps;
	$placement->id = $id;
	$placement->name = $name;
	$placement->phone = $phone;
	$placement->type = $type;
	return $placement;
    }

//
//	Public Properties
//
    public function getType()
    {
	return $this->type;
    }

    public function getName()
    {
	return $this->name;
    }

    public function getId()
    {
	return $this->id;
    }

    public function setId($id)
    {
	$this->id = $id;
    }

    public function getEmail()
    {
	return $this->email;
    }

    public function getPhone()
    {
	return $this->phone;
    }

    public function getGps()
    {
	return $this->gps;
    }

    public function setType($type)
    {
	$this->type = $type;
    }

    public function setName($name)
    {
	$this->name = $name;
    }

    public function setEmail($email)
    {
	$this->email = $email;
    }

    public function setPhone($phone)
    {
	$this->phone = $phone;
    }

    public function setGps($gps)
    {
	$this->gps = $gps;
    }

//
//	Private Fields
//
    public function getAddress()
    {
	return $this->address;
    }

    public function setAddress($address)
    {
	$this->address = $address;
    }

    public function getStatus()
    {
	return $this->status;
    }

    public function setStatus($status)
    {
	$this->status = $status;
    }

    private $id;
    private $type = "";
    private $name = "";
    private $status = "";
    private $address = "";
    private $email = "";
    private $phone = "";
    private $gps;

}
