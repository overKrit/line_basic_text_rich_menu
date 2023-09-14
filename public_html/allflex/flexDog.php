<?php
    function flexDog($pictureUrl, $text, $displayName)
    {
        error_log(print_r("line flexDog.php text : " . $text, true));
        error_log(print_r("line flexDog.php displayName : " . $displayName, true));
        error_log(print_r("line flexDog.php pictureUrl : " . $pictureUrl, true));
        $displayNameWithEscapedQuotes = str_replace('"', '\\"', $displayName);

        error_log(print_r("line flexDog.php displayNameWithEscapedQuotes : " . $displayNameWithEscapedQuotes, true));

        $flexDataJson = '{
            "type": "flex",
            "altText": "น้องหมาจ้าเธอ",
            "contents": {
              "type": "carousel",
              "contents": [
              {
                "type": "bubble",
                "hero": {
                  "type": "image",
                  "url": "https://f.ptcdn.info/496/043/000/o8oqydgre871QE9ii7m-o.jpg",
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
                      "wrap": true,
                      "contents": []
                    },
                    {
                      "type": "box",
                      "layout": "baseline",
                      "contents": [
                        {
                          "type": "text",
                          "text": "$49",
                          "weight": "bold",
                          "size": "xl",
                          "color": "#FF0000FF",
                          "flex": 0,
                          "align": "center",
                          "gravity": "center",
                          "wrap": true,
                          "contents": []
                        },
                        {
                          "type": "text",
                          "text": ".99",
                          "weight": "bold",
                          "size": "sm",
                          "color": "#FA1A1AFF",
                          "flex": 0,
                          "wrap": true,
                          "contents": []
                        }
                      ]
                    }
                  ]
                },
                "footer": {
                  "type": "box",
                  "layout": "vertical",
                  "spacing": "sm",
                  "contents": [
                    {
                      "type": "button",
                      "action": {
                        "type": "uri",
                        "label": "Add to Cart",
                        "uri": "https://linecorp.com"
                      },
                      "style": "primary"
                    },
                    {
                      "type": "button",
                      "action": {
                        "type": "uri",
                        "label": "Add to wishlist",
                        "uri": "https://f.ptcdn.info/496/043/000/o8oqydgre871QE9ii7m-o.jpg"
                      }
                    }
                  ]
                }
              },
              {
                "type": "bubble",
                "hero": {
                  "type": "image",
                  "url": "https://municipioscontraladeuda.org/wp-content/uploads/2020/12/S__14672052.jpg",
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
                      "wrap": true,
                      "contents": []
                    },
                    {
                      "type": "box",
                      "layout": "baseline",
                      "flex": 1,
                      "contents": [
                        {
                          "type": "text",
                          "text": "$11",
                          "weight": "bold",
                          "size": "xl",
                          "flex": 0,
                          "wrap": true,
                          "contents": []
                        },
                        {
                          "type": "text",
                          "text": ".99",
                          "weight": "bold",
                          "size": "sm",
                          "flex": 0,
                          "wrap": true,
                          "contents": []
                        }
                      ]
                    },
                    {
                      "type": "text",
                      "text": "Temporarily out of stock",
                      "size": "xxs",
                      "color": "#FF5551",
                      "flex": 0,
                      "margin": "md",
                      "wrap": true,
                      "contents": []
                    }
                  ]
                },
                "footer": {
                  "type": "box",
                  "layout": "vertical",
                  "spacing": "sm",
                  "contents": [
                    {
                      "type": "button",
                      "action": {
                        "type": "uri",
                        "label": "Add to Cart",
                        "uri": "https://linecorp.com"
                      },
                      "flex": 2,
                      "color": "#AAAAAA",
                      "style": "primary"
                    },
                    {
                      "type": "button",
                      "action": {
                        "type": "uri",
                        "label": "Add to wish list",
                        "uri": "https://municipioscontraladeuda.org/wp-content/uploads/2020/12/S__14672052.jpg"
                      }
                    }
                  ]
                }
              },
              {
                "type": "bubble",
                "body": {
                  "type": "box",
                  "layout": "vertical",
                  "spacing": "sm",
                  "contents": [
                    {
                      "type": "button",
                      "action": {
                        "type": "uri",
                        "label": "--Pai Kan Yai--",
                        "uri": "https://www.facebook.com/BarRestaurantclup"
                      },
                      "flex": 1,
                      "color": "#FF0000FF",
                      "gravity": "center"
                    }
                  ]
                }
              }
              ]
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