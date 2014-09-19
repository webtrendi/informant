<?php
/**
 * Base class for inputs that use the html <input> tag
 *
 * @since  2014-05-09
 * @author Patrick Forget <patforg@geekpad.ca>
 */

namespace Informant\Formatter\Base;
use Informant\Utility\HtmlHelper as h;

/**
 * Base class for inputs that use the html <input> tag
 *
 * @since  2014-05-09
 * @author Patrick Forget <patforg@geekpad.ca>
 */
abstract class BaseInputFormatter implements \Informant\Formatter\FormatterInterface
{

    /**
     * @since  2014-05-09
     * @author Patrick Forget <patforg@geekpad.ca>
     */
    public function format(\Informant\Input\BaseElement $input, $options=array()) {
        $attributes = array(
            'id' => $input->getId(),
            'name' => ($input->getName() === null ? $input->getId() : $input->getName()),
            'value' => ($input->getValue() === null ? $input->getDefaultValue() : $input->getValue()),
        );

        if ($input->getMultipleValues() === true) {
            $attributes['name'] .= '[]';
        } //if

        if (isset($options['attributes'])) {
            $attributes = array_merge($attributes, $options['attributes']);
        } //if

        return h::tag('input', array(
            'attributes' => $attributes,
            'shortClosing' => true
        ));
    } // format()


} //  BaseInputFormatter class
