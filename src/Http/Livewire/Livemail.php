<?php

namespace Linksderisar\Livemail\Http\Livewire;

use Linksderisar\Livemail\Models\Livemail as LivemailModel;
use Livewire\Component;
use Livewire\WithPagination;

class Livemail extends Component
{
    use WithPagination;

    public $mailId;

    public $mailModel;

    public function mount()
    {
        try {
            $this->mailId = LivemailModel::orderBy('id', 'desc')->take(1)->pluck('id')->first();

            $this->mailModel = LivemailModel::findOrFail($this->mailId);
        } catch (\Exception $exception) {
        }
    }

    public function render()
    {
        return view('livemail::livewire.livemail', [
            'mails' => LivemailModel::orderBy('id', 'desc')
                ->select(['id', 'to', 'cc', 'bcc', 'subject', 'read', 'created_at'])
                ->paginate(30),
        ]);
    }

    public function selectMail(int $id)
    {
        $this->mailId = $id;
        $this->mailModel = LivemailModel::find($id);
        LivemailModel::where('id', $id)->update([
            'read' => true,
        ]);
    }
}
