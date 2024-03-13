<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use Illuminate\Http\Request;
use Validator;
use Response;
use Auth;
use Redirect;
use Illuminate\Support\Facades\Input;
use DB;
use App\Movie;
use App\UpcomingMovie;



class MovieController extends BaseController
{
 



	public function viewmovie(){


		$movie=Movie::all();

		return view('admin/movie')->with('movie',$movie);
	

	}



    public function upcomingmovie(){


        $movie=UpcomingMovie::all();

        return view('admin/upcomingmovie')->with('movie',$movie);
    

    }



    public function addupcomingmovie(Request $req)
    {


                $data = Input::all();


                $rules=array(
                    'name' => 'required',
                    'language' => 'required',
                    'country' => 'required',
                    'genre' => 'required',


                    'about' => 'required',
                    'rdate' => 'required',
                    'cast' => 'required',
                    'director' => 'required',
                    'mdirector' => 'required',
                    'trailer' => 'required',
                    'about' => 'required',
                    
                );

            $valid=Validator::make($data,$rules);
            if($valid->fails()){
                return Redirect::to('admin/addmovie')->withErrors($valid);
            }
            else{


                
                    $files = Input::file('image');
                    $destinationPath = 'Upload';
                    $filename = $files->getClientOriginalName();
                    $upload_success = $files->move($destinationPath, $filename);



                    $movie=new UpcomingMovie;

                    $movie->movie_name=$req->name;
                    $movie->language=$req->language;
                    $movie->country=$req->country;
                    $movie->genres=$req->genre;
                    $movie->relaseDate=$req->rdate;
                    $movie->poster=$upload_success;
                    $movie->cast=$req->cast;
                    $movie->director=$req->director;
                    $movie->musicDirector=$req->mdirector;
                    $movie->aboutMovie=$req->about;
                    $movie->trailer=$req->trailer;
    

                    $movie->save();

                    return Redirect::intended('admin\movie\upcoming');                 

            

            }




        }


        public function editUpcomingMovie(Request $req) {
    

            $data=UpcomingMovie::find($req->id);

            $data->movie_name=$req->name;
            $data->genres=$req->genres;
            $data->relaseDate=$req->date;
        
            $data->save();

            return response ()->json ();



    }






    public function viewupcomingdetails($name){


        $movie=UpcomingMovie::where('movie_name',$name)->first();

        return view('viewupcomingmovie')->with('movie',$movie);
    

    }








        public function deleteUpcomingMovie(Request $req) {
            UpcomingMovie::find ($req->id)->delete();
            return response ()->json ();
    }





    public function addmovielist($id){

        $data = UpcomingMovie::where('id', '=', $id )->first();
        
        $movie=new Movie;

        $movie->name=$data->movie_name;
        $movie->language=$data->language;
        $movie->country=$data->country;
        $movie->genres=$data->genres;
        $movie->relaseDate=$data->relaseDate;
        $movie->poster=$data->poster;
        $movie->cast=$data->cast;
        $movie->director=$data->director;
        $movie->musicDirector=$data->musicDirector;
        $movie->aboutMovie=$data->aboutMovie;
        $movie->trailer=$data->trailer;


        $movie->save();


        return Redirect::to('admin/movie');
   

    }










	/* ------------------------------------------------------ Admin------------------------------------------------------ */

	public function addmovie(Request $req)
	{


	    		$data = Input::all();


	    		$rules=array(
                	'name' => 'required',
                    'language' => 'required',
                    'country' => 'required',
                	'genre' => 'required',
                    'about' => 'required',
                	'rdate' => 'required',
                	'rating' => 'required',
                	'image' => 'required',
                	'cast' => 'required',
                	'director' => 'required',
                	'mdirector' => 'required',
                    'trailer' => 'required',
                	'about' => 'required',
                	
                );

            $valid=Validator::make($data,$rules);
            if($valid->fails()){
                return Redirect::to('admin/addmovie')->withErrors($valid);
            }
            else{


	    		
	    			$files = Input::file('image');
	    			$destinationPath = 'Upload';
       				$filename = $files->getClientOriginalName();
       			 	$upload_success = $files->move($destinationPath, $filename);



					$movie=new Movie;

					$movie->name=$req->name;
                    $movie->language=$req->language;
                    $movie->country=$req->country;
					$movie->genres=$req->genre;
					$movie->relaseDate=$req->rdate;
					$movie->imdbRating=$req->rating;
					$movie->poster=$upload_success;
					$movie->cast=$req->cast;
					$movie->director=$req->director;
					$movie->musicDirector=$req->mdirector;
					$movie->aboutMovie=$req->about;
                    $movie->trailer=$req->trailer;
	

					$movie->save();






					return Redirect::intended('admin');	    			
            

            }









	}



