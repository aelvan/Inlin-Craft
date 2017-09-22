<?php
namespace Craft;

class InlinVariable
{
	protected $inlinPublicRoot;
	public $cacheDuration;

	public function init()
	{
		$settings = craft()->plugins->getPlugin('inlin')->getSettings();

		$this->inlinPublicRoot = $settings->inlinPublicRoot;
		$this->cacheDuration = $settings->cacheDuration;
	}

	public function er($fileName, $remote = false, $cache = true)
	{
		$documentRoot = $this->inlinPublicRoot != null && $this->inlinPublicRoot != '' ? $this->inlinPublicRoot : $_SERVER['DOCUMENT_ROOT'];
		$filePath = $documentRoot . $fileName;

		if ($fileName !== '' && file_exists($filePath)) {

			$content = @file_get_contents($filePath);
			return TemplateHelper::getRaw($content);

		} else if ($remote) {

			$cached = craft()->cache->get($fileName);

			if ($cache && $cached) {
				return TemplateHelper::getRaw($cached);
			} else {
				$content = @file_get_contents($fileName);
				if ($cache) {
					craft()->cache->set($fileName, $content, $this->cacheDuration);
				}

				return TemplateHelper::getRaw($content);
			}
		} else {
			return '';
		}
	}
}