<?php

namespace App\Library\Services;

use App\Classes\Integrations\EmailIntegration;
use App\Library\Services\Classes\Constants\LeadTypesConstants;
use App\Library\Services\Rules\LeadRules;
use App\Models\Lead;
use App\Library\Services\Contracts\LeadContract;
use App\Models\LeadType;
use App\Models\Post;
use App\Traits\NotificationTrait;
use Illuminate\Http\Request;

class LeadService implements LeadContract
{
    use NotificationTrait;

    /**
     * @var string
     */
    protected $lead_text = 'static_texts/lead';

    /**
     * LeadService constructor.
     */
    public function __construct()
    {
        //
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return string[]
     */
    public function createCallbackLead(Request $request) : array
    {
        $success = "error";
        $validator = LeadRules::postCallbackOrderRules($request->all());

        if ($validator->fails()) {
            $successMessage = "Введены некорректные данные";
        } else {
            $post = Post::with([
                'creator' => function ($query) {
                    $query->with('integrations');
                }
            ])->find($request->post_id);

            $lead = Lead::create([
                "post_id"   => $request->post_id,
                "full_name" => $request->full_name,
                "phone"     => $request->callback_phone,
                "email"     => $request->callback_email ?? "",
                "comment"   => $request->callback_textarea ?? "",
                "type_id"   => LeadTypesConstants::CALLBACK_LEAD,
                "user_id"   => $post->user_id
            ]);

            if ($lead) {
                (new EmailIntegration())->setUser($post->creator)
                                        ->setLead($lead)
                                        ->sendCallbackOrder();

                $this->storeNotification([
                    'type' => 'phone_lead',
                    'data' => [
                        'phone'     => $request->callback_phone,
                        'client_id' => $post->creator->id,
                        'post_id'   => $request->post_id,
                        'title'     => $post->title,
                        'avatar'    => $post->images->first() ? $post->images->first()->name : asset('storage/user/images/post/no_photo.png'),
                    ]
                ], $post->creator->id);

                $success = "success";
                $successMessage = "Спасибо за заявку. Скоро с вами свяжутся.";
            } else {
                $successMessage = "Что-то пошло не так!";
            }
        }

        return [
            "success"      => $success,
            "alertMessage" => $successMessage,
        ];
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function list(Request $request) : array
    {
        $leads = Lead::query()
                     ->with('post', function ($post) {
                         $post->with('images');
                     })
                     ->where('user_id', $request->user_id)
                     ->paginate(10);
        return [
            "leadTypes" => LeadType::all(),
            "leads"     => $leads,
        ];
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return string[]
     */
    public function delete(Request $request) : array
    {
        Lead::find($request->leadId)
            ->delete();
        return [
            "alertMessage" => "Заявка удалена",
        ];
    }
//    /**
//     * @param Request $request
//     * @return array
//     */
//    public function createPhoneLead(Request $request)
//    {
//
//        if ($request->phone) {
//            $post = Post::find($request->post_id);
//            if ($post) {
//                $lead = new Lead();
//                $lead->phone = $request->phone;
//                $lead->post_id = $request->post_id;
//                $lead->user_id = auth()->id();
//                $lead->save();
//                $data = [
//                    'type' => 'phone_lead',
//                    'data' => [
//                        'phone'     => $request->phone,
//                        'client_id' => auth()->id(),
//                        'post_id'   => $request->post_id,
//                        'title'     => $post->title,
//                        'avatar'    => $post->images->first() ? asset('storage/user/images/post/'.$post->images->first()->name) : asset('storage/user/images/post/no_photo.png')
//                    ]
//                ];
//                $this->storeNotification($data, $post->creator->id);
//
//                return ['success' => __("$this->lead_text.success_order")];
//            }
//
//            return ['error' => __("$this->lead_text.error")];
//        }
//        return ['error' => __("$this->lead_text.error")];
//    }
//
//    /**
//     * @param Request $request
//     * @return array
//     */
//    public function createFullLead(Request $request)
//    {
//        $post = Post::find($request->post_id);
//        if ($post) {
//            $lead = new Lead();
//            $lead->phone = $request->phone;
//            $lead->user_id = auth()->id();
//            $lead->email = $request->email;
//            $lead->full_name = $request->name;
//            $lead->post_id = $request->post_id;
//            $lead->comment = $request->comment;
//            $lead->save();
//            $data = [
//                'type' => 'full_lead',
//                'data' => [
//                    'phone'     => $request->phone,
//                    'client_id' => auth()->id(),
//                    'post_id'   => $request->post_id,
//                    'title'     => $post->title,
//                    'avatar'    => $post->images->first() ? asset('storage/user/images/post/'.$post->images->first()->name) : asset('storage/user/images/post/no_photo.png')
//                ]
//            ];
//            $this->storeNotification($data, $post->creator->id);
//
//            return ['success' => __("$this->lead_text.request")];
//        }
//        return ['error' => __("$this->lead_text.error")];
//    }
}
