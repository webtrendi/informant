<?php
/**
 * Base class for inputs that use the html <input> tag
 *
 * @since  2014-05-09
 * @author Patrick Forget <patforg@geekpad.ca>
 */

namespace Informant\Formatter;
use Informant\Utility\HtmlHelper as h;

/**
 * Base class for inputs that use the html <input> tag
 *
 * @since  2014-05-09
 * @author Patrick Forget <patforg@geekpad.ca>
 */
class HtmlInputFormatter implements FormatterInterface
{

    /**
     * class constructor
     *
     * @since  2014-05-09
     * @author Patrick Forget <patforg@geekpad.ca>
     */
    public function __construct() {
        
    } // __construct()

    /**
     * @since  2014-05-09
     * @author Patrick Forget <patforg@geekpad.ca>
     */
    public function format(\Informant\Input\BaseElement $input, $options=array()) {
        $attributes = array(
            'id' => $input->getId(),
            'name' => $input->getId(),
            'value' => ($input->getValue() === null ? $input->getDefaultValue() : $input->getValue()),
        );

        if (isset($options['attributes'])) {
            $attributes = array_merge($attributes, $options['attributes']);
        } //if

        return h::tag('input', array(
            'attributes' => $attributes,
            'shortClosing' => true
        ));
    } // format()


} //  HtmlInputFormatter class
