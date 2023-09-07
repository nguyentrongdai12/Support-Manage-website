<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Http\Controllers\Traits\BreadRelationshipParser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use \PDF;

class Cdbcontroller extends Controller
{    
    use BreadRelationshipParser;
    public function deleteforever($table, $keyvalue)
    {
        $data = DB::table($table)->where('id',$keyvalue)->delete();
        return redirect()->route('voyager.' . $table . '.index');  
    }

    public function deletetrash($table, $check)
    {
        if($check)
        {
            $data = DB::table($table)->where('deleted_at','!=','')->delete();
            return redirect()->route('voyager.' . $table . '.index');
        }          
    }
    
    public function getreport(Request $request)
    {
        if(Auth::user() != null)
        {
            $siteid = $request->selectsite;
            $uname = $request->uname;
            $fromdate = $request->fromdate;
            $enddate = $request->enddate;
            $lang = $request->lang;

            //echo $fromdate.' to '.$enddate;
            
            if(Auth::user()->hasRole('admin'))
            {
                $dataTypeContent = DB::table('taskrequests')
                ->join('tasktypes', 'taskrequests.typeid', '=', 'tasktypes.id')
                ->join('statustasks', 'taskrequests.statusid', '=', 'statustasks.id')
                ->join('users', 'taskrequests.user', '=', 'users.id')
                ->join('sites', 'taskrequests.siteid', '=', 'sites.id')
                ->select('taskrequests.*', 'tasktypes.typename', 'statustasks.status', 'statustasks.color', 'users.name', 'sites.id')
                ->where('date', '>=', $fromdate)
                ->where('date', '<=', $enddate)
                ->where('sites.id', '=', $siteid)
                ->get();
            }
            else
            {
                $dataTypeContent = DB::table('taskrequests')
                ->join('tasktypes', 'taskrequests.typeid', '=', 'tasktypes.id')
                ->join('statustasks', 'taskrequests.statusid', '=', 'statustasks.id')
                ->join('users', 'taskrequests.user', '=', 'users.id')
                ->join('sites', 'taskrequests.siteid', '=', 'sites.id')
                ->select('taskrequests.*', 'tasktypes.typename', 'statustasks.status', 'statustasks.color' , 'users.name', 'sites.id')
                ->where('date', '>=', $fromdate)
                ->where('date', '<=', $enddate)
                ->where('users.name', '=', $uname)
                ->where('sites.id', '=', $siteid)
                ->get();
            }

            $sitename = DB::table('sites')->where('id', '=', $siteid)->value('fullname');
            $datasum = array();
            if($lang == 'en')
            {
                $datasum = [
                    'sitename' => $sitename, 
                    'uname' => $uname, 
                    'fromdate' => $fromdate, 
                    'enddate' => $enddate, 
                    'companyname' => 'VIET TECHNOLOGY ONLINE COMPANY LIMITED',
                    'address' => '68 Bach Dang Street, Ward 2, Tan Binh District, HCM City',
                    'title' => 'REPORT JOB OF IT HELPDESK',
                    'customer' => 'Customer',
                    'staff' => 'Staff',
                    'from' => 'From',
                    'to' => 'to',
                    'col1' => 'Datetime',
                    'col2' => 'Subject & Detail',
                    'col3' => 'Type',
                    'col4' => 'Assigner',
                    'col5' => 'Status',
                    'partya' => 'Party A',
                    'represented' => 'Represented by',
                    'datetime' => 'Date time'
                ];
            }
            else
            {
                $datasum = [
                    'sitename' => $sitename, 
                    'uname' => $uname, 
                    'fromdate' => $fromdate, 
                    'enddate' => $enddate, 
                    'companyname' => 'Công ty TNHH Trực Tuyến Công Nghệ Việt',
                    'address' => '68 Bạch Đằng, P.2, Q.Tân Bình, TP HCM',
                    'title' => 'REPORT JOB OF IT HELPDESK',
                    'customer' => 'Khách hàng',
                    'staff' => 'Nhân viên',
                    'from' => 'Từ',
                    'to' => 'đến',
                    'col1' => 'Ngày tháng',
                    'col2' => 'Công việc & nội dung',
                    'col3' => 'Loại',
                    'col4' => 'Tiếp nhận',
                    'col5' => 'Trạng thái',
                    'partya' => 'Bên A',
                    'partyb' => 'Bên B',
                    'represented' => 'Đại diện',
                    'datetime' => 'Ngày tháng'
                ];
            }            

            return view('report', compact('dataTypeContent', 'datasum'));

            $pdf = PDF::loadView('report',  compact('dataTypeContent', 'datasum'))->setPaper('a4', 'landscape');
    		//return $pdf->stream();
        }
        else
        {
            return view('voyager::login');
        }
    }
        
    public function reportdashboard()
    {
        if(Auth::user() != null)
        {
            $listsite = DB::table('sites')->select('sites.*')->get();
            $uname = Auth::user()->name;
            return view('report-dashboard', compact('listsite', 'uname'));
        }
        else
        {
            return view('voyager::login');
        }
    }
}
