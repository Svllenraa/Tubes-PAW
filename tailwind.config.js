/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', 'sans-serif'], // Font bawaan Laravel
            },
            // BAGIAN INI YANG PENTING:
            colors: {
                'theme-bg': '#F1F3E0',    // Krem
                'theme-soft': '#D2DCB6',  // Hijau Pudar
                'theme-main': '#A1BC98',  // Hijau Sage
                'theme-dark': '#778873',  // Hijau Tua
            },
        },
    },

    plugins: [import('@tailwindcss/forms')],
};