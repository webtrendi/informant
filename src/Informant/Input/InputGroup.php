<?php
/**
<?php
/**
 * Collection of input
 *
 * @since  2014-05-09
 * @author Patrick Forget <patforg@geekpad.ca>
 */

namespace Informant\Input;

/**
 * Collection of input
 *
 * @since  2014-05-09
 * @author Patrick Forget <patforg@geekpad.ca>
 */
class InputGroup extends \Informant\Input\BaseElement
    implements \IteratorAggregate, \ArrayAccess, \Countable {

    /**
     * @var array
     */
    private $inputs = array();

    /**
     * @since  2014-05-09
     * @author Patrick Forget <patforg@geekpad.ca>
     */
    public function getIterator() {
        return new ArrayIterator($this);   
    } // getIterator()

    /**
     * @since  2014-05-09
     * @author Patrick Forget <patforg@geekpad.ca>
     */
    public function offsetExists ($offset) {
        return isset($this->inputs[$offset]);
    } // offsetExists()

    /**
     * @since  2014-05-09
     * @author Patrick Forget <patforg@geekpad.ca>
     */
    public function offsetGet ($offset) {
        return isset($this->inputs[$offset]) ? $this->inputs[$offset] : null;
    } // offsetGet()
    
    /**
     * @since  2014-05-09
     * @author Patrick Forget <patforg@geekpad.ca>
     */
    public function offsetSet ($offset, $value) {
        $this->inputs[$offset] = $value;
    } // offsetSet()

    /**
     * @since  2014-05-09
     * @author Patrick Forget <patforg@geekpad.ca>
     */
    public function offsetUnset ($offset) {
        unset($this->inputs[$offset]);
    } // offsetUnset()

    /**
     * @since  2014-05-09
     * @author Patrick Forget <patforg@geekpad.ca>
     */
    public function count() {
        return sizeof($this->inputs);
    } // count()


    /**
     * assigns values using the provided array
     *
     * @since  2014-05-09
     * @author Patrick Forget <patforg@geekpad.ca>
     */
    public function setValues($valueCollection) {

        foreach ($valueCollection as $key => $value) {
            if (isset($this[$key])) {
                $this[$key]->setValue($value);
            } //if
        } //foreach
        
    } // setValues()

} //  InputGroup class
