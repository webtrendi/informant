<?php
/**
 * Formats error messages
 *
 * @since  2014-05-09
 * @author Patrick Forget <patforg@geekpad.ca>
 */

namespace Informant\Formatter\HtmlBasic;

/**
 * Formats error messages
 *
 * @since  2014-05-09
 * @author Patrick Forget <patforg@geekpad.ca>
 */
class InstructionFormatter extends HtmlMessageFormatter
{

    /**
     * @since  2014-05-09
     * @author Patrick Forget <patforg@geekpad.ca>
     */
    protected function getMessages(\Informant\Input\BaseElement $input) {
       return $input->getInstructions(); 
    } // getMessages()

    /**
     * @since  2014-05-10
     * @author Patrick Forget <patforg@geekpad.ca>
     */
    protected function getMessageClass() {
        return 'instruction-messages';
    } // getMessageClass()

} //  InstructionFormatter class
