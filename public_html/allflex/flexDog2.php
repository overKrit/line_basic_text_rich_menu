<?php

    function flexDog($pictureUrl, $text, $displayName)
    {
        error_log(print_r("line flexDog2.php text : " . $text, true));
        error_log(print_r("line flexDog2.php displayName : " . $displayName, true));
        error_log(print_r("line flexDog2.php pictureUrl : " . $pictureUrl, true));

        $displayNameWithEscapedQuotes = str_replace('"', '\\"', $displayName);

        // Define a carousel message with multiple items
        $carouselMessage = [
            "type" => "carousel",
            "type" => "carousel",
            "contents" => [
                // Carousel Item 1
                [
                    "type" => "bubble",
                    "hero" => [
                        "type" => "image",
                        "url" => "https://scdn.line-apps.com/n/channel_devcenter/img/fx/01_5_carousel.png",
                        "size" => "full",
                        "aspectRatio" => "20:20",
                        "aspectMode" => "cover"
                    ],
                    "body" => [
                        "type" => "box",
                        "layout" => "vertical",
                        "spacing" => "sm",
                        "contents" => [
                            [
                                "type" => "text",
                                "text" => "Arm Chair, White",
                                "weight" => "bold",
                                "size" => "xl",
                                "wrap" => true
                            ],
                            [
                                "type" => "box",
                                "layout" => "baseline",
                                "contents" => [
                                    [
                                        "type" => "text",
                                        "text" => "$49",
                                        "weight" => "bold",
                                        "size" => "xl",
                                        "color" => "#FF0000FF",
                                        "flex" => 0,
                                        "align" => "center",
                                        "gravity" => "center",
                                        "wrap" => true
                                    ],
                                    [
                                        "type" => "text",
                                        "text" => ".99",
                                        "weight" => "bold",
                                        "size" => "sm",
                                        "color" => "#FA1A1AFF",
                                        "flex" => 0,
                                        "wrap" => true
                                    ]
                                ]
                            ]
                        ]
                    ],
                    "footer" => [
                        "type" => "box",
                        "layout" => "vertical",
                        "spacing" => "sm",
                        "contents" => [
                            [
                                "type" => "button",
                                "action" => [
                                    "type" => "uri",
                                    "label" => "Add to Cart",
                                    "uri" => "https://linecorp.com"
                                ],
                                "style" => "primary"
                            ],
                            [
                                "type" => "button",
                                "action" => [
                                    "type" => "uri",
                                    "label" => "Add to wishlist",
                                    "uri" => "https://linecorp.com"
                                ]
                            ]
                        ]
                    ]
                ],
                // Carousel Item 2
                [
                    "type" => "bubble",
                    "hero" => [
                        "type" => "image",
                        "url" => "https://scdn.line-apps.com/n/channel_devcenter/img/fx/01_6_carousel.png",
                        "size" => "full",
                        "aspectRatio" => "20:20",
                        "aspectMode" => "cover"
                    ],
                    "body" => [
                        "type" => "box",
                        "layout" => "vertical",
                        "spacing" => "sm",
                        "contents" => [
                            [
                                "type" => "text",
                                "text" => "Metal Desk Lamp",
                                "weight" => "bold",
                                "size" => "xl",
                                "wrap" => true
                            ],
                            [
                                "type" => "box",
                                "layout" => "baseline",
                                "flex" => 1,
                                "contents" => [
                                    [
                                        "type" => "text",
                                        "text" => "$11",
                                        "weight" => "bold",
                                        "size" => "xl",
                                        "flex" => 0,
                                        "wrap" => true
                                    ],
                                    [
                                        "type" => "text",
                                        "text" => ".99",
                                        "weight" => "bold",
                                        "size" => "sm",
                                        "flex" => 0,
                                        "wrap" => true
                                    ]
                                ]
                            ],
                            [
                                "type" => "text",
                                "text" => "Temporarily out of stock",
                                "size" => "xxs",
                                "color" => "#FF5551",
                                "flex" => 0,
                                "margin" => "md",
                                "wrap" => true
                            ]
                        ]
                    ],
                    "footer" => [
                        "type" => "box",
                        "layout" => "vertical",
                        "spacing" => "sm",
                        "contents" => [
                            [
                                "type" => "button",
                                "action" => [
                                    "type" => "uri",
                                    "label" => "Add to Cart",
                                    "uri" => "https://linecorp.com"
                                ],
                                "flex" => 2,
                                "color" => "#AAAAAA",
                                "style" => "primary"
                            ],
                            [
                                "type" => "button",
                                "action" => [
                                    "type" => "uri",
                                    "label" => "Add to wish list",
                                    "uri" => "https://linecorp.com"
                                ]
                            ]
                        ]
                    ]
                ],
                // You can add more carousel items here
            ]
        ];

        error_log(print_r("line flexDog2.php carouselMessage : " . $carouselMessage, true));

        return $carouselMessage;
    }

?>