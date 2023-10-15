<?php

namespace UserBridge\Models;

class Pagination
{
    private int $currentPage;
    private int $perPage;
    private int $totalUsers;
    private int $totalPages;

    public function __construct(int $currentPage, int $perPage, int $totalUsers, int $totalPages)
    {
        $this->currentPage = $currentPage;
        $this->perPage = $perPage;
        $this->totalUsers = $totalUsers;
        $this->totalPages = $totalPages;
    }

    public function getCurrentPage(): int
    {
        return $this->currentPage;
    }

    public function getPerPage(): int
    {
        return $this->perPage;
    }

    public function getTotalUsers(): int
    {
        return $this->totalUsers;
    }

    public function getTotalPages(): int
    {
        return $this->totalPages;
    }

    public function hasNextPage(): bool
    {
        return $this->currentPage < $this->totalPages;
    }
}