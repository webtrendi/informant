<?php
/**
 * Builds Radio list type input element
 *
 * @since  2014-05-09
 * @author Patrick Forget <patforg@geekpad.ca>
 */

namespace Informant\Formatter\Base;

use Informant\Utility\HtmlHelper as h;

/**
 * Builds Radio list type input element
 *
 * @since 2014-09-18
 * @author Patrick Forget <patforg@geekpad.ca>
 */
abstract class BaseRadioInputFormatter extends BaseInputFormatter
{

    /**
     * @since  2014-09-18
     * @author Patrick Forget <patforg@geekpad.ca>
     */
    public function format(\Informant\Input\BaseElement $input, $options=array()) {
        if (!isset($options['attributes'])) {
            $options['attributes'] = array();
        } //if

        $value = $input->getValue();
        if ($value !== null && $value == $input->getDefaultValue()) {
            $options['attributes']['checked'] = 'true';
        } //if

        $options['attributes']['type'] = 'radio';

        return parent::format($input, $options);
    } // format()


} //  BaseRadioInputFormatter class
