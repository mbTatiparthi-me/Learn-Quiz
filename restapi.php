<?php
/**
 * @author Mahesh Babu <info@godigitally.co.in>
 * @copyright Go Digitally 2020
 * @package quiz-template
 * 
 * 
 * Created using IMABuildeRz v3 (rev20.10.18)
 */


/** site **/
$config["app-name"]			= "Quiz Template" ; //Write the name of your website
$config["app-desc"]			= "Quiz Template" ; //Write a brief description of your website
$config["utf8"]				= true; 
$config["debug"]			= false; 
$config["protect"]			= false; 
$config["url"]			= "https://learn-quiz.herokuapp.com/restapi.php"; 
$config["userfile_url"]			= ""; // leave blank for absolute urls
$config["timezone"]			= "Asia/Kolkata" ; // check this site: http://php.net/manual/en/timezones.php
$config["gzip"]			= false; //compressed page 

/** mysql **/
$config["db_host"]				= "us-cdbr-east-02.cleardb.com" ; //host
$config["db_user"]				= "b3a7fd664bf911" ; //Username SQL
$config["db_pwd"]				= "41c8709d" ; //Password SQL
$config["db_name"]			= "heroku_37305a600133088" ; //Database


/** DON'T EDIT THE CODE BELLOW **/
session_start();
if($config["gzip"]==true){
	ob_start("ob_gzhandler");
}
ini_set("internal_encoding", "utf-8");
date_default_timezone_set($config["timezone"]);
if($config["debug"]==true){
	error_reporting(E_ALL);
}else{
	error_reporting(0);
}

if($config["protect"]==true){
	if(isset($_SERVER["HTTP_USER_AGENT"])){
		if(!preg_match("/quiz\-template/i",$_SERVER["HTTP_USER_AGENT"])){
			die("Not allowed");
		}
	}else{
		die("Not allowed");
	}
}

if(isset($_SERVER["HTTP_X_AUTHORIZATION"])){
	$_SERVER["HTTP_AUTHORIZATION"] = $_SERVER["HTTP_X_AUTHORIZATION"];
}
/** CONNECT TO MYSQL **/
$mysql = new mysqli($config["db_host"], $config["db_user"], $config["db_pwd"], $config["db_name"]);
if (mysqli_connect_errno()){
	die(mysqli_connect_error());
}

