<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Comment extends Component
{
    public $name,$datePosted,$content;
    public function __construct($name,$datePosted,$content)
    {
        $this->name=$name;
        $this->datePosted=$datePosted;
        $this->content=$content;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.comment');
    }
}