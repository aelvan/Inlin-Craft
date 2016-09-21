<?php
namespace craft\plugins\inlin\variables;

use craft\plugins\inlin\Inlin;

class InlinVariable
{
    /**
     * Main inlin template variable. Inlines local or remote file.
     * 
     * @param $fileName
     * @param bool $remote
     * @return string
     */
    public function er($fileName, $remote = false)
    {
        $documentRoot = Inlin::$plugin->inlin->getSetting('inlinPublicRoot')!=null ? Inlin::$plugin->inlin->getSetting('inlinPublicRoot') : $_SERVER['DOCUMENT_ROOT'];
        
        $filePath = $this->_removeDoubleSlashes($documentRoot . '/' . $fileName);
        
        if ($fileName !== '' && file_exists($filePath)) {

            $content = @file_get_contents($filePath);
            return $content;

        } else {
            if ($remote) {

                $content = @file_get_contents($fileName);
                return $content;

            } else {
                return '';
            }
        }
    }

    /**
     * Removes double slashes from string
     * 
     * @param $path
     * @return mixed
     */
    private function _removeDoubleSlashes($path)
    {
        return preg_replace('#/+#','/',$path);
    }
}