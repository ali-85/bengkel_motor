<?php

namespace App\Exports;

use App\Transaction;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;

class TrxExport implements FromView
{
    use Exportable;
    
    public function view(): View
    {
        return view('admin.export', [
            'trx' => Transaction::orderby('id','desc')->get()
        ]);
    }
}
