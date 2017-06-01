<?php
namespace App\Helpers;

use App\Helpers\Contracts\CategoryTreeTraverserContract;
use Illuminate\Support\Collection;

class CategoryTreeTraverser implements CategoryTreeTraverserContract
{
    /** @return string */
    public function getHtmlIterative(Collection $categoryCollection)
    {
        $html = '';
        $stack = [];

        foreach ($categoryCollection as $node) {
            array_push($stack, $node);
        }

        while (count($stack) > 0) {

            $node = array_pop($stack);

            if (!$node) {
                $html .= '</ul>';
                continue;
            }

            $html .= sprintf('<li>%s</li>', $node->name);

            if ($node->children()->count()) {
                $html .= '<ul>';

                array_push($stack, null);

                foreach ($node->children as $childCategory) {
                    array_push($stack, $childCategory);
                }
            }
        }

        return sprintf('<ul>%s</ul>', $html);
    }

    /** @return string */
    public function getHtmlRecursive(Collection $categoryCollection)
    {
        $html = '';

        foreach ($categoryCollection as $node) {
            $html .= sprintf('<li>%s</li>', $node->name);

            if ($node->children()->count()) {
                $html .= $this->getHtmlRecursive($node->children);
            }
        }

        return sprintf('<ul>%s</ul>', $html);
    }
}
