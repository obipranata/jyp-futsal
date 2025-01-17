import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';
const colors = require('tailwindcss/colors');

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        "./node_modules/flowbite/**/*.js"
    ],

    theme: {
        container: {
            center: true,
            screens: {
                xl: "1133px",
            },
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
            current: colors.current,
            transparent: colors.transparent,
            black: colors.black,
            white: colors.white,
            slate: colors.slate,
            gray: colors.gray,
            cyan: colors.cyan,
            blue: colors.blue,
            orange: colors.orange,
            green: colors.green,
            teal: colors.teal,
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
        }
    },

    safelist: [
        {
            pattern: /bg-(red|green|blue)-(100|200|300|400|500|600|700|800|900)/,
          },
    ],

    plugins: [
        forms, typography,
        require('flowbite/plugin')
    ],
};
