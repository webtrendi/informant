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
abstract class BaseCheckboxInputFormatter extends BaseInputFormatter
{

    /**
     * @since  2014-09-20
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

        $options['attributes']['type'] = 'checkbox';

        return parent::format($input, $options);
    } // format()


} //  CheckboxInputFormatter class
