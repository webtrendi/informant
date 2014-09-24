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
class SelectInputFormatter extends \Informant\Formatter\Base\BaseSelectInputFormatter
{

    /**
     * @since  2014-05-09
     * @author Patrick Forget <patforg@geekpad.ca>
     */
    public function format(\Informant\Input\BaseElement $input, $options=array()) {

        if (!isset($options['attributes'])) {
            $options['attributes'] = array();
        } //if

        $options['attributes']  = array_merge(array(
            'class' => 'form-control',
        ), $options['attributes']);

        return parent::format($input, $options); 
    } // format()

} //  SelectInputFormatter class
