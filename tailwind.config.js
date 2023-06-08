module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/flowbite/**/*.js"
    ],
    theme: {
        extend: {
            colors:{
                'orange-pinky' :'#E3293F',
                'orange-pinky-500' :'#fc4157',
                'orange-yellow':'#cfb054',
                'orange-yellow-500':'#e2be3f'
            }
        },
    },
    plugins: [
        require('flowbite/plugin'),
        require('tailwindcss-animated')
    ],
}
