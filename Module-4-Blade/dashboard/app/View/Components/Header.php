<?php

namespace App\View\Components;

use Illuminate\View\Component;

/**
 * 4.3 Вложенные шаблоны
 */
class Header extends Component
{
    /**
     * @var string - атрибут
     */
    public string $text;

/**
     * @var string - атрибут
     */
    public string $message;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($text, $message)
    {
        $this->text = $text; // Инициализация атрибута
        $this->message = $message; // Инициализация атрибута
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.header');
    }
}
