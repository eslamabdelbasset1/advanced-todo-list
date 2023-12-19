<?php
namespace App\Services\Filters;

use App\Contracts\FilterInterface;
use Illuminate\Support\Str;

class NullFilterService implements FilterInterface
{
public function getName(): string
{
    return __class__.': '.Str::random(20);
}
}
