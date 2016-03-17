<?php
namespace Cookbook\Form;

use Zend\Form\Form;

class Tipo extends Form
{

    public function __construct()
    {
        parent::__construct(null);
        $this->setAttribute('method', 'POST');
        $this->setAttribute('class', 'form-horizontal');
        #$this->setInputFilter(new Tipo());

        $this->add([
            'name' => 'id',
            'type' => 'Hidden',
        ]);

        $this->add([
            'id' => 'descricao',
            'name' => 'descricao',
            'type' => 'Text',
            'options' => [
                'label' => 'Descrição',
            ],
            'attributes' => [
                'class' => 'form-control',
                'required' => true
            ],
        ]);

        $this->add([
            'name' => 'submit',
            'type' => 'Submit',
            'attributes' => [
                'class' => 'btn btn-success',
                'value' => 'Salvar'
            ],
        ]);
    }
}
