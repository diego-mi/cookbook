<?php
namespace Cookbook\Filter;

use Zend\Filter\StringTrim;
use Zend\Filter\StripTags;
use Zend\InputFilter\Input;
use Zend\Validator\InArray;

class CategoriaFilter extends AbstractFilter
{
    protected $arrTipo;

    public function __construct(Array $arrTipo = array())
    {
        $this->arrTipo = $arrTipo;

        $inArray = new InArray();
        $inArray->setOptions(['haystack' => $this->haystack($this->arrTipo)]);

        $tipo = new Input('tipo');
        $tipo->setRequired(true)
            ->getFilterChain()
            ->attach(new StripTags())
            ->attach(new StringTrim());
        $tipo->getValidatorChain()->attach($inArray);
        $this->add($tipo);
    }
}
