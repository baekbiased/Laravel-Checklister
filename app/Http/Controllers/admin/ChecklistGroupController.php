<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreChecklistGroupRequest;
use App\Models\ChecklistGroup;
use Illuminate\Http\Request;

class ChecklistGroupController extends Controller
{

    public function index()
    {
        //
    }


    public function create()
    {
        return view('admin.checklist_groups.create');
    }


    public function store(StoreChecklistGroupRequest $request)
    {
        ChecklistGroup::create($request->validated());
        return redirect()->route('home');
    }


    public function show($id)
    {
        //
    }


    public function edit(ChecklistGroup $checklistGroup)
    {
        return view('admin.checklist_groups.edit', compact('checklistGroup'));
    }


    public function update(StoreChecklistGroupRequest $request, ChecklistGroup $checklistGroup)
    {
        $checklistGroup->update($request->validated());
        return redirect()->route('home');
    }


    public function destroy(ChecklistGroup $checklistGroup)
    {
        $checklistGroup->delete();
        return redirect()->route('home');
    }
}
