<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Request;
use Illuminate\Http\Request as ImgUpload;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function xmlToJson()
    {
        $xml_string = file_get_contents(public_path('igtApps.xml'));
        return ['code' => 'success', 'data' => json_encode(simplexml_load_string($xml_string))];
    }


    public function xmlPage()
    {
        $xml_string = file_get_contents(public_path('igtApps.xml'));
        return view('xmlPage', compact('xml_string'));
    }

    public function jsonStore()
    {

        $inputs = Request::all();
        $vehicle_data=$this->getArray($inputs);
        print_r(Vehicle::create($vehicle_data)->toArray());

    }

    public function jsonDelete()
    {
        if(\DB::table('vehicles')->delete()){
            return ['code'=>'success'];
        }

    }

    private function getArray($data)
    {
        $final_data = [];
        foreach ($data as $keyy => $temp) {
            if ($keyy == '@attributes' && is_array($temp)) {
                foreach ($temp as $k => $v) {
                    $final_data[$k] = $v;
                }
            } else if (is_array($temp)) {
                $final_data[$keyy] = $this->getArray($temp);
            }
        }
        return $final_data;
    }

    public function imageIndex(ImgUpload $request){
        $img=Request::all(); 
        $path='';
        if(!empty($img)){
            $request->validate([
                'image' => 'required|image|mimes:jpg,jpeg',
               ]);
               $path = $request->file('image')->store('images');
        }
        return view('imageIndex',compact('path'));
    }

    function getImage($img)
    {
        $path = storage_path('app/images/' . $img);
        if (!\File::exists($path)) {
            abort(404);
        }
        $file = \File::get($path);
        $type = \File::mimeType($path);
        $response = \Response::make($file, 200);
        $response->header("Content-Type", $type);
        return $response;
    }
}
