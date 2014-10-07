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
abstract class BaseRadioListInputFormatter implements \Informant\Formatter\FormatterInterface
{

    /**
     * @since  2014-09-17
     * @author Patrick Forget <patforg@geekpad.ca>
     */
    public function format(\Informant\Input\BaseElement $input, $options=array()) {

        $value = ($input->getValue() === null ? $input->getDefaultValue() : $input->getValue());
        $inputName = ($input->getName() === null ? $input->getId() : $input->getName());

        $itemWrapperOptions = isset($options['itemWrapperOptions']) ? $options['itemWrapperOptions'] : array();
        $baseItemAttributes = isset($options['itemAttributes']) ? $options['itemAttributes'] : array();
        ob_start();
        foreach ($input->getChoices() as $key => $label) {
            $itemAttributes = array(
                'value' => $key,
                'type' => 'radio',
                'name' => $inputName,
            );

            if ($key == $value) {
                $itemAttributes['checked'] = 'true';
            } //if

            echo h::tag('label', array_merge($itemWrapperOptions, array(
                'content' => h::tag('input', array(
                    'attributes' => array_merge($baseItemAttributes, $itemAttributes),
                    'appendContent' => " {$label}",
                    'shortClosing' => true,
                )),
                'rawContent' => true,
            )));
        } //foreach
        $radioListCode = ob_get_contents();
        ob_end_clean();

        $attributes = array(
            'id' => $input->getId(),
        );

        if (isset($options['attributes'])) {
            $attributes = array_merge($attributes, $options['attributes']);
        } //if

        return h::tag('div', array(
            'attributes' => $attributes,
            'content' => $radioListCode,
            'rawContent' => true
        ));
    } // format()
} //  BaseRadioListInputFormatter class
