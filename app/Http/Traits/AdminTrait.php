<?php

namespace App\Http\Traits;

use Illuminate\Support\Facades\Storage;

trait AdminTrait

{

    function adminImg($request, $admin)
    {
        if ($request->hasFile('image')) {
            Storage::disk('public')->delete("profil/$admin->image");
            $image = $request->file('image');
            $imageName = time() . '_' . $admin->name . '.' . $image->getClientOriginalExtension();
            $request->file('image')->storePubliclyAs('profil', $imageName, ['disk' => 'public']);
            // $admin->image = $imageName;
            $admin->image = 'profil/'.$imageName;
        }
    }
}
