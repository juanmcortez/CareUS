<?php

namespace App\View\Components\Forms;

use Illuminate\View\Component;

class Textarea extends Component
{
    /**
     * Public vars
     *
     * @var string
     */
    public $name;
    public $rows;
    public $id;
    public $classes;
    public $showerror;
    public $placeholder;
    public $varname;

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
    public function __construct($name, $rows = 5, $classes = '', $place = '', $showerror = '')
    {
        // Change notation from . to []
        foreach (explode('.', $name) as $key => $value) {
            if ($key == 0) {
                $this->privatename = $value;
            } else {
                $this->privatename .= '[' . $value . ']';
            }
        }

        // Publish the vars values
        $this->name         = $this->privatename;
        $this->id           = $this->privatename;
        $this->classes      = $classes;
        $this->placeholder  = $place;
        $this->showerror    = ($showerror <> 'false') ? true : false;
        $this->varname      = $name;
        $this->rows         = $rows;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.forms.textarea');
    }
}
