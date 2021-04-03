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
$goblin = new Enemy("ゴブリン");

$turn = 1;

//どちらのHPが０になるまで繰り返す
while ($tiida->getHitPoint() > 0 && $goblin->getHitPoint() > 0) {
  echo "*** $turn ターン目 ***\n\n";

  //現在のHPの表示
  echo $tiida->getName() . " ： " . $tiida->getHitPoint() . "/" . $tiida::MAX_HITPOINT . "\n";
  echo $goblin->getName() . " ： " . $goblin->getHitPoint() . "/" . $goblin::MAX_HITPOINT . "\n";
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