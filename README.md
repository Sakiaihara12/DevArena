DevArena
DevArena is a turn-based card battle web game with a cyberpunk theme, designed to make learning fullstack web development interactive, engaging, and fun. It combines strategic card-collecting mechanics (gacha with a Pity System), deck building, and a trivia quiz system where answering programming questions correctly grants attack damage multipliers.

This project was built as the Final Project for Fullstack Web Development (Kelompok 13 - Group 13) at STT Terpadu Nurul Fikri.

Key Features (MVP Scope)
- Player Authentication: Secure registration and login powered by Laravel Sanctum.

- Gacha System: Summon cards using in-game currency, complete with a built-in Pity System to guarantee high-rarity pulls.

- Inventory & Card Upgrade: Manage acquired cards, view duplicate materials, and upgrade card levels.

- Deck Builder: Assemble and configure an active battle deck of up to 5 strategic cards.

- PvP & Bot Matches: Test your skills in turn-based 1v1 matches against AI Bots or other players (using API polling).

- Trivia Combat Integration: Every attack prompt is preceded by a programming trivia question covering HTML, CSS, JavaScript, React, Laravel, and SQL. Correct answers award a 1.2x damage multiplier.

- Match History: Review past match results and performance.

* Tech Stack *
Backend
Framework: Laravel 11 / 12 (RESTful API)

Database: MySQL (Relational schema with 8 custom tables)

Authentication: Laravel Sanctum

ORM: Eloquent ORM & Database Migrations

Frontend
Library: ReactJS (Vite)

Styling: Tailwind CSS (Cyberpunk aesthetic)

Animations: Framer Motion

* Database Architecture (8 Core Tables)
1. users – Manages player profiles, in-game currency (gold), and pity_counter.

2. cards – Master list of cards, including stats (attack, rarity, effect_type).

3. user_inventories – Tracks cards owned by players, including card levels and duplicate counts for upgrades.

4. decks – Stores user-created custom decks.

5. deck_cards – Pivot table mapping cards to specific deck slots (1–5).

6. questions – Bank of fullstack trivia questions categorized by topic with multiple-choice options.

7. matches – Tracks match room codes, modes (bot / pvp), and session statuses.

8. match_players – Relates players to active matches and tracks match winners.


====================================================================================================

DevArena
DevArena adalah game web turn-based card battle bertema cyberpunk yang dirancang untuk membuat proses belajar fullstack web development menjadi interaktif, seru, dan menyenangkan. Game ini menggabungkan mekanik pengumpulan kartu strategis (gacha dengan Pity System), penyusunan deck, dan sistem kuis trivia di mana jawaban yang benar memberikan pengganda damage serangan.

Proyek ini dibuat sebagai Tugas Akhir Fullstack Web Development (Kelompok 13) di STT Terpadu Nurul Fikri.

Fitur Utama (Cakupan MVP)

- Autentikasi Pemain: Registrasi dan login aman yang didukung oleh Laravel Sanctum.

- Sistem Gacha: Summon kartu menggunakan gold dalam game, lengkap dengan Pity System untuk menjamin perolehan kartu dengan rarity tinggi.

- Inventaris & Upgrade Kartu: Kelola kartu yang dimiliki, lihat bahan kartu duplikat, dan tingkatkan level kartu.

- Deck Builder: Susun dan atur deck bertanding aktif hingga maksimal 5 kartu strategis.

- Pertandingan PvP & Bot: Uji kemampuan dalam pertandingan turn-based 1v1 melawan AI Bot atau pemain lain (menggunakan polling API).

- Integrasi Kuis Trivia: Setiap serangan didahului oleh soal trivia pemrograman yang mencakup HTML, CSS, JavaScript, React, Laravel, dan SQL. Jawaban benar memberikan bonus damage 1.2x.

- Riwayat Pertandingan: Tinjau hasil dan performa pertandingan sebelumnya.

* Tech Stack *
Backend
Framework: Laravel 11 / 12 (RESTful API)

Database: MySQL (Skema relasional dengan 8 tabel utama)

Autentikasi: Laravel Sanctum

ORM: Eloquent ORM & Database Migrations

Frontend
Library: ReactJS (Vite)

Styling: Tailwind CSS (Estetika Cyberpunk)

Animasi: Framer Motion

* Arsitektur Database (8 Tabel Utama)
1. users – Mengelola profil pemain, mata uang game (gold), dan pity_counter.

2. cards – Master data kartu, termasuk statistik (attack, rarity, effect_type).

3. user_inventories – Mencatat kartu yang dimiliki pemain, level kartu, serta jumlah duplikat untuk upgrade.

4. decks – Menyimpan deck kustom yang dibuat pemain.

5. deck_cards – Tabel pivot yang menghubungkan kartu ke slot deck tertentu (1–5).

6. questions – Bank soal trivia fullstack yang dikategorikan berdasarkan topik beserta pilihan ganda.

7. matches – Mencatat kode room pertandingan, mode (bot / pvp), dan status sesi.

8. match_players – Menghubungkan pemain ke pertandingan aktif dan mencatat pemenang pertandingan.

====================================================================================================

~ Team Members (Group 13) ~

Syahrul Giga Wahyudi – STT Terpadu Nurul Fikri

Muhammad Riandana Pranatha – STT Terpadu Nurul Fikri

Syaiful Ilham – STT Terpadu Nurul Fikri

Muhammad Bintang Gunawan – STT Terpadu Nurul Fikri

Ahmad Parid Hidayat – STT Terpadu Nurul Fikri
