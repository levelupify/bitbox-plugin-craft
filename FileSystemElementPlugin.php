<?php
namespace Craft;

class FileSystemElementPlugin extends BasePlugin
{
    public function getName()
    {
         return Craft::t('File System Element');
    }

    public function getVersion()
    {
        return '1.0';
    }

    
    public function getPluginUrl()
    {
        return 'https://bitbucket.org/levelupify/file-system-plugin-craft';
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
       return craft()->templates->render('FileSystemElement/settings', array(
           'settings' => $this->getSettings()
       ));
    }

    public function registerCpRoutes()
    {
        return array(
            'accesscontrol' => array('action' => 'FileSystemElement/settings/edit'),
       );
    }
    public function init()
    {
       //  craft()->on('entries.saveEntry', function(Event $event) {
       //      $entry = $event->params['entry'];
       //      FileSystemElementPlugin::log($entry);
       //      $id = $entry->getContent()->attributes['elementId'];
       //      $value = $entry->getContent()->attributes['FileSystemElementField'];
       //      $data = array( 'resource_type' => 'hma-intranet-blog-entry', 'resource_id' => $id, 'value' => $value);
            
       //      $url = 'http://localhost:4888/api/v1/rpc/save_craft_access_control';
       //      $options = array(
       //        'http' => array(
       //          'method'  => 'POST',
       //          'content' => json_encode( $data ),
       //          'header'=>  "Content-Type: application/json\r\n" .
       //                      "Accept: application/json\r\n"
       //          )
       //      );
       //      $context  = stream_context_create( $options );
       //      $result = file_get_contents( $url, false, $context );
       //      $response = json_decode( $result );
       // });
    }
}