<?php

namespace Database\Seeders;

use App\Models\Question;
use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    public function run(): void
    {
        // [kategori, soal, A, B, C, D, jawaban benar]
        $questions = [
            // HTML
            ['HTML', 'Tag HTML untuk membuat hyperlink adalah?', '<link>', '<a>', '<href>', '<url>', 'B'],
            ['HTML', 'Atribut untuk teks alternatif pada gambar adalah?', 'title', 'src', 'alt', 'desc', 'C'],
            ['HTML', 'Tag heading dengan ukuran paling besar adalah?', '<h6>', '<head>', '<header>', '<h1>', 'D'],
            ['HTML', 'Elemen untuk membuat daftar bernomor adalah?', '<ol>', '<ul>', '<li>', '<dl>', 'A'],
            ['HTML', 'Tipe input yang menyembunyikan karakter kata sandi adalah?', 'text', 'hidden', 'password', 'secret', 'C'],

            // CSS
            ['CSS', 'Properti CSS untuk mengubah warna teks adalah?', 'font-color', 'color', 'text-color', 'foreground', 'B'],
            ['CSS', 'Selector untuk elemen dengan id "menu" adalah?', '.menu', '*menu', '#menu', 'menu', 'C'],
            ['CSS', 'Properti untuk mengatur jarak antar item di dalam flexbox adalah?', 'gap', 'margin-between', 'spacing', 'item-space', 'A'],
            ['CSS', 'Satuan yang relatif terhadap font-size elemen root (html) adalah?', 'em', 'rem', 'px', 'vh', 'B'],
            ['CSS', 'Nilai position yang membuat elemen tetap di tempat saat halaman di-scroll adalah?', 'static', 'relative', 'absolute', 'fixed', 'D'],

            // JavaScript
            ['JavaScript', "Apa output dari kode berikut?\nconsole.log(typeof null);", '"null"', '"object"', '"undefined"', '"number"', 'B'],
            ['JavaScript', 'Kata kunci untuk variabel yang nilainya tidak bisa di-assign ulang adalah?', 'var', 'let', 'const', 'static', 'C'],
            ['JavaScript', "Apa hasil dari ekspresi berikut?\n\"5\" + 3", '8', '"53"', '35', 'Error', 'B'],
            ['JavaScript', 'Method array untuk menambah elemen di bagian akhir adalah?', 'push()', 'pop()', 'shift()', 'unshift()', 'A'],
            ['JavaScript', 'Operator === membandingkan apa?', 'Nilai saja', 'Tipe data saja', 'Nilai dan tipe data', 'Panjang data', 'C'],

            // React
            ['React', 'Hook untuk menyimpan state di function component adalah?', 'useEffect', 'useState', 'useRef', 'useMemo', 'B'],
            ['React', 'Atribut JSX pengganti "class" di HTML adalah?', 'class', 'cssClass', 'className', 'styleName', 'C'],
            ['React', 'Prop yang wajib diberikan saat me-render list agar React bisa melacak item adalah?', 'id', 'key', 'index', 'ref', 'B'],
            ['React', 'useEffect dengan dependency array kosong [] dijalankan kapan?', 'Setiap render', 'Tidak pernah', 'Sekali setelah komponen pertama kali tampil', 'Setiap state berubah', 'C'],
            ['React', 'Cara mengirim data dari komponen parent ke child adalah lewat?', 'state', 'props', 'useEffect', 'localStorage', 'B'],

            // Laravel
            ['Laravel', 'Perintah untuk membuat controller baru adalah?', 'php artisan make:controller', 'php artisan new:controller', 'composer make:controller', 'php artisan create:controller', 'A'],
            ['Laravel', 'File tempat mendefinisikan route API adalah?', 'routes/web.php', 'routes/api.php', 'app/routes.php', 'config/routes.php', 'B'],
            ['Laravel', 'Nama ORM bawaan Laravel adalah?', 'Doctrine', 'Hibernate', 'Eloquent', 'Sequelize', 'C'],
            ['Laravel', 'Perintah untuk menjalankan migration adalah?', 'php artisan db:migrate', 'php artisan migrate', 'php artisan run:migration', 'composer migrate', 'B'],
            ['Laravel', 'Package resmi Laravel untuk autentikasi token API yang ringan adalah?', 'Passport', 'Sanctum', 'Breeze', 'Socialite', 'B'],

            // SQL
            ['SQL', 'Perintah SQL untuk mengambil data dari tabel adalah?', 'GET', 'SELECT', 'FETCH', 'PULL', 'B'],
            ['SQL', 'Klausa untuk menyaring baris data sebelum dikelompokkan adalah?', 'WHERE', 'ORDER BY', 'GROUP BY', 'HAVING', 'A'],
            ['SQL', 'JOIN yang hanya mengembalikan baris yang cocok di kedua tabel adalah?', 'LEFT JOIN', 'RIGHT JOIN', 'INNER JOIN', 'FULL JOIN', 'C'],
            ['SQL', 'Fungsi untuk menghitung jumlah baris adalah?', 'SUM()', 'COUNT()', 'TOTAL()', 'NUM()', 'B'],
            ['SQL', 'Constraint yang memastikan nilai kolom tidak boleh sama (duplikat) adalah?', 'NOT NULL', 'DEFAULT', 'UNIQUE', 'CHECK', 'C'],
        ];

        foreach ($questions as [$category, $text, $a, $b, $c, $d, $answer]) {
            Question::updateOrCreate(
                ['question_text' => $text],
                [
                    'category'       => $category,
                    'option_a'       => $a,
                    'option_b'       => $b,
                    'option_c'       => $c,
                    'option_d'       => $d,
                    'correct_answer' => $answer,
                ]
            );
        }
    }
}
