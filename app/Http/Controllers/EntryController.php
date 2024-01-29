<?php

namespace App\Http\Controllers;

use App\Http\Requests\EntryPostRequest;
use App\Models\Entry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EntryContoller extends Controller
{
    public function addEntry(EntryPostRequest $request)
    {
        $requestFields = $request->only('user_id','category_id','value');
        $entry = Entry::create($requestFields);
        $entry ->save();
        return $entry;
    }

    public function getEntries()
    {
        return Entry::all()->where('user_id', Auth::id());
    }

    public function __invoke(EntryContoller $request, Entry $entry)
    {
        $data = $request->validate();
        $entry->update($data);
        return $entry;
    }

    
}
