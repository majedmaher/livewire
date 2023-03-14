<?php

namespace App\Http\Livewire;

use App\Models\Profile;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use Livewire\Component;
use Livewire\WithFileUploads;

class Home extends Component
{

    use WithFileUploads;

    public $user;
    public $email;
    public $name;
    public $first_name;
    public $last_name;
    public $contact_number;
    public $picture;
    public $bio;
    public $website;
    public $day;
    public $month;
    public $year;
    public $path;

    public $current_password;
    public $new_password;
    public $confirm_password;

    public function mount()
    {
        $this->user = auth()->user();
        $this->name = $this->user->name;
        $this->email = $this->user->email;
        if ($this->user->profile) {
            $this->first_name = $this->user->profile->first_name;
            $this->last_name = $this->user->profile->last_name;
            $this->contact_number = $this->user->profile->contact_number;
            $this->path = $this->user->profile->picture;
            $this->bio = $this->user->profile->bio;
            $this->website = $this->user->profile->website;
            // Carbon::createFromFormat('Y-m-d', $this->user->profile->date_of_birth)->format('d');
            $this->day = $this->user->profile->date_of_birth->format('d');
            $this->month = $this->user->profile->date_of_birth->format('m');
            $this->year = $this->user->profile->date_of_birth->format('Y');
        }
    }

    public function updatePassword()
    {
        $this->validate([
            'current_password' => 'required',
            'new_password' => 'required|same:confirm_password',
        ]);

        #Match The Old Password
        if (!Hash::check($this->current_password, auth()->user()->password)) {
            session()->flash('error', "Current Password Doesn't match! 😁");
        } else {
            #Update the new Password
            User::whereId(auth()->user()->id)->update([
                'password' => Hash::make($this->new_password)
            ]);
            $this->current_password = '';
            $this->new_password = '';
            $this->confirm_password = '';
        }
    }

    public function cancelPassword()
    {
        $this->current_password = '';
        $this->new_password = '';
        $this->confirm_password = '';
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
        $profile->first_name = $this->first_name;
        $profile->last_name = $this->last_name;
        $profile->contact_number = $this->contact_number;
        $profile->picture = $this->path;
        $profile->bio = $this->bio;
        $profile->website = $this->website;
        $profile->day = $this->day . '-' . $this->month . '-' . $this->year;
        $profile->save();
    }

    public function render()
    {
        // return dd($this->day);
        return view('livewire.home')->with('user', $this->user)->layout('layouts.dashboard');
    }
}
