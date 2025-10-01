/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  darkMode: 'class',
  theme: {
    extend: {
      colors: {
        'dorado': '#FFD700',
        'azul-rey': '#4169E1',
        'negro': '#000000',
        'gris-oscuro': '#333333',
        'negro-oscuro': '#121212',
        'marron-claro': '#D2B48C',
        'marron-oscuro': '#A52A2A',
      },

      boxShadow: {
        'marron-claro': '0 4px 6px rgba(91, 83, 72, 0.2)', // sombra cálida suave
      },
    },
  },
  plugins: [],
}
