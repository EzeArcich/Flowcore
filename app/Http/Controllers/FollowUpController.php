<?php

namespace App\Http\Controllers;

use App\Http\Requests\FollowUp\StoreFollowUpRequest;
use App\Http\Requests\FollowUp\UpdateFollowUpRequest;
use App\Models\FollowUp;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FollowUpController extends Controller
{
    public function index(Request $request): View
    {
        $query = FollowUp::with(['company', 'contact'])->latest('due_date');

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('due')) {
            if ($request->due === 'today') {
                $query->whereDate('due_date', now()->toDateString());
            } elseif ($request->due === 'overdue') {
                $query->whereDate('due_date', '<', now()->toDateString())
                    ->where('status', 'pending');
            }
        }

        $followUps = $query->paginate(20)->withQueryString();

        return view('follow-ups.index', compact('followUps'));
    }

    public function create(): View
    {
        return view('follow-ups.create');
    }

    public function store(StoreFollowUpRequest $request): RedirectResponse
    {
        FollowUp::create($request->validated());

        return redirect()
            ->route('follow-ups.index')
            ->with('success', 'Follow-up creado correctamente.');
    }

    public function edit(FollowUp $followUp): View
    {
        $followUp->load(['company', 'contact', 'interaction', 'quotation']);

        return view('follow-ups.edit', compact('followUp'));
    }

    public function update(UpdateFollowUpRequest $request, FollowUp $followUp): RedirectResponse
    {
        $followUp->update($request->validated());

        return redirect()
            ->route('follow-ups.index')
            ->with('success', 'Follow-up actualizado correctamente.');
    }

    public function complete(FollowUp $followUp): RedirectResponse
    {
        $followUp->update([
            'status' => 'done',
            'completed_at' => now(),
        ]);

        return back()->with('success', 'Follow-up marcado como completado.');
    }

    public function skip(FollowUp $followUp): RedirectResponse
    {
        $followUp->update([
            'status' => 'skipped',
        ]);

        return back()->with('success', 'Follow-up omitido.');
    }

    public function destroy(FollowUp $followUp): RedirectResponse
    {
        $followUp->delete();

        return redirect()
            ->route('follow-ups.index')
            ->with('success', 'Follow-up eliminado correctamente.');
    }
}
