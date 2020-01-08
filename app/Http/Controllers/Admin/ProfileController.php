<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Admin\Admin;
use App\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    
     public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    public function index()
    {
        
    }

   
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        //
    }

   
    public function show($id)
    {   
        
    }

   
    public function edit($id)
    {
        $profile = Admin::find($id);
        return view('admin.profile.profile',compact('profile'));
    }

  
    public function update(Request $request, $id)
    {
        //
    }

    
    public function destroy($id)
    {
        //
    }
}