	public function editMovie(Request $req) {
	

			$data=Movie::find($req->id);

			$data->name=$req->name;
			$data->genres=$req->genres;
			$data->imdbRating=$req->imdb;
			$data->relaseDate=$req->date;
		
			$data->save();

			return response ()->json ();



	}

		public function deleteMovie(Request $req) {
			Movie::find ($req->id)->delete();
			return response ()->json ();
	}





	 public function livesearch(Request $request)
    { 
        $search = $request->search;


       if (!empty($search)){
      
        	$result="";


            $posts = Movie::where('name','LIKE',"%{$search}%")->get();



            		$i = 0;
            	foreach ($posts as $key => $data) {

            					$i++;

            			$result.='<tr class="data'.$data->id. '">'.
            					'<td>'.$i.'</td>'.
            					'<td class="mname'.$data->id. '">'.$data->name.'</td>'.
            					'<td class="mdirector'.$data->id. '">'.$data->director.'</td>'.
            					'<td class="mgenres'.$data->id. '">'.$data->genres.'</td>'.
            					'<td class="mimdb'.$data->id. '">'.$data->imdbRating.'</td>'.
            					'<td class="mdate'.$data->id. '">'.$data->relaseDate.'</td>'.
            					'<td>'.

            					'<span class="details'.$data->id. '" style="display: none;"  data-cast="'.$data->cast. '" data-poster='.$data->poster. '   data-musicDirector="'.$data->musicDirector. '" data-about="'.$data->aboutMovie. '" ></span> 
            					<a href="" class="btn btn-success" id="viewdata"  data-id="'.$data->id. '" data-toggle="modal" data-target="#view" style=" border-radius: 0;"><span class="glyphicon glyphicon-open" aria-hidden="true"></span></a>
                    <a href="" data-toggle="modal" data-target="#edit" class="btn btn-primary" style="border-radius: 0;" data-id="'.$data->id. '" data-name="'.$data->name. '" data-genres="'.$data->genres. '" data-date="'.$data->relaseDate. '" data-imdb="'.$data->imdbRating. '"><span class="glyphicon glyphicon-pencil"> </span></a>
                    <a href="" data-toggle="modal" id="deletedata" data-target="#delete" data-id="'.$data->id. '" class="btn btn-danger" style="border-radius: 0;"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>'



            					.'</td>'.
            					'<tr>';
	            	}
            
	            	return response()->json($result);
            

	            }

	            else{

	            		$result="";


            $posts = Movie::all();



            		$i = 0;
            	foreach ($posts as $key => $data) {

            					$i++;

            			$result.='<tr class="data'.$data->id. '">'.
            					'<td>'.$i.'</td>'.
            					'<td class="mname'.$data->id. '">'.$data->name.'</td>'.
            					'<td class="mdirector'.$data->id. '">'.$data->director.'</td>'.
            					'<td class="mgenres'.$data->id. '">'.$data->genres.'</td>'.
            					'<td class="mimdb'.$data->id. '">'.$data->imdbRating.'</td>'.
            					'<td class="mdate'.$data->id. '">'.$data->relaseDate.'</td>'.
            					'<td>'.

            					'<span class="details'.$data->id. '" style="display: none;"  data-cast="'.$data->cast. '" data-poster='.$data->poster. '   data-musicDirector="'.$data->musicDirector. '" data-about="'.$data->aboutMovie. '" ></span> 
            					<a href="" class="btn btn-success" id="viewdata"  data-id="'.$data->id. '" data-toggle="modal" data-target="#view" style=" border-radius: 0;"><span class="glyphicon glyphicon-open" aria-hidden="true"></span></a>
                    <a href="" data-toggle="modal" data-target="#edit" class="btn btn-primary" style="border-radius: 0;" data-id="'.$data->id. '" data-name="'.$data->name. '" data-genres="'.$data->genres. '" data-date="'.$data->relaseDate. '" data-imdb="'.$data->imdbRating. '"><span class="glyphicon glyphicon-pencil"> </span></a>
                    <a href="" data-toggle="modal" id="deletedata" data-target="#delete" data-id="'.$data->id. '" class="btn btn-danger" style="border-radius: 0;"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>'



            					.'</td>'.
            					'<tr>';
	            	}
            
	            	return response()->json($result);
            



	            }
            



    }















