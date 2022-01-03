module.exports = {
    content: [
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
  theme: {
    extend: {
        colors: {
            site_primary_color: '#111827',
            site_primary_color_hover: '#0f172a',
            site_secondary_color: '#F05340',
            site_secondary_color_hover: '#d84a39'
        },
    },
  },
  plugins: [],
}
