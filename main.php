<?php

//echo "処理のはじまりはじまり〜!\n\n";
//ファイルのロード
require_once('./classes/Human.php');
require_once('./classes/Enemy.php');
require_once('./classes/Brave.php');
require_once('./classes/BlackMage.php');
require_once('./classes/WhiteMage.php');

//インスタンス化
$members = array();
$members[] = new Brave('ティーダ');
$members[] = new WhiteMage('ユウナ');
$members[] = new BlackMage('ルールー');
//$tiida = new Brave("ティーダ");

$enemies = array();
$enemies[] = new Enemy('ゴブリン', 20);
$enemies[] = new Enemy('ボム', 25);
$enemies[] = new Enemy('モルボル', 30);
//$goblin = new Enemy("ゴブリン");

$turn = 1;

//どちらのHPが０になるまで繰り返す
while ($tiida->getHitPoint() > 0 && $goblin->getHitPoint() > 0) {
  echo "*** $turn ターン目 ***\n\n";

  //現在のHPの表示
  foreach ($members as $member) {
    echo $member->getName() . " ： " . $member->getHitPoint() . "/" . $member::MAX_HITPOINT . "\n";
  }
  echo "\n";
  foreach ($enemies as $enemy) {
    echo $enemy->getName() . " ： " . $enemy->getHitPoint() . "/" . $enemy::MAX_HITPOINT . "\n";
  }
  echo "\n";

  //攻撃
  $tiida->doAttack($goblin);
  echo "\n";
  $goblin->doAttack($tiida);
  echo "\n";

  $turn++;
}

echo "★★★ 戦闘終了 ★★★\n\n";
echo $tiida->getName() . " ： " . $tiida->getHitPoint() . "/" . $tiida::MAX_HITPOINT . "\n";
echo $goblin->getName() . " ： " . $goblin->getHitPoint() . "/" . $goblin::MAX_HITPOINT . "\n\n";