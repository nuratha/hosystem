module.exports = {
  content: ["./*.{html,js,php}"],
  theme: {
    extend: {},
  },
  plugins: [
    require('@tailwindcss/typography'),
    require('@tailwindcss/forms'),
    require("daisyui")
  ],
}
