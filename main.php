<?php
require('user.php');
require("apihandler.php");

$userliste = array();
$userliste["admin"] = new User("admin", "pwd");

function get_username() {
	fwrite(STDOUT, "Please enter your username: ");
	return trim(fgets(STDIN));
}
function get_pwd() {
	fwrite(STDOUT, "Please enter your password: ");
	return trim(fgets(STDIN));
}
function add_user($u, $p) {
	$u = new User($u, $p);
	return $u;
}
function login($u, $p, $userliste) {
	return $userliste[$u]->is_autheticated($p);
}



while (true) {
	$username = get_username();
	$pwd = get_pwd();
	$userliste[$username] = add_user($username, $pwd);
	fwrite(STDOUT, "Add another User? Enter Y or N: ");
	if(trim(fgets(STDIN)) == "N") {
		break 1;
	}
}

fwrite(STDOUT, "Login - Enter your username: ");
$entered_user = trim(fgets(STDIN));
fwrite(STDOUT, "Login - Enter your password: ");
$entered_pw = trim(fgets(STDIN));

if (login($entered_user,$entered_pw, $userliste)) {
	$apihandler = new ApiHandler($entered_user, $entered_pw);
	fwrite(STDOUT, "Enter Anime Name to search for: ");
	$anime = trim(fgets(STDIN));
	$apihandler->searchAnime($anime);
	
} else {
	echo("Authentication failed!");
}



//foreach($userliste as $index=>$user) {
//	echo("user: " .$user->username . "  pw: " . $user->get_password() . " \n");	
//}




exit(0);

?>