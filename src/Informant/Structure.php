<?php
/**
 * Base class to group data elements
 *
 * @since  2014-05-08
 * @author Patrick Forget <patforg@geekpad.ca>
 */

namespace Informant;

/**
 * Base class to group data elements
 *
 * @since  2014-05-08
 * @author Patrick Forget <patforg@geekpad.ca>
 */
abstract class Structure
{

    /**
     * Allowed values
     * @var array
     */
    protected $members = array();

    /**
     * returns default values
     *
     * @since  2014-05-08
     * @author Patrick Forget <patforg@geekpad.ca>
     */
    static protected function getDefaultValues() {
        return array(); 
    } // getDefaultValues()

    /**
     * class constructor
     *
     * @since  2014-05-08
     * @author Patrick Forget <patforg@geekpad.ca>
     */
    public function __construct($members = array())
    {
        if (!is_array($members)) {
            throw new \InvalidArgumentException('Expecting $members to be an Array');
        } //if

        $defaultValues = static::getDefaultValues();

        /* filter out values that are not allowed */
        $allowedValues = array_intersect_key($members, $defaultValues);

        /* set all remaing values or use defaults if no value provided */
        $this->members = array_merge($defaultValues, $allowedValues);
        
    } // __construct()

    /**
     * intercept get/set methods when native functions do not exist
     *
     * @author Patrick Forget <patforg at geekpad.ca>
     */
    public function __call($methodName, $arguments) {
        $prefix = substr($methodName, 0, 3);
        $memberName = lcfirst(substr($methodName, 3));
        if ($prefix === 'get') {
            return $this->getMember($memberName);
        } elseif ($prefix === 'set') {
            return $this->setMember($memberName, current($arguments));
        } else {
            throw new \BadMethodCallException('Method ' . $methodName . ' does not exists');
        } //if
    } // __call()

    /**
     * retrieve value for members
     *
     * @author Patrick Forget <patforg at geekpad.ca>
     *
     * @return array current value of members
     */
    protected function getMember($key) {
        if (! (isset($this->members[$key]) || array_key_exists($key, $this->members)) ) {
            throw new \BadMethodCallException("Trying to get a propety that does not exists ($key)");
        } //if
        return $this->members[$key];
    } // getMember()
   
    /**
     * assign value for members
     *
     * @author Patrick Forget <patforg at geekpad.ca>
     *
     * @param array value to assign to members
     */
    protected function setMember($key, $value) {
        if (! (isset($this->members[$key]) || array_key_exists($key, $this->members)) ) {
            throw new \BadMethodCallException("Trying to set a propety that does not exists ($key)");
        } //if
        $this->members[$key] = $value;
    } // setMember()


    /**
     * returns allowed members
     *
     * @since  2014-05-08
     * @author Patrick Forget <patforg@geekpad.ca>
     */
    static public function getAllowedMembers() {
        return array_keys(static::getDefaultValues());
    } // getAllowedMembers()

} //  Structure class
