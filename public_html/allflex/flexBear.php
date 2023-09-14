<?php
    function flexBear($pictureUrl, $text, $displayName)
    {
        // error_log(print_r("line flexMsg.php text : " . $text, true));
            // error_log(print_r("line flexMsg.php displayName : " . $displayName, true));
            // error_log(print_r("line flexMsg.php pictureUrl : " . $pictureUrl, true));
        $displayNameWithEscapedQuotes = str_replace('"', '\\"', $displayName);
        $flexDataJson = '{
            "type": "flex",
            "altText": "น้องหมีจ้าเธอ",
            "contents": {
                "type": "bubble",
                "hero": {
                    "type": "image",
                    "url": "https://becommon.co/wp-content/uploads/2019/05/Content-3.png",
                    "size": "full",
                    "aspectRatio": "20:20",
                    "aspectMode": "cover"
                },
                "body": {
                    "type": "box",
                    "layout": "vertical",
                    "spacing": "sm",
                    "contents": [
                        {
                            "type": "text",
                            "text": "' . 'Hi : ' . $displayNameWithEscapedQuotes . '",
                            "weight": "bold",
                            "size": "xl",
                            "wrap": true
                        },
                        {
                            "type": "box",
                            "layout": "baseline",
                            "contents": [
                                {
                                    "type": "text",
                                    "text": "น้องหมีจ้าเธอ",
                                    "weight": "bold",
                                    "size": "xl",
                                    "color": "#FF0000FF",
                                    "flex": 0,
                                    "wrap": true
                                }
                            ]
                        }
                    ]
                }
            }
        }';

        // Log the constructed message for debugging
        // error_log("Constructed message: " . $flexDataJson);

        // Attempt to decode the JSON string
        $decodedData = json_decode($flexDataJson, true);

        // Check if decoding was successful
        if ($decodedData === null) {
            error_log("Error decoding JSON: " . json_last_error_msg());
            return null;
        }

        return $decodedData;
    }
?>