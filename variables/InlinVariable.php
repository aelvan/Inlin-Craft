<?php
namespace Craft;

class InlinVariable
{
	public function er($fileName)
	{
		$documentRoot = craft()->inlin->getSetting('inlinPublicRoot')!=null ? craft()->inlin->getSetting('inlinPublicRoot') : $_SERVER['DOCUMENT_ROOT'];
		$filePath = $documentRoot . $fileName;

		if ($fileName != '' && file_exists($filePath)) {

			$content = file_get_contents($filePath);
			return $content;

		} else {
			return '';
		}
	}
}