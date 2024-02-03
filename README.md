## Panduan Penggunaan Aplikasi

- Database version : 
- PHP version : 8.1.6
- Framework : Laravel 10

- Install 

1. Buka aplikasi di browser dan ketik alamat http://localhost:8000. Sistem akan menampilkan halaman home.
2. Klik tombol login untuk melakukan autentikasi user yang telah terdaftar.
3. Masukkan username dan password, Lalu tekan tombol login. Berikut beberapa akun yang bisa dicoba :

| Username | Password |
| ------- | ------- |
| admin | 1234 |
| atasan 1 | 1234 |
| atasan 2 | 1234 |

4. Setelah berhasil masuk, halaman dashboard akan menampilkan data-data tentang Jumlah User, Kendaraan dan grafik penggunaan kendaraan.
5. Di bagian navbar, ada beberapa menu antara lain Daftar penyewaan, Kendaraan, dan logout.
7. kita masuk ke menu Kendaraan. Di Halaman tersebut ditampilkan daftar kendaraan yang dikelola oleh Badan Pengelolaan Kendaraan. Ada fitur menginputkan pemesanan penyewaan kendaraan. Untuk mengetahui apakah kendaraan tersebut sedang disewa atau tidak, di tabel tersebut terdapat kolom yang menunjukkan tiga keterangan, yaitu status disewa, artinya kendaraan sedang digunakan oleh pegawai dan telah disetujui oleh pihak yang menyetujui. Lalu status Belum disetujui, artinya kendaraan tersebut sudah dipesan namun belum disetujui oleh pihak yang menyetujui. Status terakhir yaitu tersedia. Artinya kendaraan tersebut tersedia dan tidak ada pegawai yang menggunakannya. Selain itu, kita juga dapat memeriksa tombol pesan. Jika status kendaraan tersebut disewa atau belum disetujui, tombol pesan tidak akan bisa diakses. Begitu pun sebaliknya, jika status kendaraan tersedia, maka tombol pesan dapat diakses.
8. Coba klik tombol Pesan untuk menginputkan pemesanan kendaraan. Nantinya akan muncul modal / pop up box yang berisi form untuk menginputkan pesanan. Ada field nama kendaraan yang sudah ada nilainya, field driver atau sopir, pihak yang menyetujui, dan tanggal pemesanan. Setelah semuanya terisi, klik tambah. Otomatis keterangan atau status kendaraan berubah menjadi belum disetujui.
9. Beralih ke menu daftar penyewaan. Di menu tersebut, data yang telah kita tambahkan tadi telah muncul.
10. Berdasarkan data yang telah ditambahkan tadi, lihat atasan atau pihak yang menyetujui. Jika atasannya adalah atasan 2, Maka dari itu, kita login pada akun atasan 2 untuk mengkonfirmasi atau menyetujui penyewaan.
11. Langsung saja, kita masukkan username dan password dari atasan 2 lalu klik login.
12. Sistem akan menampilkan dashboard seperti admin tadi. Setelah itu kita pergi ke daftar penyewaan yang ada di navbar. Sama seperti Admin, sistem akan menampilkan daftar penyewaan. Bedanya, daftar penyewaan yang ditampilkan hanyalah penyewaan yang harus disetujui oleh atasan 2. Klik tombol merah yang bertuliskan Belum disetujui. Nantinya akan muncul pop up box yang berisikan dua tombol radio, Disetujui dan belum disetujui. klik tombol radio Disetujui. Setelah itu klik tombol Simpan. Otomatis tombol merah tadi berubah menjadi biru, tanda atasan telah menyetujui pemesanan kendaraan tersebut. 



<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 2000 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[WebReinvent](https://webreinvent.com/)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Jump24](https://jump24.co.uk)**
- **[Redberry](https://redberry.international/laravel/)**
- **[Active Logic](https://activelogic.com)**
- **[byte5](https://byte5.de)**
- **[OP.GG](https://op.gg)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
