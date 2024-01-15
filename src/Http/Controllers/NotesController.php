<?php

namespace Jazzlevit\Notes\Http\Controllers;

use Jazzlevit\Notes\Services\NoteService;
use Jazzlevit\Orchestrator\Services\OrchestratorService;
use App\Http\Controllers\Controller;

class NotesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(NoteService $noteService, OrchestratorService $orchestratorService)
    {
        $therapist = auth('therapist')->user();

        // get list of notes
        $response = $noteService->getNotes(
//            targetId: 23,
            targetType: 'testing',
        );

        if (!$response->ok()) {
            throw new \Exception(__('Could not get notes'));
        }

        return view('notes::notes/index', ['notes' => $response->json()]);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id, NoteService $noteService)
    {
        $response = $noteService->getNote(
            $id,
        );

        if (!$response->ok()) {
            throw new \Exception(__('Could not get notes'));
        }

        return view('notes::notes/show', [
            'note' => $response->json()
        ]);
    }

    /**
     * Create
     */
    public function create(NoteService $noteService)
    {
        $generatedText = (new \Faker\Provider\en_US\Text(new \Faker\Generator()))->realText();
        $response = $noteService->createNote([
            'body' => $generatedText,
            'target_id' => 23,
            'target_type' => 'testing',
        ]);

        if (!$response->ok()) {
            return redirect()
                ->route('notes.index')
                ->with('error', 'Could not create the note');
        }

        return redirect()
            ->route('notes.index')
            ->with('success', 'Note created successfully.');
    }

    /**
     * Create
     */
    public function destroy($id, NoteService $noteService)
    {
        $response = $noteService->deleteNote($id);

        if (!$response->noContent()) {
            return redirect()
                ->route('notes.index')
                ->with('error', 'Could not delete the note');
        }

        return redirect()
            ->route('notes.index')
            ->with('success', 'Note deleted successfully.');
    }
}
