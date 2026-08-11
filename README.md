# Learning Tracker

Aplikasi web untuk menjejak dan memantau pembelajaran sepanjang tempoh latihan industri dalam bidang IT — merangkumi PHP, CodeIgniter, Docker, dan Oracle Database.

**Live Demo:** [learningtracker.page.gd](http://learningtracker.page.gd/topics)

---

## Tentang Projek

Learning Tracker dibangunkan sebagai sebahagian daripada latihan industri. Sistem ini membolehkan pengguna menyusun, menjejak, dan memantau kemajuan pembelajaran topik-topik teknikal secara berstruktur sepanjang tempoh latihan.

Setiap topik pembelajaran dikategorikan mengikut bidang berkaitan dan boleh ditanda sebagai selesai atau belum selesai, dengan sistem memaparkan statistik kemajuan secara automatik.

## Ciri-ciri Sistem

- Penambahan topik pembelajaran baharu mengikut kategori (PHP, Docker, CodeIgniter, Oracle/OCI8, MySQL, dan lain-lain)
- Penandaan status topik sebagai selesai atau belum selesai
- Pemadaman topik yang tidak lagi relevan
- Paparan statistik kemajuan secara masa nyata (jumlah topik, topik selesai, peratus kemajuan)

## Tech Stack

| Kategori | Teknologi |
|---|---|
| Backend | PHP 8.5, CodeIgniter 4 |
| Pangkalan Data | MySQL |
| Frontend | HTML, CSS |
| Hosting | InfinityFree |
| Version Control | Git & GitHub |

## Pemasangan dan Konfigurasi Tempatan

**1. Klonkan repositori**
```bash
git clone https://github.com/alyaizaty/LearningTracker.git
cd LearningTracker
```

**2. Pasang dependencies menggunakan Composer**
```bash
composer install
```

**3. Konfigurasi persekitaran**

Salin fail `env` kepada `.env`, kemudian kemas kini tetapan pangkalan data:
```env
CI_ENVIRONMENT = development

database.default.hostname = localhost
database.default.database = learning_tracker
database.default.username = root
database.default.password =
database.default.DBDriver = MySQLi
database.default.port = 3306
```

**4. Sediakan struktur pangkalan data**
```sql
CREATE TABLE topics (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    category VARCHAR(100) NOT NULL,
    is_done TINYINT(1) DEFAULT 0,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);
```

**5. Jalankan pelayan pembangunan**
```bash
php spark serve
```

Akses aplikasi melalui `http://localhost:8080/topics`

## Keperluan Sistem

- PHP 8.2 atau lebih tinggi
- Extension PHP: `intl`, `mbstring`, `mysqlnd`
- Composer
- MySQL 5.7 atau lebih tinggi

## Struktur Projek

```
LearningTracker/
├── app/
│   ├── Controllers/Topics.php
│   ├── Models/TopicModel.php
│   └── Views/topics/index.php
├── public/
├── system/
├── writable/
└── .env
```

## Pembangun

**Nur Alia Izzati Binti Kamrul**
Ijazah Sarjana Muda Sains Komputer (Informatik Maritim) dengan Kepujian
Universiti Malaysia Terengganu



---

*Projek ini dibangunkan sebagai sebahagian daripada aktiviti latihan industri untuk mengukuhkan kemahiran praktikal dalam pembangunan aplikasi web.*