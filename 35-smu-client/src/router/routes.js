const routes = [
  {
    path: "/",
    component: () => import("layouts/MainLayout.vue"),
    children: [{ path: "", component: () => import("pages/Index.vue") }],
  },
  {
    path: "/branches/:branch_slug/menus/:id",
    component: () => import("layouts/MainLayout.vue"),
    children: [{ path: "", component: () => import("pages/menus/menu.vue") }],
  },
  {
    path: "/receipt",
    component: () => import("layouts/MainLayout.vue"),
    children: [{ path: "", component: () => import("pages/receipt.vue") }],
  },
  {
    path: "/search",
    component: () => import("layouts/MainLayout.vue"),
    children: [{ path: "", component: () => import("pages/search.vue") }],
  },
  {
    path: "/restaurants",
    component: () => import("layouts/MainLayout.vue"),
    children: [{ path: "", component: () => import("pages/restaurants.vue") }],
  },
  {
    path: "/scan/:table",
    component: () => import("layouts/MainLayout.vue"),
    children: [
      {
        path: "",
        component: () => import("pages/scan.vue"),
      },
    ],
  },
  {
    path: "/orders-history",
    component: () => import("layouts/MainLayout.vue"),
    children: [
      {
        path: "",
        component: () => import("pages/orders-history.vue"),
      },
    ],
  },
  {
    path: "/menus",
    component: () => import("layouts/MainLayout.vue"),
    children: [
      {
        path: "",
        component: () => import("pages/menus.vue"),
      },
    ],
  },
  {
    path: "/payment/success/:order_id",
    component: () => import("layouts/MainLayout.vue"),
    children: [
      {
        path: "",
        component: () => import("pages/payment/success.vue"),
      },
    ],
  },
  {
    path: "/payment/failed",
    component: () => import("layouts/MainLayout.vue"),
    children: [
      {
        path: "",
        component: () => import("pages/payment/failed.vue"),
      },
    ],
  },
  {
    path: "/payment/details",
    component: () => import("layouts/MainLayout.vue"),
    children: [
      {
        path: "",
        component: () => import("pages/payment/details.vue"),
      },
    ],
  },
  {
    path: "/payment/order-details",
    component: () => import("layouts/MainLayout.vue"),
    children: [
      {
        path: "",
        component: () => import("pages/payment/order-details.vue"),
      },
    ],
  },

  // Always leave this as last one,
  // but you can also remove it
  {
    path: "*",
    component: () => import("pages/Error404.vue"),
  },
];

export default routes;
