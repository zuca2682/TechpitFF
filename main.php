<?php

//echo "処理のはじまりはじまり〜!\n\n";
//ファイルのロード
require_once('./classes/Human.php');
require_once('./classes/Enemy.php');
require_once('./classes/Brave.php');
require_once('./classes/BlackMage.php');
require_once('./classes/Message.php');
require_once('./classes/WhiteMage.php');

//インスタンス化
$members = array();
$members[] = new Brave('ティーダ');
$members[] = new WhiteMage('ユウナ');
$members[] = new BlackMage('ルールー');

$enemies = array();
$enemies[] = new Enemy('ゴブリン', 20);
$enemies[] = new Enemy('ボム', 25);
$enemies[] = new Enemy('モルボル', 30);

$turn = 1;
$isFinishFlg = false;

$messageObj = new Message;

while (!$isFinishFlg) {
  echo "*** $turn ターン目 ***\n\n";

  //仲間の表示
  $messageObj->displayStatusMessage($members);

  //敵の表示
  $messageObj->displayStatusMessage($enemies);

  //仲間の攻撃
  $messageObj->displayStatusMessage($members, $enemies);

  //敵の攻撃
  $messageObj->displayStatusMessage($enemies, $members);

  //攻撃
  foreach ($members as $member) {
    //白魔道士の場合、味方オブジェクトに返す
    if (get_class($member) == "WhiteMage") {
      $member->doAttackWhiteMage($enemies, $members);
    }else{
      $member->doAttack($enemies);//配列を渡すように変更
    }
    echo "\n";
  }
  echo "\n";

  foreach ($enemies as $enemy) {
    $enemy->doAttack($members);
    echo "\n";
  }
  echo "\n";

  //仲間の全滅チェック
  $deathCnt = 0;//HPが0以下の仲間の数
  foreach ($members as $member) {
    if ($member->getHitPoint() > 0) {
        $isFinishFlg = false;
        break;
    }
    $deathCnt++;
  }
  if ($deathCnt === count($members)) {
    $isFinishFlg = true;
    echo "GAME OVER ....\n\n";
    break;
  }

  //敵の全滅チェック
  $deathCnt = 0;//HPが０以下の敵の数
  foreach ($enemies as $enemy) {
    if ($enemy->getHitPoint() > 0) {
        $isFinishFlg = false;
        break;
    }
    $deathCnt++;
  }
  if ($deathCnt === count($enemies)) {
      $isFinishFlg = true;
      echo "♪♪♪ファンファーレ♪♪♪\n\n";
      break;
  }
  $turn++;

}
echo "★★★ 戦闘終了 ★★★\n\n";
  //仲間の表示
  $messageObj->displayStatusMessage($members);

  //敵の表示
  $messageObj->displayStatusMessage($enemies);