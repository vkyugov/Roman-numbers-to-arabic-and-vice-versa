<?
/*
 *connect functions for convert data
 */
include_once('arab_to_roman.php');
include_once('roman_to_arab.php');
/*
 *check type of number
 */
if (isset($_POST["number"])) {
	$n = $_POST["number"];
	$a = 0;
	if(ctype_digit($n)){
		$a = arab_to_roman($n);
	}
	else{
		$a = roman_to_arab($n);
	}
/*
 *sent convert number to client
 */
	$result = array('chislo' => $a);
	echo json_encode($result);
}

else {
/*
 *error message
*/
    echo 'error : not receive Ajax data' . '<br>';
}
