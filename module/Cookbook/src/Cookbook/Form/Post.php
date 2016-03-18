<?php
namespace Cookbook\Form;

use Cookbook\Filter\PostFilter;
use Doctrine\Common\Persistence\ObjectManager;
use DoctrineModule\Form\Element\ObjectSelect;

class Post extends AbstractForm
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
            'name' => 'id',
            'type' => 'Hidden',
        ]);

        $objSubcategoria = new ObjectSelect('subcategoria');
        $objSubcategoria->setOptions(array(
            'object_manager' => $this->getObjectManager(),
            'target_class' => 'Cookbook\Entity\Subcategoria',
            'property' => 'nome',
            'empty_option' => 'Selecione',
            'is_method' => true,
            'label' => 'Subcategoria',
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
        $this->add($objSubcategoria);

        $this->add([
            'id' => 'titulo',
            'name' => 'titulo',
            'type' => 'Text',
            'options' => [
                'label' => 'Título',
            ],
            'attributes' => [
                'class' => 'form-control',
                'required' => true
            ],
        ]);

        $this->add([
            'id' => 'conteudo',
            'name' => 'conteudo',
            'type' => 'Textarea',
            'options' => [
                'label' => 'Conteudo',
            ],
            'attributes' => [
                'class' => 'form-control',
                'required' => true
            ],
        ]);

        $this->add([
            'name' => 'codigo',
            'type' => 'Textarea',
            'options' => [
                'label' => 'Codigo',
            ],
            'attributes' => [
                'class' => 'form-control codeEditorPostList',
                'required' => false,
                'id' => 'codeEditorPost',
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


        $this->setInputFilter(new PostFilter($objSubcategoria->getValueOptions()));
    }
}
