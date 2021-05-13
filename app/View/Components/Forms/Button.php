<?php

namespace App\View\Components\Forms;

use Illuminate\View\Component;

class Button extends Component
{
    /**
     * Public vars
     *
     * @var string
     */
    public $tag;
    public $id;
    public $classes;
    public $type;
    public $color;
    public $icon;
    public $text;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($tag = 'button', $id = 'submit', $classes = '', $type = 'submit', $color = 'green', $icon = 'save', $text = 'Submit')
    {
        // Publish the vars values
        $this->tag      = $tag;
        $this->id       = $id;
        $this->classes  = $classes;
        // If the button has to be a link item
        if ($tag == 'a') {
            $this->type = 'href=' . $type;
        } else {
            $this->type = 'type=' . $type;
        }
        // If the button has to be a link item
        $this->color    = $color;
        $this->icon     = $icon;
        $this->text     = $text;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.forms.button');
    }
}
