Cara Menginstall 

Buka CMD / PowerShell
Ketik git clone https://github.com/rrevanldo/12108722-Revan-Rionaldo-Paket-2
Setelah selesai pindah direktori ke projek yang sudah diclone
Ketik perintah composer install / update (gunakan --ignore-platform-reqs)
Rename file .env.example jadi .env
Pada bagian DB_DATABASE=laravel ubah bagian ‘laravel’ seperti yang ada di database
Ketik php artisan migrate
Ketik php artisan db:seed
Ketik php artisan key:generate
Ketik php artisan serve untuk menjalankan aplikasi


Penjelasan Fitur yang ada
