module.exports = {
    content: ["./src/**/*.html", "./src/**/*.js", "./src/**/*.php"],
    theme: {
        extend: {
            colors: {
                'primary': '#6A64F1',
                'secondary': '#918dea',
                'accent': '#FFC107',
                'accent-2': '#FF9800',
                'accent-3': '#FF5722',
                'beige-default': '#f4f4f4',
                'beige-light': '#f8f8f8',
                'beige-dark': '#eaeaea',
                'beige-darker': '#e0e0e0',
                'beige-darkest': '#d6d6d6',
            },
            backgroundImage: {
                'sign-in-background-light': "url('/src/resource/img/sign-in-background-light.webp')",
                'sign-up-background-light': "url('/src/resource/img/sign-up-background-light.webp')",
                'sign-in-background-dark': "url('/src/resource/img/sign-in-background-dark.webp')",
                'sign-up-background-dark': "url('/src/resource/img/sign-up-background-dark.webp')",
                'homepage-help-bg-card-1': "url('/src/resource/icons/homepage-help-bg-card-1.jpg')",
                'card-bg-homepage': "url('/src/resource/icons/milad-fakurian-PGdW_bHDbpI-unsplash.jpg')",
            },
            cursor: {
                'hand': 'pointer',
            },
            animation: {
                fadeIn: 'fadeIn 0.7s ease-in',
            },
            keyframes: {
                fadeIn: {
                    '0%': { opacity: '0' },
                    '100%': { opacity: '1' },
                },
            }
        },
    },
    plugins: [
        require('@tailwindcss/typography'),
    ],
    variants: {
        extend: {
            animation: ['motion-safe'],
        }
    },
}
