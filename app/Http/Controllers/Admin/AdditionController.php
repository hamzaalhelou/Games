<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\File;
use Illuminate\Http\Request;

class AdditionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $additions = File::latest('id')->paginate(6);
        return view('admin.addition.index',compact('additions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.addition.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|mimetypes:application/octet-stream',
            'game_rank' => 'required',
            'comments' => 'required'
        ]);

        $addfile = $request->file('file')->getClientOriginalName();
        $request->file('file')->move(public_path('uploads/files'), $addfile);


        File::create([
            'file' => $addfile,
            'comments' => $request->comments,
            'game_rank' => $request->game_rank,
        ]);
        return redirect()
        ->route('admin.additions.index')
        ->with('msg', 'Good job! ')
        ->with('type', 'success')
        ->with('text','Your demo was uploaded successfully and will be reviewed soon.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $addition = File::findOrFail($id);

        return view('admin.addition.edit', compact('addition'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'file' => 'required|mimes:dem',
            'game_rank' => 'required',
            'comments' => 'required'
        ]);

        $addition = File::findOrFail($id);



        $addfile = $addition->file;

        // dd($addfile);


        if($request->hasFile('file')) {

            $addfile =$request->file('file')->getClientOriginalName();
            $request->file('file')->move(public_path('uploads/files'), $addfile);

        }


        $addition->update([
            'file' => $addfile,
            'comments' => $request->comments,
            'game_rank' => $request->game_rank,
        ]);


        return redirect()
        ->route('admin.additions.index')
        ->with('msg', ' updated successfully')
        ->with('type', 'success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        File::destroy($id);

        return redirect()
        ->route('admin.additions.index')
        ->with('msg', 'deleted successfully')
        ->with('type', 'success');
    }
}
