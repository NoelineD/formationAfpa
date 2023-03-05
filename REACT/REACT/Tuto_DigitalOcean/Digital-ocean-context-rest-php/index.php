<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");

//var_dump($_SERVER);

$user = [
    'name' => 'Durant',
    'favorites' => [
        'avocado',
        'apple'
        ]
    ];

$ingredients = [

    [
        'image' => '🍎',
        'name' => 'apple',
    ],
    [
        'image' => '🥑',
        'name' => 'avocado',
    ],
    [
        'image' => '🥦',
        'name' => 'broccoli',
    ],
    [
        'image' => '🥕',
        'name' => 'carrot',
    ],
    [
        'image' => '🍷',
        'name' => 'red wine dressing',
    ],
    [
        'image' => '🍚',
        'name' => 'seasoned rice',
    ]



];
if ($_SERVER['PATH_INFO'] == '/ingredients') {
    $reponse = json_encode($ingredients);
}
if ($_SERVER['PATH_INFO'] == '/user') {
    $reponse = json_encode($user);
}

sleep(5);

echo $reponse;
