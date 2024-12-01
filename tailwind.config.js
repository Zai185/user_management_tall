import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {

    presets: [
        require('./vendor/tallstackui/tallstackui/tailwind.config.js')
    ],
    content: [

        './vendor/tallstackui/tallstackui/src/**/*.php',
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                primary: '#3895d3',
                'primary-hover': '#3895f3',
                'primary-text': '#eee'
            },
            fontSize:{
                sm: '12px',
                base : '14px',
                md: '17px',
                lg: '20px',
                xl: '24px',
                '2xl' : '29px',
                '3xl' : '35px',
                '4xl' : '42px'
            }
        },
    },
    plugins: [forms],
};
