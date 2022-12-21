<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Syllabus;
use App\Models\AssignmentPlan;


class AssignmentPlanController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(Syllabus $syllabus)
    {
        return view('assignment-plans.create', [
            'syllabus' => $syllabus
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @param Syllabus $syllabus
     * @return RedirectResponse
     */
    public function store(Request $request, Syllabus $syllabus)
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'objective' => 'string',
            'is_group_assignment' => 'string',
            'assignment_style' => 'string',
            'output_instruction' => 'string',
            'submission_instruction' => 'string',
            'deadline_instruction' => 'string',
        ]);

        $validated['is_group_assignment'] = $request->has('is_group_assignment');

        $syllabus->assignmentPlans()->create($validated);

        return redirect()->route('syllabi.show', $syllabus);
    }

    /**
     * Display the specified resource.
     *
     * @param Syllabus $syllabus
     * @param AssignmentPlan $assignmentPlan
     * @return Application|Factory|View
     */
    public function show(Syllabus $syllabus, AssignmentPlan $assignmentPlan)
    {
        return view('assignment-plans.show', [
            'syllabus' => $syllabus,
            'assignmentPlan' => $assignmentPlan
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Syllabus $syllabus
     * @param AssignmentPlan $assignmentPlan
     * @return Application|Factory|View
     */
    public function edit(Syllabus $syllabus, AssignmentPlan $assignmentPlan)
    {
        return view('assignment-plans.edit', [
            'syllabus' => $syllabus,
            'assignmentPlan' => $assignmentPlan
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Syllabus $syllabus
     * @param AssignmentPlan $assignmentPlan
     * @return RedirectResponse
     */
    public function update(Request $request, Syllabus $syllabus, AssignmentPlan $assignmentPlan)
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'objective' => 'string',
            'is_group_assignment' => 'string',
            'assignment_style' => 'string',
            'output_instruction' => 'string',
            'submission_instruction' => 'string',
            'deadline_instruction' => 'string',
        ]);

        $validated['is_group_assignment'] = $request->has('is_group_assignment');
        $assignmentPlan->update($validated);

        return redirect()->route('syllabi.show', $syllabus);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Syllabus $syllabus
     * @param AssignmentPlan $assignmentPlan
     * @return RedirectResponse
     */
    public function destroy(Syllabus $syllabus, AssignmentPlan $assignmentPlan)
    {
        $assignmentPlan->delete();
        return back();
    }
}
