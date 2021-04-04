<?php
class Message
{
  //ステータスを表示
  public function displayStatusMessage($objects)
  {
    foreach ($objects as $object) {
      echo $object->getName(). ":" .$object->getHitPoint(). "/" .$object::MAX_HITPOINT. "\n";
    }
    echo "\n";
  }
}