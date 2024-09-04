<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class post extends Component
{
    public $id;
    public $author;
    public $title;
    public $content;
    public $datePosted;
    public $post;
    public function __construct($id,$post,$author,$title,$content,$datePosted)
    {
        $this->id = $id;
        $this->author=$author;
        $this->title=$title;
        $this->content=$content;
        $this->datePosted=$datePosted;
        $this->post=$post;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.post');
    }
}