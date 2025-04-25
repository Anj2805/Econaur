/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      colors: {
        primary: '#0d2f2f',
        secondary: '#d2e526',
      },
    },
  },
  plugins: [
    require('@tailwindcss/forms'),
  ],
} 