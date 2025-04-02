<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'credencial' => ['required', 'string', 'regex:/^[a-zA-Z]{3}\d{3}$/'],
            'password' => ['required', 'string', 'min:6'],
        ];
    }


    /**
     * Define mensagens personalizadas de validação.
     *
     * @return array<string, string>
     */
    public function messages()
    {
        return [
            'credencial.required' => 'O campo de credencial é obrigatório.',
            'credencial.regex' => 'A credencial deve ser composta por 3 letras seguidas de 3 números.',
            'password.required' => 'O campo de senha é obrigatório.',
            'password.digits' => 'A senha deve ter exatamente 6 dígitos.',
        ];
    }

    /**
     * Authenticate the user.
     *
     * @return void
     * @throws ValidationException
     */
    public function authenticate()
    {

        if (!Auth::attempt([
            'credencial' => $this->input('credencial'),
            'password' => $this->input('password')
        ], $this->filled('remember'))) {
            throw ValidationException::withMessages([
                'credencial' => ['As credenciais fornecidas não são válidas.'],
            ]);
        }
    }
}
