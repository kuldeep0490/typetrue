module.exports = {
  purge: [
    './resources/**/*.html',
    './resources/**/*.vue',
    './resources/**/*.js',
    './resources/**/*.scss',
  ],
  theme: {
    extend: {
      colors: {
        primary: '#FB5975'
      }
    },

    minHeight: {
      '150': '150px',
      '64': '64px'
    }
  },
  variants: {},
  plugins: [],
  prefix: 'tw-',
}
