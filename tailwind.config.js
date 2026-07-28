/**
 * Paleta da marca Send: #080b6c (azul profundo), #4a78b0 (azul) e branco.
 *
 * Em vez de reescrever classe por classe em vinte arquivos, as escalas do
 * Tailwind que o tema já usava (`slate`, `blue`, `indigo`, `violet`) foram
 * REDEFINIDAS a partir dessas duas cores. Assim `text-slate-400` deixa de ser
 * o cinza genérico e vira um neutro azulado da marca, e `bg-blue-600` vira o
 * #4a78b0 — sem tocar nos templates.
 *
 * Os tons não foram escolhidos no olho: saíram de mistura linear entre as
 * cores da marca, o branco e o preto, com o contraste de cada um conferido
 * contra o fundo (#030429). Os que ficaram abaixo de 4.5:1 só entram em texto
 * grande, ícone ou borda.
 *
 * @type {import('tailwindcss').Config}
 */

// Neutros azulados: branco caminhando até o fundo da marca.
const neutro = {
  50:  '#f7f7f9',
  100: '#ededf0',
  200: '#d9d9df',
  300: '#b8b9c3', // parágrafos sobre o escuro — contraste 10.1
  400: '#8b8c9d', // legendas — contraste 5.9
  500: '#6d6d83',
  600: '#54546d',
  700: '#3a3b58',
  800: '#212243',
  900: '#121336',
  950: '#07082c',
};

// Azul da marca (#4a78b0 no 600), clareando para cima e caindo no #080b6c.
const azul = {
  50:  '#f1f4f9',
  100: '#e2e9f2',
  200: '#c5d4e6',
  300: '#96b1d1', // contraste 9.0
  400: '#7296c1', // contraste 6.5 — cor de link no escuro
  500: '#5883b6',
  600: '#4a78b0', // A COR DA MARCA
  700: '#335298',
  800: '#1f3184',
  900: '#080b6c', // A OUTRA COR DA MARCA
  950: '#050746',
};

// Família do azul profundo, para onde iam os antigos indigo/violeta.
const profundo = {
  50:  '#f0f0f6',
  100: '#e1e2ed',
  200: '#c4c4dc',
  300: '#9799c1',
  400: '#7576ad',
  500: '#4d4f95',
  600: '#2b2d81',
  700: '#080b6c',
  800: '#060956',
  900: '#050741',
  950: '#030429',
};

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
        // Poppins é a fonte da marca. Uma família só, com hierarquia feita por
        // peso e espacejamento — 800 apertado nos títulos, 400 no texto.
        sans: ['Poppins', 'system-ui', 'sans-serif'],
        display: ['Poppins', 'system-ui', 'sans-serif'],
      },
      colors: {
        marca: {
          profundo: '#080b6c',
          azul:     '#4a78b0',
          fundo:    '#030429', // fundo do site: o azul profundo escurecido
          bloco:    '#050741', // superfície elevada
        },
        slate:  neutro,
        gray:   neutro,
        blue:   azul,
        sky:    azul,
        indigo: profundo,
        violet: profundo,
        purple: profundo,
        fuchsia: profundo,
      },
      letterSpacing: {
        tightest: '-0.045em',
      },
    },
  },
  plugins: [],
}
