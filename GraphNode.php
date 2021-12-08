<?php

class GraphNode
{
    /** @var string */
    private $name;

    /**
     * @var array
     * [['node' => GraphNode $node, 'distance' => int $distance], ...]
     */
    private $children;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setChild(GraphNode $newChild, int $distance): void
    {
        $this->children[] = [
            'node'     => $newChild,
            'distance' => $distance
        ];
        usort(
            $this->children,
            function (array $nodeA, array $nodeB)
            {
                return $nodeA['distance'] >= $nodeB['distance'];
            }
        );
    }
}