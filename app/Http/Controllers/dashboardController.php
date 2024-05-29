<?php

namespace App\Http\Controllers;

use App\Models\rent_detail;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Rent;
use App\Models\Cars;

class DashboardController extends Controller
{
    public function index()
    {
        if (!Auth::check()) {
            return redirect('/');
        }

        // jumlah mobil yang ada 
        $jumlah_mobil = Cars::count();

        // jumlah penghasilan bulan ini dari transaksi yang sudah selesai
        $year = date('Y');
        $month = date('n');
        $total = Rent::where('status', 'selesai')->whereYear('tgl_sewa', $year)->whereMonth('tgl_sewa', $month)->sum('total');

        // jumlah sewa bulan ini dari transaksi yang sudah selesai
        $now = Carbon::now();
        $year = $now->year;
        $month = $now->month;
        $tot = Rent::where('status', 'selesai')->whereYear('tgl_sewa', $year)->whereMonth('tgl_sewa', $month)->count('id_sewa');

        // jumlah penghasilan tahun ini dari transaksi yang sudah selesai
        $totalpendapatan = Rent::where('status', 'selesai')->whereYear('tgl_sewa', $year)->sum('total');

        // Mendapatkan total pendapatan per bulan dari transaksi yang sudah selesai
        $monthlyEarnings = Rent::select(
            DB::raw('MONTH(tgl_sewa) as month'),
            DB::raw('SUM(total) as total')
        )
            ->where('status', 'selesai')
            ->whereYear('tgl_sewa', $year)
            ->groupBy(DB::raw('MONTH(tgl_sewa)'))
            ->pluck('total', 'month');

        $months = [];
        $earnings = [];

        // Mengisi array untuk setiap bulan
        for ($i = 1; $i <= 12; $i++) {
            $months[] = date('F', mktime(0, 0, 0, $i, 1));
            $earnings[] = $monthlyEarnings->get($i, 0);
        }

        // Data untuk chart pendapatan bulanan
        $months = collect(range(1, 12))->map(function ($month) use ($year) {
            return Carbon::create($year, $month, 1)->format('F');
        });
        $earnings = collect(range(1, 12))->map(function ($month) use ($year) {
            return Rent::where('status', 'selesai')->whereYear('tgl_sewa', $year)->whereMonth('tgl_sewa', $month)->sum('total');
        });

        // Data untuk pie chart
        $visitorData = rent_detail::select('nopol', DB::raw('count(nopol) as count'))
            ->groupBy('nopol')
            ->orderBy('count', 'desc')
            ->limit(5)
            ->get();
        $visitorLabels = $visitorData->pluck('nopol');
        $visitorCounts = $visitorData->pluck('count');

        return view('dashboard.dashboard', compact('total', 'totalpendapatan', 'jumlah_mobil', 'tot', 'months', 'earnings', 'visitorLabels', 'visitorCounts'));
    }
}
