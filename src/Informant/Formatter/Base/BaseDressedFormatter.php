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
abstract class BaseDressedFormatter implements \Informant\Formatter\FormatterInterface
{

    /**
     * @since  2014-09-23
     * @author Patrick Forget <patforg@geekpad.ca>
     */
    public function format(\Informant\Input\BaseElement $input, $options=array()) {

        $formatter = $options['formatter'];
        $formatterName = $options['formatterName'];

        $inputOptions = isset($options['inputOptions']) ? $options['inputOptions'] : array();
        $labelOptions = isset($options['labelOptions']) ? $options['labelOptions'] : array();
        $errorOptions = isset($options['errorOptions']) ? $options['errorOptions'] : array();

        ob_start();

        echo $formatter->label($input, $labelOptions);
        echo call_user_func(array($formatter, $formatterName), $input, $inputOptions );
        echo $formatter->error($input, $errorOptions);

        $content = ob_get_contents();
        ob_end_clean();

        $attributes = array(
            'class' => $input->getId() 
        );

        if (isset($options['attributes'])) {
            $attributes = array_merge($attributes, $options['attributes']);
        } //if

        return h::tag('div', array(
            'attributes' => $attributes,
            'content' => $content,
            'rawContent' => true
        )) . "\n";
    } // format()


} //  DresseFormatter class
