<?php

namespace App\Http\Controllers;

use App\Models\Biens;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use MailchimpMarketing\ApiClient;

class SubscriptionController extends Controller
{
    public function subscribe(Request $request)
    {
        $mailchimp = new ApiClient();
        $mailchimp->setConfig([
                                  'apiKey' => config('mail.subscription.mailchimp.apiKey'),
                                  'server' => config('mail.subscription.mailchimp.serverPrefix')
                              ]);

        try {
            $subscribe = $mailchimp->lists->addListMember(
                config('mail.subscription.mailchimp.listId'),
                ['email_address' => $request->input('emailAddress'), 'status' => 'subscribed']
            );
            $request->session()->flash('flash.banner', 'You have been added with success!');
            $request->session()->flash('flash.bannerStyle', 'success');
        } catch(\Exception $e){
            $request->session()->flash('flash.banner', 'We got an error while added you in our newsletter!');
            $request->session()->flash('flash.bannerStyle', 'danger');
        }


        return response()->redirectToRoute('home');
    }
}
