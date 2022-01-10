<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Estate extends Component
{
    public $publicId;
    public $title;
    public $type;
    public $location;
    public $imageUrl;
    /**
     * Create a new component instance.
     *
     * @return void
    */
    public function __construct($id, $title, $type, $location, $image)
    {
        $this->publicId = $id;
        $this->title = $title;
        $this->type = $type;
        $this->location = $location;
        $this->imageUrl = $image;
    }
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.estate');
    }
}
