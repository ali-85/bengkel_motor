<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Part;
use App\Transaction;
use Illuminate\Support\Facades\DB;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use function Opis\Closure\serialize;
use function Opis\Closure\unserialize;
use Illuminate\Support\Carbon;

class CashierController extends Controller
{
    public function index()
    {
        $countpart = Part::count();
        $countrx = Transaction::count();
        return view('cashier.index',['countrx' => $countrx, 'countpart' => $countpart]);
    }
    public function transaction()
    {
        $trx = Transaction::orderby('id','desc')->paginate(10);
        $trx->transform(function($trx,$key)
        {
            $trx->part = unserialize($trx->part);
            return $trx;
        }
        );
        return view('cashier.transaction')
            ->withTrx($trx);
    }
    public function addTrx()
    {
        $part = Part::all();
        return view('cashier.trx.add',['part' => $part]);
    }
    public function printTrx($id)
    {
        date_default_timezone_set('asia/jakarta');
        $trx = Transaction::where('id',$id)->get();
        $trx->transform(function($trx,$key)
        {
            $trx->part = unserialize($trx->part);
            return $trx;
        }
        );
        return view('cashier.trx.print')
            ->withTrx($trx);
    }
    public function insertTrx(Request $request)
    {
        $this->validate($request,[
            'customer' => 'required',
            'serial' => 'required',
            'type' => 'required',
            'part' => 'required'
        ]);
        date_default_timezone_set('asia/jakarta');
        if(Transaction::count() == 0){
            $id = 001;
        } else {
            $id = Transaction::count();
            $id += 1;
        }
        $orderid = 'bkl-'.date('my').'-'.$id;
        $part = Part::whereIn('id_part',$request->input('part'))->get();
        $trx = new Transaction([
            'order_id' => $orderid,
            'customer' => $request->input('customer'),
            'serial' => $request->input('serial'),
            'type' => $request->input('type'),
            'part' => serialize($part)
        ]);
        $trx->save();
        return redirect()->route('cashier.transaction')->with('success','Transaction success!');
    }
    public function editTrx($id)
    {
        $part = Part::all();
        $trx = Transaction::where('id',$id)->get();
        return view('cashier.trx.edit')
            ->withTrx($trx)
            ->withPart($part);
    }
    public function updateTrx(Request $request)
    {
        date_default_timezone_set('asia/jakarta');
        $partId = implode(',',$request->input('part'));
        $part = Part::whereIn('id',$request->input('part'))->get();
        $trx = Transaction::find($request->input('id'));
        $trx->customer = $request->input('customer');
        $trx->serial = $request->input('serial');
        $trx->type = $request->input('type');
        $trx->part = serialize($part);
        $trx->save();
        return redirect()->route('cashier.transaction')->with('success','Transaction has been edited!');
    }
    public function deleteTrx($id)
    {
        $trx = Transaction::find($id);
        $trx->delete();
        return redirect()->route('cashier.transaction')->with('success','Transaction has been deleted!');
    }
}
