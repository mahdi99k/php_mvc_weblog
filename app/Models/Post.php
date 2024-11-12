<?php

class Post
{
    private Database $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function fetchAllPosts()
    {
        $this->db->prepare("SELECT * FROM `posts`");
        return $this->db->fetchAll();
    }
}