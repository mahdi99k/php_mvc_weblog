<?php

class PostController extends Controller
{

    private $postModel;

    public function __construct()
    {
        $this->postModel = $this->model('Post');
    }

    public function index()
    {
        $posts = $this->postModel->fetchAllPosts();
        return $this->view('posts.index', ["posts" => $posts]);
    }

}