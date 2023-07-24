<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Mike42\Escpos\PrintConnectors\FilePrintConnector;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use Mike42\Escpos\Printer;

class landingPage extends Controller
{
    public function index()
    {
        return view('landingpage.index');
    }
    public function get_now()
    {
        $dt = Carbon::now()->timezone('Asia/Jakarta');
        $date = $dt->toDateString();
        $time = $dt->toTimeString();
        $now = $date . ' ' . $time;
        return $now;
    }
    public function ambildata_siranap()
    {
        $data = db::select('call SP_BRIDGING_SIRANAP2()');
        $last_up = $this->get_now();
        return view('landingpage.view_siranap', compact([
            'data',
            'last_up'
        ]));
    }
    public function print_tiket()
    {
        dd($this->get_client_ip_env());
        $connector = new WindowsPrintConnector("EPSON TM-T82X Receipt");
        // $connector = new WindowsPrintConnector("smb://computername/Receipt Printer");
        // $connector = new FilePrintConnector("EPSON TM-T82X Receipt");
        $printer = new Printer($connector);
        $printer->text("Hello World!\n");
        $printer->cut();
        $printer->close();

        $back = [
            'kode' => 200,
            'message' => 'Berhasil dihapus !'
        ];
        echo json_encode($back);
        die;
    }
    function get_client_ip_env()
    {
        $ipaddress = '';
        if (getenv('HTTP_CLIENT_IP'))
            $ipaddress = getenv('HTTP_CLIENT_IP');
        else if (getenv('HTTP_X_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
        else if (getenv('HTTP_X_FORWARDED'))
            $ipaddress = getenv('HTTP_X_FORWARDED');
        else if (getenv('HTTP_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_FORWARDED_FOR');
        else if (getenv('HTTP_FORWARDED'))
            $ipaddress = getenv('HTTP_FORWARDED');
        else if (getenv('REMOTE_ADDR'))
            $ipaddress = getenv('REMOTE_ADDR');
        else
            $ipaddress = 'UNKNOWN IP Address';
        return $ipaddress;
    }
}
