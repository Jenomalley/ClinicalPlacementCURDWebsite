<?php

/**
 * Repository provides MySQL CRUD functionality for Placements
 */
class PlacementRepository
{

    function __construct(PDO $connection)
    {
	$this->connection = $connection;
    }

    //
    //	Public Methods
    //
    public function CreatePlacementGerry(PlacementDTO $placement, $databaseObject)
    {
	$placement_id = $placement->getId();
	$placement_type = $placement->getType();
	$placement_name = $placement->getName();
	$placement_address = $placement->getAddress();
	$placement_email = $placement->getEmail();
	$placement_phonenum = "Tel";
	$placement_gps_coordinates = "GPS";
	$placement_status = "Status";

	$sqlCommandText = "INSERT INTO  placements (placement_id,
placement_type,
placement_name,
placement_address,
placement_email,
placement_phonenum,
placement_gps_coordinates,
placement_status)
VALUES
(" .
		"" . $placement_id . ", " .
		"'" . $placement_type . "', " .
		"'" . $placement_name . "', " .
		"'" . $placement_address . "', " .
		"'" . $placement_email . "', " .
		"'" . $placement_phonenum . "', " .
		"'" . $placement_gps_coordinates . "', " .
		"'" . $placement_status . "');";
//	$sqlCommandParameters = [
//	    $placement->getId(),
//	    $placement->getType(),
//	    $placement->getName(),
//	    "Address",
//	    $placement->getEmail(),
//	    $placement->getPhone(),
//	    "status"
//	];
	//echo "<p>$placement->getId()</p>";
	$rs = $databaseObject->query($sqlCommandText);

	//$success = $rs->num_rows === 1;
	return true;
    }

    public function CreatePlacement(PlacementDTO $placement)
    {
	$sqlCommandText = "CreatePlacement(?, ?, ?, ?, ?, ?, ?);";
	$sqlCommandParameters = [
	    $placement->getId(),
	    $placement->getType(),
	    $placement->getName(),
	    "Address",
	    $placement->getEmail(),
	    $placement->getPhone(),
	    "status"
	];

	$pdoStatement = $this->connection->prepare($sqlCommandText);
	$success = $pdoStatement->execute($sqlCommandParameters);
	$pdoStatement->closeCursor();
	return $success;
    }

    public function DeletePlacement(PlacementDTO $placement)
    {
	$this->DeletePlacementById($placement->getId());
    }

    public function DeletePlacementById($placementId)
    {
	$sqlCommandText = "DeletePlacementById(?);";
	$sqlCommandParameters = [$placementId];

	$pdoStatement = $this->connection->prepare($sqlCommandText);
	$success = $pdoStatement->execute($sqlCommandParameters);
	$pdoStatement->closeCursor();
	return $success;
    }

    public function GetPlacementById(int $placementId)
    {
	$sqlCommandText = "GetPlacementById(?);";
	$sqlCommandParameters = [$placementId];

	$pdoStatement = $this->connection->prepare($sqlCommandText);
	$pdoStatement->execute($sqlCommandParameters);
	$rowCount = $pdoStatement->rowCount();
	$datarow = $pdoStatement->fetch();
	$pdoStatement->closeCursor();

	return ($rowCount > 0) ? self::Transform($datarow) : null;
    }

    public function GetPlacements()
    {
	$sqlCommandText = "GetPlacements();";

	$pdoStatement = $this->connection->prepare($sqlCommandText);
	$pdoStatement->execute();

	$placementList = array();
	foreach ($pdoStatement as $datarow)
	{
	    $placementList[] = self::Transform($datarow);
	}
	$pdoStatement->closeCursor();

	return $placementList;
    }

    public function UpdatePlacement(PlacementDTO $placement)
    {
	$sqlCommandText = "UpdatePlacement(?, ?, ?)";
	$sqlCommandParameters = [
	    $placement->getEmail(),
	    $placement->getEmail(),
	    $placement->getId(),
	    $placement->getName(),
	    $placement->getId()
	];

	$pdoStatement = $this->connection->prepare($sqlCommandText);
	$success = $pdoStatement->execute($sqlCommandParameters);
	$pdoStatement->closeCursor();
	return $success;
    }

    protected static function Transform($datarow)
    {
	$placement = new PlacementDTO();

	$placement->setEmail($datarow[DatabaseFields::PlacementEmail]);
	//$placement->setGps($datarow[DatabaseFields::PlacementGPS]);
	$placement->setId($datarow[DatabaseFields::PlacementId]);
	$placement->setName($datarow[DatabaseFields::PlacementName]);
	$placement->setPhone($datarow[DatabaseFields::PlacementPhone]);
	$placement->setType($datarow[DatabaseFields::PlacementType]);


	return $placement;
    }

    //
    //	Private Fields
    //
	private $connection;

}
