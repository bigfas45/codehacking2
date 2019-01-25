<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Http\Requests\UsersRequest;
use App\Http\Requests\UserEditRequest;

use App\User;
use App\Role;
use App\Photo;
// use Symfony\Component\HttpFoundation\Session\Session;

class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //


        $users = User::all();


        return view('admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $roles = Role::pluck('name', 'id')->all();

        return view('admin.user.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsersRequest $request)
    {
        //
        if(trim($request->password == '')){
            $input = $request->expect('password');
        }else{

            $input  = $request->all();

            $input['password'] = bcrypt($request->password);


        }
        
        if ($file = $request->file('photo_id')) {
           $name = time(). $file->getClientOriginalName();

           $file->move('image', $name);

           $photo = Photo::create(['file'=>$name]);

           $input['photo_id'] = $photo->id;
        }

       // return redirect('/admin/user');
       // return $request->all();
    
   
    User::create($input);

    return redirect('/admin/user');
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

        $user = User::findOrFail($id);

        $roles = Role::pluck('name', 'id')->all();

        return view('admin.user.edit', compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserEditRequest $request, $id)
    {
        //

        $user = User::findOrfail($id);


        // if(trim($request->password == '')){
        //     $input = $request->expect('password');
        // }else{


            $input  = $request->all();

            $input['password'] = bcrypt(trim($request->password));


          
        




        

        if ($file = $request->file('photo_id')){
            $name = time() . $file->getClientOriginalName();

            $file->move('image', $name);

            $photo = Photo::create(['file'=>$name]);

            $input['photo_id'] = $photo->id;

        }

        $user->update($input);

        return redirect('/admin/user');

       
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

        $user = User::findOrFail($id);
         unlink(public_path(). $user->photo->file);

         $user->delete();

        Session::flash('deleted_user', 'The user has been deleted');

        return redirect('/admin/user');


    }
}
