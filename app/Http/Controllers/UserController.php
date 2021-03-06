<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator, Image, Auth, Config, Str, Hash;
use App\User;

class UserController extends Controller
{
    public function __Construct() {
        $this->middleware('auth');
    }

    public function getAccountEdit() {
        $birthday = (is_null(Auth::user()->birthday)) ? [null,null,null] : explode('-', Auth::user()->birthday);
        $data = ['birthday' => $birthday];
        return view('user.account_edit', $data);
    }

    // controlador para el usuario
    public function postAccountAvatar(Request $request) {
        $rules = [
            'avatar' => 'required'
        ];
        $messages = [
            'avatar.required' => 'Seleccione una imagen'
        ];

        // validacion
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) :
            return back()->withErrors($validator)->with('message', 'Se ha producido un error')->with('typealert', 'danger')->withInput();
        else:
            if($request->hasFile('avatar')):
                $path = '/'.Auth::id();
                $fileExt = trim($request->file('avatar')->getClientOriginalExtension());
                $upload_path = Config::get('filesystems.disks.uploads_user.root');
                $name = Str::slug(str_replace($fileExt, '', $request->file('avatar')->getClientOriginalName()));

                $filename = rand(1, 999).'_'.$name.'.'.$fileExt;
                $file_file = $upload_path.'/'.$path.'/'.$filename;

                $u = User::find(Auth::id());
                $aa = $u->avatar;
                $u->avatar = $filename;

                // abre el if
                if($u->save()):
                    if($request->hasFile('avatar')):
                        $fl = $request->avatar->storeAs($path, $filename, 'uploads_user');
                        $img = Image::make($file_file); // $file_file es la hubicacion de la imagen
                        $img->fit(256, 256, function($constraint) {
                            $constraint->upsize();
                        });
                        $img->save($upload_path.'/'.$path.'/av_'.$filename);
                    endif;
                    unlink($upload_path.'/'.$path.'/'.$aa);
                    unlink($upload_path.'/'.$path.'/av_'.$aa);
                    return back()->with('message', 'Avatar Actualizado Con ??xito.')->with('typealert', 'success');
                endif;
                // cierra el if

            endif;

        endif;
    }

    public function postAccountPassword(Request $request) {
        $rules = [
            'apassword' => 'required|min:8',
            'password' => 'required|min:8',
            'cpassword' => 'required|min:8|same:password',

        ];

        $messages = [
            'apassword.required' => 'Escriba Su Contrase??a Actual',
            'apassword.min' => 'La Contrase??a Actual Debe De Tener Al Menos 8 Caracteres',

            'password.required' => 'Escriba Su Nueva Contrase??a',
            'password.min' => 'Su Nueva Contrase??a Debe De Tener Al Menos 8 Caracteres',

            'cpassword.required' => 'Confirme Su Nueva Contrase??a',
            'cpassword.min' => 'La Confirmaci??n De La Nueva Contrase??a Debe De Tener Al Menos 8 Caracteres',
            'cpassword.same' => 'Las Contrase??as No Coinciden'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) :
            return back()->withErrors($validator)->with('message', 'Se ha producido un error')->with('typealert', 'danger')->withInput();
        else:
            $u = User::find(Auth::id());
            if(Hash::check($request->input('apassword'), $u->password)):
                $u->password = Hash::make($request->input('password'));

                // Validacion para cuando pase
                if($u->save()):
                    return back()->with('message', 'La Contrase??a Se Actualizo Con ??xito.')->with('typealert', 'success');
                endif;
            else:
                return back()->with('message', 'Su Contrase??a Actual Es Erronea.')->with('typealert', 'danger');
            endif;
        endif;
    }

    public function postAccountInfo(Request $request)
    {
        $rules = [
            'name' => 'required',
            'lastname' => 'required',
            'phone' => 'required|min:8',
            'year' => 'required',
            'day' => 'required'

        ];

        $messages = [
            'name.required' => 'Su Nombre Es Requerido',
            'lastname.required' => 'Su Apellido Es Requerido',
            'phone.required' => 'Su Numero De Telefono Es Requerido',
            'phone.min' => 'El Numero De Telefono Debe Tener Como Minimo 8 Digitos',
            'year' => 'Su A??o De Nacimiento Es Requerido',
            'day' => 'Su Dia De Nacimiento Es Requerido'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) :
            return back()->withErrors($validator)->with('message', 'Se ha producido un error')->with('typealert', 'danger')->withInput();
        else:
            $date = $request->input('year').'-'.$request->input('month').'-'.$request->input('day');
            $u = User::find(Auth::id());
            $u->name = e($request->input('name'));
            $u->lastname = e($request->input('lastname'));
            $u->phone = e($request->input('phone'));
            $u->birthday = date("Y-m-d", strtotime($date));
            $u->gender = e($request->input('gender'));

            // validacion
            if($u->save()):
                return back()->with('message', 'Su Informaci??n Se Actualizo Con ??xito.')->with('typealert', 'success');
            endif;
        endif;
    }
}
