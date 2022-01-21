const defaultTheme = require('tailwindcss/defaultTheme');
const colors = require('tailwindcss/colors')

module.exports = {
    mode: 'jit',
    purge: [
        './vendor/spatie/laravel-support-bubble/config/**/*.php',
        './vendor/spatie/laravel-support-bubble/resources/views/**/*.blade.php',
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/views/components/*.blade.php',
        './vendor/filament/**/*.blade.php',
        './vendor/write-mv/themes/resources/views/*.blade.php',
    ],

    important: false,
    darkMode: 'media', // or 'media' or 'class'

    theme: {
        extend: {
            fontFamily: {
                sans: ['Inter', ...defaultTheme.fontFamily.sans],
                display: ['"Playfair Display"'],
            },

            colors: { 
                danger: colors.rose,
                primary: colors.blue,
                success: colors.green,
                warning: colors.yellow,

                white: '#ffffff',
                ink: '#4D4945',
                inkgray: '#ACA39D',
                paper: '#fbfaf7',
                sunsetlightishh: '#FECD83',
                sunset: '#FDCA79',
                sunsetdark: '#E4B874',
            
                transparent: 'transparent',

                wblue: '#2F71F0'
            }, 
        },
    },

    variants: {
        extend: {
            opacity: ['disabled'],
        },
    },
    plugins: [
        require('@tailwindcss/aspect-ratio'),
        require('@tailwindcss/forms'), 
        require('@tailwindcss/typography')
    ],
};
