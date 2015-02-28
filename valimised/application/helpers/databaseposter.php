<?php

$this->load->library("area_factory");
$this->load->library("party_factory");
$this->load->library("user_factory");
$this->load->models("candidate_model");


// SQL asju pole hetkel vaja. Codeigniteri kaudu peaks saama otsel ükata
//$dbhost = "";
//$dbuser = "";
//$dbpass = "";
//$dbname = "morsakabi";

//Connect to MySQL Server
//mysql_connect($dbhost, $dbuser, $dbpass);

//Select Database
//mysql_select_db($dbname) or die(mysql_error());

// Retrieve data from Query String
$firstname = \filter_input(REQUEST, "firstname");
$lastname = \filter_input(REQUEST, "lastname");
$date = \filter_input(REQUEST, "date");
$education = \filter_input(REQUEST, "education");
$job = \filter_input(REQUEST, "job");
$party = \filter_input(REQUEST, "party");
$area = \filter_input(REQUEST, "area");
$description = \filter_input(REQUEST, "description");

// Escape User Input to help prevent SQL Injection
//$firstname = mysql_real_escape_string($firstname);
//$lastname = mysql_real_escape_string($lastname);
//$date = mysql_real_escape_string($date);
//$education = mysql_real_escape_string($education);
//$job = mysql_real_escape_string($job);
//$party = mysql_real_escape_string($party);
//$area = mysql_real_escape_string($area);
//$description = mysql_real_escape_string($description);
//$party = $this->user_factory->getIdbyField("name", $party);
//TEMPORARY
$user = random(500, 700);
$area = $this->user_factory->getIdbyField("name", $area);
//build query

$data = array(
'id' => 500,
'userid' => $user,
'areaid' => $area,
'partyid' => $party,
'education' => $education,
'birthdate' => $date,
'job' => $job,
'description' => $description
);

$this->candidate_model->form_insert($data);
$this->load->view('apply');
//$query = "INSERT INTO `candidate`(`id`, `userid`, `areaid`, `partyid`, `education`, `birthdate`, `job`, `description`) 
  //      VALUES (405,user <= $user,area<= $area,party<=$party,education <= $education,"
    //    . "date <= $date,job <= $job,description <= $description)";

//Execute query
//$qry_result = mysql_query($query) or die(mysql_error());
?>
