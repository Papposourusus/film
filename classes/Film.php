<?php


class Film {
    public $id;
    public $title;
    public $description;
    public $duration;
    public $image;
    public $watched;  

    public function __construct($id, $title, $description, $duration, $image, $watched = 0) {
        $this->id          = $id;
        $this->title       = $title;
        $this->description = $description;
        $this->duration    = $duration;
        $this->image       = $image;
        $this->watched     = $watched;
    }
}
?>
