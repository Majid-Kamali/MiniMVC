<?php

namespace Core;

use ArrayIterator;
use Countable;
use IteratorAggregate;
use Traversable;

class Collection implements IteratorAggregate, Countable
{

    /**
     * Summary of items
     * @var array
     */
    protected array $items;

    /**
     * Summary of __construct
     * @param array $items
     */
    public function __construct(array $items = [])
    {
        $this->items = $items;
    }

    /**
     * Summary of collect
     * @param array $items
     * @return Collection
     */
    public static function collect(array $items = []): static
    {
        return new static($items);
        // $instance = new static();
        // return $instance->collectInstance($items);
    }

    // public function collectInstance(array $items = []): static
    // {
    //     $this->items = $items;
    //     return $this;
    // }

    /**
     * Summary of add
     * @param mixed $item
     * @return Collection
     */
    public function add($item): static
    {
        $items = $this->items;
        $items[] = $item;
        return new static($items);
    }

    /**
     * Summary of pop
     * @return Collection
     */
    public function pop(): static
    {
        $items = $this->items;
        array_pop($items);
        return new static($items);
    }

    /**
     * Summary of shift
     * @return Collection
     */
    public function shift(): static
    {
        $items = $this->items;
        array_shift($items);

        return new static($items);
    }

    /**
     * Summary of all
     * @return array
     */
    public function all(): array
    {
        return $this->items;
    }

    /**
     * Summary of first
     * @return mixed
     */
    public function first(): mixed
    {
        return $this->items[0] ?? null;
    }

    /**
     * Summary of map
     * @param callable $callback
     * @return Collection
     */
    public function map(callable $callback): static
    {
        return new static(array_map($callback, $this->items));
    }

    /**
     * Summary of filter
     * @param callable $callback
     * @return Collection
     */
    public function filter(callable $callback): static
    {
        return new static(array_values(array_filter($this->items, $callback)));
    }

    /**
     * Summary of pluck
     * @param mixed $column_key
     * @return Collection
     */
    public function pluck($column_key): static
    {
        return new static(array_column($this->items, $column_key));
    }

    /**
     * Summary of has
     * @param mixed $value
     * @return bool
     */
    public function has($value): bool
    {
        return in_array($value, $this->items);
    }

    /**
     * Summary of count
     * @return int
     */
    function count(): int
    {
        return count($this->items);
    }

    /**
     * Summary of getIterator
     * @return ArrayIterator
     */
    function getIterator(): Traversable
    {
        return new ArrayIterator($this->items);
    }
}