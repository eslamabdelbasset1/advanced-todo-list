<?php

namespace App\Http\Controllers;

use App\Contracts\FilterInterface;

class FirewallController extends Controller
{
    private array $filters;

    public function __construct(FilterInterface ...$filters)
    {
        $this->filters = $filters;
    }

    public function getFilters(): array
    {
        dd($this->filters);
    }
}
