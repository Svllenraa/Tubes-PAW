/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      colors: {
        // Kita namain 'theme' biar gampang panggilnya
        'theme-bg': '#F1F3E0',    // Warna krem (buat background utama)
        'theme-soft': '#D2DCB6',  // Hijau muda pudar (buat card/section selingan)
        'theme-main': '#A1BC98',  // Hijau sage utama (buat tombol/navbar)
        'theme-dark': '#778873',  // Hijau tua (buat teks/judul/footer)
      },
    },
  },
  plugins: [],
}