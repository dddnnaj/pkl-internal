<?php
namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Izinkan user yang login update profilnya
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Aturan validasi update profil
     */
    public function rules(): array
    {
        return [
            // Nama
            'name'    => [
                'required',
                'string',
                'max:255',
            ],

            // Email (unik kecuali email user sendiri)
            'email'   => [
                'required',
                'string',
                'lowercase',
                'email',
                'max:255',
                Rule::unique(User::class)->ignore($this->user()->id),
            ],

            // Nomor HP (opsional, format Indonesia)
            'phone'   => [
                'nullable',
                'string',
                'max:20',
                'regex:/^(\+62|62|0)8[1-9][0-9]{6,10}$/',
            ],

            // Alamat
            'address' => [
                'nullable',
                'string',
                'max:500',
            ],

            // Avatar
            'avatar'  => [
                'nullable',
                'image',
                'mimes:jpeg,jpg,png,webp',
                'max:2048',
                'dimensions:min_width=100,min_height=100,max_width=2000,max_height=2000',
            ],
        ];
    }

    /**
     * Pesan error custom
     */
    public function messages(): array
    {
        return [
            'email.unique'      => 'Email ini sudah digunakan oleh pengguna lain.',
            'phone.regex'       => 'Format nomor telepon tidak valid. Gunakan 08xx atau +628xx.',
            'avatar.max'        => 'Ukuran foto maksimal 2MB.',
            'avatar.dimensions' => 'Dimensi foto harus antara 100x100 hingga 2000x2000 pixel.',
        ];
    }

    /**
     * Nama field biar error lebih manusiawi
     */
    public function attributes(): array
    {
        return [
            'name'    => 'nama',
            'email'   => 'alamat email',
            'phone'   => 'nomor telepon',
            'address' => 'alamat',
            'avatar'  => 'foto profil',
        ];
    }
}
