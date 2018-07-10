<?php
/**
 * Inlin plugin for Craft CMS 3.x
 *
 * A simple plugin for inlining stuff in your templates.
 *
 * @link      https://www.vaersaagod.no
 * @copyright Copyright (c) 2017 André Elvan
 */

namespace aelvan\inlin\variables;

use Craft;
use aelvan\inlin\Inlin;

class InlinVariable
{
    /**
     * Main inlin template variable. Inlines local or remote file.
     *
     * @param string $fileName
     * @param bool   $remote
     *
     * @return string
     */
    public function er($fileName, $remote = false): string
    {
        $webroot = Craft::getAlias('@webroot');
        $filePath = $this->_removeDoubleSlashes($webroot.'/'.$fileName);

        if ($remote) {
            if (strpos($fileName, '//') === 0) {
                $protocol = Craft::$app->request->isSecureConnection ? 'https:' : 'http:';
                $fileName = $protocol.$fileName;
            }

            return @file_get_contents($fileName);
        }

        if ($fileName !== '' && file_exists($filePath)) {
            $content = @file_get_contents($filePath);

            return $content;
        }
    }

    /**
     * Removes double slashes from string
     *
     * @param $path
     *
     * @return mixed
     */
    private function _removeDoubleSlashes($path)
    {
        return preg_replace('#/+#', '/', $path);
    }

}
