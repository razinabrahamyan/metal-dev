<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Library\Services\Contracts\ProfileContract;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    protected $profileService;

    /**
     * ProfileController constructor.
     * @param ProfileContract $profileContract
     */
    public function __construct(ProfileContract $profileContract)
    {
        $this->profileService = $profileContract;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function dashboard()
    {
        $user = $this->profileService->getDashboard();
        return view('pages.profile.dashboard', $user);//pages.profile.dashboard
    }

    public function leads()
    {
        $leads = $this->profileService->getLeads();
        return view('pages.profile.leads',$leads);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function publicProfile($id)
    {
        return $this->profileService->getPublicProfile($id);
    }

    public function profile()
    {
        $user = $this->profileService->getProfile();
        return view('pages.profile.index', $user);

    }

    public function update(Request $request)
    {
        return response()->json($this->profileService->updateProfile($request));
    }

    public function updatePassword(Request $request)
    {
        return response()->json($this->profileService->updateProfilePassword($request));
    }

    public function integration(){
        return $this->profileService->integrations();
    }

    public function services(){
        return view('pages.profile.services');
    }
}
