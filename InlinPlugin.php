<?php

namespace Craft;

class InlinPlugin extends BasePlugin
{
	public function getName()
	{
		return Craft::t('Inlin');
	}

	public function getVersion()
	{
		return '1.1';
	}

	public function getDeveloper()
	{
		return 'André Elvan';
	}

	public function getDeveloperUrl()
	{
		return 'http://vaersaagod.no';
	}
}