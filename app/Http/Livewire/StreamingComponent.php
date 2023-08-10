<?php

namespace App\Http\Livewire;

use App\Models\Chapter;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class StreamingComponent extends Component
{
    public $chapter_id, $user_id, $content ;


    public function mount($chapter_id)
    {
        $this->chapter_id = $chapter_id;
    }
    public function update($fields)
    {
        $this->validateOnly($fields, [
            'content' => 'required|min:1'
        ]);
    }

    public function AddComment()
    {
        $this->validate([
            'content' => 'required|min:2'
        ]);


        $comment = new Comment();
        $comment->user_id = Auth::id();
        $comment->chapter_id = $this->chapter_id;
        $comment->content = $this->content;
        $comment ->save();

        return redirect()->route('chapter.comment', ['chapter_id' => $this->chapter_id]);

        dd($comment);
    }

    public function render()
    {
        $chapter = Chapter::with('manga')->where('id', $this->chapter_id)->firstOrFail();

        
        return view('livewire.streaming-component',[
            'chapter' => $chapter,
        ]);
    }
}
