<?php

namespace App\Http\Controllers;

use App\Models\Survey;
use Illuminate\Http\Request;
use Session;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function filter(Request $request)
    {
        $data['SD'] = Survey::whereYear('tanggal_lahir', $request->tahun)->where('pendidikan_terakhir', 'SD')->get();
        $data['SMP'] = Survey::whereYear('tanggal_lahir', $request->tahun)->where('pendidikan_terakhir', 'SMP')->get();
        $data['SMA'] = Survey::whereYear('tanggal_lahir', $request->tahun)->where('pendidikan_terakhir', 'SMA')->get();
        $data['Diploma'] = Survey::whereYear('tanggal_lahir', $request->tahun)->where('pendidikan_terakhir', 'Diploma')->get();
        $data['Sarjana'] = Survey::whereYear('tanggal_lahir', $request->tahun)->where('pendidikan_terakhir', 'Sarjana')->get();

        $count['SD'] = $data['SD']->count();
        $count['SMP'] = $data['SMP']->count();
        $count['SMA'] = $data['SMA']->count();
        $count['Diploma'] = $data['Diploma']->count();
        $count['Sarjana'] = $data['Sarjana']->count();

        $index = 0;
        foreach ($data as $key => $value) {
            $final_data[$index]['name'] = $key; 
            $final_data[$index]['data'] = $count[$key]; 
            $index++;
        }

        $final_data = json_encode($final_data);

        $count['SD'] = json_encode($count['SD'], JSON_NUMERIC_CHECK);
        $count['SMP'] = json_encode($count['SMP'], JSON_NUMERIC_CHECK);
        $count['SMA'] = json_encode($count['SMA'], JSON_NUMERIC_CHECK);
        $count['Diploma'] = json_encode($count['Diploma'], JSON_NUMERIC_CHECK);
        $count['Sarjana'] = json_encode($count['Sarjana'], JSON_NUMERIC_CHECK);

        $tahun = json_encode($request->tahun, JSON_NUMERIC_CHECK);

        return view('home.chart', compact('count', 'tahun'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
