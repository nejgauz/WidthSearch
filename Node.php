<?php

class Node
{
    /** @var Node[] */
    private $children;
    /** @var string */
    private $name;

    /**
     * @param Node[] $children
     * @param string $name
     */
    public function __construct(array $children, string $name)
    {
        $this->children = $children;
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getChildren(): array
    {
        return $this->children;
    }
}