<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class menuController extends Controller
{
    public function index()
    {
        $prohibit = array("failed_jobs", "migrations", "password_reset_tokens", "personal_access_tokens", "sqlite_sequence", "users");

        // DB::connection()->getPdo(); - chyba nie trzeba jednak tego
        if( DB::connection()->getNameWithReadWriteType() == "sqlite")
        {
            $tables = \DB::select("SELECT name FROM sqlite_master WHERE type='table' ORDER BY name;");
        }
        else
        {
            $tables = DB::select('SHOW TABLES');
        }
        foreach( $tables as $i => $table )
        {
            if( in_array($table->name, $prohibit) )
            {
                unset($tables[$i]);
            }
        }

        return view('menu', compact('tables'));
    }
}
