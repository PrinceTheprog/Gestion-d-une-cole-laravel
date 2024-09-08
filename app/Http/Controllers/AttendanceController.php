<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Brian2694\Toastr\Facades\Toastr;

class AttendanceController extends Controller
{
    /** Display all attendances */
    public function attendanceList()
    {
        $attendances = Attendance::with('user')->get();
        return view('attendance.attendanceList', compact('attendances'));
    }

    /** Display add attendance form */
    public function attendanceAdd()
    {
        $users = User::all(); // Assuming you want to list all users to select from
        return view('attendance.attendanceAdd', compact('users'));
    }

    /** Save a new attendance record */
    public function saveRecord(Request $request)
    {
        $request->validate([
            'user_id' => 'required|integer',
            'date'    => 'required|date',
            'status'  => 'required|string',
            'reason'  => 'nullable|string',
        ]);

        DB::beginTransaction();
        try {
            $attendance = new Attendance;
            $attendance->user_id = $request->user_id;
            $attendance->date = $request->date;
            $attendance->status = $request->status;
            $attendance->reason = $request->reason;
            $attendance->save();

            DB::commit();
            Toastr::success('Présence ajoutée avec succès :)', 'Succès');
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollback();
            Toastr::error('Erreur lors de l\'ajout de la présence :)', 'Erreur');
            echo($e);
        }
    }





    public function attendanceEdit($id)
{
    $attendanceEdit = Attendance::find($id);
    $users = User::all(); // Assuming you want to list all users
    return view('attendance.edit-attendance', compact('attendanceEdit', 'users'));
}

public function attendanceUpdate(Request $request)
{
    $request->validate([
        'user_id' => 'required|integer',
        'date'    => 'required|date',
        'status'  => 'required|string',
        'reason'  => 'nullable|string',
    ]);

    DB::beginTransaction();
    try {
        $attendance = Attendance::findOrFail($request->id);
        $attendance->user_id = $request->user_id;
        $attendance->date = $request->date;
        $attendance->status = $request->status;
        $attendance->reason = $request->reason;
        $attendance->save();

        DB::commit();
        Toastr::success('Assiduité mise à jour :)', 'Succès');
        return redirect()->back();
    } catch (\Exception $e) {
        DB::rollback();
        Toastr::error('Erreur lors de la mise à jour de l\'assiduité :)', 'Erreur');
        echo($e);
    }
}

    /** Delete attendance record */
    
    public function attendanceDelete(Request $request)
{
    DB::beginTransaction();  // Start a transaction

    try {
        $attendance = Attendance::findOrFail($request->id);  // Find the course or fail
        $attendance->delete();  // Delete the course

        DB::commit();  // Commit the transaction

        Toastr::success('Assiduité supprimé avec succès :)', 'Succès');
        return redirect()->back();

    } catch (\Exception $e) {
        DB::rollback();  // Rollback the transaction in case of an error

        Toastr::error('Assiduité non supprimé :( Réessayer.', 'Erreur');
        return redirect()->back();
    }
}


    /** View attendance profile */
    public function attendanceProfile($id)
    {
        $attendanceProfile = Attendance::find($id);
        return view('attendance.attendance-profile', compact('attendanceProfile'));
    }
}
