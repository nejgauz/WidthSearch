<?php

require_once "Node.php";

// схема графа
$nodes = [
    [[], 'n'],
    [[], 'o'],
    [[], 'p'],
    [[], 'q'],
    [[], 'r'],
    [[], 's'],
    [[], 't'],
    [[], 'u'],
    [[], 'v'],
    [[], 'w'],
    [[], 'x'],
    [['n', 'o'], 'f'],
    [['p', 'q'], 'g'],
    [['r'], 'h'],
    [['s'], 'i'],
    [['t'], 'j'],
    [['u'], 'k'],
    [['v'], 'l'],
    [['w', 'x'], 'm'],
    [['f', 'g'], 'b'],
    [['h', 'i'], 'c'],
    [['j', 'k'], 'd'],
    [['l', 'm'], 'e'],
    [['b', 'c', 'd', 'e'], 'a']
];
// создаем объекты графа
foreach ($nodes as $node) {
    $children = [];
    foreach ($node[0] as $child) {
        $children[] = ${"$child"};
    }
    ${"$node[1]"} = new Node($children, $node[1]);
}

$needle = 's';
$haystack = new ArrayIterator([$a]);
$found = false;

foreach ($haystack as $node) {
    echo "Current node: " . $node->getName() . PHP_EOL;
    if ($node->getName() === $needle) {
        $found = true;
        break;
    }
    foreach ($node->getChildren() as $child) {
        $haystack->append($child);
    }
}


echo "The value $needle " . ($found ? "is in the tree" : "hasn't been found");
