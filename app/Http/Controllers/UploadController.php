<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;


use Illuminate\Http\Request;
use App\Models\UploadedFile;

class UploadController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        // Validate the incoming file. Refuses anything bigger than 2048 kilobyes (=2MB)
        $request->validate([
            'profile_avatar' => 'required|mimes:pdf,jpg,png|max:2048',
        ]);

        // Store the file in storage\app\public folder
        $file = $request->file('profile_avatar');
        $fileName = $file->getClientOriginalName();
        $filePath = $file->store('uploads', 'public');

        // Store file information in the database
        $uploadedFile = new UploadedFile();
        $uploadedFile->filename = $fileName;
        $uploadedFile->original_name = $file->getClientOriginalName();
        $uploadedFile->file_path = $filePath;
        $uploadedFile->save();

        // Redirect back to the index page with a success message
        // return redirect()->route('uploads.index')
        //     ->with('success', "File `{$uploadedFile->original_name}` uploaded successfully.");
    }

    // shows the create form
    public function create()
    {
        return view('uploads.create');
    }

    // shows the uploads index
    public function index()
    {
        $uploadedFiles = UploadedFile::all();
        return view('uploads.index', compact('uploadedFiles'));
    }
}

