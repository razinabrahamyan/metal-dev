<?php

namespace App\Http\Controllers\User;

use App\Classes\Convertors\ConvertFile;
use App\Classes\Convertors\Drivers\InterventionImageDriver;
use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\Post;
use App\Models\Service;
use App\Models\ServiceType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Symfony\Component\Console\Input\Input;

class ServiceController extends Controller
{
    public function index(){

        return view('pages.service.index');
    }

    public function store(Request $request){

        $imageNames = [];
        $check = Service::where('service_id',$request->service)->where('user_id',auth()->id())->first();
        if(!$check){
            $service = Service::create([
                'service_id' => $request->service,
                'description' => $request->description,
                'price' => $request->price,
                'user_id' => auth()->id()
            ]);

            if ($request->images[0]) {
                $destinationPath = 'user/images/service/';
                foreach ($request->images as $image) {
                    $convertedImage = (new ConvertFile(new InterventionImageDriver()))->setFile($image)
                        ->convertFile()
                        ->storage($destinationPath);
                    array_push($imageNames, ['name' => $convertedImage, 'imagable_id' => $service->id, 'imagable_type' => 'App\Models\Service']);
                }
                Image::insert($imageNames);
            }
            $new_service = Service::where('id',$service->id)->with(['serviceType','images'])->first();
            return response()->json([
                'success' => 'success',
                'service' => $new_service,
                'message' => 'Услуга успешно добавлена',
                'service_type_to_remove' => $request->service
            ]);
        }
        return response()->json([
            'success' => 'error',
            'message' => 'Услуга Уже Существует',
        ]);

    }

    public function updateService(Request $request){
        $imageNames = [];
        Service::where('id',$request->service_id)->update([
            'description' => $request->description,
            'price' => $request->price
        ]);
        $service = Service::find($request->service_id);
        if($request->removedImages[0]){
            $images_to_remove = Image::whereIn('id',$request->removedImages)->pluck('name');
            Image::whereIn('id',$request->removedImages)->delete();
            foreach ($images_to_remove as $image){
                File::delete($image);
            }

        }

        if ($request->images[0]) {
            $destinationPath = 'user/images/service/';
            foreach ($request->images as $image) {
                $convertedImage = (new ConvertFile(new InterventionImageDriver()))->setFile($image)
                    ->convertFile()
                    ->storage($destinationPath);
                array_push($imageNames, ['name' => $convertedImage, 'imagable_id' => $service->id, 'imagable_type' => 'App\Models\Service']);
            }
            Image::insert($imageNames);

        }
        $edited_service = Service::where('id',$service->id)->with(['serviceType','images'])->first();
        return response()->json([
            'success' => 'success',
            'service' => $edited_service,
            'message' => 'Услуга Успешно Обновлена',
        ]);
    }

    public function getServiceTypes(){
        $services = Service::where('user_id',auth()->id())->with(['serviceType','images'])->orderByDesc('created_at')->get();
        $existing_service_ids = $services->pluck('service_id');
        $service_types = ServiceType::whereNotIn('id',$existing_service_ids)->get();
        return response()->json([
            'success' => 'success',
            'serviceTypes' => $service_types,
            'services' => $services
        ]);
    }
    public function deleteService(Request $request){
        $service = Service::where('id',$request->id)->with('serviceType')->first();
        $image_ids = $service->images->pluck('id');
        $imageNames = $service->images->pluck('name');

        Image::whereIn('id',$image_ids)->delete();
        foreach ($imageNames as $image){
            File::delete($image);
        }

        Service::where('id',$request->id)->delete();
        return response()->json([
            'success' => 'success',
            'message'=> 'Услуга Успешно Удалена',
            'service_id' => $service->id,
            'service_type' => $service->serviceType
        ]);
    }

    public function getAllServices(Request $request){
        $services = Service::with(['serviceType','images','user'])->paginate(5);
        $service_types = ServiceType::all();
        return response()->json([
            'success' => 'success',
            'services' => $services,
            'message'=> 'Услуга Успешно Удалена',
            'service_types' => $service_types
        ]);
    }

    public function filterServices(Request $request){
        $services = null;
        $filters = null;
        $service_types = ServiceType::all();
        if ($request->categories){
            $services = Service::whereIn('service_id',$request->categories)->with(['serviceType','images','user'])->paginate(5);
            $services->appends('categories',$request->input('categories'));
            $filters = ServiceType::whereIn('id',$request->categories)->get();

        }else{
            $services = Service::with(['serviceType','images','user'])->paginate(5);
            $service_types = ServiceType::all();
        }

        return response()->json([
            'success' => 'success',
            'services' => $services,
            'filters' => $filters,
            'message'=> 'Услуга Успешно Удалена',
            'service_types' => $service_types,
            'query_string' => $_SERVER['QUERY_STRING']
        ]);


    }
}
