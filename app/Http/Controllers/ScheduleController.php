<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index()
    {
        $schedules = Schedule::all();

        return view('schedules.index', compact('schedules'));
    }

    public function create()
    {
        $groups = Group::all();

        return view('schedules.create', compact('groups'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'group_id' => 'required',
            'day' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
        ]);

        Schedule::create($validatedData);

        return redirect()->route('schedules.index')->with('success', 'Schedule created successfully.');
    }

    public function edit($id)
    {
        $schedule = Schedule::find($id);
        $groups = Group::all();

        return view('schedules.edit', compact('schedule', 'groups'));
    }

    public function update(Request $request, Schedule $schedule)
    {
        $validatedData = $request->validate([
            'group_id' => 'required',
            'day' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
        ]);

        $schedule->update($validatedData);

        return redirect()->route('schedules.index')->with('success', 'Schedule updated successfully.');
    }

    public function destroy($id)
    {
        $schedule = Schedule::find($id);
        $schedule->delete();

        return redirect()->route('schedules.index')->with('success', 'Schedule deleted successfully.');
    }

    public function getSchedule()
    {
        $mondayDate = Schedule::query()
            ->where('day', Schedule::MONDAY)
            ->get();

        $tuesdayDate = Schedule::query()
            ->where('day', Schedule::TUESDAY)
            ->get();

        $wednesdayDate = Schedule::query()
            ->where('day', Schedule::WEDNESDAY)
            ->get();

        $thursdayDate = Schedule::query()
            ->where('day', Schedule::THURSDAY)
            ->get();

        $fridayDate = Schedule::query()
            ->where('day', Schedule::FRIDAY)
            ->get();

        $saturdayDate = Schedule::query()
            ->where('day', Schedule::SATURDAY)
            ->get();

        $sundayDate = Schedule::query()
            ->where('day', Schedule::SUNDAY)
            ->get();
        return view('schedules.schedule', compact('mondayDate', 'tuesdayDate', 'wednesdayDate', 'thursdayDate', 'fridayDate', 'saturdayDate', 'sundayDate'));
    }
}
