<?php

namespace App\Library\Services;

use App\Classes\Convertors\ConvertFile;
use App\Classes\Convertors\Drivers\InterventionImageDriver;
use App\Classes\Errors\SqlErrors\SqlErrorsMessages;
use App\Classes\Errors\SqlErrors\Types\UserErrorsHandler;
use App\Library\Services\Rules\UserRules;
use App\Models\Integration;
use App\Models\User;
use App\Library\Services\Contracts\ProfileContract;
use App\Models\UserIntegration;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileService implements ProfileContract
{

    /**
     * @return array
     */
    public function getProfile() : array
    {
        $user = User::where('id', auth()->id())
                    ->with(['posts'])
                    ->first();

        return [
            "user" => $user,
        ];
    }

    public function getLeads() : array
    {
        $leads = auth()->user()->leadRequests;

        return ['leads' => $leads];
    }

    public function getDashboard() : array
    {
        $user = User::where('id', auth()->id())->with('posts')->first();
        return ['user' => $user];
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function getPublicProfile($id)
    {
        if (auth()->check() && $id == auth()->id()) {
            return redirect()->route('profile.dashboard');
        }
        return view('profile', ['user' => User::findOrFail($id)]);
    }

    /**
     * @param Request $request
     * @return string[]
     */
    public function updateProfile(Request $request) : array
    {
        $alertMessage = '';
        $invalidRules = [];

        $validator = UserRules::updateUserProfile($request->all());
        if ($validator->fails()) {
            $invalidRules = $validator->getMessageBag()->toArray();
        } else {
            try {
                $user = User::findOrFail(auth()->user()->id);
                if ($request->avatar) {
                    $user->avatar = (new ConvertFile(new InterventionImageDriver()))->setFile($request->avatar)
                                                                                    ->convertFile()
                                                                                    ->storage('user/images/avatar/');
                }
                $user->company_name = $request->companyName;
                $user->full_name = [
                    'first_name' => $request->firstName,
                    'last_name'  => $request->lastName,
                ];
                $user->email = $request->email;
                $user->website = $request->website;
                $user->phone = $request->phone;
                $user->update();
                $alertMessage = 'Успешно обновлено!';
            } catch (Exception $exception) {
                $alertMessage = (new SqlErrorsMessages(new UserErrorsHandler()))->setErrorCode($exception->errorInfo[1])
                                                                                ->getAlertMessage();
            }
        }

        return [
            'alertMessage' => $alertMessage,
            'invalidRules' => $invalidRules,
        ];
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return string[]
     */
    public function updateProfilePassword(Request $request) : array
    {
        $alertMessage = '';
        $invalidRules = [];

        $validator = UserRules::updatePasswordRules($request->all());

        if ($validator->fails()) {
            $invalidRules = $validator->getMessageBag()->toArray();
        } else {
            $user = User::findOrFail(auth()->user()->id);
            $user->password = Hash::make($request->newPassword);
            $user->save();

            $alertMessage = 'Успешно обновлено!';
        }

        return [
            'alertMessage' => $alertMessage,
            'invalidRules' => $invalidRules,
        ];
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function integrations()
    {
        $integrationList = Integration::where('status', 1)->get();

        $userIntegration = UserIntegration::where('user_id', auth()->id())
                                          ->with([
                                              'integrationSettings'
                                          ])
                                          ->get()
                                          ->keyBy('integration_id')
                                          ->map(function ($query) {
                                              $query->setRelation('integrationSettings', $query->integrationSettings->keyBy('integration_id'));
                                              return $query;
                                          });

        return view('pages.profile.integrations')->with([
            "integrationList"  => $integrationList,
            "userIntegrations" => $userIntegration,
        ]);
    }
}
