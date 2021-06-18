<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(20);
        return view('pages.Admin.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.Admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'no_hp' => 'required',
            
        ],[
            'name.required' => 'Nama tidak boleh kosong',
            'email.required' => 'Email tidak boleh kosong',
            'no_hp.required' => 'No Handphone tidak boleh kosong',
            'email.unique' => 'Email ini sudah tersedia',
        ]
        );
            $code = Carbon::now();
            $code = $code->year.$code->month;
            $check = User::count();
            $data = bcrypt($request->np);
            if( $check == 0 )
            {
                $urut = 1;
                $np = "BataraTv" . $code . $urut;
                User::create([
                   'Nomor_pelanggan' => $np,
                   'name' => $request->name,
                   'email' => $request->email,
                   'no_hp' => $request->no_hp,
                   'alamat' => $request->alamat,
                   'tagihan' => $request->tagihan,
                   'roles' => $request->roles,
                   'password' => $data,
               ]);
            }else{
                $last = User::all()->last();
                $get = (int)substr($last->Nomor_pelanggan,13) + 1;
                $np = "BataraTv" . $code . $get;
                User::create([
                    'Nomor_pelanggan' => $np,
                    'name' => $request->name,
                    'email' => $request->email,
                    'no_hp' => $request->no_hp,
                    'alamat' => $request->alamat,
                    'tagihan' => $request->tagihan,
                    'roles' => $request->roles,
                    'password' => $data,
                ]);
            }
            return back()->withToastSuccess('Data user berhasil di tambah');;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrfail($id);
        return view('pages.Admin.users.edit', compact('user'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $item = User::findOrfail($id);
        if($request->password)
        {
            $data['password'] = bcrypt($request->password);
        }else{
            unset($data['password']);
        }
        $item->update($data);
        return back()->withToastSuccess('Data user berhasil di hapus');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = User::findOrfail($id);
        $data->delete();
        return back()->withToastSuccess('Data user berhasil di hapus');
    }
}
