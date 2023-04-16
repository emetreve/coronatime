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
        "validgreen":"#0FBA68",
        'worldwidebg':"#FDFDFD"
      },
    },
  },
  plugins: [
    require('@tailwindcss/forms'),
  ],
}

