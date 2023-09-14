<?php
    function flexCat($pictureUrl, $text, $displayName)
    {
        error_log(print_r("line flexCat.php text : " . $text, true));
        error_log(print_r("line flexCat.php displayName : " . $displayName, true));
        error_log(print_r("line flexCat.php pictureUrl : " . $pictureUrl, true));
        $displayNameWithEscapedQuotes = str_replace('"', '\\"', $displayName);

        error_log(print_r("line flexCat.php displayNameWithEscapedQuotes : " . $displayNameWithEscapedQuotes, true));

        $flexDataJson = '{
            "type": "flex",
            "altText": "น้องแมวมาแล้วจ้าเธอ",
                "contents": {
                "type": "bubble",
                "direction": "ltr",
                "hero": {
                "type": "image",
                "url": "https://sutthiawareekul489.files.wordpress.com/2018/01/large-1.jpg",
                "size": "full",
                "aspectRatio": "20:20",
                "aspectMode": "cover",
                "action": {
                    "type": "uri",
                    "label": "Action",
                    "uri": "https://linecorp.com/"
                }
                },
                "body": {
                "type": "box",
                "layout": "vertical",
                "spacing": "md",
                "contents": [
                    {
                    "type": "text",
                    "text": "' . 'Hi : ' . $displayNameWithEscapedQuotes . '...... น้องแมวจ้า' . '",
                    "weight": "bold",
                    "size": "xl",
                    "gravity": "center",
                    "wrap": true,
                    "contents": []
                    },
                    {
                    "type": "box",
                    "layout": "baseline",
                    "margin": "md",
                    "contents": [
                        {
                        "type": "icon",
                        "url": "https://scdn.line-apps.com/n/channel_devcenter/img/fx/review_gold_star_28.png",
                        "size": "sm"
                        },
                        {
                        "type": "icon",
                        "url": "https://scdn.line-apps.com/n/channel_devcenter/img/fx/review_gold_star_28.png",
                        "size": "sm"
                        },
                        {
                        "type": "icon",
                        "url": "https://scdn.line-apps.com/n/channel_devcenter/img/fx/review_gold_star_28.png",
                        "size": "sm"
                        },
                        {
                        "type": "icon",
                        "url": "https://scdn.line-apps.com/n/channel_devcenter/img/fx/review_gold_star_28.png",
                        "size": "sm"
                        },
                        {
                        "type": "icon",
                        "url": "https://scdn.line-apps.com/n/channel_devcenter/img/fx/review_gray_star_28.png",
                        "size": "sm"
                        },
                        {
                        "type": "text",
                        "text": "4.0",
                        "size": "sm",
                        "color": "#999999",
                        "flex": 0,
                        "margin": "md",
                        "contents": []
                        }
                    ]
                    },
                    {
                    "type": "box",
                    "layout": "vertical",
                    "spacing": "sm",
                    "margin": "lg",
                    "contents": [
                        {
                        "type": "box",
                        "layout": "baseline",
                        "spacing": "sm",
                        "contents": [
                            {
                            "type": "text",
                            "text": "Date",
                            "size": "sm",
                            "color": "#AAAAAA",
                            "flex": 1,
                            "contents": []
                            },
                            {
                            "type": "text",
                            "text": "Monday 25, 9:00PM",
                            "size": "sm",
                            "color": "#666666",
                            "flex": 4,
                            "wrap": true,
                            "contents": []
                            }
                        ]
                        },
                        {
                        "type": "box",
                        "layout": "baseline",
                        "spacing": "sm",
                        "contents": [
                            {
                            "type": "text",
                            "text": "Place",
                            "size": "sm",
                            "color": "#AAAAAA",
                            "flex": 1,
                            "contents": []
                            },
                            {
                            "type": "text",
                            "text": "7 Floor, No.3",
                            "size": "sm",
                            "color": "#666666",
                            "flex": 4,
                            "wrap": true,
                            "contents": []
                            }
                        ]
                        },
                        {
                        "type": "box",
                        "layout": "baseline",
                        "spacing": "sm",
                        "contents": [
                            {
                            "type": "text",
                            "text": "Seats",
                            "size": "sm",
                            "color": "#AAAAAA",
                            "flex": 1,
                            "contents": []
                            },
                            {
                            "type": "text",
                            "text": "C Row, 18 Seat",
                            "size": "sm",
                            "color": "#666666",
                            "flex": 4,
                            "wrap": true,
                            "contents": []
                            }
                        ]
                        }
                    ]
                    },
                    {
                    "type": "box",
                    "layout": "vertical",
                    "margin": "xxl",
                    "contents": [
                        {
                        "type": "spacer"
                        },
                        {
                        "type": "image",
                        "url": "https://scdn.line-apps.com/n/channel_devcenter/img/fx/linecorp_code_withborder.png",
                        "size": "xl",
                        "aspectMode": "cover"
                        },
                        {
                        "type": "text",
                        "text": "You can enter the theater by using this code instead of a ticket",
                        "size": "xs",
                        "color": "#AAAAAA",
                        "margin": "xxl",
                        "wrap": true,
                        "contents": []
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
            error_log("Error decoding flexCat JSON: " . json_last_error_msg());
            return null;
        }

        return $decodedData;
    }
?>