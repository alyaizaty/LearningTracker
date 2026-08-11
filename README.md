# 📚 Learning Tracker

Aplikasi web untuk menjejak (track) pembelajaran saya sepanjang latihan industri (internship) di bidang IT — merangkumi PHP, CodeIgniter, Docker, dan Oracle Database.

## 🔗 Live Demo

Cuba app ni secara live: **[learningtracker.page.gd](http://learningtracker.page.gd/topics)**

## 🎯 Tentang Projek

Learning Tracker dibina untuk membantu saya menyusun dan memantau topik-topik yang dipelajari sepanjang tempoh latihan industri di **Pusat Ekosistem Digital (PED), UMT**. Setiap topik boleh ditanda sebagai selesai (done) atau belum selesai, dan sistem akan memaparkan peratus progress secara automatik.

## ✨ Ciri-ciri (Features)

- ➕ Tambah topik pembelajaran baru dengan kategori (PHP, Docker, CodeIgniter, Oracle/OCI8, MySQL)
- ✅ Tanda topik sebagai selesai / belum selesai
- 🗑️ Padam topik
- 📊 Papar statistik progress (jumlah topik, jumlah selesai, peratus)

## 🛠️ Tech Stack

- **Backend:** PHP 8.5, CodeIgniter 4
- **Database:** MySQL
- **Frontend:** HTML, CSS (custom "dev-log" theme)
- **Hosting:** InfinityFree

## 🚀 Cara Install & Run Secara Local

1. Clone repository ini:
   ```bash
   git clone https://github.com/alyaizaty/LearningTracker.git
   cd LearningTracker
   ```

2. Install dependencies guna Composer:
   ```bash
   composer install
   ```

3. Salin fail `env` kepada `.env`, dan tetapkan konfigurasi database:
   ```env
   CI_ENVIRONMENT = development

   database.default.hostname = localhost
   database.default.database = learning_tracker
   database.default.username = root
   database.default.password =
   database.default.DBDriver = MySQLi
   database.default.port = 3306
   ```

4. Buat database `learning_tracker` dan table `topics`:
   ```sql
   CREATE TABLE topics (
       id INT AUTO_INCREMENT PRIMARY KEY,
       title VARCHAR(255) NOT NULL,
       category VARCHAR(100) NOT NULL,
       is_done TINYINT(1) DEFAULT 0,
       created_at DATETIME DEFAULT CURRENT_TIMESTAMP
   );
   ```

5. Jalankan development server:
   ```bash
   php spark serve
   ```

6. Buka browser di `http://localhost:8080/topics`

## 📋 Server Requirements

- PHP 8.2 atau lebih tinggi
- Extension: `intl`, `mbstring`, `mysqlnd`

## 👤 Dibina Oleh

**Nur Alia Izzati Binti Kamrul**
Ijazah Sarjana Muda Sains Komputer (Informatik Maritim) dengan Kepujian
Latihan Industri di Pusat Ekosistem Digital (PED), UMT

---

*Projek ini dibina sebagai sebahagian daripada aktiviti pembelajaran sepanjang latihan industri.*