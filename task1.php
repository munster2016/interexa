<?php

/**
 * Task 1
 *Implementiere ein assoziative Liste (Mapping Schlüssel => Wert),
 * die sich in foreach nutzen lässt (Stichwort Iterator in PHP).
Einträge sollen per set hinzugefügt,
 * per get abgefragt und per unset entfernt werden können.
 */

class EditListe
{
    /**
     * Set a new element in array
     * @return array
     */
    public function set(array $arr, $key, $value):array
    {
        $arr[$key] = $value;
        return $arr;
    }

    /**
     * Get element by key
     * @return mixed
     */
    public function get($arr, $key)
    {
        return $arr[$key];
    }

    /**
     * Delete element by key
     * @return mixed
     */
    public function unset($arr, $key)
    {
        unset($arr[$key]);
        return $arr;
    }

}

$arr = [
    'one'=> 'rechner',
    'two'=> 'drucker',
    'three'=> 'bildschirm',
    'four'=> 'mouse'
];

$edit = new EditListe();

$result = $edit->set($arr, 'ten', 'tastatur');

foreach ($result as $key => $value)
{
    echo $key . ' - '. $value . ';<br>';
}

var_dump($result);

$result2 = $edit->get($result, 'one');
var_dump($result2);

$result3 = $edit->unset($result, 'one');
var_dump($result3);

foreach ($result3 as $key => $value)
{
    echo $key . ' - '. $value . ';<br>';
}

/**
 * Als Erweiterung zu dieser Aufgabe
 * kannst du dir "Magic methods" anschauen und dir überlegen,
 * wie man auf einem Objekt deiner neuen Klasse
 * per Array-Access ($ob[]) Werte auslesen/setzen kann.
 */
class Magic
{
    private $myArray = [];

    public function __set($name, $value)
    {
        $this->myArray[$name] = $value;
    }

    public function __get($name)
    {
        return $this->myArray[$name];
    }

    public function __unset($name)
    {
        $this->myArray[$name];
    }
}


$obj = new Magic();

$obj->five; //ruft magische Methode __GET an


$obj->one = 'rechner'; //ruft magische Methode __SET an
$obj->two = 'drucker';
$obj->three = 'bildschirm';
$obj->four = 'mouse';

var_dump($obj);

var_dump($obj->five = 'tastatur');
