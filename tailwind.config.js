const colors = require('tailwindcss/colors')

module.exports = {
    purge: {
        content: [
            './app/**/*.php',
            './resources/**/*.html',
            './resources/**/*.js',
            './resources/**/*.jsx',
            './resources/**/*.ts',
            './resources/**/*.tsx',
            './resources/**/*.php',
            './resources/**/*.vue',
            './resources/**/*.twig',
            './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
            './storage/framework/views/*.php',
            './resources/views/**/*.blade.php',
            './resources/CareUS/**/*.blade.php',
        ],
        options: {
            defaultExtractor: (content) => content.match(/[\w-/.:]+(?<!:)/g) || [],
            whitelistPatterns: [/-active$/, /-enter$/, /-leave-to$/, /show$/],
        },
    },
    darkMode: false, // or 'media' or 'class'
    theme: {
        extend: {
            fontFamily: {
                sans: ['Oxygen'],
            },
            fontSize: {
                'xxs': ['0.625rem', '0.75rem'],
            },
            colors: {
                'burntsienna-50': '#fef8f6',
                'burntsienna-100': '#fdf0ed',
                'burntsienna-200': '#fbdad3',
                'burntsienna-300': '#f8c4b8',
                'burntsienna-400': '#f39882',
                'burntsienna-500': '#EE6C4D',
                'burntsienna-600': '#d66145',
                'burntsienna-700': '#b3513a',
                'burntsienna-800': '#8f412e',
                'burntsienna-900': '#753526',

                'lightcyan-50': '#fdffff',
                'lightcyan-100': '#fcffff',
                'lightcyan-200': '#f7fefe',
                'lightcyan-300': '#f3fdfe',
                'lightcyan-400': '#e9fcfd',
                'lightcyan-500': '#E0FBFC',
                'lightcyan-600': '#cae2e3',
                'lightcyan-700': '#a8bcbd',
                'lightcyan-800': '#869797',
                'lightcyan-900': '#6e7b7b',

                'palecerulean-50': '#fafcfd',
                'palecerulean-100': '#f5f9fb',
                'palecerulean-200': '#e5f0f6',
                'palecerulean-300': '#d6e6f0',
                'palecerulean-400': '#b7d4e4',
                'palecerulean-500': '#98C1D9',
                'palecerulean-600': '#89aec3',
                'palecerulean-700': '#7291a3',
                'palecerulean-800': '#5b7482',
                'palecerulean-900': '#4a5f6a',

                'bdazzledblue-50': '#f5f7f9',
                'bdazzledblue-100': '#eceff2',
                'bdazzledblue-200': '#cfd6df',
                'bdazzledblue-300': '#b1bdcc',
                'bdazzledblue-400': '#778ca6',
                'bdazzledblue-500': '#3D5A80',
                'bdazzledblue-600': '#375173',
                'bdazzledblue-700': '#2e4460',
                'bdazzledblue-800': '#25364d',
                'bdazzledblue-900': '#1e2c3f',

                'gunmetal-50': '#f4f5f6',
                'gunmetal-100': '#eaebec',
                'gunmetal-200': '#caccd0',
                'gunmetal-300': '#a9adb3',
                'gunmetal-400': '#69707a',
                'gunmetal-500': '#293241',
                'gunmetal-600': '#252d3b',
                'gunmetal-700': '#1f2631',
                'gunmetal-800': '#191e27',
                'gunmetal-900': '#141920',
            },
        },
    },
    variants: {
        extend: {
            backgroundColor: ['active'],
        },
    },
    plugins: [
        require('@tailwindcss/forms'),
        /* require('@tailwindcss/typography'), */
    ],
}
