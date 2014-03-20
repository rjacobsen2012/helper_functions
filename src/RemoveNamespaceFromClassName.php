<?php

/**
 * RemoveNamespaceFromClassName 
 * 
 * @package 
 * @version v1.0
 * @copyright 2013 Indatus
 * @author Richard Jacobsen <rjacobsen@indatus.com> 
 * @license PHP Version 5.4 {@link https://www.archlinux.org/packages/extra/x86_64/php/}
 */
class RemoveNamespaceFromClassName
{
    /**
     * There are instances where we want to get table names and attributes directly
     * from the model name. Or load routes from controller class names. The namespace
     * gets in the way in these cases, so this helper just strips off the namespace.
     *
     * @static
     * @param Model $model The eloquent model is just passed by reference
     * @access public
     * @return string The class name with namespaces stripped off
     */
    public static function remove_namespace_from_class_name($model)
    {
        $model_name = explode("\\", $model);

        return end($model_name);
    }
}
