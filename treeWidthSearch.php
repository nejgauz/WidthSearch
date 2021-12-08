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
    ${"$node[1]"} = new Node($node[1]);

    foreach ($node[0] as $child) {
        ${"$child"}->setParent(${"$node[1]"});
        ${"$node[1]"}->setChild(${"$child"});
    }
}

$needle = "x";
$haystack = new ArrayIterator([$a]);
$found = false;
foreach ($haystack as $node) {
    if ($node->getName() === $needle) {
        $found = true;
        break;
    }
    foreach ($node->getChildren() as $child) {
        $haystack->append($child);
    }
}

$path = '';
if ($found) {
    $node = ${"$needle"};
    $needleName = $node->getName();
    while ($node->getParent() instanceof Node) {
        $parent = $node->getParent();
        $node = $parent;
        $path = $parent->getName() . "->" . $path;
    }
    $path .= $needleName;
}

echo "The value \"$needle\" " . ($found ? "is in the tree." : "hasn't been found.") . PHP_EOL;
if ($found) {
    echo "The path to the value: $path";
}
