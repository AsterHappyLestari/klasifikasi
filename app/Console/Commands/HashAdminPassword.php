<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use App\Models\Login; // Pastikan untuk mengimpor model Login

class HashAdminPassword extends Command
{
    // Nama dan deskripsi command
    protected $signature = 'admin:hash-password {username} {password}';
    protected $description = 'Hash the admin password and update in the database';

    // Constructor
    public function __construct()
    {
        parent::__construct();
    }

    // Implementasi method handle
    public function handle()
    {
        // Ambil argumen dari command line
        $username = $this->argument('username');
        $password = $this->argument('password');

        // Temukan pengguna berdasarkan username
        $user = Login::where('username', $username)->first();

        if ($user) {
            // Hash password dan simpan di database
            $user->password = Hash::make($password);
            $user->save();

            // Informasikan bahwa password telah berhasil di-hash dan diperbarui
            $this->info('Password has been hashed and updated for user: ' . $username);
        } else {
            // Jika pengguna tidak ditemukan, tampilkan pesan error
            $this->error('User not found.');
        }
    }
}
