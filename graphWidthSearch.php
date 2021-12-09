<?php

require_once 'GraphNode.php';

$graphStructure = [
    [
        'nodeName' => 'root',
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
            'target' => 8
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
            'target' => 6
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
        ${"$name"}->setChild(${"$child"}, $distance);
    }
}

$targetName = 'target';
$haystack = new ArrayIterator([$root]);
$visitedNodes = [];
$found = false;
$currentChildNumber = 0;
foreach ($haystack as $graphNode) {
    if (isset($visitedNodes[$graphNode->getName()])) {
        continue;
    }

    if ($graphNode->getName() === $targetName) {
        $found = true;
        break;
    }

    $visitedNodes[$graphNode->getName()] = true;

    if (empty($graphNode->getChildren()) || !isset($graphNode->getChildren()[$currentChildNumber])) {
        $found = false;
        break;
    }

    $haystack[] = $graphNode->getChildren()[$currentChildNumber];
}

echo "Target " . ($found ? 'is found in the graph.' : 'is not found in the graph.');

