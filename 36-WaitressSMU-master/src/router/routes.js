const routes = [
  {
    path: "/",
    component: () => import("layouts/MainLayout.vue"),
    children: [
      {
        path: "",
        component: () => import("pages/Index.vue")
      }
    ]
  },
  {
    path: "/login",
    component: () => import("layouts/LoginLayout.vue"),
    children: [
      {
        path: "",
        component: () => import("pages/Login.vue")
      }
    ]
  },
  {
    path: "/somepage",
    component: () => import("layouts/MainLayout.vue"),
    children: [
      {
        path: "",
        component: () => import("pages/SomePage.vue")
      }
    ]
  },
  {
    path: "/tables/:id",
    component: () => import("layouts/MainLayout.vue"),
    children: [
      {
        path: "",
        component: () => import("pages/tables/tablePage.vue")
      }
    ]
  },
  {
    path: "/orders/:id",
    component: () => import("layouts/MainLayout.vue"),
    children: [
      {
        path: "",
        component: () => import("pages/tables/replaceOrderPage.vue")
      }
    ]
  },
  {
    path: "/orders/:id/edit",
    component: () => import("layouts/MainLayout.vue"),
    children: [
      { path: "", component: () => import("pages/tables/editOrderPage.vue") }
    ]
  },
  {
    path: "/tables/:id/add-order",
    component: () => import("layouts/MainLayout.vue"),
    children: [
      { path: "", component: () => import("pages/tables/addOrderPage.vue") }
    ]
  },

  // Always leave this as last one,
  // but you can also remove it
  {
    path: "*",
    component: () => import("pages/Error404.vue")
  }
];

export default routes;
