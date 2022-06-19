<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Carbon\Traits\Date;
use Livewire\Component;
use App\Models\StudentProfile;

class AdminStudentsList extends Component
{
    public $students;
    public $from;
    public $to;

    public function mount(){
        $this->students = StudentProfile::all();
    }


    public function download(){
        $students = [];
        if ($this->from && $this->to){
            $from = Carbon::parse($this->from);
            $to = Carbon::parse($this->to);

            $users = \App\Models\StudentProfile::whereBetween('created_at', [$from, $to])->get();
            if (count($users) < 1){
               return $this->emit('alert', ['type' => 'success', 'error' => 'No record between that range']);
            }
{}        }else{
            $users = \App\Models\StudentProfile::all();
        }
//        $users = \App\Models\StudentProfile::all();
        foreach ($users as $user){
            $student = [
                'firstname'  => $user->user->first_name,
                'lastname'  => $user->user->last_name,
                'email'     => $user->user->email,
                'phone'     => $user->user->phone,
                'country'   => $user->user->country,
                'Registered'    => $user->created_at
            ];
            array_push($students, $student);
        }

        return $this->downloadRecords($students);
    }
    public function downloadRecords($list = array()){
        $headers = [
            'Cache-Control'       => 'must-revalidate, post-check=0, pre-check=0'
            ,   'Content-type'        => 'text/csv'
            ,   'Content-Disposition' => 'attachment; filename=data.csv'
            ,   'Expires'             => '0'
            ,   'Pragma'              => 'public'
        ];

        # add headers for each column in the CSV download
        array_unshift($list, array_keys($list[0]));

        $callback = function() use ($list)
        {
            $FH = fopen('php://output', 'w');
            foreach ($list as $row) {
                fputcsv($FH, $row);
            }
            fclose($FH);
        };

        $this->emit('alert', ['type' => 'success', 'message' => 'Check your downloads directory for the CSV file']);
        return response()->stream($callback, 200, $headers);
    }

    public function render()
    {
        return view('livewire.admin.components.admin-students-list');
    }
}
