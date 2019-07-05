<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<h1 align="center">Sistem Informasi Seni dan Budaya</h1>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
</p>

## Tentang
Sistem Informasi Seni dan Budaya adalah aplikasi berbasis web sederhana untuk menyimpan data seni dan budaya daerah.

## Fitur
Fitur yang tersedia di aplikasi ini adalah sebagai berikut
1. Kelola data Sanggar Seni
2. Kelola data Alat Musik Tradisional
3. Kelola data Tari Tradisional
4. Kelola data Upacara Adat
5. Kelola data Upacara Ritual
6. Kelola data Permainan Tradisional
7. Kelola data Cagar Budaya
8. Kelola Data Tempat Wisata
9. Kelola Data Kecamatan
10. Perbarui user password
11. Backup dan Restore Database
12. Print list data
13. Flash message perubahan data

## Cara Install

### Persyaratan
Aplikasi ini dapat diinstal pada local dan online server dengan spesifikasi
1. PHP 7.2 (Laravel 5.8)
2. Database MySQL atau MariaDB
3. Database SQLite (untuk automated testing)

### Langkah Instalasi
Langkah untuk menginstal aplikasi
1. Clone repo dengan perintah : `git clone https://github.com/orcome/direktori-seni-budaya.git`
2. `cd direktori-seni-budaya`
3. `composer install`
4. `cp .env.example .env`
5. `php artisan key:generate`
6. Buat database baru di MySQL
7. Set database yang digunakan pada file `.env`
8. `php artisan migrate`
9. `php artisan serve`
10. Selesai (register user baru untuk menggunakan aplikasi)

## Testing
Aplikasi ini dibangun menggunakan testing (TDD) menggunakan SQLite database
`vendor/bin/phpunit`

## Screenshots
Berikut adalah beberapa tampilan aplikasi
#### Dashboard
![Dashboard](public/images/Dashboard.png "Dashboard")

#### List
![List](public/images/List.png "List")

#### Input
![Input](public/images/Input.png "Input")

#### Edit
![Edit](public/images/Edit.png "Edit")

#### Delete
![Delete](public/images/Delete.png "Delete")

#### Layout Print
![Layout Print](public/images/Layout-Print.png "Layout Print")

#### Change Password
![Change Password](public/images/Change-Password.png "Change Password")

#### Backup and Restore Database
![Backup and Restore Database](public/images/Backup-and-Restore-Database.png "Backup and Restore Database")

#### Testing
![Testing](public/images/Testing.png "Testing")

## License
Sistem Informasi Seni dan Budaya adalah software open-source dengan license [MIT license](LICENSE).


