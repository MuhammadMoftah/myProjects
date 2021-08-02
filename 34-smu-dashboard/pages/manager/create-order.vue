<template>
  <main class="w-full h-screen px-4 overflow-auto">
    <section class="flex items-end justify-end py-4">
      <transition name="slide-fade" appear>
        <button
          class="px-2 py-1 my-1 text-sm text-green-500 capitalize border border-blue-200 rounded hover:bg-green-200"
          @click="
            $store.commit('modal/set', ['addNewItem', null, $t('add'), null])
          "
        >
          <font-awesome-icon :icon="['fas', 'plus']" />
          <span class="font-bold">{{ $t("add_item") }} </span>
        </button>
      </transition>
    </section>

    <section class="flex flex-wrap items-start">
      <section
        class="grid w-full grid-cols-1 gap-3 pt-4 lg:w-2/3 md:grid-cols-2"
      >
        <label>
          <h2 class="my-1 text-sm font-bold text-gray-800 capitalize">
            {{ $t("select_order_type") }}
          </h2>
          <select name="option" id="" class="w-full input" v-model="orderType">
            <option
              :value="order.id"
              v-for="order in orderTypes"
              :key="order.id"
            >
              {{ order.name }}
            </option>
          </select>
        </label>

        <!-- select table -->
        <label v-if="orderType === 1">
          <h2 class="my-1 text-sm font-bold text-gray-800 capitalize">
            {{ $t("select_table") }}
          </h2>
          <select
            name="option"
            id=""
            class="w-full input"
            v-model="selectedTable"
          >
            <option v-for="table in AvTables" :key="table.id" :value="table">
              {{ $t("tables.table") }} {{ table.number }}
            </option>
          </select>
        </label>

        <!-- customer phone  -->
        <label v-if="orderType !== 1">
          <h2 class="my-1 text-sm font-bold text-gray-800 capitalize">
            {{ $t("phone") }}
          </h2>
          <input type="number" class="input" v-model.lazy="phone" />
          <span
            v-if="userIsExist === 'exist'"
            class="block text-sm font-bold text-blue-500"
          >
            {{ $t("this_user_exist") }}
          </span>

          <span
            v-if="userIsExist === 'new_user'"
            class="block text-sm font-bold text-green-500"
          >
            {{ $t("this_new_user") }}
          </span>
        </label>

        <!-- customer name  -->
        <label v-if="orderType !== 1">
          <h2 class="my-1 text-sm font-bold text-gray-800 capitalize">
            {{ $t("customer_name") }}
          </h2>
          <input type="text" class="input" v-model="name" />
        </label>

        <!-- payment -->
        <label v-if="orderType !== 1">
          <h2 class="my-1 text-sm font-bold text-gray-800 capitalize">
            {{ $t("payment") }}
          </h2>
          <select name="option" class="w-full input" v-model="paymentStatus">
            <option :value="true">{{ $t("paid") }}</option>
            <option :value="false">{{ $t("not_paid") }}</option>
          </select>
        </label>

        <!-- customer addresses -->
        <label v-if="orderType === 3 && userIsExist === 'exist'">
          <h2 class="my-1 text-sm font-bold text-gray-800 capitalize">
            {{ $t("address") }}
          </h2>
          <select name="option" class="w-full input" v-model="address">
            <option
              :value="add"
              v-for="add in userData.addresses"
              :key="add.id"
            >
              {{ add.name }}: {{ add.number }} {{ add.street }}, {{ add.city }},
              {{ add.country }}
              <span v-if="add.state"> ({{ add.state }}) </span>
            </option>
          </select>
          <button
            class="block mt-1 text-sm font-bold text-green-500 hover:underline"
            @click="
              $store.commit('modal/set', [
                'addNewAddress',
                null,
                $t('add'),
                null,
              ])
            "
          >
            <font-awesome-icon :icon="['fas', 'plus']" />
            {{ $t("add_address") }}
          </button>
        </label>

        <!-- note -->
        <label>
          <h2 class="my-1 text-sm font-bold text-gray-800 capitalize">
            {{ $t("note") }}
          </h2>
          <textarea
            rows="2"
            v-model="note"
            type="text"
            class="resize-none input"
          />
        </label>
      </section>

      <!-- cart section  -->
      <section
        class="w-full px-3 mt-5 border rounded shadow-lg lg:w-1/3"
        v-if="cart.total"
      >
        <div
          class="w-full px-2 py-3 border-b"
          style="min-height: 50px"
          v-for="product in cart.products"
          :key="product.id"
        >
          <p class="flex justify-between py-1 font-semibold text-gray-800">
            <span class="font-bold">
              {{ product.quantity }} {{ product.name }}
            </span>

            <span> {{ product.display_price }} </span>
          </p>

          <div class="flex justify-between mt-2 text-sm text-gray-700">
            <p class="flex justify-between px-1 text-sm text-gray-700">
              <span v-if="product.product_variation">
                <template v-for="type in product.product_variation">
                  <template v-for="op in type.options">
                    {{ op.name }}
                  </template>
                </template>
              </span>
            </p>

            <div class="flex justify-center text-sm rounded" role="group">
              <button
                class="px-2 py-1 mx-0 text-gray-800 bg-white border border-r-0 border-gray-800 rounded-l-lg outline-none hover:bg-gray-800 hover:text-white"
                @click="editQuantity(product, product.quantity + 1)"
              >
                <font-awesome-icon :icon="['fal', 'plus']" />
              </button>
              <button
                class="w-12 px-2 py-1 mx-0 text-gray-800 bg-white border border-gray-800 outline-none"
              >
                {{ product.quantity }}
              </button>
              <button
                class="px-2 py-1 mx-0 text-gray-800 bg-white border border-l-0 border-gray-800 rounded-r-lg outline-none hover:bg-gray-800 hover:text-white"
                @click="editQuantity(product, product.quantity - 1)"
              >
                <font-awesome-icon :icon="['fal', 'minus']" />
              </button>
            </div>
          </div>
        </div>

        <!-- payment details  -->
        <p class="flex justify-between h-8 px-3 mt-4 text-gray-800 capitalize">
          <span> {{ $t("subtotal") }}</span>
          <span> {{ cart.formatted }} EGP </span>
        </p>
        <p class="flex justify-between h-8 px-3 text-gray-800 capitalize">
          <span> VAT {{ cart.vat.percentage }}% </span>
          <span> {{ cart.vat.value }} </span>
        </p>
        <p class="flex justify-between h-8 px-3 text-gray-800 capitalize">
          <span>
            {{ $t("services") }}
            {{ cart.services.percentage }}%
          </span>
          <span> {{ cart.services.value }} </span>
        </p>
        <p
          class="flex justify-between h-8 px-3 mb-3 font-bold text-gray-800 capitalize"
        >
          <span> {{ $t("menu.total_price") }} </span>
          <span> {{ cart.final_total }} </span>
        </p>
      </section>

      <!-- empty cart section  -->
      <section
        class="w-full px-3 mt-5 border rounded shadow-lg lg:w-1/3"
        v-else
      >
        <button
          class="block w-64 h-64 px-2 mx-auto text-2xl font-bold text-center text-gray-400 capitalize bg-white cursor-default"
        >
          <font-awesome-icon
            :icon="['fas', 'shopping-cart']"
            class="block mx-auto mb-1 text-6xl"
          />
          {{ $t("empty") }}
        </button>
      </section>
    </section>

    <!-- order actions -->
    <section class="block w-full mt-6 text-center">
      <button
        class="w-full max-w-xs px-2 py-2 mx-1 mt-5 text-center text-white capitalize bg-blue-500 rounded hover:bg-blue-400"
        @click="createOrder()"
        v-if="
          (cart.total && userIsExist === 'exist') ||
          (cart.total && orderType === 1)
        "
      >
        <span class="font-bold"> {{ $t("create_order") }} </span>
      </button>

      <button
        class="w-full max-w-xs px-2 py-2 mx-1 mt-5 text-center text-white capitalize bg-gray-600 rounded hover:bg-gray-500"
        @click="archiveOrder()"
        v-if="
          (cart.total && userIsExist === 'exist') ||
          (cart.total && orderType === 1)
        "
      >
        <span class="font-bold"> {{ $t("archive_order") }} </span>
      </button>

      <button
        class="w-full max-w-xs px-2 py-2 mx-1 mt-5 text-center text-white capitalize bg-green-500 rounded hover:bg-green-400"
        @click="createUser()"
        v-if="userIsExist === 'new_user'"
      >
        <span class="font-bold"> {{ $t("create_user") }} </span>
      </button>
    </section>

    <AddNewItemModal
      @sendItem="getItem"
      v-if="$store.state.modal.show === 'addNewItem'"
    />

    <AddNewAddressModal
      @sendAddress="getAddress"
      v-if="$store.state.modal.show === 'addNewAddress'"
    />
    <!-- loader section  -->
    <div
      class="fixed top-0 left-0 z-50 flex items-center justify-center w-full h-full bg-white bg-opacity-50"
      v-show="loader"
    >
      <img src="~/assets/red-spinner.gif" alt="loading" />
    </div>
  </main>
