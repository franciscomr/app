/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      backgroundColor:{
        skin:{
          fill:'var(--color-primary)',
        }
      },
      colors: {
        primary: 'rgb(var(--color-primary) / <alpha-value>)',
      }
    },

  },
  plugins: [],
}

