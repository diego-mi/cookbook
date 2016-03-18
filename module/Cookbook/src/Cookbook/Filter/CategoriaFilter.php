<?php
namespace Cookbook\Filter;

use Zend\Filter\StringTrim;
use Zend\Filter\StripTags;
use Zend\InputFilter\Input;
use Zend\InputFilter\InputFilter;
use Zend\Validator\InArray;
use Zend\Validator\NotEmpty;

class CategoriaFilter extends InputFilter
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

    /**
     * @param array $haystack
     *
     * @return array
     */
    public function haystack(Array $haystack = array())
    {
        $array = [];
        foreach ($haystack as $value) {
            if ($value) {
                $array[$value['value']] = $value['label'];
            }
        }

        return array_keys($array);
    }
}
