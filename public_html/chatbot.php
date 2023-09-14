<?php

// Medium: https://medium.com/@sirateek
// Github: https://github.com/maiyarapkung


	require_once("db.php");
	require 'sendMessage.php';
	require 'sendFlex.php';
	require 'getTextMessage.php';
	require 'getLINEProfile.php';
	require 'pushMsg.php';
	$LINEData = file_get_contents('php://input');
	$jsonData = json_decode($LINEData,true);

	
	error_log(print_r(" ", true));
	error_log(print_r("--------------- line : ----------", true));

	$replyToken = $jsonData["events"][0]["replyToken"];
	$userID = $jsonData["events"][0]["source"]["userId"];
	$text = $jsonData["events"][0]["message"]["text"];
	$timestamp = $jsonData["events"][0]["timestamp"];
	$messageType = $jsonData['events'][0]['message']['type'];

	error_log(print_r("line replyToken : " . $replyToken, true));
	error_log(print_r("line userId : " . $userID, true));
	error_log(print_r("line text : " . $text, true));
	error_log(print_r("line timestamp : " . $timestamp, true));
	error_log(print_r("line messageType : " . $messageType, true));
	
	//----------- get text --------------
	$lineData['URL'] = "https://api.line.me/v2/bot/message/reply";
	$lineData['AccessToken'] = $lineToken;
	//----------- get text --------------

	//----------- get profile --------------
	$LINEProfile['url'] = "https://api.line.me/v2/bot/profile/".$userID;
	$LINEProfile['token'] = $lineToken;

	$results = getLINEProfile($LINEProfile);
	file_put_contents('log-profile.txt', $results['message'] . PHP_EOL, FILE_APPEND);

	$profileMessage = json_encode($results['message']);

	error_log(print_r("line profileMessage : " . $profileMessage, true));
	
	//$profileData = json_decode($profileMessage, true); // Parse the JSON profile message
	$profileData = json_decode($results['message'], true);

	error_log(print_r("profileData: " . print_r($profileData, true), true)); // Debugging line
	$displayName = $profileData['displayName'];
	$pictureUrl = $profileData['pictureUrl'];
	$statusMessage = $profileData['statusMessage'] ?? '';

	error_log(print_r("line displayName : " . $displayName, true));
	error_log(print_r("line pictureUrl : " . $pictureUrl, true));
	error_log(print_r("line statusMessage : " . $statusMessage, true));
	//********************* */
	$userIdsToSendTo = array($userID);
	foreach ($userIdsToSendTo as $userIdToSendTo)
	{
		error_log(print_r("line flexMsg userIdToSendTo : " . $userIdToSendTo, true));
		error_log(print_r("line flexMsg text : " . $text, true));
		error_log(print_r("line flexMsg displayName : " . $displayName, true));
		error_log(print_r("line flexMsg pictureUrl : " . $pictureUrl, true));
		error_log(print_r("line flexMsg lineToken : " . $lineToken, true));
		$arrayHeader = array();
		$arrayHeader[] = "Content-Type: application/json";
		$arrayHeader[] = "Authorization: Bearer {$lineToken}";

		//$arrayPostData['to'] = 'U58947b61688e55fd6e75eda1730d308c';
		$arrayPostData['to'] = $userIdToSendTo;

		$arrayPostData['messages'] = array();
		//$arrayPostData['messages'][] = flexMsg($pictureUrl, $text, $displayName);

		$message = checkKeyWord($pictureUrl, $text, $displayName);
		// Check if $message is not null before adding it to the array
		if ($message !== null) {
			$arrayPostData['messages'][] = $message;
		}

		//error_log(print_r("line flexMsg : " . flexMsg($pictureUrl, $text, $displayName), true));

		error_log("Debug: Updated arrayHeader: " . json_encode($arrayHeader));

		error_log("Debug: Updated arrayPostData: " . json_encode($arrayPostData));

		pushMsg($arrayHeader, $arrayPostData);
	}
	//----------- End pushMsg to line admin -------------------

	// $results = sendMessage($encodeJson,$lineData); //sendMessage.php
	// echo $results;
	// error_log(print_r("line results : " . $results, true));
	http_response_code(200);
   	error_log(print_r(" -***-***-***- ", true));

?>
