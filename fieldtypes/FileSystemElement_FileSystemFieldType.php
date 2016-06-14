<?php
namespace Craft;

class FileSystemElement_FileSystemFieldType extends BaseFieldType
{
  public function getName()
  {
    return Craft::t('File System Element');
  }

  public function defineContentAttribute()
  {
    return AttributeType::Mixed;
    // return AttributeType::Text;
     // return false;
  }

  // public function getData($data) {
  //   $url = 'http://localhost:4888/api/v1/'.$data;
  //   $options = array(
  //     'http' => array(
  //       'method'  => 'GET',
  //       'header'=>  "Content-Type: application/json\r\n" .
  //                   "Accept: application/json\r\n"
  //       )
  //   );
  //   $context  = stream_context_create( $options );
  //   $result = file_get_contents( $url, false, $context );
  //   $response = json_decode( $result );

  //   return $response;
  // }

  // public function getPermissions($id) {
  //   $data = array( 'resource_type' => 'hma-intranet-blog-entry', 'resource_id' => $id );
  //   $url = 'http://localhost:4888/api/v1/rpc/get_craft_access_control';
  //   $options = array(
  //     'http' => array(
  //       'method'  => 'POST',
  //       'content' => json_encode( $data ),
  //       'header'=>  "Content-Type: application/json\r\n" .
  //                   "Accept: application/json\r\n"
  //       )
  //   );
  //   $context  = stream_context_create( $options );
  //   $result = file_get_contents( $url, false, $context );
  //   $response = json_decode( $result );

  //   return $response;
  // }

  public function getInputHtml($name, $value){

    // $entry = $this->element;

    // $existingPermissions = null;
    // if (isset($this->element) && isset($this->element->id)) {
    //   $existingPermissionsData = self::getPermissions($this->element->id);
    //   if (isset($existingPermissionsData->permissions)) {
    //     $existingPermissions = $existingPermissionsData->permissions;
    //   }
    // }

    # Dummy data end

    // Include our Javascript and css
    craft()->templates->includeJsResource('FileSystemElement/js/frame.js');
    craft()->templates->includeCssResource('FileSystemElement/css/frame.css');

    // push variables into template
    return craft()->templates->render('FileSystemElement/frame/index', array(
      'name'  => $name,
      'value'  => json_encode($value),
      'rawValue'  => $value != '' ? $value : array('url' => null),
      'randomId' => str_replace('.', '_', uniqid('', true)),
    ));
  }
}