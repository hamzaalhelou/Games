<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\File;
use App\Models\Reviewer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ReviewerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $additions = File::with('reviewer')->latest('id')->paginate(6);
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
        $validator = Validator::make($request->all(), [
            'reviewed_by' => 'required',
            'your_review' => 'required',
            'type' => 'required|in:Invalid demo,Yes,No',
        ]);


        if ($validator->fails()) {
            return response()->json([
                        'error' => $validator->errors()->all()
                    ]);
        }

        Reviewer::create([
            'reviewed_by' => $request->reviewed_by,
            'your_review' => $request->your_review,
            'type' => $request->input('type'),
            'file_id' =>1,
        ]);

                return response()->json(['success' => 'Post created successfully.']);

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
