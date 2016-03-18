<?php
namespace Cookbook\Form;

use Doctrine\Common\Persistence\ObjectManager;
use DoctrineModule\Form\Element\ObjectSelect;
use Cookbook\Filter\SubcategoriaFilter;

class Subcategoria extends AbstractForm
{

    /**
     * Categoria constructor.
     * @param ObjectManager $objectManager
     */
    public function __construct(ObjectManager $objectManager)
    {
        parent::__construct(null);
        $this->setObjectManager($objectManager);
        $this->setAttribute('method', 'POST');
        $this->setAttribute('class', 'form-horizontal');

        $this->add([
            'name' => 'id',
            'type' => 'Hidden',
        ]);

        $objCategoria = new ObjectSelect('categoria');
        $objCategoria->setOptions(array(
                'object_manager' => $this->getObjectManager(),
                'target_class' => 'Cookbook\Entity\Categoria',
                'property' => 'nome',
                'empty_option' => 'Selecione',
                'is_method' => true,
                'label' => 'Categoria',
                'find_method' => array(
                    'name' => 'findBy',
                    'params' => array(
                        'criteria' => array(),
                        'orderBy' => array('nome' => 'ASC'),
                    ),
                ),
            ))
            ->setAttributes(array(
                'class' => 'form-control',
                'required' => true
            ));
        $this->add($objCategoria);

        $this->add([
            'id' => 'nome',
            'name' => 'nome',
            'type' => 'Text',
            'options' => [
                'label' => 'Nome',
            ],
            'attributes' => [
                'class' => 'form-control',
                'required' => true
            ],
        ]);

        $this->add([
            'id' => 'descricao',
            'name' => 'descricao',
            'type' => 'Textarea',
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


        $this->setInputFilter(new SubcategoriaFilter($objCategoria->getValueOptions()));
    }
}
