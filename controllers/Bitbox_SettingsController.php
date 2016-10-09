<?php
namespace Craft;

class Bitbox_SettingsController extends BaseController
{

  protected $allowAnonymous = true;

  /*
   * populate settingsModel with settings from the submited form... aka. $settings
   */
  public function actionEdit(){
    $variables[] = [];
    $this->renderTemplate('Bitbox/settings/index.html', $variables);
  }


  /*
   *  Transform object to array
   */
  private function objectToArray( $object ) {
    $array = array();
    foreach($object as $member=>$data) {
        $array[$member] = $data;
      }
    return $array;
  }
}