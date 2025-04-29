<?php


class Marathon {
    public $id;
    public $name;
    public $date; 

    public function __construct($id, $name, $date) {
        $this->id = $id;
        $this->name = $name;
        $this->date = $date;
    }
}
?>
