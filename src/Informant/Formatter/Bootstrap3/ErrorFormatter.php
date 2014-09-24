<?php
/**
 * Formats error messages
 *
 * @since  2014-05-09
 * @author Patrick Forget <patforg@geekpad.ca>
 */

namespace Informant\Formatter\Bootstrap3;

/**
 * Formats error messages
 *
 * @since  2014-05-09
 * @author Patrick Forget <patforg@geekpad.ca>
 */
class ErrorFormatter extends \Informant\Formatter\Base\BaseMessageFormatter
{

    /**
     * @since  2014-05-09
     * @author Patrick Forget <patforg@geekpad.ca>
     */
    protected function getMessages(\Informant\Input\BaseElement $input) {
       return $input->getErrors(); 
    } // getMessages()


    /**
     * @since  2014-05-10
     * @author Patrick Forget <patforg@geekpad.ca>
     */
    protected function getMessageClass() {
        return 'text-danger error-messages';
    } // getMessageClass()

} //  ErrorFormatter class
