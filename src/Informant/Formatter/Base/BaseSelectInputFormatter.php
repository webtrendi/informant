<?php
/**
 * Builds Text type input element
 *
 * @since  2014-05-09
 * @author Patrick Forget <patforg@geekpad.ca>
 */

namespace Informant\Formatter\Base;

use Informant\Utility\HtmlHelper as h;

/**
 * Builds Text type input element
 *
 * @since  2014-05-09
 * @author Patrick Forget <patforg@geekpad.ca>
 */
abstract class BaseSelectInputFormatter implements \Informant\Formatter\FormatterInterface
{

    /**
     * @since  2014-09-17
     * @author Patrick Forget <patforg@geekpad.ca>
     */
    public function format(\Informant\Input\BaseElement $input, $options=array()) {

        $value = ($input->getValue() === null ? $input->getDefaultValue() : $input->getValue());

        ob_start();
        foreach ($input->getChoices() as $key => $label) {
            $optionAttributes = array(
                'value' => $key
            );

            if ($key == $value) {
                $optionAttributes['selected'] = 'true';
            } //if

            echo h::tag('option', array(
                'attributes' => $optionAttributes,
                'content' => $label
            ));
        } //foreach
        $optionsCode = ob_get_contents();
        ob_end_clean();

        $attributes = array(
            'id' => $input->getId(),
            'name' => $input->getId(),
        );

        if ($input->getMultipleValues() === true) {
            $attributes['multiple'] = 'true';
            $attributes['name'] .= '[]';
        } //if
        
        if (isset($options['attributes'])) {
            $attributes = array_merge($attributes, $options['attributes']);
        } //if

        return h::tag('select', array(
            'attributes' => $attributes,
            'content' => $optionsCode,
            'rawContent' => true
        ));
    } // format()
} //  BaseSelectInputFormatter class
