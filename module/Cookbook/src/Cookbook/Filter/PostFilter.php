<?php
namespace Cookbook\Filter;

use Zend\Filter\StringTrim;
use Zend\Filter\StripTags;
use Zend\InputFilter\Input;
use Zend\Validator\InArray;

class PostFilter extends AbstractFilter
{
    protected $arrSubcategoria;

    public function __construct(Array $arrSubcategoria = array())
    {
        $this->arrSubcategoria = $arrSubcategoria;

        $inArray = new InArray();
        $inArray->setOptions(['haystack' => $this->haystack($this->arrSubcategoria)]);

        $subcategoria = new Input('subcategoria');
        $subcategoria->setRequired(true)
            ->getFilterChain()
            ->attach(new StripTags())
            ->attach(new StringTrim());
        $subcategoria->getValidatorChain()->attach($inArray);
        $this->add($subcategoria);
    }
}
