module.exports = {
    content: [
      './resources/views/**/*.blade.php',
      './resources/js/**/*.vue',
      './resources/css/**/*.css',
    ],
    theme: {
      extend: {},
    },
    plugins: [
      require('@tailwindcss/forms'),
      require('@tailwindcss/typography'),
    ],
  }
  