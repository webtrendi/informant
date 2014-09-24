<?php
/**
 * Builds Text type input element
 *
 * @since  2014-05-09
 * @author Patrick Forget <patforg@geekpad.ca>
 */

namespace Informant\Formatter\Base;

/**
 * Builds Text type input element
 *
 * @since  2014-05-09
 * @author Patrick Forget <patforg@geekpad.ca>
 */
abstract class BasePasswordInputFormatter extends BaseTextInputFormatter
{

    /**
     * @since  2014-05-09
     * @author Patrick Forget <patforg@geekpad.ca>
     */
    public function format(\Informant\Input\BaseElement $input, $options = array()) {

        if (!isset($options['attributes'])) {
            $options['attributes'] = array();
        } //if

        $options['attributes']['type'] = 'password';
        $options['attributes']['value'] = '';

        return parent::format($input, $options);

    } // format()


} //  BasePasswordInputFormatter class
