<?php

namespace App\Library\Admin\Contracts;

interface PermissionContract
{
    public function index();
    public function create();
    public function update();
    public function delete();
    public function setPermissionToRole($request);
}
