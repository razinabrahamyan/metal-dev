<?php

namespace App\Library\Services\Contracts;

use Illuminate\Http\Request;

interface ProfileContract
{
    public function getProfile();
    public function getLeads();
    public function getPublicProfile($id);
    public function getDashboard();
    public function updateProfile(Request $request);
    public function updateProfilePassword(Request $request);

}
