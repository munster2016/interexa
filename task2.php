<?php

/**
 * Task 2:
 * Implementiere eine doppelt verkettete Liste. Jedes Element der Liste ist dabei ein einzelnes Objekt. Zu jedem Objekt soll es möglich sein, den Vorgänger und den Nachfolger zu bestimmen und auf diese Art die Liste zu traversieren.
Außerdem soll es möglich sein, nach einem Element ein weiteres Element einzufügen.
Zusätzlich soll eine Hilfsklasse implementiert werden, die folgende Funktionen bietet:
- Bestimmung des ersten/letzten Elements der Liste
- erstes/letztes Element der Liste entfernen
- Prüfung, ob ein bestimmtes Element in einer Liste vorhanden ist
 */


/**
 * Class Knoten
 * Element for DoubleLinkedList
 */
class Knoten
{

    public $data;
    public $nachfolger;
    public $vorgaenger;

    public function __construct ($data, $vorgaenger = 0, $nachfolger = 0)
    {
        $this->data = $data;
        $this->nachfolger = $nachfolger;
        $this->vorgaenger = $vorgaenger;
    }

    /**
     * @param $nachfolger
     */
    public function setnachfolger($nachfolger)
    {
        $this->nachfolger = $nachfolger;
    }

    /**
     * @param $vorgaenger
     */
    public function setvorgaenger($vorgaenger)
    {
        $this->vorgaenger = $vorgaenger;
    }

    /**
     * @return int
     */
    public function getnachfolger()
    {
        return $this->nachfolger;
    }

    /**
     * @return int
     */
    public function getvorgaenger()
    {
        return $this->vorgaenger;
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

}

/**
 * Class Box
 * DoubleLinkedList
 */
class Box extends  SplDoublyLinkedList
{
    public function __construct()
    {
    }
}

$list = new Box();

$knot1 = new Knoten('data1', 0, 2);
$knot2 = new Knoten('data2', 1, 3);
$knot3 = new Knoten('data3', 2, 4);
$knot4 = new Knoten('data4', 3, 5);
$knot5 = new Knoten('data5', 4, 0);

$list->push($knot1);
$list->push($knot2);
$list->push($knot3);
$list->push($knot4);
$list->push($knot5);

//var_dump($knot4->getnachfolger());

var_dump($list);


$one = new Extra();
$one->delFirstElem($list);
$one->delLastElem($list);
//var_dump($one->isExist($list,2));

//var_dump($list->offsetGet(2));

/**
 * Class Extra
 * Extra class for next function: add, delete, isExist...
 */
class Extra
{
    public function getFirstElem(Box $liste)
    {
        return $liste->bottom();
    }

    public function getLastElem(Box $liste)
    {
        return $liste->top();
    }

    public function delFirstElem(Box $liste)
    {
        $liste->offsetUnset($liste->count()-1);
    }

    public function delLastElem(Box $liste)
    {
        $liste->offsetUnset(0);
    }

    public function isExist(Box $liste, $index)
    {
        return $liste->offsetExists($index);
    }
}












