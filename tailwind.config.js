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
        "buttongreen":"#0FBA68",
      },
    },
  },
  plugins: [
    require('@tailwindcss/forms'),
  ],
}

