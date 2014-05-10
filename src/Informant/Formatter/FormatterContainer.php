<?php
/**
 * Contains the preffered implementations of different formatters to use
 *
 * @since  2014-05-09
 * @author Patrick Forget <patforg@geekpad.ca>
 */

namespace Informant\Formatter;

/**
 * Contains the preffered implementations of different formatters to use
 *
 * @since  2014-05-09
 * @author Patrick Forget <patforg@geekpad.ca>
 */
class FormatterContainer
{

    /**
     * @var array
     */
    private $formatters = array();

    
    /**
     * @var string
     */
    private $formatterNamespace = '';

    /**
     * class constructor
     *
     * @since  2014-05-09
     * @author Patrick Forget <patforg@geekpad.ca>
     */
    public function __construct($namespace = null) {
        if ($namespace === null) {
            $this->formatterNamespace = __NAMESPACE__ .'\\HtmlBasic';
        } else {
            $this->formatterNamespace = $namespace;
        } //if
    } // __construct()

    /**
     * retreive a formatter by name
     *
     * @since  2014-05-10
     * @author Patrick Forget <patforg@geekpad.ca>
     */
    public function getFormatter($name) {
        
        if (!isset($this->formatters[$name])) {
            $className = $this->formatterNamespace . '\\' . ucfirst($name). "Formatter";
            
            $this->formatters[$name] = new $className();

        } //if

        return $this->formatters[$name];
    } // getFormatter()

    /**
     * set formatter by name
     *
     * @since  2014-05-10
     * @author Patrick Forget <patforg@geekpad.ca>
     */
    public function setFormatter($name, FormatterInterface $formatter) {
        $this->formatters[$name] = $formatter;
    } // setFormatter()

    /**
     * calls the get code of the formatter
     *
     * @since  2014-05-09
     * @author Patrick Forget <patforg@geekpad.ca>
     */
    public function __call($methodName, $arguments) {
        
        $formatter= $this->getFormatter($methodName);

        return call_user_func_array(array($formatter, 'format'), $arguments);
    } // __call()

} //  FormatterContainer class
