<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class ProfileController extends Controller
{
    /**
     * Mostrar página de configurações
     */
    public function settings()
    {
        return view('profile.settings');
    }

    /**
     * Mostrar página de confirmação de deletar perfil
     */
    public function delete()
    {
        return view('profile.delete');
    }

    /**
     * Deletar perfil do usuário
     * 
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        // Validar os dados de confirmação
        $validated = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
            'confirm_delete' => ['required', 'accepted'],
        ], [
            'email.required' => 'Email é obrigatório.',
            'email.email' => 'Email inválido.',
            'password.required' => 'Senha é obrigatória.',
            'confirm_delete.required' => 'Você deve confirmar que entende as consequências.',
            'confirm_delete.accepted' => 'Você deve aceitar para continuar.',
        ]);

        /** @var User $user */
        $user = Auth::user();

        // Verificar se o email corresponde
        if ($validated['email'] !== $user->email) {
            return back()
                ->withInput()
                ->withErrors(['email' => 'O email não corresponde ao da sua conta.']);
        }

        // Verificar se a senha está correta
        if (!Hash::check($validated['password'], $user->password)) {
            return back()
                ->withInput()
                ->withErrors(['password' => 'Senha incorreta.']);
        }

        // Deletar todos os links do usuário primeiro
        $user->links()->delete();

        // Fazer logout
        Auth::logout();

        // Deletar o usuário
        $user->delete();

        // Invalida a sessão
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')
            ->with('success', 'Sua conta foi deletada permanentemente. Sentiremos sua falta! 😢');
    }

    /**
     * Mostrar página de editar perfil
     * 
     * @return \Illuminate\View\View
     */
    public function edit()
    {
        return view('profile.edit');
    }

    /**
     * Atualizar informações do perfil
     * 
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        /** @var User $user */
        $user = Auth::user();

        // Validar os dados
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'password' => ['nullable', 'string', 'min:6', 'confirmed'],
            'current_password' => ['required'],
        ], [
            'name.required' => 'Nome é obrigatório.',
            'name.string' => 'Nome deve ser um texto.',
            'name.max' => 'Nome não pode ter mais de 255 caracteres.',
            'password.min' => 'Senha deve ter no mínimo 6 caracteres.',
            'password.confirmed' => 'As senhas não correspondem.',
            'current_password.required' => 'Senha atual é obrigatória.',
        ]);

        // Verificar se a senha atual está correta
        if (!Hash::check($validated['current_password'], $user->password)) {
            return back()
                ->withInput()
                ->withErrors(['current_password' => 'Senha atual incorreta.']);
        }

        // Atualizar nome
        $user->name = $validated['name'];

        // Atualizar senha se fornecida
        if ($validated['password']) {
            $user->password = Hash::make($validated['password']);
        }

        $user->save();

        return back()
            ->with('success', 'Perfil atualizado com sucesso! ✅');
    }
}

