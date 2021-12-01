<?php

class Node
{
    /** @var Node[] */
    private $children;
    /** @var string */
    private $name;
    /** @var Node */
    private $parent = null;

    /**
     * @param Node[] $children
     * @param string $name
     */
    public function __construct(string $name, array $children = [])
    {
        $this->name = $name;
        $this->children = $children;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getChildren(): array
    {
        return $this->children;
    }

    public function setChild(Node $child): void
    {
        $this->children[] = $child;
    }

    public function setParent(Node $parent): void
    {
        $this->parent = $parent;
    }

    public function getParent():? Node
    {
        return $this->parent;
    }
}