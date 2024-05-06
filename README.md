Cara Menginstall 

1. Buka CMD / PowerShell
2. Ketik git clone https://github.com/rrevanldo/sawadee-shop
3. Setelah selesai pindah direktori ke projek yang sudah diclone
4. Ketik perintah composer install / update (gunakan --ignore-platform-reqs)
5. Rename file .env.example jadi .env
6. Pada bagian DB_DATABASE=laravel ubah bagian ‘laravel’ seperti yang ada di database
7. Ketik php artisan migrate
8. Ketik php artisan db:seed
9. Ketik php artisan key:generate
10. Ketik php artisan serve untuk menjalankan aplikasi


Penjelasan Fitur yang ada :

1. Ini adalah halaman landing page, dimana saat pertamakali mengakses website SawadeeShop akan langsung otomatis ke halaman ini. Sebelum memiliki akun, Kalian bisa menekan tombol login/register lalu nanti akan diarahkan ke halaman login/register page
![Screenshot (615)](https://github.com/rrevanldo/sawadee-shop/assets/91299304/2ccbe179-aae5-4768-be17-58732c04e3e0)

2. Halaman ini adalah halaman login/register page, dimana kita bisa membuat atau masuk ke akun yang kita akan gunakan untuk transaksi di SawadeeShop
![Screenshot (616)](https://github.com/rrevanldo/sawadee-shop/assets/91299304/6a77dc4b-410d-4243-95f6-76b10a1bb3f5)
![Screenshot (617)](https://github.com/rrevanldo/sawadee-shop/assets/91299304/cf25c219-8ff6-4254-852f-1207f01804a1)

3. Setelah pengguna membuat atau masuk ke akun yang diinginkan, pengguna akan langsung diarahkan kembali ke landing page, dan tampilan navbar yang terdapat di landing page akan sedikit berubah
![Screenshot (639)](https://github.com/rrevanldo/sawadee-shop/assets/91299304/3773044d-ae05-439e-b5ec-7c575de28cf6)

4. Pada halaman ini, jika pengguna login sebagai admin, maka pengguna akan bisa langsung mengakses bagian dashboard admin, dimana banyak hal yang bisa dilakukan disini
![Screenshot (618)](https://github.com/rrevanldo/sawadee-shop/assets/91299304/99c5c59a-114f-48ad-9245-8cff05b28d08)

5. Admin bisa menambahkan produk, dimana produk ini nanti akan langsung muncul di produk list jika admin sudah mengisi semua yang ada di halamab add products 
![Screenshot (619)](https://github.com/rrevanldo/sawadee-shop/assets/91299304/40e886eb-b322-4d1d-b979-b9c43cc80911)

6. Setelah mengisi di halaman add products, nantinya produk/barang yang tadi sudah ditambahkan akan langsung masuk kedalam halaman ini, kita bisa melihat semua barang-barang yang sudah dimasukkan oleh admin
![Screenshot (620)](https://github.com/rrevanldo/sawadee-shop/assets/91299304/877237ef-e3b4-4eaf-aa29-c414ef1c76eb)

7. Namun sebelum membuat produk, alangkah baiknya admin membuat kategori terlebih dahulu pada halaman ini, admin hanya perlu menambahkan thumbnail dan juga nama untuk kategori yang akan dibuat
![Screenshot (621)](https://github.com/rrevanldo/sawadee-shop/assets/91299304/af35546c-139c-4ddb-9373-ee4cdc04adb4)

8. Lalu selanjutnya kategori akan muncul pada halaman ini, dan admin bisa melihat juga mengedit kategori yang ada pada halaman ini
![Screenshot (622)](https://github.com/rrevanldo/sawadee-shop/assets/91299304/3963c917-4e2f-4fe9-b594-b129d5b2317d)

9. Ini adalah halaman dimana admin bisa melihat semua orderan yang masuk dari pelanggan SawadeeShop, admin bisa melihat detail barang/produk apa yang dibeli oleh pelanggan, dan juga tugas admin disini adalah menerima/menolak pesanan yang dibeli pelanggan
![Screenshot (623)](https://github.com/rrevanldo/sawadee-shop/assets/91299304/b973c2ac-1486-4fe8-850c-5bc4ca930055)

10. Lalu terakhir di dashboard admin, disini admin bisa melihat semua user/pengguna yang telah mengakses SawadeeShop, admin juga bisa menghapus pengguna tersebut jika diperlukan
![Screenshot (624)](https://github.com/rrevanldo/sawadee-shop/assets/91299304/e6e2314f-feac-407d-8002-4723ca5e90e6)

11. Selanjutnya mari kita coba simulasi untuk checkout dari halaman shop ini, sebelum melakukan checkout pengguna bisa melihat-lihat dan memilih barang yang pengguna inginkan
![Screenshot (625)](https://github.com/rrevanldo/sawadee-shop/assets/91299304/04bd12f8-aa0f-4302-894e-b02de4118f45)

12. Lalu ketika pengguna menginginkan suatu barang tersebut, pengguna bisa langsung saja menekan barang yang prngguna inginkan, dan langsung akan diarahkan ke detail barang seperti pada halaman berikut ini 
![Screenshot (626)](https://github.com/rrevanldo/sawadee-shop/assets/91299304/fa2b2e5c-c8a4-44cd-a50a-acf99990ac7e)

13. Jika memang tertarik ingin membeli produk ini, pengguna bisa langsung memasukkan produk/barang ini ke keranjang, nantinya akan langsung ada muncul alert yang menunjukkan bahwa produk/barang berhasil dimasukkan ke keranjang 
![Screenshot (627)](https://github.com/rrevanldo/sawadee-shop/assets/91299304/179b766f-2de3-4488-a15f-cef7d3d8b392)

14. Pada halaman keranjan, pengguna bisa melihat semua produk yang sudah dimasukkan ke keranjang, dan pengguna bisa langsung check out pada keranjang tersebut 
![Screenshot (628)](https://github.com/rrevanldo/sawadee-shop/assets/91299304/0a7b5ac5-f648-4936-bcc7-0ea0c7bf2b88)

15. Namun, jika pengguna ingin langsung checkout semua barang yang dia inginkan di keranjang, maka pengguna bisa langsung klik bagian select all
![Screenshot (629)](https://github.com/rrevanldo/sawadee-shop/assets/91299304/3aab69de-ece5-432e-805b-a7fceaf427ae)

16. Setelah pengguna menekan tombol checkout, maka pengguna akan langsung diarahkan ke halaman ini, dimana pengguna bisa mengecek terlebih dahulu apakah sudah benar informasi data diri dari pengguna tersebut, jika belum benar maka pengguna juga bisa mengubahnya, namun jika dirasa sudah benar pengguna bisa langsung menekan tombol confirm
![Screenshot (630)](https://github.com/rrevanldo/sawadee-shop/assets/91299304/672c1e08-f269-477b-a2bb-53fb0346bb73)

17. Selanjutnya, pengguna akan langsung diarahkan ke halaman pembayaran ini, disini pengguna akan melihat jumlah total yang harus ia bayar,l 
![Screenshot (631)](https://github.com/rrevanldo/sawadee-shop/assets/91299304/d6b0ddad-fe1b-46a9-b3c8-089d1b54f839)

18. Dan pengguna bisa memilih ingin bayar menggunakan apa pada tombol choose payment method, disini kita coba pilih untuk transfer 
![Screenshot (632)](https://github.com/rrevanldo/sawadee-shop/assets/91299304/f3346650-5a05-4d6f-a5cd-765d70cee402)

19. Jika pengguna memilih transfer, maka akan langsung diarahkan ke halaman berikut ini, sudah ada tatacara bagaimana mentransfer di halaman ini, dan pengguna hanya perlu menyisipkan bukti transfer jika sudah melakukan transaksi 
![Screenshot (633)](https://github.com/rrevanldo/sawadee-shop/assets/91299304/b154e2f5-094c-4402-b15a-c288b9f20b20)

20. Setelah itu, pengguna bisa melihat semua pesanan yang ia pesan pada halaman profile bagian transaction histor
![Screenshot (634)](https://github.com/rrevanldo/sawadee-shop/assets/91299304/f7a0dbdf-469e-4538-b9da-cc543c8f1563)

21. Lalu, kembali ke dashboard admin disini orderan tadi bisa admin terima ataupun tolak, sebagai contoh maka kita coba dua-duanya 
![Screenshot (635)](https://github.com/rrevanldo/sawadee-shop/assets/91299304/0fe59b72-03a1-4519-966b-3e0a3baf83b7)

22. Nah, kalau kita kembali ke halaman pengguna, dan kita mengakses kembali ke halaman transaction history, maka kita bisa melihat perbedaan disini, dimana orderan yang diterima oleh admin akan langsung berubah status menjadi on delivery, sedangkan yang ditolak akan langsung muncul keterangan berwarna merah yang bertuliskan gagal
![Screenshot (636)](https://github.com/rrevanldo/sawadee-shop/assets/91299304/69ac3461-e405-4702-b25d-df32065de7a7)

23. Jika produk/barang sudah diterima oleh pengguna, maka pengguna bisa langsung mengkonfirmasi penerimaan di halaman bagain confirm acceptance
![Screenshot (637)](https://github.com/rrevanldo/sawadee-shop/assets/91299304/e81b42d3-54cd-446f-bedf-614b998b8869)

24. Setelah itu, jika sudah maka status barang akan berubah menjadi warna hijau yang bertuliskan selesai, tandanya bahwa barang sudah ada ditangan pengguna 
![Screenshot (638)](https://github.com/rrevanldo/sawadee-shop/assets/91299304/ef89d2a5-5447-4829-852c-338f1426b399)
