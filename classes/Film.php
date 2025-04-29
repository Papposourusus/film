<?php

class Film {
    public $id;
    public $title;
    public $description;
    public $duration;
    public $image;

    public function __construct($id, $title, $description, $duration, $image) {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->duration = $duration;
        $this->image = $image;
    }
}
?>
