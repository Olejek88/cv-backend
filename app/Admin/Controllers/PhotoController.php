<?php

namespace App\Admin\Controllers;

use App\Photo;
use Encore\Admin\Controllers\AdminController;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PhotoController extends AdminController
{
    /**
     * Show the application dashboard.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'filenames' => 'required',
            'filename.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        if ($request->hasfile('filenames')) {
            foreach ($request->file('filenames') as $file) {
                $name = time() . '.' . $file->extension();
                $file->move(public_path() . '/files/', $name);
                $data[] = $name;
            }
        }

        $file = new Photo();
        $file->path = json_encode($data);
        $file->save();

        return back()->with('success', 'Data Your files has been successfully added');
    }

}