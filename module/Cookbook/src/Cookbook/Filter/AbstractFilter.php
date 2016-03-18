<?php
namespace Cookbook\Filter;

use Zend\InputFilter\InputFilter;

class AbstractFilter extends InputFilter
{
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
