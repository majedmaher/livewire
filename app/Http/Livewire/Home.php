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
    public $profile;
    public $email;
    public $name;
    public $status;
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

    public $password;



    public function activateAccount()
    {
        $user = User::where('id', auth()->id())->first();
        $user->status = 1;
        $user->update();
        return redirect()->route('home');
    }

    public function deactivateAccount()
    {
        $user = User::where('id', auth()->id())->first();
        $user->status = 2;
        $user->update();
        return redirect()->route('home');
    }

    public function updatePassword()
    {
        if (isset($this->password['current']) && isset($this->password['new']) && $this->password['new'] === $this->password['confirm']) {
            #Match The Old Password
            if (Hash::check($this->password['current'], auth()->user()->password)) {
                #Update the new Password
                User::whereId(auth()->user()->id)->update([
                    'password' => bcrypt($this->password['new'])
                ]);
                $this->password = [];
                $this->emit('alertSuccess', __("Password changed Successfully"));
            } else {
                $this->emit('alertError', __("Current Password Doesn't match! 😁"));
            }
        } else {
            $this->emit('alertFail', __("Please enter valid values"));
        }
    }

    public function cancelPassword()
    {
        $this->password = [];
    }

    public function submit()
    {
        if (isset($this->first_name) && isset($this->first_name) && isset($this->contact_number)) {

            if ($picture = $this->picture) {
                if (isset($this->path) && $this->path !== null) {
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
            $myDate = $this->year . '/' . $this->month . '/' . $this->day;
            $profile->date_of_birth = Carbon::createFromFormat('Y/m/d', $myDate)->format('Y-m-d');
            $profile->save();
            $this->profile = $profile;
            $this->emit('alertSuccess', __("Mission accomplished"));
        } else {
            $this->emit('alertFail', __("Please enter valid values"));
        }
    }

    public function deleteAccount()
    {
        User::where('id', auth()->id())->first()->delete();
        auth()->logout();
        return redirect()->route('login');
    }


    public function render()
    {
        $this->user = auth()->user();
        $this->name = $this->user->name;
        $this->status = $this->user->status;
        $this->email = $this->user->email;

        $this->profile = Profile::where('user_id', $this->user->id)->first();

        if ($this->profile) {
            $this->first_name = $this->profile->first_name;
            $this->last_name = $this->profile->last_name;
            $this->contact_number = $this->profile->contact_number;
            $this->path = $this->profile->picture;
            $this->bio = $this->profile->bio;
            $this->website = $this->profile->website;
            // Carbon::createFromFormat('Y-m-d', $this->profile->date_of_birth)->format('d');
            $this->day =  (int) date('d', strtotime($this->profile->date_of_birth));
            $this->month =  (int) date('m', strtotime($this->profile->date_of_birth));
            $this->year =  (int) date('Y', strtotime($this->profile->date_of_birth));
        } else {
            $this->day =  (int) date('d');
            $this->month =  (int) date('m');
            $this->year =  (int) date('Y');
        }
        return view('livewire.home')->with(['user' => $this->user, 'path' => $this->path])->layout('layouts.dashboard');
    }
}
