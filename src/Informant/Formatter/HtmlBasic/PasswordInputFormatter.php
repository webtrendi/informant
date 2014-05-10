<?php
/**
 * Builds Text type input element
 *
 * @since  2014-05-09
 * @author Patrick Forget <patforg@geekpad.ca>
 */

namespace Informant\Formatter\HtmlBasic;

/**
 * Builds Text type input element
 *
 * @since  2014-05-09
 * @author Patrick Forget <patforg@geekpad.ca>
 */
class PasswordInputFormatter extends \Informant\Formatter\HtmlInputFormatter
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


} //  PasswordInputFormatter class
