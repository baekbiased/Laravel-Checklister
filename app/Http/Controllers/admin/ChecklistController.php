<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreChecklistRequest;
use App\Models\Checklist;
use App\Models\ChecklistGroup;
use Illuminate\Http\Request;

class ChecklistController extends Controller
{



    public function create(ChecklistGroup $checklistGroup)
    {
        return view('admin.checklists.create', compact('checklistGroup'));
    }


    public function store(StoreChecklistRequest $request, ChecklistGroup $checklistGroup)
    {
//        dd($request->name);
        $checklistGroup->checklists()->create($request->validated());
        return redirect()->route('welcome');
    }




    public function edit(ChecklistGroup $checklistGroup, Checklist $checklist)
    {
        return view('admin.checklists.edit', compact('checklistGroup', 'checklist'));
    }


    public function update(StoreChecklistRequest $request, ChecklistGroup $checklistGroup, Checklist $checklist)
    {
//        dd($request->toArray());
        $checklist->update($request->validated());
        return redirect()->route('welcome');
    }


    public function destroy(ChecklistGroup $checklistGroup, Checklist $checklist)
    {
        $checklist->delete();
        return redirect()->route('welcome');
    }
}
