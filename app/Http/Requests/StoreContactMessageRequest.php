<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreContactMessageRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        // Honeypot preenchido: deixa passar sem regras. O controller responde
        // com sucesso e não grava, para o bot não perceber o filtro.
        if (filled($this->input('_gotcha'))) {
            return [];
        }

        return [
            'nome' => ['required', 'string', 'min:2', 'max:120'],
            'email' => ['required', 'email:rfc', 'max:255'],
            'empresa' => ['nullable', 'string', 'max:160'],
            'tipo' => ['nullable', 'string', 'max:120'],
            'orcamento' => ['nullable', 'string', 'max:120'],
            'mensagem' => ['required', 'string', 'min:10', 'max:5000'],
            'rgpd' => ['accepted'],
            'locale' => ['nullable', 'in:pt,en,es'],
        ];
    }

    public function messages(): array
    {
        return [
            'nome.required' => 'Indique o seu nome.',
            'nome.min' => 'Indique o seu nome.',
            'email.required' => 'Indique um email válido.',
            'email.email' => 'Indique um email válido.',
            'mensagem.required' => 'Escreva pelo menos 10 caracteres.',
            'mensagem.min' => 'Escreva pelo menos 10 caracteres.',
            'rgpd.accepted' => 'É necessário aceitar para enviar.',
        ];
    }
}
