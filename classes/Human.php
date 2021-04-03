<?php

class Human
{
  //プロパティ
  const MAX_HITPOINT = 100;//最大HPの定義 定数
  private $name;//人間の名前
  private $hitPoint = 100;//現在のHP
  private $attackPoint = 20;//攻撃力

  //メソッド
  public function __construct($name, $hitPoint = 100, $attackPoint = 20)
  {
    $this->name = $name;
    $this->hitPoint = $hitPoint;
    $this->attackPoint = $attackPoint;
  }

  //攻撃
  public function doAttack($enemy)
  {
    echo "『".$this->getName()."』の攻撃!\n";
    echo "【".$enemy->getName()."】に".$this->attackPoint. "のダメージ!\n";
    $enemy->tookDamage($this->attackPoint);
  }
  //ダメージを受ける
  public function tookDamage($damage)
  {
    $this->hitPoint -= $damage;
    //HPが０未満にならないための処理
    if ($this->hitPoint < 0) {
        $this->hitPoint = 0;
    }
  }

  public function getName()
  {
    return $this->name;
  }

  public function getHitPoint()
  {
    return $this->hitPoint;
  }

  public function getAttackPoint()
  {
    return $this->attackPoint;
  }
}