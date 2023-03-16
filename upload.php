<?php

// A list of permitted file extensions
// $allowed = array('png', 'jpg', 'gif','zip');
// A list of disallowed file extensions
$disallowed = array('php'); // prevent uploading of php files!

if(isset($_FILES['upl']) && $_FILES['upl']['error'] == 0){

	$extension = pathinfo($_FILES['upl']['name'], PATHINFO_EXTENSION);

	if(in_array(strtolower($extension), $disallowed)){
		echo '{"status":"error, php files are not allowed"}';
		exit;
	}

	if(move_uploaded_file($_FILES['upl']['tmp_name'], 'uploads/'.$_FILES['upl']['name'])){
		echo '{"status":"success"}';
		exit;
	}
}

echo '{"status":"error"}';
exit;