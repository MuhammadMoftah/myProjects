/*
** TailwindCSS Configuration File
**
** Docs: https://tailwindcss.com/docs/configuration
** Default: https://github.com/tailwindcss/tailwindcss/blob/master/stubs/defaultConfig.stub.js
*/
module.exports = {
   theme: {
      fontFamily: {
         sans: [
            'Roboto',
            'system-ui',
            '-apple-system',
            'BlinkMacSystemFont',
            '"Segoe UI"',
            'Roboto',
            '"Helvetica Neue"',
            'Arial',
            '"Noto Sans"',
            'sans-serif',
            '"Apple Color Emoji"',
            '"Segoe UI Emoji"',
            '"Segoe UI Symbol"',
            '"Noto Color Emoji"',
         ],
         serif: ['Georgia', 'Cambria', '"Times New Roman"', 'Times', 'serif'],
         mono: ['Menlo', 'Monaco', 'Consolas', '"Liberation Mono"', '"Courier New"', 'monospace'],
      },
   },
   variants: {
      borderRadius: ['responsive', 'first','last'],
      borderWidth: ['responsive', 'first','last'],
      display: ['responsive', 'group-hover'],
   },
   plugins: [
      require('tailwindcss-rtl')
   ],
   purge: {
      // Learn more on https://tailwindcss.com/docs/controlling-file-size/#removing-unused-css
      enabled: process.env.NODE_ENV === 'production',
      content: [
         'components/**/*.vue',
         'layouts/**/*.vue',
         'pages/**/*.vue',
         'plugins/**/*.js',
         'nuxt.config.js'
      ]
   }
}
