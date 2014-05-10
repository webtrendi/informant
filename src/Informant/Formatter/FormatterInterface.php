<?php
/**
 * Defines interface for formatting input
 *
 * @since  2014-05-09
 * @author Patrick Forget <patforg@geekpad.ca>
 */

namespace Informant\Formatter;

/**
 * Defines interface for formatting input
 *
 * @since  2014-05-09
 * @author Patrick Forget <patforg@geekpad.ca>
 */
interface FormatterInterface {


    /**
     * Returns the code for the given input
     *
     * @since  2014-05-09
     * @author Patrick Forget <patforg@geekpad.ca>
     *
     * @return string code that reprensents the input
     */
    public function format(\Informant\Input\BaseElement $input, $options = array());

} //  FormatterInterface class
