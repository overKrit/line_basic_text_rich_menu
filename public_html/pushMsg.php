<?php
    function pushMsg($arrayHeader,$arrayPostData)
	{
		if (empty($arrayPostData['messages'])) {
			error_log("Message body is empty. Skipping pushMsg.");
			return;
		}
		
		// Log the request payload before sending
		error_log("Request Payload: " . json_encode($arrayPostData));

		$strUrl = "https://api.line.me/v2/bot/message/push";
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL,$strUrl);
		curl_setopt($ch, CURLOPT_HEADER, false);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $arrayHeader);
		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($arrayPostData));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		$result = curl_exec($ch);
		// Check for cURL errors
		if (curl_errno($ch)) {
			error_log("cURL Error: " . curl_error($ch));
		}

		// Check HTTP response code
		$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		if ($httpCode !== 200) {
			error_log("HTTP Error: Response code " . $httpCode);
			// Handle the HTTP error gracefully here, if needed
		}
		curl_close ($ch);

		// Log the result
		error_log("LINE API Response: " . $result);
   }
?>