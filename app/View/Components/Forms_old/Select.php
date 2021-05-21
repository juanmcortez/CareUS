<?php

namespace App\View\Components\Forms;

use Illuminate\View\Component;

class Select extends Component
{
    /**
     * Public vars
     *
     * @var string
     */
    public $name;
    public $id;
    public $classes;
    public $showerror;
    public $options;
    public $varname;
    public $optionselected;

    /**
     * Private vars
     *
     * @var string
     */
    private $privatename = '';

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name, $classes = '', $options = '', $showerror = '', $optionselected = false)
    {
        // Change notation from . to []
        foreach (explode('.', $name) as $key => $item) {
            if ($key == 0) {
                $this->privatename = $item;
            } else {
                $this->privatename .= '[' . $item . ']';
            }
        }

        // Publish the vars values
        $this->name             = $this->privatename;
        $this->id               = $this->privatename;
        $this->classes          = $classes;
        $this->showerror        = ($showerror <> 'false') ? true : false;
        $this->options          = $options;
        $this->varname          = $name;
        $this->optionselected   = $optionselected;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.forms.select');
    }
}
