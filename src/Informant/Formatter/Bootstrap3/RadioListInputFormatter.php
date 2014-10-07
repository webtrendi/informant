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
class RadioListInputFormatter extends \Informant\Formatter\Base\BaseRadioListInputFormatter
{

    /**
     * @since  2014-09-17
     * @author Patrick Forget <patforg@geekpad.ca>
     */
    public function format(\Informant\Input\BaseElement $input, $options=array()) {

        $wrapperClass = (isset($options['wrapperClass']) ? $options['wrapperClass'] : 'col-sm-6');

        $options['itemWrapperOptions'] = array(
            'attributes' => array('class' => 'radio-inline'),
            'prependContent' => '<div class="'. $wrapperClass .'">',
            'rawPrepend' => true,
            'appendContent' => '</div>',
            'rawAppend' => true
        );

        return parent::format($input, $options);

    } // format()
} //  RadioListInputFormatter class
