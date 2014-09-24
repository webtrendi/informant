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
class DressedFormatter extends \Informant\Formatter\Base\BaseDressedFormatter
{

    /**
     * @since  2014-09-23
     * @author Patrick Forget <patforg@geekpad.ca>
     */
    public function format(\Informant\Input\BaseElement $input, $options=array()) {

        $formatter = $options['formatter'];
        $formatterName = $options['formatterName'];


        if ($formatterName === 'checkboxInput') {
            $inputOptions = isset($options['inputOptions']) ? $options['inputOptions'] : array();
            $errorOptions = isset($options['errorOptions']) ? $options['errorOptions'] : array();
        
            ob_start();

            echo call_user_func(array($formatter, $formatterName), $input, $inputOptions );
            echo $formatter->error($input, $errorOptions);

            $content = ob_get_contents();
            ob_end_clean();

            $attributes = array(
                'class' => 'checkbox' 
            );

            if (isset($options['attributes'])) {
                $attributes = array_merge($attributes, $options['attributes']);
            } //if

            return h::tag('div', array(
                'attributes' => $attributes,
                'content' => $content,
                'rawContent' => true
            )) . "\n";

        } else {
            
            if (!isset($options['attributes'])) {
                $options['attributes'] = array();
            } //if

            $options['attributes']  = array_merge(array(
                'class' => 'form-group',
            ), $options['attributes']);
        
            return parent::format($input, $options);

        }//if 

    } // format()


} //  DresseFormatter class
