<?php

namespace App\Http\Traits;

use Illuminate\Support\Facades\Storage;

trait UserTrait
{

    function saveImg($request, $user)
    {

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete("profil/$user->image");
            $image = $request->file('image');
            // $imageName = time() . '_' . $user->name . '.' . $image->getClientOriginalExtension();
            $imageName = time() . '_' . $user->name . '.' . $image->extension();

            // $request->file('image')->storePubliclyAs('users', $imageName, ['disk' => 'public']);
            $image->storeAs('profil', $imageName, ['disk' => 'public']);

            // $user->image = $imageName;
            // $user->image = 'users/'.$imageName;

            $user->image = 'profil/'.$imageName;


        }
    }
}




