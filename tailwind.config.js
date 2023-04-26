module.exports = {
    content: ["./src/**/*.html", "./src/**/*.js", "./src/**/*.php"],
    theme: {
        extend: {
            colors: {
                'primary': '#16A34A',

                'secondary': '#E1BB80',

                'accent': '#FFC107',
                'accent-2': '#FF9800',
                'accent-3': '#FF5722',

                'accent-dark': '#e6a900',
                'accent-2-dark': '#e68f00',
                'accent-3-dark': '#e67300',

                'beige-default': '#f4f4f4',
                'beige-light': '#f8f8f8',
                'beige-dark': '#eaeaea',
                'beige-darker': '#e0e0e0',
                'beige-darkest': '#d6d6d6',

                'off-white' : '#C0C6C7',
            },
            backgroundImage: {
                'user-dashboard-bg-image': "url('/src/resource/img/user-dashboard.webp')",
                'sign-in-background-light': "url('/src/resource/img/sign-in-background-light.webp')",
                'sign-up-background-light': "url('/src/resource/img/sign-up-background-light.webp')",
                's3c2-1': "url('/src/resource/icons/index/main-section_shelf-three_c2-1_specialists.jpg')",
                's3c2-3': "url('/src/resource/icons/index/main-section_shelf-three_c2-3_expert_bg.jpg')",
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
        fontFamily: {
            'sans': ['-apple-system',
                'BlinkMacSystemFont',
                "Inter",
                'Helvetica Neue',
                'sans-serif',
                'Apple Color Emoji',
                'Segoe UI Emoji',
                'Segoe UI Symbol'],
            'mono': ['SFMono-Regular',
                'JetBrains Mono',
                ],
        }
    },
    plugins: [
        require('@tailwindcss/typography'),
    ],
    variants: {
        fill: ['hover', 'focus'],
        extend: {
            animation: ['motion-safe'],
        }
    },
}
