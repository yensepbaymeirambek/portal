<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Group;
use App\Models\GroupClients;
use Illuminate\Http\Request;
use function Monolog\toArray;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $groups = Group::query()
            ->where('supervisor_id', auth()->id())
            ->paginate(15);
        return view('group.index', compact('groups'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('group.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->all();
        $validated['supervisor_id'] = auth()->id();
        $group = Group::query()->create($validated);
        return view('group.show', compact('group'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Group $group)
    {
        $clients = $group->load('clients')->clients;
        return view('group.show', compact('group', 'clients'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Group $group)
    {
        $validated = $request->all();
        $validated['supervisor_id'] = auth()->id();
        $group->query()->update($validated);
        return redirect()->route('group.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Group $group)
    {
        if ($group->supervisor_id != auth()->id()) {
            return redirect()->route('group.index');
        }
        $group->delete();

        return redirect()->route('group.index');
    }

    public function showAddClient(Group $group)
    {
        $groupClients = GroupClients::query()->where('group_id', $group->id)->get()->toArray();
        $groupClientsMapped = [];
        foreach ($groupClients as $groupClient) {
            array_push($groupClientsMapped, $groupClient['id']);
        }
        $clients = Client::query()
            ->whereNotIn('id', $groupClientsMapped)
            ->select(['id', 'first_name', 'last_name'])
            ->get();
        return view('group.add-client', compact('group', 'clients'));
    }

    public function addClient(Group $group, Request $request)
    {
        $arr= [];
        foreach ($request->clients_id as $value) {
            GroupClients::query()->updateOrCreate(
                ['group_id' => $group->id, 'client_id' => intval($value)]
            );
        }
        return redirect()->route('group.show', $group);
    }

    public function removeClient(Group $group, Client $client)
    {
        GroupClients::query()->where('group_id', $group->id)->where('client_id', $client->id)->delete();
        return redirect()->route('group.show', $group);
    }
}
