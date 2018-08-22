Nova.booting((Vue, router) => {
    router.addRoutes([
        {
            name: 'tinker-tool',
            path: '/tinker-tool',
            component: require('./components/Tool'),
        },
    ])
})
