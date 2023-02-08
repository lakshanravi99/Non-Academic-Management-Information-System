<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Alluser;
use App\Models\Attendence;
use App\Models\employee;
use Illuminate\Support\Facades\DB;
use App\Imports\AttendanceImport;
use Illuminate\Support\Facades\Redirect;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\AttendanceExcelExport;
use Barryvdh\DomPDF\Facade\Pdf;
use Session;
use Illuminate\Support\Facades\Validator;



class AttendanceController extends Controller
{

    public function eployeeeditattendence($id){
        $id = $id;
        return view('backend.user.employee.attendance.attendance_edit');
    }
    public function AttendanceView(){

       // $attendance = Attendence::with('employees')->get();

       // dd($attendance);


           $data['allData'] = DB::table('attendences')
               ->select(array('date',
                   DB::raw('COUNT(CASE status WHEN "present" THEN 1 ELSE NULL END) as present'),
                   DB::raw('COUNT(CASE status WHEN "absent" THEN 1 ELSE NULL END) as absent'),
                       DB::raw('COUNT(CASE status WHEN "leave" THEN 1 ELSE NULL END) as leaves'),

                   )

               )
               ->groupBy('date')
               ->orderBy('id','desc')
               ->get();


        $department = DB::table('departments')
            ->get();

                return view('backend.user.employee.attendance.attendance_view', $data);
           //$data1 = Attendence::select('date')->groupBy('date')->orderBy('id','DESC')->get()->count();



    }

    public function search(Request $request){

        $attendance = Attendence::with('employees')->get();
        $output="";
        $query = $request->get('search');

        $employee= Attendence::orderBy('id','DESC')->where('fname', 'Like', '%' .$query. '%')->orWhere('emp_id', 'Like', '%' .$query. '%')->orWhere('status', 'Like', '%' .$query. '%')->orWhere('emp_id', 'Like', '%' .$query. '%')->orWhereDate('date','=', date('Y-m-d'), '%' .$query. '%')->get();

        foreach($employee as $employee) {

            $output.=
            '<tr class="intro-x">

                <td class="w-20">
                                <div class="flex">
                                    <div class="w-10 h-10 image-fit zoom-in">
                                                <img alt="" class="tooltip rounded-full" src="/$employee->emp_pic">
                                    </div>
                                </div>
                            </td>
                <td class="text-center">' .$employee->emp_id. '</td>
                <td class="text-center">' .$employee->fname. '</td>
                <td class="text-center">' .$employee->arrival_time. '</td>
                <td class="text-center">' .$employee->leave_time. '</td>
                <td class="text-center">' .$employee->date. '</td>
                <td class="text-center">' .$employee->employees->place. '</td>
                <td class="text-center">' .$employee->status. '</td>


                <td class="table-report__action w-56">'.'
                <div class="flex justify-center items-center">'.'
                    <a class="flex items-center mr-3" href=""> '.'<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="check-square" data-lucide="check-square" class="lucide lucide-check-square w-4 h-4 mr-1"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"></path></svg> '.' Edit </a>
                    '.'<a class="flex items-center text-danger" href=""> '.'<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="trash-2" data-lucide="trash-2" class="lucide lucide-trash-2 w-4 h-4 mr-1"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 01-2 2H7a2 2 0 01-2-2V6m3 0V4a2 2 0 012-2h4a2 2 0 012 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg> '.'Delete </a>
                    '.' </div>
            '.'</td>

            </tr>';
        }

        return response($output);
    }
    public function AttendanceEdit($id){

        $editData = DB::table('attendences')
            ->where('id', '=',$id )
            ->get();

        return view('backend.user.employee.attendance.attendance_edit', compact('editData'));
    }

    public function csv(Request $request){

        $request->validate([
            'excel_file' =>'required|mimes:xlsx'
        ]);


        $notification = array(
            'message' => 'Attendance Added Successfully',
            'alert-type' => 'success'
        );

        Excel::import(new AttendanceImport, $request->file('excel_file'));
        return redirect()->back()->with($notification);


    }

    public function PdfExport(){
        $users=Attendence::get();
        $pdf = Pdf::loadView('exports.attendancePDF',[
            'users' => $users
        ]);
         return $pdf->download('attendance.pdf');
         //attendancePDF
    }

