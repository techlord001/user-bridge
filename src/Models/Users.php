<?php

namespace UserBridge\Models;

use IteratorAggregate;
use ArrayIterator;

class Users implements IteratorAggregate
{
    private array $users;
    private Pagination $pagination;

    public function __construct(array $users, Pagination $pagination)
    {
        $this->users = $users;
        $this->pagination = $pagination;
    }

    public function getIterator(): ArrayIterator
    {
        return new ArrayIterator($this->users);
    }

    public function getPagination(): Pagination
    {
        return $this->pagination;
    }
}