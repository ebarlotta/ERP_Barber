<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
        ])->validate();

        // return User::create([
        //     'name' => $input['name'],
        //     'email' => $input['email'],
        //     'password' => Hash::make($input['password']),
        // ]);

        $user = User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);
        // Asigna al usuario la Empresa de Prueba
        DB::table('empresa_usuarios')->insert(['empresa_id' => '1', 'user_id' => $user->id,]);

        // // Asigna los 
        // DB::table('empresa_modulos')->insert(['modulo_id' => '1', 'empresa_id' => 1,]);
        // DB::table('empresa_modulos')->insert(['modulo_id' => '2', 'empresa_id' => 1,]);
        // DB::table('empresa_modulos')->insert(['modulo_id' => '3', 'empresa_id' => 1,]);
        // DB::table('empresa_modulos')->insert(['modulo_id' => '4', 'empresa_id' => 1,]);
        // DB::table('empresa_modulos')->insert(['modulo_id' => '5', 'empresa_id' => 1,]);
        // DB::table('empresa_modulos')->insert(['modulo_id' => '6', 'empresa_id' => 1,]);
        // DB::table('empresa_modulos')->insert(['modulo_id' => '7', 'empresa_id' => 1,]);

        // Asigna al usuario los módulos de prueba 
        DB::table('modulo_usuarios')->insert(['modulo_id' => '1', 'user_id' => $user->id,]);
        DB::table('modulo_usuarios')->insert(['modulo_id' => '2', 'user_id' => $user->id,]);
        DB::table('modulo_usuarios')->insert(['modulo_id' => '3', 'user_id' => $user->id,]);
        DB::table('modulo_usuarios')->insert(['modulo_id' => '4', 'user_id' => $user->id,]);
        DB::table('modulo_usuarios')->insert(['modulo_id' => '5', 'user_id' => $user->id,]);
        DB::table('modulo_usuarios')->insert(['modulo_id' => '6', 'user_id' => $user->id,]);
        DB::table('modulo_usuarios')->insert(['modulo_id' => '7', 'user_id' => $user->id,]);

        return $user;
    }
}
