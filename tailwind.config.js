/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      colors: {
        'validgreen': '#0FBA68',
        'worldwidebg': '#FDFDFD',
        'primaryblue': '#2029F3',
        'primarygreen': '#0FBA68',
        'primaryyellow': '#EAD621',
      },
      backgroundColor: {
        'blue-opacity-8': 'rgba(32, 41, 243, 0.08)',
        'green-opacity-8': 'rgba(36, 158, 44, 0.08)',
        'yellow-opacity-8': 'rgba(234, 214, 33, 0.08)'
      },
      fontFamily: {
        inter: ['Inter']
      }
    },
  },
  plugins: [
    require('@tailwindcss/forms'),
    require('tailwind-scrollbar'),
  ],
}

