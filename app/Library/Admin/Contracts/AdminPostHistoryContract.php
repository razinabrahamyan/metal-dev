<?php

namespace App\Library\Admin\Contracts;

interface AdminPostHistoryContract
{
    public function index();
    public function updated($post, $action);
}
