<?php
namespace Craft;

class BitboxPlugin extends BasePlugin
{
    public function getName()
    {
         return Craft::t('Bitbox');
    }

    public function getVersion()
    {
        return '1.0';
    }

    
    public function getPluginUrl()
    {
        return 'https://github.com/levelupify/bitbox-plugin-craft';
    }

    public function getDocumentationUrl()
    {
        return $this->getPluginUrl();
    }

    public function getDeveloper()
    {
        return 'Levelup AS';
    }

    public function getDeveloperUrl()
    {
        return 'http://levelup.no';
    }

    public function hasCpSection()
    {
        return false;
    }

    protected function defineSettings()
    {
        return array(
        );
    }

    public function prepSettings($settings)
    {
        return $settings;
    }

    public function getSettingsHtml()
    {
       return craft()->templates->render('bitbox/settings', array(
           'settings' => $this->getSettings()
       ));
    }

    public function registerCpRoutes()
    {
        return array(
            'accesscontrol' => array('action' => 'bitbox/settings/edit'),
       );
    }
    public function init()
    {
      
    }
}