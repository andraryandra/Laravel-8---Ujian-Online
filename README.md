# Ujian Online
Aplikasi Ujian Pilihan Ganda Berbasis Komputer

## Kebutuhan Server

Aplikasi ini dibangun diatas Framework <a href="https://laravel.com/docs/8.x" target="_blank" title="silahkan buka di tab baru, dengan klik kanan atau klik CTRL + clik">Laravel 8</a> dan MySQL versi 7.4. Sebelum menjalankan aplikasi ini, silahkan disiapkan terlebih dahulu beberapa software dan ekstension berikut:

- PHP versi 7.4 keatas
- MySQL
- Browser (lebih direkomendasikan Chrome versi 60 keatas

Anda dapat menggunakan beberapa paket yang siap pakai untuk mempersingkat proses instalasi aplikasi ini.

## Instalasi

Disini akan saya jelaskan proses instalasi pada sistem operasi Windows.

Pertama silahkan download XAMPP, silahkan download <a href="https://www.apachefriends.org/download.html" target="_blank" title="silahkan buka di tab baru, dengan klik kanan atau klik CTRL + clik">disini</a>.
Silahkan install XAMPP yang telah berhasil Anda download. Pastikan dikomputer Anda belum terinstall PHP & MySQL untuk menghindari konflik port. Apabila sebelumnya telah ada, silahkan cek versi PHP harus 7.4.

Setelah berhasil menginstal PHP dan MySQL (dalam paket XAMPP), kita lanjutkan install composer dan gitbash.

Untuk composer silahkan download <a href="https://getcomposer.org/download/" target="_blank" title="silahkan buka di tab baru, dengan klik kanan atau klik CTRL + clik">disini</a>.

Untuk gitbash silahkan download <a href="https://git-scm.com/downloads" target="_blank" title="silahkan buka di tab baru, dengan klik kanan atau klik CTRL + clik">disini</a>.

Silahkan instal composer dan git bash di komputer server Anda. Setelah semua berhasil diinstal dengan benar kita bisa mulai clone aplikasi ini ke komputer kita.

Buka command prompt (gitbash) lalu arahkan ke folder htdocs (ada didalam folder xampp, misal Anda menginstal di C. Berarti Anda harus ke folder C:\\xampp\htdocs).

Setelah itu ketikan:
```
git clone https://github.com/andraryandra/Laravel-8---Ujian-Online.git
```

Tunggu sampai file selesai di clone ke folder htdocs server Anda, lalu masuk ke folder <b>Laravel-8---Ujian-Online</b> dengan mengetikan (```cd Laravel-8---Ujian-Online```) pada command prompt (gitbash) Anda, lalu ketikan :

```
composer install
```

```
php artisan key:generate
```
Buka browser dan ketikan url http://localhost/phpmyadmin. Lalu buat database baru dengan nama <b>laravel_belajar_cobaan</b>. Setelah itu ketikan script berikut pada command promt:
```
php artisan migrate
```
Atau
```
php artisan migrate --seed
```
Untuk Menambahkan data valid Faker bisa menggunakan command berikut.
```
php artisan db:seed
```

Setelah proses diatas berhasil dilalui tanpa hambatan, silahkan akses di browser url http://localhost:8000/login untuk mengakses aplikasi ujian atau juga http://localhost:8000 / http://127.0.0.1:8000 dengan menjalankan server via cmd.

```
php artisan serve
```

Untuk login sebagai Super Admin silahkan gunakan username: <b>superadmin</b>, password: <b>superadmin</b>
Untuk login sebagai Admin Sekolah silahkan gunakan username: <b>adminMTS</b>, password: <b>admin</b>
Untuk login sebagai Siswa Sekolah silahkan gunakan username: <b>siswaMTS1</b>, password: <b>passwordMTS</b>


## Info Tambahan

Aplikasi ini bersifat terbuka, siapapun dipersilahkan untuk menjadi kontributor untuk meningkatkan kualitas aplikasi ini.

Buat yang telah berhasil menggunakan, jangan lupa untuk kasih bintang ya supaya aplikasi kita ini semakin dikenal luas dan membawa manfaat lebih banyak lagi bagi dunia pendidikan kita.
