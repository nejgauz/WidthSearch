<?php

require_once 'GraphNode.php';

$graphStructure = [
    [
        'nodeName' => 'Root',
        'children' => [
            'a' => 8,
            'c' => 10
        ]
    ],
    [
        'nodeName' => 'a',
        'children' => [
            'b' => 5
        ]
    ],
    [
        'nodeName' => 'b',
        'children' => [
            'c' => 16,
            'f' => 11
        ]
    ],
    [
        'nodeName' => 'c',
        'children' => [
            'e' => 25
        ]
    ],
    [
        'nodeName' => 'e',
        'children' => [
            'd'      => 7,
            'Target' => 8
        ]
    ],
    [
        'nodeName' => 'f',
        'children' => [
            'e' => 13
        ]
    ],
    [
        'nodeName' => 'g',
        'children' => [
            'c'      => 15,
            'Target' => 6
        ]
    ]
];

foreach ($graphStructure as $item) {
    $name = $item['nodeName'];
    ${"$name"} = new GraphNode($name);
}

foreach ($graphStructure as $item) {
    $name = $item['nodeName'];
    foreach ($item['children'] as $child => $distance) {
        ${"$name"}->setChild($child, $distance);
    }
}


