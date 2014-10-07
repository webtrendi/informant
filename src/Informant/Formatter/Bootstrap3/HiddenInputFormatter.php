<?php
/**
 * Builds Text type input element
 *
 * @since  2014-05-09
 * @author Patrick Forget <patforg@geekpad.ca>
 */

namespace Informant\Formatter\Bootstrap3;

use Informant\Utility\HtmlHelper as h;

/**
 * Builds Text type input element
 *
 * @since  2014-05-09
 * @author Patrick Forget <patforg@geekpad.ca>
 */
class HiddenInputFormatter extends \Informant\Formatter\Base\BaseTextInputFormatter
{

    /**
     * @since  2014-05-09
     * @author Patrick Forget <patforg@geekpad.ca>
     */
    public function format(\Informant\Input\BaseElement $input, $options = array()) {

        if (!isset($options['attributes'])) {
            $options['attributes'] = array();
        } //if


        $options['attributes']['type'] = 'hidden';
        

        return parent::format($input, $options);
    } // format()

} //  TextInputFormatter class
