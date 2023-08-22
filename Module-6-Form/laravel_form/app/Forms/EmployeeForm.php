<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

/**
 * 6.5 Конструктор форм Laravel
 */
class EmployeeForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('first_name', 'text')
            ->add('last_name', 'text')
            ->add('personal_data_agreement', 'checkbox')
            ->add('submit', 'submit');
    }
}
