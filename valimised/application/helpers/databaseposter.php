<?php

$this->load->library("area_factory");
$this->load->library("party_factory");
$this->load->library("user_factory");

$dbhost = "localhost";
$dbuser = "dbusername";
$dbpass = "dbpassword";
$dbname = "dbname";

//Connect to MySQL Server
mysql_connect($dbhost, $dbuser, $dbpass);

//Select Database
mysql_select_db($dbname) or die(mysql_error());

// Retrieve data from Query String
$firstname = \filter_input(GET, "firstname");
$lastname = \filter_input(GET, "lastname");
$date = \filter_input(GET, "date");
$education = \filter_input(GET, "education");
$job = \filter_input(GET, "job");
$party = \filter_input(GET, "party");
$area = \filter_input(GET, "area");
$description = \filter_input(GET, "description");

// Escape User Input to help prevent SQL Injection
$firstname = mysql_real_escape_string($firstname);
$lastname = mysql_real_escape_string($lastname);
$date = mysql_real_escape_string($date);
$education = mysql_real_escape_string($education);
$job = mysql_real_escape_string($job);
$party = mysql_real_escape_string($party);
$area = mysql_real_escape_string($area);
$description = mysql_real_escape_string($description);
$party = $this->user_factory->getIdbyField("name", $party);
$user = $this->user_factory->getIdbyField("firstname", $firstname);
$area = $this->user_factory->getIdbyField("name", $area);
//build query
$query = "INSERT INTO `candidate`(`id`, `userid`, `areaid`, `partyid`, `education`, `birthdate`, `job`, `description`) 
        VALUES (id,user <= $user,area<= $area,party<=$party,education <= $education,"
        . "date <= $date,job <= $job,description <= $description)";

//Execute query
$qry_result = mysql_query($query) or die(mysql_error());
?>
