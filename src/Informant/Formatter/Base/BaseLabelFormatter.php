<?php
/**
 * Formats form labels
 *
 * @since  2014-05-09
 * @author Patrick Forget <patforg@geekpad.ca>
 */

namespace Informant\Formatter\Base;
use Informant\Utility\HtmlHelper as h;

/**
 * Formats form labels
 *
 * @since  2014-05-09
 * @author Patrick Forget <patforg@geekpad.ca>
 */
abstract class BaseLabelFormatter implements \Informant\Formatter\FormatterInterface
{

    /**
     * @since  2014-05-09
     * @author Patrick Forget <patforg@geekpad.ca>
     */
    public function format(\Informant\Input\BaseElement $input, $options=array()) {

        $attributes = array();

        $id = $input->getId();

        if (strlen($id) > 0) {
            $attributes['for'] = $id;
        } //if

        if (isset($options['attributes'])) {
            $attributes = array_merge($attributes, $options['attributes']);
        } //if

        return h::tag('label', array(
            'attributes' => $attributes,
            'content' => $input->getLabel(),
        ));
    } // format()

} //  BaseLabelFormatter class