    public function PdfExport2(){
       // $users=Attendence::get();
        $users['allData'] = DB::table('attendences')->select('*')->groupBy('date')->get();
        $pdf = Pdf::loadView('exports.attendanceByDate',[
            'users' => $users
        ]);
        return $pdf->download('attendanceByDate.pdf');
        //attendancePDF
    }


    public function CsvExport(){
        return Excel::download(new AttendanceExcelExport, 'AttendanceList.xlsx');
    }


    public function AttendanceMonths(){
        Session::put('index', '');
        Session::put('manage', '');
        Session::put('employee','');
        Session::put('request','');
        Session::put('complain', '');
        Session::put('rave', '');
        Session::put('social','');
        Session::put('recruitment','');
        Session::put('mobile','');
        Session::put('notice','');
        Session::put('attedance', 'side-menu--active');
        Session::put('personal','');
        Session::put('leave','');
        Session::save();
        return view('backend.user.employee.attendance.attendance_months');
    }

    public function AttendancAdd(){

        $attendance['allData'] = employee::all();
        // $data['allData']= Attendence::orderBy('id','DESC')->get();
         return view('backend.user.employee.attendance.add_attendance',$attendance);

    }
    public function attedit(Request $req){

        $update_count = DB::table('attendences')
            ->where('emp_id', '=',$req->emp_id)
            ->update([
                'date' => $req->date,
                'emp_id' => $req->emp_id,
                'fname' => $req->name,
                'arrival_time' => $req->arrival_time,
                'leave_time' => $req->leave_time,
                'status' => $req->status,
            ]);
        return Redirect::route('attendanceAll.view')->withErrors(['sucess' => 'Successfully Added Attendance,']);
    }

    public function AttendanceStore(Request $request){
            Attendence::where('date', date('Y-m-d', strtotime($request->date)))->delete();
             $attend = new Attendence();
             $attend->date =date('Y-m-d',strtotime($request->date));
             $attend->emp_id = $request->emp_id;
             $attend->fname = $request->name;
             $attend->arrival_time =$request->arrival_time;
             $attend->leave_time =$request->leave_time;
             $attend->status = $request->status;
             $attend->save();
        return Redirect::route('attendanceAll.view')->withErrors(['sucess' => 'Successfully Added Attendance,']);



        return redirect()->back()->with($notification);
    }

    public function drop(Request $request){


       // $attendance = Attendence::with('employees')->get();
        $output="";
        $query = $request->get('drop');

        //$employee= employee::where('emp_id', 'Like', '%' .$query. '%')->get();

        $out = DB::table('employees')
            ->leftjoin('attendences' , 'attendences.emp_id', '=', 'employees.emp_id')
            ->select('employees.place','employees.emp_id', 'attendences.*')
            ->where('employees.place',$query)
            ->get();



        foreach($out as $out) {

            $output.=
                '<tr class="intro-x">
                 <td class="w-20">
                                <div class="flex">
                                    <div class="w-10 h-10 image-fit zoom-in">
                                                <img alt="" class="tooltip rounded-full" src="/{{$out->emp_pic}}">
                                    </div>
                                </div>
                            </td>
                <td class="text-center">' .$out->emp_id. '</td>
                <td class="text-center">' .$out->fname. '</td>
                <td class="text-center">' .$out->arrival_time. '</td>
                <td class="text-center">' .$out->leave_time. '</td>
                <td class="text-center">' .$out->date. '</td>

                <td class="text-center">' .$out->place. '</td>
                <td class="text-center">' .$out->status. '</td>


                <td class="table-report__action w-56">'.'
                <div class="flex justify-center items-center">'.'
                    <a class="flex items-center mr-3" href=""> '.'<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="check-square" data-lucide="check-square" class="lucide lucide-check-square w-4 h-4 mr-1"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"></path></svg> '.' Edit </a>
                    '.'<a class="flex items-center text-danger" href=""> '.'<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="trash-2" data-lucide="trash-2" class="lucide lucide-trash-2 w-4 h-4 mr-1"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 01-2 2H7a2 2 0 01-2-2V6m3 0V4a2 2 0 012-2h4a2 2 0 012 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg> '.'Delete </a>
                    '.' </div>
            '.'</td>

            </tr>';
        }

        return response($output);
    }

    public function AttendancDetails($date){

        $data['details']= Attendence::where('date',$date)->get();
        return view('backend.user.employee.attendance.attendance_details', $data);
    }

