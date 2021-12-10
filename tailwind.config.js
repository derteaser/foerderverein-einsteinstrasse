const colors = require('tailwindcss/colors')

module.exports = {
  mode: 'jit',
  purge: {
    content: [
      'site/snippets/**/*.php',
      'site/templates/**/*.php',
    ]
  },
  theme: {
    fontFamily: {
      body: 'Roboto, ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji"',
      heading: 'Quicksand, Roboto, ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji"',
      'sans': [
        'Roboto',
        'system-ui',
        '-apple-system',
        'BlinkMacSystemFont',
        '"Segoe UI"',
        '"Helvetica Neue"',
        'Arial',
        '"Noto Sans"',
        'sans-serif',
        '"Apple Color Emoji"',
        '"Segoe UI Emoji"',
        '"Segoe UI Symbol"',
        '"Noto Color Emoji"',
      ],
    },
    extend: {
      typography: (theme) => ({
        DEFAULT: {
          css: {
            a: {
              'font-weight': 600,
              color: theme('colors.purple.500'),
              '&:hover': {
                color: theme('colors.purple.600'),
              },
            },
            blockquote: {
              quotes: '"\\201E""\\201D""\\2018""\\2019"',
              fontStyle: 'normal',
              fontSize: theme('fontSize.xl'),
              paddingRight: theme('padding.6'),
              borderColor: theme('colors.purple.600'),
              footer: {
                fontSize: theme('fontSize.sm')
              }
            },
            img: {
              marginTop: 0,
              marginBottom: 0
            }
          },
        },
        lg: {
          css: {
            img: {
              marginTop: 0,
              marginBottom: 0
            }
          }
        }
      }),
    },
  },
  plugins: [
    require('@tailwindcss/typography'),
    require('tailwindcss-debug-screens'),
    require('@tailwindcss/aspect-ratio'),
  ],
}