</template>

<script>
import AddNewItemModal from "~/components/create_order/AddNewItemModal";
import AddNewAddressModal from "~/components/create_order/AddNewAddressModal";

export default {
  components: {
    AddNewItemModal,
    AddNewAddressModal,
  },
  async fetch() {
    // set route name
    this.$store.commit("locales/setRouteName", "create_order");

    //get aviable tables
    this.getAvTables();

    // get cart
    this.getCart();

    // get order types
    this.getOrderTypes();
  },
  fetchOnServer: false,
  activated() {
    this.$fetch();
    // console.log(this);
  },
  data() {
    return {
      orderType: 1,
      AvTables: [],
      selectedTable: "",
      name: "",
      phone: "",
      address: "",
      note: "",
      cart: [],
      loader: false,
      orderTypes: [],
      paymentStatus: "",
      userIsExist: "",
      userData: "",
      addresses: [
        {
          id: 1,
          name: "Home",
          details: "18 Reno St, Ain shams",
        },
        {
          id: 2,
          name: "Work",
          details: "21 Haram St, Gizza",
        },
      ],
    };
  },

  methods: {
    createUser() {
      const payload = {
        name: this.name,
        phone: this.phone,
      };
      this.$axios
        .post("/members", payload)
        .then((res) => {
          this.userData = res.data.data;
          this.userIsExist = "exist";
          this.$store.dispatch("noti/pushTableNoti", {
            head: "",
            body: res.data.message,
          });
        })
        .catch((err) => {
          for (const error in err.response?.data.errors) {
            this.$store.dispatch("noti/pushError", {
              body: err.response.data.errors[error][0],
            });
          }
        });
    },
    getItem(obj) {
      this.loader = true;
      let variations = [];
      if (obj.dishSize) {
        variations = [obj.dishSize, ...obj.extras, ...obj.sideDishes];
      } else {
        variations = [...obj.extras, ...obj.sideDishes];
      }
      const payload = {
        note: "",
        products: [
          {
            id: obj.dishID,
            variations,
            quantity: obj.quantity,
          },
        ],
      };
      if (this.orderType === 1) {
        payload.table = this.selectedTable.id;
      }

      this.$axios
        .post(`/cart`, payload)
        .then((res) => {
          //close modal
          this.$store.commit("modal/set", []);
          //update cart
          this.cart = res.data.data;
          this.loader = false;
        })
        .catch((err) => {
          this.loader = false;
          for (const error in err.response?.data.errors) {
            this.$store.dispatch("noti/pushError", {
              body: err.response.data.errors[error][0],
            });
          }
        });
    },
    getAddress(v) {
      this.loader = true;
      const payload = { ...v };
      this.$axios
        .post(`members/${this.userData.id}/addresses`, payload)
        .then(() => {
          this.loader = false;
          this.getUser(this.phone);
        })
        .catch((err) => {
          this.loader = false;
          for (const error in err.response?.data.errors) {
            this.$store.dispatch("noti/pushError", {
              body: err.response.data.errors[error][0],
            });
          }
        });
    },
    getAvTables() {
      this.$axios
        .get("/tables?status=300")
        .then((res) => {
          this.AvTables = res.data.data;
        })
        .catch((err) => {
          for (const error in err.response?.data.errors) {
            this.$store.dispatch("noti/pushError", {
              body: err.response.data.errors[error][0],
            });
          }
        });
    },
    getOrderTypes() {
      this.$axios.get("orders/types").then((res) => {
        this.orderTypes = res.data.data;
      });
    },
    getCart() {
      this.loader = true;
      this.$axios
        .get(`/cart`)
        .then((res) => {
          this.cart = res.data.data;
          this.loader = false;
        })
        .catch((err) => {
          this.loader = false;
          for (const error in err.response?.data.errors) {
            this.$store.dispatch("noti/pushError", {
              body: err.response.data.errors[error][0],
            });
          }
        });
    },
    removeFromCart(item) {
      this.loader = true;
      this.$axios
        .delete(`/cart/${item.cart_id}`)
        .then((res) => {
          this.cart = res.data.data;
          this.loader = false;
        })
        .catch((err) => {
          this.loader = false;
          for (const error in err.response?.data.errors) {
            this.$store.dispatch("noti/pushError", {
              body: err.response.data.errors[error][0],
            });
          }
        });
    },
    editQuantity(item, quantity) {
      this.loader = true;
      if (quantity === 0) {
        this.removeFromCart(item);
        return;
      }

      this.$axios
        .patch(`/cart/` + item.cart_id, {
          id: item.id,
          quantity: quantity,
        })
        .then((res) => {
          this.loader = false;
          this.cart = res.data.data;
        })
        .catch((err) => {
          this.loader = false;
          for (const error in err.response?.data.errors) {
            this.$store.dispatch("noti/pushError", {
              body: err.response.data.errors[error][0],
            });
          }
        });
    },
    createOrder() {
      if (this.orderType === 3 && !this.address) {
        this.$store.dispatch("noti/pushError", {
          head: "",
          body: "enter your address",
        });
      }
      const payload = {
        type_id: this.orderType,
        name: this.name,
        phone: this.phone,
        address_id: this.orderType == 3 ? this.address.id : 0,
        payment_status: this.paymentStatus,
        table: this.selectedTable.id,
      };
      if (this.orderType === 1) {
        delete payload.name;
        delete payload.phone;
        delete payload.address_id;
      } else {
        delete payload.table;
      }
      this.$axios.post("orders", payload).then(() => {
        this.$store.dispatch("noti/pushTableNoti", {
          head: "",
          body: this.$t("order_success"),
        });
        this.getCart();
        this.$router.push(this.localePath("/manager/orders"));
      });
    },
    archiveOrder() {
      const payload = {
        type_id: this.orderType,
        name: this.name,
        phone: this.phone,
        address_id: this.orderType == 3 ? this.address.id : 0,
        payment_status: this.paymentStatus,
        table: this.selectedTable.id,
        st: 319,
      };

      // don't send the table data in pickup & don't send the pickup data in table case
      if (this.orderType === 1) {
        delete payload.name;
        delete payload.phone;
        delete payload.address_id;
      } else {
        delete payload.table;
      }
      this.$axios.post("orders", payload).then(() => {
        this.$store.dispatch("noti/pushTableNoti", {
          head: "",
          body: this.$t("order_success"),
        });
        this.getCart();
      });
    },
    getUser(phone) {
      this.loader = true;
      this.$axios.get(`/members?phone=${phone}`).then((res) => {
        if (res.data.data.id) {
          this.userIsExist = "exist";
          this.userData = res.data.data;
          this.name = res.data.data.name;

          // set last address to select
          const lastAdd = this.userData.addresses[
            this.userData.addresses.length - 1
          ];
          this.address = lastAdd;

          this.loader = false;
        } else {
          this.userIsExist = "new_user";
          this.userData = "";
          this.name = "";
          this.loader = false;
        }
      });
    },
  },
  watch: {
    phone(n, o) {
      this.getUser(n);
    },
  },

  beforeDestroy() {
    this.$store.commit("modal/set", []);
  },
};
</script>
<style scoped>
.input {
  width: 95%;
}
</style>






