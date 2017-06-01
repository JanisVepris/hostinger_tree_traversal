<?php
namespace App\Helpers\Contracts;

use Illuminate\Support\Collection;

interface CategoryTreeTraverserContract
{
    public function getHtmlIterative(Collection $categoryCollection);

    public function getHtmlRecursive(Collection $categoryCollection);
}
