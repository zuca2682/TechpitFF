<?php

//echo "処理のはじまりはじまり〜!\n\n";
//ファイルのロード
require_once('./classes/Human.php');
require_once('./classes/Enemy.php');

//インスタンス化
$tiida = new Human();
$goblin = new Enemy();

//名前を設定
$tiida->name = "ティーダ";
$goblin->name = "ゴブリン";

//どちらかんおHPが０になるまで繰り返す
while ($tiida->hitPoint > 0 && $goblin->hitPoint > 0) {

  //現在のHPの表示
  echo $tiida->name . "　：　" . $tiida->hitPoint . "/" . $tiida::MAX_HITPOINT . "\n";
  echo $goblin->name . "　：　" . $goblin->hitPoint . "/" . $goblin::MAX_HITPOINT . "\n";
  echo "\n";

  //攻撃
  $tiida->doAttack($goblin);
  echo "\n";
  $goblin->doAttack($tiida);
  echo "\n";

}

echo "★★★ 戦闘終了 ★★★\n\n";
echo $tiida->name . "　：　" . $tiida->hitPoint . "/" . $tiida::MAX_HITPOINT . "\n";
echo $goblin->name . "　：　" . $goblin->hitPoint . "/" . $goblin::MAX_HITPOINT . "\n\n";