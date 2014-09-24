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
class CheckboxInputFormatter extends \Informant\Formatter\Base\BaseCheckboxInputFormatter
{

    /**
     * @since  2014-05-09
     * @author Patrick Forget <patforg@geekpad.ca>
     */
    public function format(\Informant\Input\BaseElement $input, $options=array()) {

        return h::tag('label', array(
            'content' => parent::format($input, $options) . ' ' . $input->getLabel(),
            'rawContent' => true, 
        ));

    } // format()

} //  CheckboxInputFormatter class
