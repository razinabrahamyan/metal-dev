<?php

namespace App\Library\Admin\Contracts;

interface AdminPostContract
{

    public function index($filter);
    public function getCategoryPost($status);
    public function create();
    public function store();
    public function show($id);
    public function edit($id);
    public function update($request, $id);
    public function deny($request, $id);
    public function destroy($id);

}
