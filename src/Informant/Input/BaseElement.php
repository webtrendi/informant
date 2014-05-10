<?php
/**
 * Base class for input definitions
 *
 * @since  2014-05-08
 * @author Patrick Forget <patforg@geekpad.ca>
 */

namespace Informant\Input;

/**
 * Base class for input definitions
 *
 * @since  2014-05-08
 * @author Patrick Forget <patforg@geekpad.ca>
 */
abstract class BaseElement extends \Informant\Structure
{

    /**
     * @since  2014-05-08
     * @author Patrick Forget <patforg@geekpad.ca>
     */
    protected static function getDefaultValues() {
        static $defaultValues = null;
        if ($defaultValues === null) {
            $defaultValues = array_merge(parent::getDefaultValues(), array(
                'id'   => '',
                'label' => '',
                'errors' => array(),
                'instructions' => array(),
                'extraAttributes' => array(),
            ));
        } //if

        return $defaultValues;
    } // getDefaultValues()

    /**
     * adds error messsage
     *
     * @since  2014-05-09
     * @author Patrick Forget <patforg@geekpad.ca>
     */
    public function addError($message, $key = null) {
        $this->addToList('errors', $message, $key);
    } // addError()

    /**
     * add multiple error messages
     *
     * @since  2014-05-10
     * @author Patrick Forget <patforg@geekpad.ca>
     */
    public function addErrors($errors) {
        $this->addMultipleToList('errors', $errors);
    } // addErrors()

    /**
     * adds instruction message
     *
     * @since  2014-05-09
     * @author Patrick Forget <patforg@geekpad.ca>
     */
    public function addInstruction($message, $key = null) {
        $this->addToList('instructions', $message, $key);
    } // addInstruction()

    /**
     * add multiple instruction messages
     *
     * @since  2014-05-10
     * @author Patrick Forget <patforg@geekpad.ca>
     */
    public function addInstructions($instructions) {
        $this->addMultipleToList('instructions', $instructions);
    } // addInstructions()

    /**
     * add a message to a collection
     *
     * @since  2014-05-09
     * @author Patrick Forget <patforg@geekpad.ca>
     */
    protected function addToList($type, $message, $key = null) {
        
        if ($key === null) {
            $this->members[$type][] = $message;
        } else {
            $this->members[$type][$key] = $message;
        } //if

    } // addToList()

    /**
     * add multiple items to a collection
     *
     * @since  2014-05-10
     * @author Patrick Forget <patforg@geekpad.ca>
     */
    protected function addMultipleToList($type, $messages) {
        foreach ($messages as $key => $message) {
            if (is_numeric($key)) {
                $this->members[$type][] = $message;
            } else {
                $this->members[$type][$key] = $message;
            } //if
        } //foreach
    } // addMultipleToList()

} //  BaseElement class
