<?php

namespace App\Http\Controllers;

use App\Factory;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;
use DB;
use Illuminate\Support\Str;
use App\LDAPModel;
use LdapQuery\Builder; 
use Illuminate\Http\JsonResponse;
use Carbon\Carbon;
use \StdClass;
use \Response;

use App\Login;
use App\User;

class FactoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        if(view()->exists('factory_create')){
            return View::make('factory_create');
        }
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
        //
        $data = array('title' => '', 'text' => '', 'type' => '', 'timer' => 3000);
        // do process
        $current_user = Login::getUserData()->mail;

        $factoryData = array(	
            'is_visible' => true,
            'name' => urldecode(Input::get('name')),
            'display_name' => urldecode(Input::get('display_name')),
            'colour' => urldecode(Input::get('colour'))
        );

        // Start transaction!
        DB::beginTransaction();

        try {
            // Validate, then create if valid
            $newFactory = Factory::create( $factoryData );

            $data = array(
                'title' => 'success',
                'text' => 'success',
                'type' => 'success',
                'timer' => 3000
            );
            
        }catch(\Exception $e){

            DB::rollback();

            $data = array(
                'title' => 'error',
                'text' => 'error',
                'type' => 'warning',
                'timer' => 3000
            );

            //return Response::json( $data ); 

        }

        DB::commit();
        
        return Response::json( $data );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Factory  $factory
     * @return \Illuminate\Http\Response
     */
    public function show(Factory $factory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Factory  $factory
     * @return \Illuminate\Http\Response
     */
    public function edit(Factory $factory)
    {
        //
        if(view()->exists('factory_edit')){
            return View::make('factory_edit', ['factory' => $factory]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Factory  $factory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Factory $factory)
    {
        //
        $factoryClone = clone $factory;
        $data = array('title' => '', 'text' => '', 'type' => '', 'timer' => 3000);
        // do process
        $current_user = Login::getUserData()->mail;

        $factoryData = array(
            'name' => urldecode(Input::get('name')),
            'display_name' => urldecode(Input::get('display_name')),
            'colour' => urldecode(Input::get('colour'))
        );

        // Start transaction!
        DB::beginTransaction();

        try {
            // Validate, then create if valid
            $factoryClone->update( $factoryData );
            
            $data = array(
                'title' => 'success',
                'text' => 'success',
                'type' => 'success',
                'timer' => 3000
            );

        }catch(\Exception $e){

            DB::rollback();
            $data = array(
                'title' => 'error',
                'text' => 'error',
                'type' => 'warning',
                'timer' => 3000
            );

            return redirect()->back()->withInput();

        }

        DB::commit();
        
        notify()->flash(
            $data['title'], 
            $data['type'], [
            'timer' => $data['timer'],
            'text' => $data['text'],
        ]);
        
        return redirect()->route('factory.create');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Factory  $factory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Factory $factory)
    {
        //
    }
    
    //other
    public function listFactories(Request $request){
        // Solution to get around integer overflow errors
        // $model->latest()->limit(PHP_INT_MAX)->offset(1)->get();
        // function will process the ajax request
        $draw = null;
        $start = 0;
        $length = 0;
        $search = null;
        
        $recordsTotal = 0;
        $recordsFiltered = 0;
        $query = null;
        $queryResult = null;
        //$recordsTotal = Model::where('active','=','1')->count();
        
        $draw = $request->get('draw');
        
        $factory = new Factory();
        
        $query = $factory->where('is_visible', '=', true);
        $recordsTotal = $query->count();
        $recordsFiltered = $recordsTotal;
            
        // get search query value
        if( ($request->get('search')) && (!empty($request->get('search'))) ){
            $search = $request->get('search');
            if( $search && (@key_exists('value', $search)) ){
                $search = $search['value'];
            }
            if($search && (!empty($search))){
                //$search = (string) $search;
                $query = $query->where('name', 'like', '%' . $search . '%');
            }
        }
        
        // get filtered record count
        $recordsFiltered = $query->count();
        
        // get limit value
        if( $request->get('length') ){
            $length = intval( $request->get('length') );
            $query = $query->limit($length);
        }
        // set default value for length (PHP_INT_MAX)
        if( $length <= 0 ){
            $length = PHP_INT_MAX;
            //$length = 0;
        }
        
        // get offset value
        if( $request->get('start') ){
            $start = intval( $request->get('start') );
        }else if( $request->get('page') ){
            $start = intval( $request->get('page') );
            //$start = abs( ( ( $start - 1 ) * $length ) );
            $start = ( ( $start - 1 ) * $length );
        }
        
        // filter with offset value
        if( $start > 0 ){
            //$query = $query->limit($length)->skip($start);
            $query = $query->limit($length)->offset($start);
        }
        
        // order
        $query->orderBy('id', 'desc');
        $query->orderBy('updated_at', 'desc');
        
        // get data
        $queryResult = $query->get();
        
        $recordsTotal = $recordsFiltered;
        $data = array(
            'draw' => $draw,
            'start' => $start,
            'length' => $length,
            'search' => $search,
            'recordsTotal' => $recordsTotal,
            'recordsFiltered' => $recordsFiltered,
            'data' => $queryResult,
        );
        
        return Response::json( $data );   
    }
    
}
