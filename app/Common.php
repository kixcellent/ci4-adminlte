<?php

use CodeIgniter\View\View;
use App\Libraries\View\ViewName;
// use CodeIgniter\Config\Services;

/**
 * The goal of this file is to allow developers a location
 * where they can overwrite core procedural functions and
 * replace them with their own. This file is loaded during
 * the bootstrap process and is called during the frameworks
 * execution.
 *
 * This can be looked at as a `master helper` file that is
 * loaded early on, and may also contain additional functions
 * that you'd like to use throughout your entire application
 *
 * @see: https://codeigniter4.github.io/CodeIgniter4/
 */

 if (! function_exists('view')) {
    /**
     * Grabs the current RendererInterface-compatible class
     * and tells it to render the specified view. Simply provides
     * a convenience method that can be used in Controllers,
     * libraries, and routed closures.
     *
     * NOTE: Does not provide any escaping of the data, so that must
     * all be handled manually by the developer.
     *
     * @param array $options Unused - reserved for third-party extensions.
     */
    function view(string $name, array $data = [], array $options = []): string
    {
        /**
         * @var CodeIgniter\View\View $renderer
         */
        $renderer = service('renderer');

        $saveData = config(View::class)->saveData;

        if (array_key_exists('saveData', $options)) {
            $saveData = (bool) $options['saveData'];
            unset($options['saveData']);
        }
        $name = ViewName::normalize($name);
        return $renderer->setData($data, 'raw')->render($name, $options, $saveData);
    }
}

if (! function_exists('layouts')) {
  function layouts( string $name ): string
  {
    $layout = (View::class)->layout;
    $layout = $layout('layouts/'.$name)
    return ;
  }
}