<?php

namespace App\Http\Controllers;

use App\Models\Link;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LinkController extends Controller
{
    public function index()
    {
        /** @var User $user */
        $user = Auth::user();
        $links = $user->links()->get();
        return view('links.index', compact('links'));
    }

    public function create()
    {
        return view('links.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'url' => 'required|url',
            'platform' => 'nullable|string|max:100',
            'description' => 'nullable|string|max:500',
        ]);

        /** @var User $user */
        $user = Auth::user();
        $user->links()->create($validated);

        return redirect()->route('links.index')->with('success', 'Link criado com sucesso!');
    }

    public function edit(Link $link)
    {
        $this->authorize('update', $link);
        return view('links.edit', compact('link'));
    }

    public function update(Request $request, Link $link)
    {
        $this->authorize('update', $link);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'url' => 'required|url',
            'platform' => 'nullable|string|max:100',
            'description' => 'nullable|string|max:500',
        ]);

        $link->update($validated);

        return redirect()->route('links.index')->with('success', 'Link atualizado com sucesso!');
    }

    public function destroy(Link $link)
    {
        $this->authorize('delete', $link);
        $link->delete();

        return redirect()->route('links.index')->with('success', 'Link deletado com sucesso!');
    }

    public function share(User $user)
    {
        $links = $user->links()->get();
        return view('links.share', compact('user', 'links'));
    }
}
