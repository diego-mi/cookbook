<?php
namespace Cookbook\Filter;

use Zend\Filter\StringTrim;
use Zend\Filter\StripTags;
use Zend\InputFilter\Input;
use Zend\Validator\InArray;

class SubcategoriaFilter extends AbstractFilter
{
    protected $arrCategoria;

    public function __construct(Array $arrCategoria = array())
    {
        $this->arrCategoria = $arrCategoria;

        $inArray = new InArray();
        $inArray->setOptions(['haystack' => $this->haystack($this->arrCategoria)]);

        $categoria = new Input('categoria');
        $categoria->setRequired(true)
            ->getFilterChain()
            ->attach(new StripTags())
            ->attach(new StringTrim());
        $categoria->getValidatorChain()->attach($inArray);
        $this->add($categoria);
    }
}
