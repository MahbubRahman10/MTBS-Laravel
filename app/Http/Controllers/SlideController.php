<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\User;
use Illuminate\Http\Request;
use Carbon;
use DB;
use Illuminate\Support\Facades\Input;
use Redirect;

class SlideController extends BaseController
{

            

            public function view(){

                $data=DB::table('slide')->get();

                return view('admin/slid')->with('slide',$data);

            }

             public function addslide(Request $req){


            $files = Input::file('image');
            $destinationPath = 'slide';
            $filename = $files->getClientOriginalName();
            $upload_success = $files->move($destinationPath, $filename);

            if (isset($req->checkbox)) {

                $active='1';

            }
            else{
                $active='0';
            }


            $dataimage = array(
                    'image'=>$upload_success,
                    'active'=>$active
                    );

            $data=DB::table('slide')->insert($dataimage);

            
            return Redirect::intended('admin/slide');

            }

            public function delete($id){
                DB::table('slide')->where('id', '=', $id)->delete();
                return Redirect::intended('admin/slide');
            }

}
