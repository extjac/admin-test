<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


	public function __construct()
	{

	}

    /**
     * Generates token
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function token( $num=8 )
    {

    	return str_random($num);
    }

    /**
     * Generates token
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function slug( $text )
    {

        return str_slug($text);
    }



    /**
     * File upload
     *
     * @param ConsultantRequest $request
     * @return static
     */
    public function imageUpload( $request )
    {
        $imageTempName = $request->file('photo')->getPathname();

        $imageName = $request->file('photo')->getClientOriginalName();

        $path = base_path() . '/public/uploads/consultants/images/';

        $request->file('photo')->move($path , $imageName);


        $uploadSuccess  = Image::make( $file->getRealPath() )
                        ->resize( $size ,null, function ($constraint) { $constraint->aspectRatio(); })
                        ->save($destinationPath.$size .'/'.$newFilename);

        /*
        DB::table('consultants')
            ->where('photo', $imageTempName)
            ->update(['photo' => $imageName]);
        */
    }


    
    public function uploadImage( $destinationPath , $file )
    {

        //$file = Input::file('file'); // your file upload input field in the form should be named 'file'
        
        $rules = array(
            'file' => 'required|mimes:png,gif,jpeg|max:20000' 
        );

/*
        $validator = \Validator::make(  $file  , $rules);
        
        if( ! $validator->passes() )
        {
            return Redirect::to('/item/'.$id.'/images' )
            ->with('message', 'The following errors occurred')
            ->withErrors($validator)
            ->withInput();
        }            
*/
        $newFilename = $file->getClientOriginalName();
        $newFilename = date('YmdHis') .'_'.  $newFilename;

        $images_sizes = array(
            //'small'  => 100,
            //'medium' => 500,
            'large'  => 850,
            );

        foreach($images_sizes as $name => $size)
        {    
            $fullPath = $destinationPath.'/'.$newFilename;
            
            $uploadSuccess  = \Image::make( $file->getRealPath() )
            ->resize( $size ,null, function ($constraint) { 
                $constraint->aspectRatio(); 
              //  $constraint->upsize(); 
            })
            //->resize(850, 480)
            ->save( $fullPath );
        }
        if( ! $uploadSuccess )
        {
            return $uploadSuccess; 
        }
        return $newFilename; 
    }   
    


    /*
    * Clean the file name
    */
    private function cleanFileName($fileName)
    {
        //remove blanks
        $fileName = preg_replace('/\s+/', '', $fileName);
        //remove charactes
        $fileName = preg_replace("/[^A-Za-z0-9_-\s.]/", "", $fileName);

    return $fileName;
    }



}
