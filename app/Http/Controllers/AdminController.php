<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use App\Part;
use App\Transaction;
use File;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Exports\TrxExport;
use Maatwebsite\Excel\Facades\Excel;

class AdminController extends Controller
{
    public function index()
    {
        $countpart = Part::count();
        $countuser = User::count();
        $countrx = Transaction::count();
        return view('admin.index',['countrx' => $countrx, 'countuser' => $countuser, 'countpart' => $countpart]);
    }
    public function cashier()
    {
        $user = User::where('role',0)->get();
        return view('admin.cashier',['user' => $user]);
    }
    public function showCashier(Request $request)
    {
        return view('admin.show');
    }
    public function insertCashier(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'uname' => 'required',
            'password' => 'min:5|required'
        ]);
        date_default_timezone_set('asia/jakarta');
        $user = new User([
            'name' => $request->input('name'),
            'username' => $request->input('uname'),
            'password' => bcrypt($request->input('password'))
        ]);
        if($request->hasFile('profile')){
            $file = $request->file('profile');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('img/',$filename);
            $user->profile = $filename;
        } else {
            return $request;
            $user->profile = '';
        }
        $user->save();
        return redirect()->route('admin.cashier')->with('success','New Cashier Has Been Added!');
    }
    public function editCashier(Request $request,$id)
    {
        if($request->ajax()){
            $user = User::where('id', $id)->first();
            return response()->json($user);
        }
    }
    public function updateCashier(Request $request)
    {
        date_default_timezone_set('asia/jakarta');
        $user = User::find($request->input('id'));
        $user->name = $request->input('name');
        $user->username = $request->input('uname');
        if($request->hasFile('profile')){
            $file = $request->file('profile');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('img/',$filename);
            $user->profile = $filename;
        } else {
            $user->profile = $request->input('profile_name');
        }
        $user->save();
        return redirect()->route('admin.cashier')->with('success','Cashier Has Been edited!');
    }
    public function deleteCashier($id)
    {
        $user = User::find($id);
        File::delete('img/'.$user->profile);
        $user->delete();
        return redirect()->back();
    }
    public function getPart()
    {
        $part = Part::paginate(5);
        return view('admin.part',['part' => $part]);
    }
    public function insertPart(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'price' => 'required',
        ]);
        date_default_timezone_set('asia/jakarta');
        $part = new Part([
            'title' => $request->input('title'),
            'price' => $request->input('price')
        ]);
        $part->save();
        return redirect()->route('admin.part')->with('success','New Part Has Been Added!');
    }
    public function editPart(Request $request,$id)
    {
        if($request->ajax()){
            $part = Part::where('id', $id)->first();
            return response()->json($part);
        }
    }
    public function updatePart(Request $request)
    {
        date_default_timezone_set('asia/jakarta');
        $part = Part::find($request->input('id'));
        $part->title = $request->input('title');
        $part->price = $request->input('price');
        $part->save();
        return redirect()->route('admin.part')->with('success','New Part Has Been Updated!');
    }
    public function deletePart($id)
    {
        $part = Part::find($id);
        $part->delete();
        return redirect()->route('admin.part')->with('success','Part Has Been deleted!');
    }
    public function showTrx()
    {
        $trx = Transaction::orderby('id','desc')->paginate(10);
        return view('admin.trx')
            ->withTrx($trx);
    }
    public function searchTrx(Request $request)
    {
        $trx = Transaction::when($request->keyword, function ($query) use ($request) {
            $query->where('order_id', 'like', "%{$request->keyword}%")
                ->orWhere('customer', 'like', "%{$request->keyword}%")
                ->orWhere('serial', 'like', "%{$request->keyword}%")
                ->orWhere('type', 'like', "%{$request->keyword}%");
        })->paginate(10);
        return view('admin.trx')
                    ->withTrx($trx);
    }
    public function monthTrx(Request $request)
    {
        $trx = Transaction::whereMonth('created_at', $request->input('month'))->paginate(10);
        return view('admin.trx')
                ->withTrx($trx);
    }
    public function deleteTrx($id)
    {
        $trx = Transaction::find($id);
        $trx->delete();
        return redirect()->back()->with('success','Transaction has been deleted!');
    }
    public function export_excel()
	{
        $nama_file = 'transaction_report_'.date('Y-m-d_H-i-s').'.xlsx';
        return Excel::download(new TrxExport, $nama_file);
	}
}
