<?php

namespace App\Controllers;

interface ModelController
{
    /**
     * GET  /model  index   ModelController@index
     * 
     * Display a listing of the resource.
     * 
     * @return \Core\Response
     */
    public function index();


    /**
     * GET  /model/create   create  ModelController@create
     * 
     * Show the form for creating a new resource.
     *
     * @return \Core\Response
     */
    public function create();


    /**
     * POST  /model  store   ModelController@store  
     * 
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Core\Response
     */
    public function store(Request $request);


    /**
     * GET   /model/{resource}   show    ModelController@show
     * 
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Core\Response
     */
    public function show($id);
 

    /**
     * GET   /model/{resource}/edit  edit    ModelController@edit
     * 
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Core\Response
     */
    public function edit($id);


    /**
     *  PUT/PATCH    /model/{resource}   update  ModelController@update
     * 
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Core\Response
     */
    public function update(Request $request, $id);


    /**
     * DELETE    /model/{resource}   destroy     ModelController@destroy 
     * 
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Core\Response
     */
    public function destroy($id);

}
