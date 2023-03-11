<?php

namespace App\Http\Livewire;

use App\Models\Profile;
use App\Models\User;
use Intervention\Image\Facades\Image;
use Livewire\Component;
use Livewire\WithFileUploads;

class Home extends Component
{

    use WithFileUploads;

    public $user;
    public $full_name;
    public $picture;
    public $bio;
    public $date_of_birth;
    public $path;

    public function mount()
    {
        $this->user = auth()->user();
        if ($this->user->profile) {
            $this->full_name = $this->user->profile->full_name;
            $this->path = $this->user->profile->picture;
            $this->bio = $this->user->profile->bio;
            $this->date_of_birth = $this->user->profile->date_of_birth;
        }
    }

    public function submit()
    {
        if ($picture = $this->picture) {
            if ($this->path) {
                unlink(public_path($this->path));
            }
            $filename = hexdec(uniqid()) . '.' . $picture->getClientOriginalExtension();
            $this->path = '/uploads/users/picture/' . $filename;
            Image::make($picture->getRealPath())->save(public_path($this->path), 100);
        }

        $profile = Profile::firstOrNew(array('user_id' => auth()->id()));
        $profile->full_name = $this->full_name;
        $profile->picture = $this->path;
        $profile->bio = $this->bio;
        $profile->date_of_birth = $this->date_of_birth;
        $profile->save();


        // Profile::updateOrCreate([
        //     'user_id' => auth()->id(),
        //     'full_name' => $this->full_name,
        //     'picture' => $this->path,
        //     'bio' => $this->bio,
        //     'date_of_birth' => $this->date_of_birth,
        // ]);
    }

    public function render()
    {
        // return dd($this->user);
        return view('livewire.home')->with('user', $this->user)->layout('layout');
    }
}
