<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class JsonController extends Controller
{
    public function add()
    {
        return view('add');
    }


    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'mobile' => 'required',
        ]);

        try {
            // my data storage location is project_root/storage/app/data.json file.
            $info = Storage::disk('local')->exists('record.json') ? json_decode(Storage::disk('local')->get('record.json')) : [];
            
            $inputData = $request->only(['name', 'email','mobile']);
            $inputData['id'] = rand(2,50);
            $inputData['datetime_submitted'] = date('Y-m-d H:i:s');

            array_push($info, $inputData);
            

            Storage::disk('local')->put('record.json', json_encode($info, JSON_PRETTY_PRINT));
            return redirect()->back()->with('message','Record Added Successfully.');;

        } catch(Exception $e) {
            return ['error' => true, 'message' => $e->getMessage()];
        }
    }

    public function fetchAll()
    {
        $jsonRecords = Storage::disk('local')->get('record.json');
        $data['data'] = json_decode($jsonRecords, true);
        //dd($data);
        return view('index',$data);
    }

    public function edit($id)
    {
        $jsonData = Storage::disk('local')->get('record.json');
        $data = json_decode($jsonData, true); 
        $singleData = array_filter($data, function ($var) use ($id) { 
            return (!empty($var['id']) && $var['id'] == $id); 
        }); 
        $data['singleData'] = array_values($singleData)[0];  
        return view('edit',$data);
    }
    public function update(Request $request, $id)
    { 
        //dd($request->name);
        if(!empty($id)){ 
            $jsonVal = Storage::disk('local')->get('record.json');
            $data = json_decode($jsonVal, true); 

            foreach ($data as $key => $value) { 
                if ($value['id'] == $id) { 
                    if(isset($request->name)){ 
                        $data[$key]['name'] = $request->name; 
                    } 
                    if(isset($request->email)){ 
                        $data[$key]['email'] = $request->email; 
                    } 
                    if(isset($request->name)){ 
                        $data[$key]['mobile'] = $request->mobile; 
                    } 
                } 
            } 

            Storage::disk('local')->put('record.json', json_encode($data,JSON_PRETTY_PRINT));
            return redirect()->route('indexfile');
        }else{ 
            return false; 
        } 
    }

    public function destroy($recordID)
    {
        $jsonValue = Storage::disk('local')->get('record.json');
        $dataVal = json_decode($jsonValue, true); 
             
        $newData = array_filter($dataVal, function ($var) use ($recordID) { 
            return ($var['id'] != $recordID); 
        }); 
        Storage::disk('local')->put('record.json', json_encode($newData,JSON_PRETTY_PRINT));
        return redirect()->route('indexfile')->with('message','Record Deleted Successfully.');
    }
    
}





