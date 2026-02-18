import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    safelist: [
        'bg-red-400', 'bg-red-500',
        'bg-blue-400', 'bg-blue-500',
        'bg-green-400', 'bg-green-500',
        'bg-yellow-400', 'bg-yellow-500',
        'bg-purple-400', 'bg-purple-500',
        'bg-pink-400', 'bg-pink-500',
        'bg-indigo-400', 'bg-indigo-500',
        'bg-gray-400', 'bg-gray-500',
        'bg-rose-400', 'bg-rose-500',
        'bg-teal-400', 'bg-teal-500',
        'bg-emerald-400', 'bg-emerald-500',
        'bg-orange-400', 'bg-orange-500',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [forms],
};
