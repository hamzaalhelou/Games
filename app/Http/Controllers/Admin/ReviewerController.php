<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\File;
use App\Models\Reviewer;
use Illuminate\Http\Request;

class ReviewerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $additions = File::latest('id')->paginate(6);
        $reviewers = Reviewer::latest('id')->paginate(6);
        return view('admin.reviewer.index',compact('reviewers','additions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $additions = File::latest('id')->get();
        return view('admin.reviewer.create',compact('additions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'reviewed_by' => 'required',
            'your_review' => 'required',

        ]);


        Reviewer::create([
            'reviewed_by' => $request->reviewed_by,
            'your_review' => $request->your_review,
            'type' => $request->input('type'),
        ]);
        return redirect()
        ->route('admin.reviewers.index')
        ->with('msg', 'Good job! ')
        ->with('type', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $addition = File::findOrFail($id);
        return view('admin.reviewer.create',compact('addition'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

}
