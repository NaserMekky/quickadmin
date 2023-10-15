<?php

namespace Nasermekky\Quickadmin\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QuickAdminSettingController extends Controller
{
    /**
    * Display a listing of the resource.
    */
    public function index() {
        //dd(config('quickadmin')['controller']);
        return view("quickadmin::settings.index", ['settings' => config('quickadmin')]);
    }

    /**
    * Show the form for creating a new resource.
    */
    public function create() {
        //
    }

    /**
    * Store a newly created resource in storage.
    */
    public function store(Request $request) {

        config(['quickadmin.'.request ('key') => request('value')]);

        file_put_contents(
            config_path('quickadmin.php'),
            $this->configToString('quickadmin')); 

        return redirect('settings');

    }

    /**
    * Display the specified resource.
    */
    public function show(string $key) {
        //
    }

    /**
    * Show the form for editing the specified resource.
    */
    public function edit(string $key) {
        $data['key'] = $key;
        $data['value'] = config('quickadmin.'.$key);

        return view('quickadmin::settings.edit', $data);
    }

    /**
    * Update the specified resource in storage.
    */
    public function update(Request $request, string $key) {

        config(['quickadmin.'.$key => request('value')]);

        file_put_contents(
            config_path('quickadmin.php'),
            $this->configToString('quickadmin')); 

        return redirect()->route('settings.index');
    }

    /**
    * Remove the specified resource from storage.
    */
    public function destroy(string $key) {
       $settings = config('quickadmin');
        unset($settings[$key]);
 $text = '<?php '.PHP_EOL.' return '
        .str_replace(['array (', ')'], ['[', ']'],
            var_export($settings, true)). ';';
  
        file_put_contents(
            config_path('quickadmin.php'),  $text);

        return redirect()->route('settings.index');
    }

    private function configToString($configPath) {

        return '<?php '.PHP_EOL.' return '
        .str_replace(['array (', ')'], ['[', ']'],
            var_export(config($configPath), true)). ';';
    }
}

