<?php

namespace App\Http\Traits;

use Illuminate\Support\Facades\Storage;

trait UserTrait
{

    function saveImg($request, $user)
    {

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete("users/$user->image");
            $image = $request->file('image');
            $imageName = time() . '_' . $user->name . '.' . $image->getClientOriginalExtension();
            $request->file('image')->storePubliclyAs('users', $imageName, ['disk' => 'public']);
            $user->image = $imageName;
        }
    }
}




