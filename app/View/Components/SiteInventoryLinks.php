<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SiteInventoryLinks extends Component
{
    public $page;

    public function __construct($page)
    {
        $this->page = $page;
    }

    public function render(): View|Closure|string
    {
        return view('components.site-inventory-links');
    }
}
