<?php

class NotFoundController extends Controller
{
    public function index()
    {
        return $this->view('errors.404');
    }
}