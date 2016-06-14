<?php
namespace Craft;

class FileSystemElementVariable
{
  public function checkLogin()
  {
    if(!isset($_COOKIE['hma_login'])) {
      return false;
    } else {
      // run a check to se if session is active

      $data = array('session_id' => 'hma:sess:' . $_COOKIE['hma_login']);
      $data = json_encode($data);
      
      $url = 'http://localhost:4888/api/v1/rpc/get_session_user';

      $options = array(
        'http' => array(
          'method'  => 'POST',
          'content' => $data,
          'header'=>  "Content-Type: application/json\r\n" .
                      "Accept: application/json\r\n"
        )
      );

      $context  = stream_context_create( $options );
      $result = file_get_contents( $url, false, $context );
      $response = json_decode( $result, true );

      if (isset($response['user'])) {
        if (!isset($_COOKIE['_t'])) {
          return 'forum';          
        }
        return $result;
      }
    }
  }

  public function doLogout()
  {
    if (isset($_COOKIE['_t'])) {
      setcookie('_t', '', 1);
    }

    return true;
  }
  
  private function checkPermissions($entryId)
  {
    # check if user/group is allowed to see entry
    return $entryId;
  }

  public function getEntry($id)
  {
    $allowedEntry = null;

    if (self::checkPermissions(true)) {
      $criteria = craft()->elements->getCriteria(ElementType::Entry);
      $criteria->id = $id;

      $allowedEntry = $criteria->find();
    }

    return $allowedEntry[0];
  }

  public function getEntries($section)
  {
    $allowedEntries = [];

    $criteria = craft()->elements->getCriteria(ElementType::Entry);
    $criteria->section = $section;
    $criteria->limit = null;
    
    foreach ($entries = $criteria->find() as $entry) {
      if (self::checkPermissions(true)) {
        $allowedEntries[] = [
          'entry_id' => $entry->id,
        ];
      }
    }

    return $allowedEntries;
  }
}