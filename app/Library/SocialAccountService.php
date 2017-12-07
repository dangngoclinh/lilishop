<?php

namespace App\Library;

/**
 * Class SocialAccountService
 */
use App\Model\SocialAccount;
use App\Model\Users;
use Laravel\Socialite\Contracts\User as ProviderUser;

class SocialAccountService
{
    public function createOrGetUser(ProviderUser $providerUser)
    {
        $user = null;
        $account = SocialAccount::where([
                                            'provider' => 'facebook',
                                            'provider_user_id' => $providerUser->getId()
                                        ])->first();

        if ($account) {
            $user = $account->user;
            if(!$user->avatar) {
                $user->avatar = $providerUser->getAvatar();
                $user->update();
            }
            return $user;
        } else {

            $account = new SocialAccount([
                                             'provider_user_id' => $providerUser->getId(),
                                             'provider' => 'facebook'
                                         ]);
            $user = Users::where('email', $providerUser->getEmail())->first();

            if (!$user) {

                $user = new Users();
                $user->fill([
                                'email' => $providerUser->getEmail(),
                                'name' => $providerUser->getName(),
                                'avatar' => $providerUser->getAvatar()
                            ]);
                $user->password = bcrypt(rand());
                $user->save();
            }

            $account->user()->associate($user);
            $account->save();
            return $user;
        }
    }
}