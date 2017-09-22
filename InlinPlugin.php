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
		return '1.2';
	}

	public function getDeveloper()
	{
		return 'André Elvan';
	}

	public function getDeveloperUrl()
	{
		return 'http://vaersaagod.no';
	}

	public function getSettingsHtml()
	{
		return craft()->templates->render('inlin/_settings', array(
			'settings' => $this->getSettings()
		));
	}

	protected function defineSettings()
	{
		return array(
			'inlinPublicRoot' => array(AttributeType::String, 'label' => 'Public Root'),
			'cacheDuration' => array(AttributeType::Number, 'label' => 'Cache Duration', 'default' => 3600)
		);
	}
}