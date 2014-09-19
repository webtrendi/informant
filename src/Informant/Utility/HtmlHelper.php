<?php
/**
 * class for formatting html
 *
 * @since  2014-05-09
 * @author Patrick Forget <patforg@geekpad.ca>
 */

namespace Informant\Utility;

/**
 * Base class for formatting inputs
 *
 * @since  2014-05-09
 * @author Patrick Forget <patforg@geekpad.ca>
 */
class HtmlHelper
{

    /**
     * class constructor
     *
     * @since  2014-05-09
     * @author Patrick Forget <patforg@geekpad.ca>
     */
    private function __construct() {
        
    } // __construct()

    /**
     * outputs an html tag
     *
     * @since  2014-05-09
     * @author Patrick Forget <patforg@geekpad.ca>
     *
     * @var string $name tag name
     * @var array $options 
     *   - attributes array array of attributes for the tag
     *   - content string of inner content.  Will be escaped by default.
     *   - rawContent boolean if set to true, content will not be escaped
     *   - closing boolean do we need a closing tag or not, if content is provided a closing tag will be output by default.
     *   - shortClosing boolean use short closing tag
     *   - prependContent string code to put before the tag
     *   - appendContent string code to put after the tag
     */
    public static function tag($name, $options = array()) {
        ob_start();

        if (isset($options['prependContent'])) {
            if (isset($options['rawPrepend']) && $options['rawPrepend']) {
                echo $options['prependContent'];
            } else {
                echo htmlspecialchars($options['prependContent'], ENT_NOQUOTES|ENT_HTML5, 'UTF-8');
            } //if
        } //if

        echo "<{$name}";
        $attributes = isset($options['attributes']) ? $options['attributes'] : array();

        foreach ($attributes as $attributeName => $attributeValue) {
            $escapedValue = htmlspecialchars($attributeValue, ENT_COMPAT | ENT_HTML5, 'UTF-8', false);
            echo " {$attributeName}=\"{$escapedValue}\"";
        } //foreach


        $contentSet = isset($options['content']);

        if ($contentSet) {
            $closing = true;
            $shortClosing = false;
        } else {
            $closing = isset($options['closing']) && $options['closing'] ? true : false;
            $shortClosing = isset($options['shortClosing']) && $options['shortClosing'] ? true : false;
        } //if

        echo $shortClosing ? "/>" :  ">";

        if ($contentSet) {
            if (isset($options['rawContent']) && $options['rawContent']) {
                echo $options['content'];
            } else {
                echo htmlspecialchars($options['content'], ENT_NOQUOTES|ENT_HTML5, 'UTF-8');
            } //if
        } //if

        if ($closing) {
            echo "</{$name}>";
        } //if

        if (isset($options['appendContent'])) {
            if (isset($options['rawAppend']) && $options['rawAppend']) {
                echo $options['appendContent'];
            } else {
                echo htmlspecialchars($options['appendContent'], ENT_NOQUOTES|ENT_HTML5, 'UTF-8');
            } //if
        } //if

        $tag = ob_get_contents();
        ob_end_clean();

        return $tag;
        
    } // tag()


} //  HtmlHelper class
