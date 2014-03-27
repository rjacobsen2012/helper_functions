<?php

/**
 * ObjectTools
 *
 * @package
 * @version v1.0
 * @copyright 2013 Indatus
 * @author Richard Jacobsen <rjacobsen@indatus.com>
 * @license PHP Version 5.4 {@link https://www.archlinux.org/packages/extra/x86_64/php/}
 */
class ObjectTools
{
    /**
     * objToArray
     *
     * This method with convert objects to arrays
     *
     * @static
     * @param object $obj
     * @param array $arr
     * @access public
     * @return array
     */
    public static function objToArray($obj, &$arr = array())
    {
        if(!is_object($obj) && !is_array($obj)){
            $arr = $obj;
            return $arr;
        }

        foreach ($obj as $key => $value) {
            if (!empty($value)) {
                $arr[$key] = array();
                objToArray($value, $arr[$key]);
            } else {
                $arr[$key] = $value;
            }
        }
        return $arr;
    }
}