<?php

namespace App\Interfaces;

/**
 * Data fetcher interface for adapter "design pattern"
 */

interface DataFetcherInterface
{
    /**
     * Fetch from data providers.
     */
    public function fetch();

    /**
     * Save database.
     */
    public function save(): bool;
}
