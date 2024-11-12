<?php

class Slider
{
    private Database $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function all()
    {
        $this->db->prepare("SELECT * FROM `sliders` ORDER BY id DESC ");
        return $this->db->fetchAll();
    }

    public function findById($slider_id)
    {
        $this->db->prepare("SELECT * FROM `sliders` WHERE id=:id");
        $this->db->bindParam('id', $slider_id);;
        return $this->db->fetch();
    }

    public function store($link, $image_name, $alt, $status)
    {
        $this->db->prepare("INSERT INTO `sliders` SET link=:link, image=:image, alt=:alt, status=:status");
        $this->db->bindParam('link', $link);
        $this->db->bindParam('image', $image_name);
        $this->db->bindParam('alt', $alt);
        $this->db->bindParam('status', $status);
        $this->db->execute();
    }

}