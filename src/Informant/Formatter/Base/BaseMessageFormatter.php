<?php
/**
 * Base class to format a html list of messages
 *
 * @since  2014-05-09
 * @author Patrick Forget <patforg@geekpad.ca>
 */

namespace Informant\Formatter\Base;
use Informant\Utility\HtmlHelper as html;

/**
 * Format a list of messages
 *
 * @since  2014-05-09
 * @author Patrick Forget <patforg@geekpad.ca>
 */
abstract class BaseMessageFormatter implements \Informant\Formatter\FormatterInterface
{

    /**
     * returns list of messages
     *
     * @since  2014-05-09
     * @author Patrick Forget <patforg@geekpad.ca>
     *
     * @return array list of messages
     */
    abstract protected function getMessages(\Informant\Input\BaseElement $input);

    /**
     * returns the class to use for message
     *
     * @since  2014-05-10
     * @author Patrick Forget <patforg@geekpad.ca>
     *
     * @return string class for messages
     */
    abstract protected function getMessageClass();
    
     /**
      * @since  2014-05-09
      * @author Patrick Forget <patforg@geekpad.ca>
      */
    public function format(\Informant\Input\BaseElement $input, $options = array()) {

        $messages = $this->getMessages($input);

        if (sizeof($messages) > 0) {
            $attributes = isset($options['attributes']) ? $options['attributes'] : array();
            $messageAttributes = isset($options['messageAttributes']) ? $options['messageAttributes'] : array();

            if (!isset($attributes['class'])) {
                $attributes['class'] = 'messages ' . $this->getMessageClass();
            } //if

            ob_start();

            foreach ($messages as $message) {
                echo html::tag('li', array(
                    'attributes' => $messageAttributes,
                    'content' => $message,
                ));
            } //foreach

            $code = html::tag('ul', array(
                'attributes' => $attributes,
                'content' => ob_get_contents(),
                'rawContent' => true
            ));
            ob_end_clean();


        } else {

            $code = '';

        } //if

        return $code;
     } // format()


} //  BaseMessageFormatter class
