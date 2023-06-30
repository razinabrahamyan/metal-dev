<?php

namespace App\Library\Admin\Contracts;

interface AdminUserContract
{
    public function index();
    public function create();
    public function show($id);
    public function delete();
}
