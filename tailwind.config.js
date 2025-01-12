import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],

    theme: {
        container: {
            center: true,
        },
        extend: {
            fontFamily: {
                sans: ['Inter', 'Figtree', ...defaultTheme.fontFamily.sans],
            },
            backgroundImage: {
                'hero-pattern': "url('/public/assets/hero-bg.jpeg')",
              }
        },
        colors: {
            'north-star-blue': '#1F3E97',
            'black-mana': '#858585',
            'olympian-blue': '#18378F',
            'white': '#FFFFFF',
            'white-smoke': '#F4F4F4',
            'mithril-color' : '#878787',
            'brilliant-licorice' : '#525252',
            'fiftieth-shade' : '#515151',
            'titanium-white' : '#E5E5E5',
            'gainsboro' : '#D9D9D9',
            'blue-blue' : '#263AD1',
            'orange' : '#FFB800',
            'orange-800' : '#FF632F',
            'black' : '#000000',
        }
    },

    plugins: [forms, typography],
};
