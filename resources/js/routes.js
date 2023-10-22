const routes = [
    {
        name: 'dashboard', path: '/dashboard', component: require('./components/dashboard.vue').default
    },
    {
        name: 'roles', path: '/roles', component: require('./components/roles.vue').default
    },
    {
        name: 'permissions', path: '/permissions', component: require('./components/permissions.vue').default
    },
    {
        name: 'users', path: '/users', component: require('./components/users.vue').default
    },
    {
        name: 'systemUsers', path: '/systemUsers', component: require('./components/systemUsers.vue').default
    },
    {
        name: 'settings', path: '/settings', component: require('./components/settings.vue').default
    },
    {
        name: 'profile', path: '/profile', component: require('./components/profile.vue').default
    },
    {
        name: 'productCategories', path: '/productCategories', component: require('./components/productCategories.vue').default
    },
    {
        name: 'units', path: '/units', component: require('./components/units.vue').default
    },
    {
        name: 'taxes', path: '/taxes', component: require('./components/taxes.vue').default
    },
    {
        name: 'products', path: '/products', component: require('./components/products.vue').default
    },
    {
        name: 'paymentMethods', path: '/paymentMethods', component: require('./components/paymentMethods.vue').default
    },
    {
        name: 'expenses', path: '/expenses', component: require('./components/expenses.vue').default
    },
    {
        name: 'orderStatuses', path: '/orderStatuses', component: require('./components/orderStatuses.vue').default
    },
    {
        name: 'cities', path: '/cities', component: require('./components/cities.vue').default
    },
    {
        name: 'orders', path: '/orders', component: require('./components/orders.vue').default
    },
    {
        name: 'brands', path: '/brands', component: require('./components/brands.vue').default
    },
    {
        name: 'stockEntries', path: '/stockEntries', component: require('./components/stockEntries.vue').default
    },
    {
        name: 'stockAdjustments', path: '/stockAdjustments', component: require('./components/stockAdjustments.vue').default
    },
    {
        name: 'homeSliders', path: '/homeSliders', component: require('./components/homeSliders.vue').default
    },
    {
        name: 'customers', path: '/customers', component: require('./components/customers.vue').default
    },
    {
        name: 'orderPayments', path: '/orderPayments', component: require('./components/orderPayments.vue').default
    },
    {
        name: 'campaigns', path: '/campaigns', component: require('./components/campaigns.vue').default
    },
    {
        name: 'customerReport', path: '/customerReport', component: require('./components/reports/customerReport.vue').default
    },
    {
        name: 'stockAdjustmentReport', path: '/stockAdjustmentReport', component: require('./components/reports/stockAdjustmentReport.vue').default
    },
    {
        name: 'ordersReport', path: '/ordersReport', component: require('./components/reports/ordersReport.vue').default
    },
    {
        name: 'stockReport', path: '/stockReport', component: require('./components/reports/stockReport.vue').default
    },
    {
        name: 'generalPushNotifications', path: '/generalPushNotifications', component: require('./components/generalPushNotifications.vue').default
    },
    {
        name: 'productFlavours', path: '/productFlavours', component: require('./components/productFlavours.vue').default
    },
];
export default routes;