<?php

namespace App\Http\Controllers;

use App\Models\FollowUp;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

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

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'company_id' => ['required', 'exists:companies,id'],
            'contact_id' => ['nullable', 'exists:contacts,id'],
            'interaction_id' => ['nullable', 'exists:interactions,id'],
            'quotation_id' => ['nullable', 'exists:quotations,id'],
            'due_date' => ['required', 'date'],
            'status' => ['required', 'string'],
            'reason' => ['required', 'string'],
            'notes' => ['nullable', 'string'],
        ]);

        FollowUp::create($data);

        return redirect()
            ->route('follow-ups.index')
            ->with('success', 'Follow-up creado correctamente.');
    }

    public function edit(FollowUp $followUp): View
    {
        $followUp->load(['company', 'contact', 'interaction', 'quotation']);

        return view('follow-ups.edit', compact('followUp'));
    }

    public function update(Request $request, FollowUp $followUp): RedirectResponse
    {
        $data = $request->validate([
            'due_date' => ['required', 'date'],
            'status' => ['required', 'string'],
            'reason' => ['required', 'string'],
            'notes' => ['nullable', 'string'],
        ]);

        $followUp->update($data);

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