/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./*.php",
    "./template-parts/**/*.php",
    "./inc/**/*.php",
    "./js/**/*.js"
  ],
  theme: {
    extend: {
      fontFamily: {
        // Interface e texto corrido.
        sans: ['Inter', 'system-ui', 'sans-serif'],
        // Títulos e números grandes. Serifa variável: dá voz ao site sem
        // depender de imagem, e conversa com o vocabulário de educação.
        display: ['Fraunces', 'Georgia', 'Times New Roman', 'serif'],
      },
      letterSpacing: {
        // Fraunces em corpo grande pede aperto; o padrão do Tailwind não chega lá.
        tightest: '-0.045em',
      },
    },
  },
  plugins: [],
}
