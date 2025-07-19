# Qrcode-Attendance
Website yang membuat kode QR secara otomatis yang saat discan akan membuat data baru dan mengirim pesan telegram kepada admin saat menit keterlambatan melebihi 30 menit.

# Instalasi
Instal docker pada website officialnya lalu jalankankan command
docker pull postgres

Lalu jalankan docker container dengan image postgres
docker run --name sevima-postgres -e POSTGRES_USER=sevima -e POSTGRES_PASSWORD=sevima -e POSTGRES_DB=sevima -p 5432:5432 -d postgres

Setelah itu Klon repositori menggunakan command
git clone https://github.com/FlashyRoaf/Qrcode-Attendance.git

Lalu pergi ke direktori projek dan jalankan command
composer run dev

Buka browser lalu ke localhost:8000
