<?php
    function getTextMessage($text, $userID, $mysql, $displayName, $pictureUrl, $statusMessage)
	{
		$data = explode(" ", $text);

		if($data[0] == "add")
		{
			$mysql->query("INSERT INTO `Customer`(`UserID`, `CustomerID`, `Name`, `Surname`) VALUES ('$userID','$data[1]','$data[2]','$data[3]')");
		}
		else if($data[0] == "remove")
		{
			$mysql->query("DELETE FROM `Customer` WHERE `Customer`.`UserID` = '$userID'");
		}

		$queryString = "SELECT * FROM `Customer` WHERE `UserID`='$userID'";
		$getUser = $mysql->query($queryString);
		$getuserNum = $getUser->num_rows;
		error_log(print_r("line : " . $queryString, true));
		error_log(print_r("line : " . $getuserNum, true));
		
		$replyText["type"] = "text";
		if ($getuserNum == "0"){
			if($data[0] == "remove")
			{
				$replyText["text"] = "ลบแล้วโว้ยๆๆๆๆๆๆๆๆ";
			}
			else if($text == "how to add")
			{
				$replyText["text"] = "CustomerID name sername [อย่าลืมเว้นวรรคละ]";
			}
			else
			{
				$replyText["text"] = "สวัสดีคับบบบ เพ่ - $displayName รูปของเพ่ - $pictureUrl <---> https://tuktatape.com/" ;
			}
			
		} else {
			while($row = $getUser->fetch_assoc())
			{
				error_log(print_r("line : " . $row['Name'], true));
				print_r($row);  // Debugging line
				$Name = $row['Name'];
				$Surname = $row['Surname'];
				$CustomerID = $row['CustomerID'];
			}
			if($data[0] == "add")
			{
				$replyText["text"] = "Yo $displayName เพิ่มแล้วครับ พี่  $Name $Surname (# $CustomerID)";
			}
			else
			{
				$replyText["text"] = "Yo $displayName [$statusMessage] สวัสดีคุณ $Name $Surname พิมพ์ - $text [Pictur = $pictureUrl]";
			}
		}

		return $replyText;

	}
?>