if($config["utf8"]==true){
	$mysql->set_charset("utf8");
}
if(!isset($_GET["api"])){
	$_GET["api"]= "route";
}
$root_url = $config["url"];
$rest_api=array("data"=>array("status"=>404,"title"=>"Not found"),"title"=>"Error","message"=>"Routes not found");
switch($_GET["api"]){
	case "route":
		// TODO: JSON --+-- ROUTES
		$rest_api=array();
		$rest_api["name"] = "Quiz Template" ;
		$rest_api["description"] = "Quiz Template" ;
		$rest_api["generator"] = "IMA-BuildeRz vrev20.10.18" ;

		$rest_api["namespaces"][1] = "categories/";
		$rest_api["namespaces"][2] = "quiz/";

		$rest_api["routes"]["/categories/"]["namespace"] = "categories/";
		$rest_api["routes"]["/categories/"]["methods"][0] = "GET";
		$rest_api["routes"]["/categories/"]["endpoints"][0]["methods"][0] = "GET";
		$rest_api["routes"]["/categories/"]["endpoints"][0]["args"]["category-name"]["required"] = false;
		$rest_api["routes"]["/categories/"]["endpoints"][0]["args"]["category-name"]["default"] = "";
		$rest_api["routes"]["/categories/"]["endpoints"][0]["args"]["category-name"]["type"] = "string";
		$rest_api["routes"]["/categories/"]["endpoints"][0]["args"]["category-name"]["description"] = "Limit result set to items with more specific by `category_name`.";

		$rest_api["routes"]["/categories/"]["endpoints"][0]["args"]["orderby"]["required"] = false;
		$rest_api["routes"]["/categories/"]["endpoints"][0]["args"]["orderby"]["default"] = "cat_id";
		$rest_api["routes"]["/categories/"]["endpoints"][0]["args"]["orderby"]["type"] = "string";
		$rest_api["routes"]["/categories/"]["endpoints"][0]["args"]["orderby"]["enum"][0] = "cat-id";
		$rest_api["routes"]["/categories/"]["endpoints"][0]["args"]["orderby"]["enum"][1] = "category-name";
		$rest_api["routes"]["/categories/"]["endpoints"][0]["args"]["orderby"]["enum"][2] = "category-image";
		$rest_api["routes"]["/categories/"]["endpoints"][0]["args"]["orderby"]["description"] = "Sort collection by object attribute";
		$rest_api["routes"]["/categories/"]["endpoints"][0]["args"]["sort"]["required"] = false;
		$rest_api["routes"]["/categories/"]["endpoints"][0]["args"]["sort"]["default"] = "asc";
		$rest_api["routes"]["/categories/"]["endpoints"][0]["args"]["sort"]["type"] = "string";
		$rest_api["routes"]["/categories/"]["endpoints"][0]["args"]["sort"]["enum"][0] = "asc";
		$rest_api["routes"]["/categories/"]["endpoints"][0]["args"]["sort"]["enum"][1] = "desc";
		$rest_api["routes"]["/categories/"]["endpoints"][0]["args"]["sort"]["description"] = "Order sort attribute ascending or descending";
		$rest_api["routes"]["/categories/"]["endpoints"][0]["_links"][0] = $root_url . "?api=categories";

		$rest_api["routes"]["/categories/(?P<cat-id>[\d]+)"]["namespace"] = "categories/";
		$rest_api["routes"]["/categories/(?P<cat-id>[\d]+)"]["method"][0] = "GET";
		$rest_api["routes"]["/categories/(?P<cat-id>[\d]+)"]["endpoints"]["args"]["cat-id"]["required"] = "true";
		$rest_api["routes"]["/categories/(?P<cat-id>[\d]+)"]["endpoints"]["args"]["cat-id"]["type"] = "integer";
		$rest_api["routes"]["/categories/(?P<cat-id>[\d]+)"]["endpoints"]["args"]["cat-id"]["description"] = "Unique identifier for the object";
		$rest_api["routes"]["/categories/(?P<cat-id>[\d]+)"]["endpoints"]["_links"][0] = $root_url . "?api=categories&cat-id=<cat-id>";

		$rest_api["routes"]["/quiz/"]["namespace"] = "quiz/";
		$rest_api["routes"]["/quiz/"]["methods"][0] = "GET";
		$rest_api["routes"]["/quiz/"]["endpoints"][0]["methods"][0] = "GET";
		$rest_api["routes"]["/quiz/"]["endpoints"][0]["args"]["category"]["required"] = false;
		$rest_api["routes"]["/quiz/"]["endpoints"][0]["args"]["category"]["default"] = "";
		$rest_api["routes"]["/quiz/"]["endpoints"][0]["args"]["category"]["type"] = "string";
		$rest_api["routes"]["/quiz/"]["endpoints"][0]["args"]["category"]["description"] = "Limit result set to items with more specific by `category`.";
		$rest_api["routes"]["/quiz/"]["endpoints"][0]["args"]["question"]["required"] = false;
		$rest_api["routes"]["/quiz/"]["endpoints"][0]["args"]["question"]["default"] = "";
		$rest_api["routes"]["/quiz/"]["endpoints"][0]["args"]["question"]["type"] = "string";
		$rest_api["routes"]["/quiz/"]["endpoints"][0]["args"]["question"]["description"] = "Limit result set to items with more specific by `question`.";
		$rest_api["routes"]["/quiz/"]["endpoints"][0]["args"]["choice1"]["required"] = false;
		$rest_api["routes"]["/quiz/"]["endpoints"][0]["args"]["choice1"]["default"] = "";
		$rest_api["routes"]["/quiz/"]["endpoints"][0]["args"]["choice1"]["type"] = "string";
		$rest_api["routes"]["/quiz/"]["endpoints"][0]["args"]["choice1"]["description"] = "Limit result set to items with more specific by `choice1`.";
		$rest_api["routes"]["/quiz/"]["endpoints"][0]["args"]["choice2"]["required"] = false;
		$rest_api["routes"]["/quiz/"]["endpoints"][0]["args"]["choice2"]["default"] = "";
		$rest_api["routes"]["/quiz/"]["endpoints"][0]["args"]["choice2"]["type"] = "string";
		$rest_api["routes"]["/quiz/"]["endpoints"][0]["args"]["choice2"]["description"] = "Limit result set to items with more specific by `choice2`.";
		$rest_api["routes"]["/quiz/"]["endpoints"][0]["args"]["choice3"]["required"] = false;
		$rest_api["routes"]["/quiz/"]["endpoints"][0]["args"]["choice3"]["default"] = "";
		$rest_api["routes"]["/quiz/"]["endpoints"][0]["args"]["choice3"]["type"] = "string";
		$rest_api["routes"]["/quiz/"]["endpoints"][0]["args"]["choice3"]["description"] = "Limit result set to items with more specific by `choice3`.";
		$rest_api["routes"]["/quiz/"]["endpoints"][0]["args"]["choice4"]["required"] = false;
		$rest_api["routes"]["/quiz/"]["endpoints"][0]["args"]["choice4"]["default"] = "";
		$rest_api["routes"]["/quiz/"]["endpoints"][0]["args"]["choice4"]["type"] = "string";
		$rest_api["routes"]["/quiz/"]["endpoints"][0]["args"]["choice4"]["description"] = "Limit result set to items with more specific by `choice4`.";
		$rest_api["routes"]["/quiz/"]["endpoints"][0]["args"]["answer"]["required"] = false;
		$rest_api["routes"]["/quiz/"]["endpoints"][0]["args"]["answer"]["default"] = "";
		$rest_api["routes"]["/quiz/"]["endpoints"][0]["args"]["answer"]["type"] = "string";
		$rest_api["routes"]["/quiz/"]["endpoints"][0]["args"]["answer"]["description"] = "Limit result set to items with more specific by `answer`.";

		$rest_api["routes"]["/quiz/"]["endpoints"][0]["args"]["orderby"]["required"] = false;
		$rest_api["routes"]["/quiz/"]["endpoints"][0]["args"]["orderby"]["default"] = "quiz_id";
		$rest_api["routes"]["/quiz/"]["endpoints"][0]["args"]["orderby"]["type"] = "string";
		$rest_api["routes"]["/quiz/"]["endpoints"][0]["args"]["orderby"]["enum"][0] = "quiz-id";
		$rest_api["routes"]["/quiz/"]["endpoints"][0]["args"]["orderby"]["enum"][1] = "category";
		$rest_api["routes"]["/quiz/"]["endpoints"][0]["args"]["orderby"]["enum"][2] = "question";
		$rest_api["routes"]["/quiz/"]["endpoints"][0]["args"]["orderby"]["enum"][3] = "choice1";
		$rest_api["routes"]["/quiz/"]["endpoints"][0]["args"]["orderby"]["enum"][4] = "choice2";
		$rest_api["routes"]["/quiz/"]["endpoints"][0]["args"]["orderby"]["enum"][5] = "choice3";
		$rest_api["routes"]["/quiz/"]["endpoints"][0]["args"]["orderby"]["enum"][6] = "choice4";
		$rest_api["routes"]["/quiz/"]["endpoints"][0]["args"]["orderby"]["enum"][7] = "answer";
		$rest_api["routes"]["/quiz/"]["endpoints"][0]["args"]["orderby"]["description"] = "Sort collection by object attribute";
		$rest_api["routes"]["/quiz/"]["endpoints"][0]["args"]["sort"]["required"] = false;
		$rest_api["routes"]["/quiz/"]["endpoints"][0]["args"]["sort"]["default"] = "asc";
		$rest_api["routes"]["/quiz/"]["endpoints"][0]["args"]["sort"]["type"] = "string";
		$rest_api["routes"]["/quiz/"]["endpoints"][0]["args"]["sort"]["enum"][0] = "asc";
		$rest_api["routes"]["/quiz/"]["endpoints"][0]["args"]["sort"]["enum"][1] = "desc";
		$rest_api["routes"]["/quiz/"]["endpoints"][0]["args"]["sort"]["description"] = "Order sort attribute ascending or descending";
		$rest_api["routes"]["/quiz/"]["endpoints"][0]["_links"][0] = $root_url . "?api=quiz";

		$rest_api["routes"]["/quiz/(?P<quiz-id>[\d]+)"]["namespace"] = "quiz/";
		$rest_api["routes"]["/quiz/(?P<quiz-id>[\d]+)"]["method"][0] = "GET";
		$rest_api["routes"]["/quiz/(?P<quiz-id>[\d]+)"]["endpoints"]["args"]["quiz-id"]["required"] = "true";
		$rest_api["routes"]["/quiz/(?P<quiz-id>[\d]+)"]["endpoints"]["args"]["quiz-id"]["type"] = "integer";
		$rest_api["routes"]["/quiz/(?P<quiz-id>[\d]+)"]["endpoints"]["args"]["quiz-id"]["description"] = "Unique identifier for the object";
		$rest_api["routes"]["/quiz/(?P<quiz-id>[\d]+)"]["endpoints"]["_links"][0] = $root_url . "?api=quiz&quiz-id=<quiz-id>";		break;
	case "categories":
		$rest_api = array();
		// TODO: JSON --+-- CATEGORIES
		/** statement `where` **/

		if(isset($_GET["cat-id"])){
			if($_GET["cat-id"] != "-1"){
				if($_GET["cat-id"]=="random"){
					$_GET["orderby"] = "random";
				}else{
					$id = (int)$_GET["cat-id"] ; 
					$statement[] = "`cat_id` =$id"; 
				}
			}
		}

		if(isset($_GET["category-name"])){
			if($_GET["category-name"] != "-1"){
				$value = $mysql->escape_string($_GET["category-name"]); 
				$statement[] = "`category_name` LIKE '%$value%'"; 
			}
		}

		if(isset($_GET["category-image"])){
			if($_GET["category-image"] != "-1"){
				$value = $mysql->escape_string($_GET["category-image"]); 
				$statement[] = "`category_image` LIKE '%$value%'"; 
			}
		}

		$where ="" ;
		if(isset($statement)){
			$where ="WHERE " . implode(" AND ",$statement);
		}
		/** order by **/
		$order_by = "`cat_id`";
		if(isset($_GET["orderby"])){
			switch($_GET["orderby"]){
			case "cat-id":
				$order_by = "`cat_id`";
				break;
			case "category-name":
				$order_by = "`category_name`";
				break;
			case "category-image":
				$order_by = "`category_image`";
				break;
			case "random":
				$order_by = "RAND()";
				break;
			}
		}

		/** sort **/
		$sort = "ASC";
		if(isset($_GET["sort"])){
			if($_GET["sort"]=="asc"){
				$sort = "ASC";
			}else{
				$sort = "DESC";
			}
		}

		$sql_query = "SELECT * FROM `categories` ".$where." ORDER BY ".$order_by." ".$sort.";"; 
		$z=0;
		if($result = $mysql->query($sql_query)){
			while ($data = $result->fetch_array()){
				if(isset($data["cat_id"])){
					$data_rest_api[$z] = $data;
					$rest_api[$z]["cat_id"] = (int) $data["cat_id"];
				}
				if(isset($data["category_name"])){
					$data_rest_api[$z] = $data;
					$rest_api[$z]["category_name"] = $data["category_name"];
				}
				if(isset($data["category_image"])){
					$data_rest_api[$z] = $data;
					$rest_api[$z]["category_image"] = $config["userfile_url"] . $data["category_image"];
				}
				$rest_api[$z]["_links"]["self"][0] = $root_url . "?api=categories&cat-id=". $data["cat_id"];
				$z++;
			}
			$result->close();
		}
		if(isset($_GET["cat-id"])){
			if(isset($data_rest_api[0])){
				$rest_api = array();
				$rest_api["cat_id"] = $data_rest_api[0]["cat_id"];
				$rest_api["category_name"] = $data_rest_api[0]["category_name"];
				$rest_api["category_image"] = $config["userfile_url"] . $data_rest_api[0]["category_image"];
			}else{
				$rest_api=array("data"=>array("status"=>404,"title"=>"Not found"),"title"=>"Error","message"=>"Invalid ID");
			}
		}
		break;
	case "quiz":
		$rest_api = array();
		// TODO: JSON --+-- QUIZ
		/** statement `where` **/

		if(isset($_GET["quiz-id"])){
			if($_GET["quiz-id"] != "-1"){
				if($_GET["quiz-id"]=="random"){
					$_GET["orderby"] = "random";
				}else{
					$id = (int)$_GET["quiz-id"] ; 
					$statement[] = "`quiz_id` =$id"; 
				}
			}
		}

		if(isset($_GET["category"])){
			if($_GET["category"] != "-1"){
				$value = $mysql->escape_string($_GET["category"]); 
				$statement[] = "`category` LIKE '$value'"; 
			}
		}

		if(isset($_GET["question"])){
			if($_GET["question"] != "-1"){
				$value = $mysql->escape_string($_GET["question"]); 
				$statement[] = "`question` LIKE '%$value%'"; 
			}
		}

		if(isset($_GET["choice1"])){
			if($_GET["choice1"] != "-1"){
				$value = $mysql->escape_string($_GET["choice1"]); 
				$statement[] = "`choice1` LIKE '%$value%'"; 
			}
		}

		if(isset($_GET["choice2"])){
			if($_GET["choice2"] != "-1"){
				$value = $mysql->escape_string($_GET["choice2"]); 
				$statement[] = "`choice2` LIKE '%$value%'"; 
			}
		}

		if(isset($_GET["choice3"])){
			if($_GET["choice3"] != "-1"){
				$value = $mysql->escape_string($_GET["choice3"]); 
				$statement[] = "`choice3` LIKE '%$value%'"; 
			}
		}

		if(isset($_GET["choice4"])){
			if($_GET["choice4"] != "-1"){
				$value = $mysql->escape_string($_GET["choice4"]); 
				$statement[] = "`choice4` LIKE '%$value%'"; 
			}
		}

		if(isset($_GET["answer"])){
			if($_GET["answer"] != "-1"){
				$value = $mysql->escape_string($_GET["answer"]); 
				$statement[] = "`answer` LIKE '%$value%'"; 
			}
		}

		$where ="" ;
		if(isset($statement)){
			$where ="WHERE " . implode(" AND ",$statement);
		}
		/** order by **/
		$order_by = "`quiz_id`";
		if(isset($_GET["orderby"])){
			switch($_GET["orderby"]){
			case "quiz-id":
				$order_by = "`quiz_id`";
				break;
			case "category":
				$order_by = "`category`";
				break;
			case "question":
				$order_by = "`question`";
				break;
			case "choice1":
				$order_by = "`choice1`";
				break;
			case "choice2":
				$order_by = "`choice2`";
				break;
			case "choice3":
				$order_by = "`choice3`";
				break;
			case "choice4":
				$order_by = "`choice4`";
				break;
			case "answer":
				$order_by = "`answer`";
				break;
			case "random":
				$order_by = "RAND()";
				break;
			}
		}

		/** sort **/
		$sort = "ASC";
		if(isset($_GET["sort"])){
			if($_GET["sort"]=="asc"){
				$sort = "ASC";
			}else{
				$sort = "DESC";
			}
		}

		$sql_query = "SELECT * FROM `quiz` ".$where." ORDER BY ".$order_by." ".$sort.";"; 
		$z=0;
		if($result = $mysql->query($sql_query)){
			while ($data = $result->fetch_array()){
				if(isset($data["quiz_id"])){
					$data_rest_api[$z] = $data;
					$rest_api[$z]["quiz_id"] = (int) $data["quiz_id"];
				}
				if(isset($data["category"])){
					$data_rest_api[$z] = $data;
					$rest_api[$z]["category"]["id"] = $data["category"];
					$categories_id = htmlentities(stripslashes($data["category"]));
					$sql_categories_query = "SELECT * FROM `categories` WHERE `cat_id`='{$categories_id}'" ;
					$categories_result = $mysql->query($sql_categories_query);
					if($categories_result){
						$categories_result_data = $categories_result->fetch_array();
						if(isset($categories_result_data["category_name"])){
							$rest_api[$z]["category"]["rendered"] = stripslashes($categories_result_data["category_name"]);
						}else{
							$rest_api[$z]["category"]["rendered"] = "";
						}
					}else{
						$rest_api[$z]["category"]["rendered"] = "";
					}
				}
				if(isset($data["question"])){
					$data_rest_api[$z] = $data;
					$rest_api[$z]["question"] = $data["question"];
				}
				if(isset($data["choice1"])){
					$data_rest_api[$z] = $data;
					$rest_api[$z]["choice1"] = $data["choice1"];
				}
				if(isset($data["choice2"])){
					$data_rest_api[$z] = $data;
					$rest_api[$z]["choice2"] = $data["choice2"];
				}
				if(isset($data["choice3"])){
					$data_rest_api[$z] = $data;
					$rest_api[$z]["choice3"] = $data["choice3"];
				}
				if(isset($data["choice4"])){
					$data_rest_api[$z] = $data;
					$rest_api[$z]["choice4"] = $data["choice4"];
				}
				if(isset($data["answer"])){
					$data_rest_api[$z] = $data;
					$rest_api[$z]["answer"] = $data["answer"];
				}
				$rest_api[$z]["_links"]["self"][0] = $root_url . "?api=quiz&quiz-id=". $data["quiz_id"];
				$z++;
			}
			$result->close();
		}
		if(isset($_GET["quiz-id"])){
			if(isset($data_rest_api[0])){
				$rest_api = array();
				$rest_api["quiz_id"] = $data_rest_api[0]["quiz_id"];
				$rest_api["category"]["rendered"] = "Invalid ID";
				$rest_api["category"]["id"] = $data_rest_api[0]["category"];
				$categories_id = htmlentities(stripslashes($data_rest_api[0]["category"]));
				$sql_categories_query = "SELECT * FROM `categories` WHERE `cat_id`='{$categories_id}'" ;
				$categories_result = $mysql->query($sql_categories_query);
				if($categories_result){
					$categories_result_data = $categories_result->fetch_array();
					if(isset($categories_result_data["category_name"])){
						$rest_api["category"]["rendered"] = stripslashes($categories_result_data["category_name"]);
					}else{
						$rest_api["category"]["rendered"] = "Invalid ID";
					}
				}else{
					$rest_api["category"]["rendered"] = "Invalid ID";
				}
				$rest_api["question"] = $data_rest_api[0]["question"];
				$rest_api["choice1"] = $data_rest_api[0]["choice1"];
				$rest_api["choice2"] = $data_rest_api[0]["choice2"];
				$rest_api["choice3"] = $data_rest_api[0]["choice3"];
				$rest_api["choice4"] = $data_rest_api[0]["choice4"];
				$rest_api["answer"] = $data_rest_api[0]["answer"];
			}else{
				$rest_api=array("data"=>array("status"=>404,"title"=>"Not found"),"title"=>"Error","message"=>"Invalid ID");
			}
		}
		break;
}

$mysql->close();

// TODO: JSON --+-- CROSSDOMAIN
header('Content-Type: application/json; charset=UTF-8');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Allow-Methods: GET, POST, PUT, OPTIONS');
header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Authorization, X-Authorization');
header('Access-Control-Max-Age: 86400');
header('Connection: close');

if (!isset($_GET["callback"])){
	// TODO: OUTPUT --+-- JSON
	if(defined("JSON_UNESCAPED_UNICODE")){
		echo json_encode($rest_api,JSON_UNESCAPED_UNICODE);
	}else{
		echo json_encode($rest_api);
	}
}else{
	// TODO: OUTPUT --+-- JSONP
	if(defined("JSON_UNESCAPED_UNICODE")){
		echo strip_tags($_GET["callback"]) ."(". json_encode($rest_api,JSON_UNESCAPED_UNICODE). ");" ;
	}else{
		echo strip_tags($_GET["callback"]) ."(". json_encode($rest_api) . ");" ;
	}
}

