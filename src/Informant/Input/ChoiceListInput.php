<?php
/**
 * class for user entered input
 *
 * @since  2014-05-08
 * @author Patrick Forget <patforg@geekpad.ca>
 */

namespace Informant\Input;

/**
 * class for user entered input
 *
 * @since  2014-05-08
 * @author Patrick Forget <patforg@geekpad.ca>
 */
class ChoiceListInput extends BaseInput
{

    /**
     * @since  2014-05-10
     * @author Patrick Forget <patforg@geekpad.ca>
     */
    protected static function getDefaultValues() {
        static $defaultValues = null;
        if ($defaultValues === null) {
            $defaultValues = array_merge(parent::getDefaultValues(), array(
                'choices' => array()
            ));
        } //if

        return $defaultValues;
    } // getDefaultValues()

    /**
     * adds choice message
     *
     * @since  2014-05-09
     * @author Patrick Forget <patforg@geekpad.ca>
     */
    public function addChoice($message, $key = null) {
        $this->addToList('choices', $message, $key);
    } // addInstruction()

    /**
     * add multiple choices messages
     *
     * @since  2014-05-10
     * @author Patrick Forget <patforg@geekpad.ca>
     */
    public function addChoices($instructions) {
        $this->addMultipleToList('choices', $instructions);
    } // addChoices()

} //  ChoiceListInput class
