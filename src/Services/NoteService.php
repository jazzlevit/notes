<?php

namespace Jazzlevit\Notes\Services;

use Jazzlevit\Orchestrator\Services\NetwerkAppService;

class NoteService extends NetwerkAppService
{
    public function getNotes($targetId = null, $targetType = null)
    {
        $response = $this->get(static::PRIVATE_API_PREFIX . '/notes', [
            'target_id' => $targetId,
            'target_type' => $targetType,
        ]);

        return $response;
    }
    public function getNote($noteId)
    {
        $response = $this->get(static::PRIVATE_API_PREFIX . '/notes/' . $noteId);

        return $response;
    }

    public function createNote(array $data)
    {
        $response = $this->post(static::PRIVATE_API_PREFIX . '/notes', $data);

        return $response;
    }

    public function deleteNote($id)
    {
        $response = $this->delete(static::PRIVATE_API_PREFIX . '/notes/' . $id);

        return $response;
    }
}