     public function SearchUpcomingMovie(Request $request)
    { 
        $search = $request->search;


       if (!empty($search)){
      
            $result="";


            $posts = UpcomingMovie::where('movie_name','LIKE',"%{$search}%")->get();



                    $i = 0;
                foreach ($posts as $key => $data) {

                                $i++;

                        $result.='<tr class="data'.$data->id. '">'.
                                '<td>'.$i.'</td>'.
                                '<td class="mname'.$data->id. '">'.$data->movie_name.'</td>'.
                                '<td class="mdirector'.$data->id. '">'.$data->director.'</td>'.
                                '<td class="mgenres'.$data->id. '">'.$data->genres.'</td>'.
                                '<td class="mdate'.$data->id. '">'.$data->relaseDate.'</td>'.
                                '<td>'.

                                '<span class="details'.$data->id. '" style="display: none;"  data-cast="'.$data->cast. '" data-poster='.$data->poster. '   data-musicDirector="'.$data->musicDirector. '" data-about="'.$data->aboutMovie. '" ></span> 
                                <a href="" class="btn btn-success" id="viewdata"  data-id="'.$data->id. '" data-toggle="modal" data-target="#view" style=" border-radius: 0;"><span class="glyphicon glyphicon-open" aria-hidden="true"></span></a>
                    <a href="" data-toggle="modal" data-target="#edit" class="btn btn-primary" style="border-radius: 0;" data-id="'.$data->id. '" data-name="'.$data->movie_name. '" data-genres="'.$data->genres. '" data-date="'.$data->relaseDate. '" data-imdb="'.$data->imdbRating. '"><span class="glyphicon glyphicon-pencil"> </span></a>
                    <a href="" data-toggle="modal" id="deletedata" data-target="#delete" data-id="'.$data->id. '" class="btn btn-danger" style="border-radius: 0;"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>'



                                .'</td>'.
                                '<tr>';
                    }
            
                    return response()->json($result);
            

                }

                else{

                        $result="";


            $posts = UpcomingMovie::all();



                    $i = 0;
                foreach ($posts as $key => $data) {

                                $i++;

                        $result.='<tr class="data'.$data->id. '">'.
                                '<td>'.$i.'</td>'.
                                '<td class="mname'.$data->id. '">'.$data->movie_name.'</td>'.
                                '<td class="mdirector'.$data->id. '">'.$data->director.'</td>'.
                                '<td class="mgenres'.$data->id. '">'.$data->genres.'</td>'.
                                '<td class="mdate'.$data->id. '">'.$data->relaseDate.'</td>'.
                                '<td>'.

                                '<span class="details'.$data->id. '" style="display: none;"  data-cast="'.$data->cast. '" data-poster='.$data->poster. '   data-musicDirector="'.$data->musicDirector. '" data-about="'.$data->aboutMovie. '" ></span> 
                                <a href="" class="btn btn-success" id="viewdata"  data-id="'.$data->id. '" data-toggle="modal" data-target="#view" style=" border-radius: 0;"><span class="glyphicon glyphicon-open" aria-hidden="true"></span></a>
                    <a href="" data-toggle="modal" data-target="#edit" class="btn btn-primary" style="border-radius: 0;" data-id="'.$data->id. '" data-name="'.$data->movie_name. '" data-genres="'.$data->genres. '" data-date="'.$data->relaseDate. '" data-imdb="'.$data->imdbRating. '"><span class="glyphicon glyphicon-pencil"> </span></a>
                    <a href="" data-toggle="modal" id="deletedata" data-target="#delete" data-id="'.$data->id. '" class="btn btn-danger" style="border-radius: 0;"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>'



                                .'</td>'.
                                '<tr>';
                    }
            
                    return response()->json($result);
            



                }
            



    }






































}
