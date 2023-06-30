<?php

namespace App\Library\Services\Contracts;

use Illuminate\Http\Request;

interface IntegrationContract
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return mixed
     */
    public function changeStatus(Request $request);

    /**
     * @param \Illuminate\Http\Request $request
     * @return mixed
     */
    public function changeSettings(Request $request);
}
