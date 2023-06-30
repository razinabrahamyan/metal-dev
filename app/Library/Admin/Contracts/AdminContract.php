<?php

namespace App\Library\Admin\Contracts;

use Illuminate\Http\Request;

interface AdminContract
{

    public function index($id);
    public function create();
    public function store(Request $request);
    public function show($id);
    public function edit($id);
    public function update(Request $request, $id);
    public function destroy($id);

}
