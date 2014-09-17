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
     * adds choice key values
     *
     * @since  2014-05-09
     * @author Patrick Forget <patforg@geekpad.ca>
     */
    public function addChoice($label, $value = null) {
        $this->addToList('choices', $label, $value);
    } // addInstruction()

    /**
     * add multiple choices messages
     *
     * @since  2014-05-10
     * @author Patrick Forget <patforg@geekpad.ca>
     */
    public function addChoices($choices) {
        $this->addMultipleToList('choices', $choices);
    } // addChoices()

} //  ChoiceListInput class
