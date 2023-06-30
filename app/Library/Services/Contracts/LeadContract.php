<?php

namespace App\Library\Services\Contracts;

use Illuminate\Http\Request;

interface LeadContract
{
    public function createCallbackLead(Request $request);

    public function list(Request $request);

    public function delete(Request $request);
}
