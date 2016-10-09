<?php
namespace Craft;

class Bitbox_BitboxPickerFieldType extends BaseFieldType
{
  public function getName()
  {
    return Craft::t('Bitbox picker');
  }

  public function defineContentAttribute()
  {
    return AttributeType::Mixed;
  }
  public function getInputHtml($name, $value){

    craft()->templates->includeJsResource('bitbox/js/frame.js');
    craft()->templates->includeCssResource('bitbox/css/frame.css');

    // push variables into template
    return craft()->templates->render('bitbox/frame/index', array(
      'name'  => $name,
      'value'  => json_encode($value),
      'rawValue'  => $value != '' ? $value : array('url' => null),
      'randomId' => str_replace('.', '_', uniqid('', true)),
    ));
  }
}