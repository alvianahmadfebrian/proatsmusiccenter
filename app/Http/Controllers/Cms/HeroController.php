<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Hero;

class HeroController extends Controller
{
    public function edit()
    {
        $hero = Hero::first();

        return view('cms.hero.edit',compact('hero'));
    }

    public function update(Request $request)
    {
        $hero = Hero::first();

        $data = $request->except('_token');

        if($request->hasFile('image')){

            $file = $request->file('image');

            $name = time().'.'.$file->extension();

            $file->move(public_path('uploads'),$name);

            $data['image']='uploads/'.$name;

        }

        $hero->update($data);

        return back()->with('success','Hero berhasil diupdate');
    }
}