    public function AttendanceViewAll(){
        $allData= Attendence::orderBy('id','DESC')->get();
        $employees = employee::orderBy("created_at", "desc")->get();
        return view('backend.user.employee.attendance.attendance_view_all', compact('allData','employees'));
    }

    public function AttendanceViewUser(){
        Session::put('index', '');
        Session::put('manage', '');
        Session::put('employee','');
        Session::put('request','');
        Session::put('complain', '');
        Session::put('leave','');
        Session::put('rave', '');
        Session::put('attedance', 'side-menu--active');
        Session::put('social','');
        Session::put('mobile','');
        Session::save();


        $allData= Attendence::orderBy('id','DESC')
            ->where('emp_id','=',session('emp_id'))
            ->get();

        return view('backend.user.employee.attendance.user_attendance', compact('allData',) );

    }

    public function DatePicker(Request $request){


        // $attendance = Attendence::with('employees')->get();
        $output="";
        $query = $request->get('picker');

        //$employee= employee::where('emp_id', 'Like', '%' .$query. '%')->get();

        $out= Attendence::orderBy('id','DESC')->where('date', 'Like', '%' .$query. '%')->get();



        foreach($out as $out) {

            $output.=
                '<tr class="intro-x">
                <td class="text-center">' .$out->emp_id. '</td>
                <td class="text-center">' .$out->fname. '</td>
                <td class="text-center">' .$out->arrival_time. '</td>
                <td class="text-center">' .$out->leave_time. '</td>
                <td class="text-center">' .$out->date. '</td>


                <td class="text-center">' .$out->status. '</td>




            </tr>';
        }

        return response($output);
    }


    public function DatePicker2(Request $request){


        // $attendance = Attendence::with('employees')->get();
        $output="";
        $query = $request->get('pickertwo');

        //$employee= employee::where('emp_id', 'Like', '%' .$query. '%')->get();

        $out= Attendence::orderBy('id','DESC')->where('date', 'Like', '%' .$query. '%')->get();



        foreach($out as $out) {

            $output.=
                '<tr class="intro-x">
                 <td class="w-20">
                                <div class="flex">
                                    <div class="w-10 h-10 image-fit zoom-in">
                                                <img alt="" class="tooltip rounded-full" src="/{{$out->emp_pic}}">
                                    </div>
                                </div>
                            </td>
                <td class="text-center">' .$out->emp_id. '</td>
                <td class="text-center">' .$out->fname. '</td>
                <td class="text-center">' .$out->arrival_time. '</td>
                <td class="text-center">' .$out->leave_time. '</td>
                <td class="text-center">' .$out->date. '</td>

                <td class="text-center">' .$out->place. '</td>
                <td class="text-center">' .$out->status. '</td>


                <td class="table-report__action w-56">'.'
                <div class="flex justify-center items-center">'.'
                    <a class="flex items-center mr-3" href=""> '.'<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="check-square" data-lucide="check-square" class="lucide lucide-check-square w-4 h-4 mr-1"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"></path></svg> '.' Edit </a>
                    '.'<a class="flex items-center text-danger" href=""> '.'<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="trash-2" data-lucide="trash-2" class="lucide lucide-trash-2 w-4 h-4 mr-1"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 01-2 2H7a2 2 0 01-2-2V6m3 0V4a2 2 0 012-2h4a2 2 0 012 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg> '.'Delete </a>
                    '.' </div>
            '.'</td>

            </tr>';
        }

        return response($output);
    }

    public function AttendanceAddUser(){
        Session::put('index', '');
        Session::put('manage', '');
        Session::put('employee','');
        Session::put('request','');
        Session::put('complain', '');
        Session::put('leave','');
        Session::put('rave', '');
        Session::put('attedance', 'side-menu--active');
        Session::put('social','');
        Session::put('mobile','');
        Session::save();


        return view('backend.user.employee.attendance.add_user_attendance' );

    }
    function deleteattendence($id){
        if (session('emp_id')){
            $deleted = DB::table('attendences')
                ->where('id', '=', $id)
                ->delete();
            return back();
        }else{
            return back();
        }

    }

    public function AttendanceUpdate(Request $req){


        DB::table('attendences')
            ->where('emp_id', '=',$req->emp_id)
            // ->update(['arrival_time' => $req->arrival_time])
            // ->update(['leave_time' => $req->leave_time])
            ->update(['status' => $req->status]);

        return redirect()->route('attendanceAll.view');

    }

}
