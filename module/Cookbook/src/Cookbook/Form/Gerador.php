<?php
namespace Cookbook\Form;

use Doctrine\Common\Persistence\ObjectManager;

class Gerador extends AbstractForm
{

    /**
     * Post constructor.
     * @param ObjectManager $objectManager
     */
    public function __construct(ObjectManager $objectManager)
    {
        parent::__construct(null);
        $this->setObjectManager($objectManager);
        $this->setAttribute('method', 'POST');
        $this->setAttribute('class', 'form-horizontal');

        $this->add([
            'id' => 'codigo1',
            'name' => 'codigo1',
            'type' => 'Text',
            'options' => [
                'label' => 'Codigo',
            ],
            'attributes' => [
                'class' => 'form-control',
                'required' => true
            ],
        ]);

        $this->add([
            'id' => 'codigo2',
            'name' => 'codigo2',
            'type' => 'Text',
            'options' => [
                'label' => 'Codigo',
            ],
            'attributes' => [
                'class' => 'form-control',
                'required' => true
            ],
        ]);

        $this->add([
            'id' => 'codigo3',
            'name' => 'codigo3',
            'type' => 'Text',
            'options' => [
                'label' => 'Codigo',
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
