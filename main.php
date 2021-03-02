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

echo $tiida->name."\n";
echo $goblin->name."\n";
