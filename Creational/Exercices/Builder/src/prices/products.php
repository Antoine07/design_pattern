<?php

return [
    "prices" => [
        "cone" => [
            "classic" => $_ENV["APP_CLASSIC"],
            "small" => $_ENV["APP_SMALL"],
            "big" => $_ENV["APP_BIG"],
        ],
        "boule" => [
            "1" => $_ENV["APP_BOULE_ONE"],
            "2" => $_ENV["APP_BOULE_TWO"],
            "3" => $_ENV["APP_BOULE_TREE"],
            "4" => $_ENV["APP_BOULE_FOUR"],
        ],
        "extra" => [
            "chocolate" => $_ENV["APP_CHOCOLATE"],
            "strawberry" => $_ENV["APP_STRAWBERRY"],
            "speculos" => $_ENV["APP_SPECULOS"],
            "carame" => $_ENV["APP_CARAMEL"],
        ],
    ]
];
