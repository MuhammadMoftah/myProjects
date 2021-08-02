<template>
  <section>
    <!-- filters section -->
    <section
      class="flex flex-wrap items-center justify-between -mx-2 lg:justify-start"
    >
      <!-- search  -->
      <div
        class="relative inline-block w-full mx-2 mb-3 text-gray-600 md:w-1/4"
      >
        <input
          type="search"
          name="serch"
          v-model.lazy="search"
          :placeholder="$t('search_with_code')"
          class="w-full h-10 px-5 pr-10 text-sm bg-white border rounded-lg shadow"
        />
        <button class="absolute top-0 right-0 mt-3 mr-4">
          <svg
            class="w-4 h-4 fill-current"
            xmlns="http://www.w3.org/2000/svg"
            xmlns:xlink="http://www.w3.org/1999/xlink"
            version="1.1"
            id="Capa_1"
            x="0px"
            y="0px"
            viewBox="0 0 56.966 56.966"
            style="enable-background: new 0 0 56.966 56.966"
            xml:space="preserve"
            width="512px"
            height="512px"
          >
            <path
              d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z"
            />
          </svg>
        </button>
      </div>

      <!-- order status  -->
      <div
        class="relative inline-block w-full h-10 mx-2 mb-3 align-top md:w-1/4"
        @mouseleave="statusMenu = false"
      >
        <div
          class="flex items-center justify-between w-full h-10 px-4 text-gray-600 capitalize border rounded-lg shadow cursor-pointer hover:bg-gray-100"
          @click="statusMenu = !statusMenu"
        >
          <span>
            <font-awesome-icon
              :icon="['fal', 'tag']"
              class="mx-1 transition-transform duration-200 transform fa-sm"
            />
            {{ status }}
          </span>
          <font-awesome-icon
            :icon="['fas', 'angle-down']"
            class="transition-transform duration-200 transform"
            :class="{ 'rotate-180': statusMenu }"
          />
        </div>

        <transition
          enter-active-class="transition duration-300 ease-out transform"
          enter-class="scale-95 -translate-y-3 opacity-0"
          enter-to-class="scale-100 translate-y-0 opacity-100"
          leave-active-class="transform "
          leave-class="translate-y-0 opacity-100"
          leave-to-class="-translate-y-3 opacity-0"
        >
          <div
            v-show="statusMenu"
            class="absolute top-0 z-20 w-full pt-2 mt-8 text-center"
          >
            <div
              class="relative py-1 bg-white border border-gray-200 rounded-md shadow-xl"
            >
              <div class="relative">
                <button
                  @click="ordersByStatus('all')"
                  class="block w-full px-4 py-2 text-sm font-semibold text-gray-800 capitalize bg-transparent rounded md:mt-0 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                >
                  {{ $t("all") }}
                </button>
                <button
                  @click="ordersByStatus('new')"
                  class="block w-full px-4 py-2 text-sm font-semibold text-green-600 capitalize bg-transparent border-t rounded md:mt-0 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                >
                  {{ $t("orders.new") }}
                </button>
                <button
                  class="block w-full px-4 py-2 text-sm font-semibold text-orange-600 capitalize bg-transparent border-t rounded md:mt-0 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                  @click="ordersByStatus('pending')"
                >
                  {{ $t("pending") }}
                </button>
                <button
                  class="block w-full px-4 py-2 text-sm font-semibold text-gray-600 capitalize bg-transparent border-t rounded md:mt-0 hover:bg-gray-200 focus:outline-none focus:shadow-outline"
                  @click="ordersByStatus('done')"
                  v-if="false"
                >
                  {{ $t("done") }}
                </button>
                <button
                  class="block w-full px-4 py-2 text-sm font-semibold text-red-600 capitalize bg-transparent border-t rounded md:mt-0 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                  @click="ordersByStatus('cancelled')"
                  v-if="false"
                >
                  {{ $t("cancelled") }}
                </button>
              </div>
            </div>
          </div>
        </transition>
      </div>

      <!-- order type  -->
      <div
        class="relative inline-block w-full h-10 mx-2 mb-3 align-top md:w-1/4"
        @mouseleave="orderTypeMenu = false"
      >
        <div
          class="flex items-center justify-between w-full h-10 px-4 text-gray-600 capitalize border rounded-lg shadow cursor-pointer hover:bg-gray-100"
          @click="orderTypeMenu = !orderTypeMenu"
        >
          <span>
            <font-awesome-icon
              :icon="['fal', 'tag']"
              class="mx-1 transition-transform duration-200 transform fa-sm"
            />
            {{ orderType }}
          </span>
          <font-awesome-icon
            :icon="['fas', 'angle-down']"
            class="transition-transform duration-200 transform"
            :class="{ 'rotate-180': statusMenu }"
          />
        </div>

        <transition
          enter-active-class="transition duration-300 ease-out transform"
          enter-class="scale-95 -translate-y-3 opacity-0"
          enter-to-class="scale-100 translate-y-0 opacity-100"
          leave-active-class="transform "
          leave-class="translate-y-0 opacity-100"
          leave-to-class="-translate-y-3 opacity-0"
        >
          <div
            v-show="orderTypeMenu"
            class="absolute top-0 z-20 w-full pt-2 mt-8 text-center"
          >
            <div
              class="relative bg-white border border-gray-200 rounded-md shadow-xl"
            >
              <div class="relative">
                <button
                  @click="ordersByOrderType('')"
                  class="block w-full px-4 py-2 text-sm font-semibold text-gray-800 capitalize bg-transparent rounded md:mt-0 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                >
                  {{ $t("all") }}
                </button>

                <button
                  @click="ordersByOrderType(1)"
                  class="block w-full px-4 py-2 text-sm font-semibold text-gray-800 capitalize bg-transparent border-t rounded md:mt-0 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                >
                  {{ $t("tables.tables") }}
                </button>

                <button
                  @click="ordersByOrderType(2)"
                  class="block w-full px-4 py-2 text-sm font-semibold text-gray-800 capitalize bg-transparent border-t rounded md:mt-0 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                >
                  {{ $t("pickup") }}
                </button>
              </div>
            </div>
          </div>
        </transition>
      </div>

      <!-- sort orders  -->
      <div
        class="relative inline-block w-full h-10 mx-2 mb-3 align-top md:hidden md:w-1/4"
        @mouseleave="sortMenu = false"
      >
        <div
          class="flex items-center justify-between w-full h-10 px-4 text-gray-600 capitalize border rounded-lg shadow cursor-pointer hover:bg-gray-100"
          @click="sortMenu = !sortMenu"
        >
          <span>
            <font-awesome-icon
              :icon="['fad', 'sort-amount-down']"
              class="mx-1 text-base transition-transform duration-200 transform fa-sm"
            />
            {{ $t("sort_by") }}
          </span>
          <font-awesome-icon
            :icon="['fas', 'angle-down']"
            class="transition-transform duration-200 transform"
            :class="{ 'rotate-180': sortMenu }"
          />
        </div>

        <transition
          enter-active-class="transition duration-300 ease-out transform"
          enter-class="scale-95 -translate-y-3 opacity-0"
          enter-to-class="scale-100 translate-y-0 opacity-100"
          leave-active-class="transform "
          leave-class="translate-y-0 opacity-100"
          leave-to-class="-translate-y-3 opacity-0"
        >
          <div
            v-show="sortMenu"
            class="absolute top-0 z-20 w-full pt-2 mt-8 text-center"
          >
            <div
              class="relative py-1 bg-white border border-gray-200 rounded-md shadow-xl"
            >
              <div class="relative">
                <button
                  @click="sortOrders('order')"
                  class="flex justify-between w-full px-6 py-2 text-sm font-semibold text-gray-800 capitalize bg-transparent rounded md:mt-0 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                >
                  ID

                  <font-awesome-icon
                    v-if="sort === 'order' && filterObject.sort_type === 'desc'"
                    :icon="['fad', 'sort-up']"
                  />
                  <font-awesome-icon
                    v-else-if="
                      sort === 'order' && filterObject.sort_type === 'asc'
                    "
                    :icon="['fad', 'sort-down']"
                  />
                  <font-awesome-icon
                    v-else
                    class="text-gray-500"
                    :icon="['fad', 'sort']"
                  />
                </button>
                <button
                  @click="sortOrders('table')"
                  class="flex justify-between w-full px-6 py-2 text-sm font-semibold text-gray-800 capitalize bg-transparent border-t rounded md:mt-0 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                >
                  {{ $t("table_number") }}
                  <font-awesome-icon
                    v-if="sort === 'table' && filterObject.sort_type === 'desc'"
                    :icon="['fad', 'sort-up']"
                  />
                  <font-awesome-icon
                    v-else-if="
                      sort === 'table' && filterObject.sort_type === 'asc'
                    "
                    :icon="['fad', 'sort-down']"
                  />
                  <font-awesome-icon
                    v-else
                    class="text-gray-500"
                    :icon="['fad', 'sort']"
                  />
                </button>
                <button
                  @click="sortOrders('date')"
                  class="flex justify-between w-full px-6 py-2 text-sm font-semibold text-gray-800 capitalize bg-transparent border-t rounded md:mt-0 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                >
                  {{ $t("date") }}
                  <font-awesome-icon
                    v-if="sort === 'date' && filterObject.sort_type === 'desc'"
                    :icon="['fad', 'sort-up']"
                  />
                  <font-awesome-icon
                    v-else-if="
                      sort === 'date' && filterObject.sort_type === 'asc'
                    "
                    :icon="['fad', 'sort-down']"
                  />
                  <font-awesome-icon
                    v-else
                    class="text-gray-500"
                    :icon="['fad', 'sort']"
                  />
                </button>
                <button
                  @click="sortOrders('cost')"
                  class="flex justify-between w-full px-6 py-2 text-sm font-semibold text-gray-800 capitalize bg-transparent border-t rounded md:mt-0 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                >
                  {{ $t("cost") }}
                  <font-awesome-icon
                    v-if="sort === 'cost' && filterObject.sort_type === 'desc'"
                    :icon="['fad', 'sort-up']"
                  />
                  <font-awesome-icon
                    v-else-if="
                      sort === 'cost' && filterObject.sort_type === 'asc'
                    "
                    :icon="['fad', 'sort-down']"
                  />
                  <font-awesome-icon
                    v-else
                    class="text-gray-500"
                    :icon="['fad', 'sort']"
                  />
                </button>
                <button
                  @click="sortOrders('status')"
                  class="flex justify-between w-full px-6 py-2 text-sm font-semibold text-gray-800 capitalize bg-transparent border-t rounded md:mt-0 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                >
                  {{ $t("status") }}sss
                  <font-awesome-icon
                    v-if="
                      sort === 'status' && filterObject.sort_type === 'desc'
                    "
                    :icon="['fad', 'sort-up']"
                  />
                  <font-awesome-icon
                    v-else-if="
                      sort === 'status' && filterObject.sort_type === 'asc'
                    "
                    :icon="['fad', 'sort-down']"
                  />
                  <font-awesome-icon
                    v-else
                    class="text-gray-500"
                    :icon="['fad', 'sort']"
                  />
                </button>
              </div>
            </div>
          </div>
        </transition>
      </div>

      <NuxtLink
        class="px-4 py-2 mb-3 text-sm text-white capitalize bg-transparent bg-green-500 rounded md:mt-0 hover:bg-green-400 focus:outline-none focus:shadow-outline"
        tag="button"
        exact-active-class
        :to="localePath('/manager/create-order')"
      >
        <font-awesome-icon :icon="['fas', 'plus-circle']" class="mx-1" />
        {{ $t("create_order") }}
      </NuxtLink>
    </section>

    <!--orders table section -->
    <section
      class="hidden overflow-x-auto border border-b border-gray-200 shadow sm:rounded-lg md:block"
    >
      <table class="min-w-full overflow-hidden divide-y divide-gray-200">
        <thead class="font-bold text-gray-700 bg-gray-200">
          <tr>
            <th
              scope="col"
              class="w-20 px-3 py-3 text-xs font-bold tracking-wider text-left cursor-pointer hover:bg-gray-300"
              @click="sortOrders('order')"
            >
              <span class="flex justify-between">
                ID #

                <font-awesome-icon
                  v-if="sort === 'order' && filterObject.sort_type === 'desc'"
                  :icon="['fad', 'sort-up']"
                />
                <font-awesome-icon
                  v-else-if="
                    sort === 'order' && filterObject.sort_type === 'asc'
                  "
                  :icon="['fad', 'sort-down']"
                />
                <font-awesome-icon v-else :icon="['fad', 'sort']" />
              </span>
            </th>

            <th
              scope="col"
              class="w-20 px-3 py-3 text-xs font-bold tracking-wider text-left cursor-pointer hover:bg-gray-300"
            >
              <span class="flex justify-between">
                {{ $t("name") }}
                <font-awesome-icon
                  v-if="sort === 'order' && filterObject.sort_type === 'desc'"
                  :icon="['fad', 'sort-up']"
                />
                <font-awesome-icon
                  v-else-if="
                    sort === 'order' && filterObject.sort_type === 'asc'
                  "
                  :icon="['fad', 'sort-down']"
                />
                <font-awesome-icon v-else :icon="['fad', 'sort']" />
              </span>
            </th>

            <th
              scope="col"
              class="w-20 px-3 py-3 text-xs font-bold tracking-wider text-left capitalize hover:bg-gray-300"
            >
              <span class="flex justify-between">
                {{ $t("phone") }}
                <font-awesome-icon
                  v-if="sort === 'order' && filterObject.sort_type === 'desc'"
                  :icon="['fad', 'sort-up']"
                />
                <font-awesome-icon
                  v-else-if="
                    sort === 'order' && filterObject.sort_type === 'asc'
                  "
                  :icon="['fad', 'sort-down']"
                />
                <font-awesome-icon v-else :icon="['fad', 'sort']" />
              </span>
            </th>

            <th
              scope="col"
              class="px-6 py-3 text-xs font-bold tracking-wider text-left capitalize cursor-pointer hover:bg-gray-300"
              @click="sortOrders('table')"
            >
              <span class="flex justify-between">
                {{ $t("tables.table") }} / {{ $t("orders.order") }}
                <font-awesome-icon
                  v-if="sort === 'table' && filterObject.sort_type === 'desc'"
                  :icon="['fad', 'sort-up']"
                />
                <font-awesome-icon
                  v-else-if="
                    sort === 'table' && filterObject.sort_type === 'asc'
                  "
                  :icon="['fad', 'sort-down']"
                />
                <font-awesome-icon v-else :icon="['fad', 'sort']" />
              </span>
            </th>

            <th
              scope="col"
              class="px-6 py-3 text-xs font-bold tracking-wider text-left capitalize cursor-pointer hover:bg-gray-300"
              @click="sortOrders('date')"
            >
              <span class="flex justify-between">
                {{ $t("date") }}
                <font-awesome-icon
                  v-if="sort === 'date' && filterObject.sort_type === 'desc'"
                  :icon="['fad', 'sort-up']"
                />
                <font-awesome-icon
                  v-else-if="
                    sort === 'date' && filterObject.sort_type === 'asc'
                  "
                  :icon="['fad', 'sort-down']"
                />
                <font-awesome-icon v-else :icon="['fad', 'sort']" />
              </span>
            </th>

            <th
              scope="col"
              class="px-6 py-3 text-xs font-bold tracking-wider text-left capitalize cursor-pointer hover:bg-gray-300"
              @click="sortOrders('cost')"
            >
              <span class="flex justify-between">
                {{ $t("total_cost") }}
                <font-awesome-icon
                  v-if="sort === 'cost' && filterObject.sort_type === 'desc'"
                  :icon="['fad', 'sort-up']"
                />
                <font-awesome-icon
                  v-else-if="
                    sort === 'cost' && filterObject.sort_type === 'asc'
                  "
                  :icon="['fad', 'sort-down']"
                />
                <font-awesome-icon v-else :icon="['fad', 'sort']" />
              </span>
            </th>
            <th
              scope="col"
              class="px-6 py-3 text-xs font-bold tracking-wider text-left capitalize cursor-pointer hover:bg-gray-300"
              @click="sortOrders('status')"
            >
              <span class="flex justify-between">
                {{ $t("status") }}
                <font-awesome-icon :icon="['fad', 'sort']" />
              </span>
            </th>

            <th scope="col" class="relative px-6 py-3">
              <span> {{ $t("payment") }}</span>
            </th>

            <th scope="col" class="relative px-6 py-3">
              <span> {{ $t("actions") }}</span>
            </th>
          </tr>
        </thead>

        <tbody class="bg-white divide-y divide-gray-200" v-if="!loading">
          <tr v-for="order in orders" :key="order.id" class="hover:bg-gray-100">
            <td class="px-6 py-4 whitespace-nowrap">
              <div class="flex items-center">
                <div class="text-sm font-bold text-gray-500">
                  {{ order.id }}
                </div>
              </div>
            </td>

            <td class="px-6 py-4 whitespace-nowrap">
              <div class="flex items-center">
                <div
                  class="text-sm font-bold text-gray-500"
                  v-if="order.member"
                >
                  {{ order.member.name }}
                </div>

                <div class="text-sm font-bold text-gray-500" v-else>
                  Anonymous
                </div>
              </div>
            </td>

            <td class="px-6 py-4 whitespace-nowrap">
              <div class="flex items-center">
                <div
                  class="text-sm font-bold text-gray-500"
                  v-if="order.member"
                >
                  {{ order.member.phone }}
                </div>

                <div class="text-sm font-bold text-gray-500" v-else>
                  Anonymous
                </div>
              </div>
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
              <div
                class="text-xl font-bold text-center text-gray-700"
                v-if="order.table"
              >
                {{ $t("tables.table") }} {{ order.table.number }}
              </div>
              <div
                class="p-1 mx-auto text-sm font-bold text-center text-pink-700 capitalize bg-pink-200 rounded"
                style="max-width: 180px"
                v-if="order.type === 'pickup'"
              >
                {{ $t("pickup") }}
              </div>
              <div
                class="p-1 mx-auto text-sm font-bold text-center text-orange-700 capitalize bg-orange-200 rounded"
                style="max-width: 180px"
                v-if="order.type === 'delivery'"
              >
                {{ $t("delivery") }}
              </div>
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
              <div class="text-sm text-gray-900">
                {{ order.created_at.slice(0, 10) }}
              </div>
              <div class="text-sm text-gray-600">
                {{ order.created_at.slice(11, 16) }}
              </div>
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
              <span
                class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full"
              >
                {{ order.final_total_price }}
              </span>
            </td>
            <td class="px-6 whitespace-nowrap">
              <span
                class="flex items-center justify-center h-6 px-1 text-xs font-bold leading-5 text-center text-red-600 capitalize bg-red-200 rounded-md"
                style="max-width: 100px"
                v-if="order.status === 'cancelled'"
              >
                {{ $t("cancelled") }}
              </span>
              <span
                class="flex items-center justify-center h-6 px-1 text-xs font-bold leading-5 text-center text-green-600 capitalize bg-green-200 rounded-md"
                style="max-width: 100px"
                v-if="order.status === 'new'"
              >
                {{ $t("orders.new") }}
              </span>
              <span
                class="flex items-center justify-center h-6 px-1 text-xs font-bold leading-5 text-center text-gray-600 capitalize bg-gray-200 rounded-md"
                style="max-width: 100px"
                v-if="order.status === 'done'"
              >
                {{ $t("done") }}
              </span>
              <span
                class="flex items-center justify-center h-6 px-1 text-xs font-bold leading-5 text-center text-orange-600 capitalize bg-orange-200 rounded-md"
                style="max-width: 100px"
                v-if="order.status === 'pending'"
              >
                {{ $t("pending") }}
              </span>
            </td>
            <td class="px-6 whitespace-nowrap">
              <span
                v-if="order.payment_status"
                class="flex items-center justify-center text-gray-600 capitalize"
              >
                <font-awesome-icon
                  :icon="['fas', 'check-circle']"
                  class="mx-1 text-xl text-green-500"
                />
                {{ $t("paid") }}
              </span>

              <span
                v-else
                class="flex items-center justify-center text-gray-600 capitalize"
              >
                <font-awesome-icon
                  :icon="['fas', 'sad-tear']"
                  class="mx-1 text-xl text-gray-600"
                />
                {{ $t("not_paid") }}
              </span>
            </td>
            <td
              class="px-6 py-4 text-sm font-bold text-center whitespace-nowrap"
            >
              <button
                v-if="false"
                class="px-2 py-1 mx-1 text-sm text-red-500 capitalize border border-red-500 rounded hover:bg-red-200 hover:border-red-200"
                @click="openCancelModal(order)"
              >
                <font-awesome-icon :icon="['fas', 'trash-alt']" />

                {{ $t("reject") }}
              </button>

              <button
                v-if="false"
                class="px-2 py-1 mx-1 text-sm text-green-500 capitalize border border-green-500 rounded hover:bg-green-200 hover:border-green-200"
                @click="(activeOrder = order), changeOrderStatus(302)"
              >
                <font-awesome-icon :icon="['fas', 'trash-undo-alt']" />

                {{ $t("restore") }}
              </button>

              <button
                class="px-3 py-1 mx-1 text-gray-600 bg-gray-100 rounded hover:bg-gray-300"
                @click="$store.commit('orders/storeActiveGeneralOrder', order)"
              >
                <font-awesome-icon :icon="['fas', 'eye']" />
              </button>
            </td>
          </tr>
        </tbody>
      </table>
    </section>

    <!-- spinner loader -->
    <div
      class="w-full h-screen py-8 text-center bg-gray-100"
      v-if="loading"
      style="
        position: absolute;
        top: 0;
        left: 0;
        bottom: 0;
        justify-content: center;
        width: 100%;
        opacity: 0.6;
        display: flex;
        align-items: center;
      "
    >
      <font-awesome-icon :icon="['fad', 'spinner']" class="fa-spin fa-2x" />
    </div>

    <!--orders table blocks -->
    <transition-group appear class="md:hidden" tag="div" name="fade">
      <div
        class="w-full max-w-3xl px-2 pt-1 pb-2 mb-5 bg-gray-100 border-t border-b hover:bg-gray-200"
        v-for="order in orders"
        :key="order.id"
        @click="$store.commit('orders/storeActiveGeneralOrder', order)"
      >
        <div class="flex justify-between px-1 py-3 text-gray-600 border-b">
          <span>
            {{ order.created_at.slice(0, 10) }},
            {{ order.created_at.slice(11, 16) }}
          </span>
          <span v-if="order.table">
            {{ $t("tables.table") }} #{{ order.table.number }}
          </span>
          <span
            v-if="order.type"
            class="p-1 text-sm font-bold text-center text-gray-700 capitalize bg-gray-200 rounded"
          >
            {{ order.type }}
          </span>
        </div>

        <div class="flex items-center justify-between px-1 py-3">
          <aside class="font-bold text-gray-800">
            <font-awesome-icon :icon="['fas', 'burger-soda']" />
            {{ $t("orders.order") }} #{{ order.id }}
          </aside>
          <p
            class="px-2 py-1 text-xs font-bold leading-5 text-center text-red-500 capitalize border-2 border-red-300 rounded-md"
            style="min-width: 80px"
            v-if="order.status === 'cancelled'"
          >
            {{ $t("cancelled") }}
          </p>
          <p
            class="px-2 py-1 text-xs font-bold leading-5 text-center text-green-500 capitalize border-2 border-green-300 rounded-md"
            style="min-width: 80px"
            v-if="order.status === 'new'"
          >
            {{ $t("orders.new") }}
          </p>
          <p
            class="px-2 py-1 text-xs font-bold leading-5 text-center text-gray-500 capitalize border-2 border-gray-300 rounded-md"
            style="min-width: 80px"
            v-if="order.status === 'done'"
          >
            {{ $t("done") }}
          </p>
          <p
            class="px-2 py-1 text-xs font-bold leading-5 text-center text-orange-500 capitalize border-2 border-orange-300 rounded-md"
            style="min-width: 80px"
            v-if="order.status === 'pending'"
          >
            {{ $t("pending") }}
          </p>
        </div>

        <div
          class="flex items-center justify-between px-3 py-3 capitalize rounded-lg"
        >
          <span class="text-gray-700"> {{ $t("ordered_items") }} </span>
          <span class="font-bold text-gray-700">
            {{ order.items.length }}
          </span>
        </div>

        <div
          class="flex items-center justify-between px-3 py-3 capitalize bg-gray-200 rounded-lg"
        >
          <span class="text-gray-700"> {{ $t("total_cost") }} </span>
          <span class="font-bold text-gray-700">
            {{ order.final_total_price }}
          </span>
        </div>
      </div>
    </transition-group>

    <!-- pagination high number of pages -->
    <div
      class="flex flex-col items-center my-6"
      v-if="pagination.lastPage > 8 && !loading"
    >
      <div class="flex text-gray-700">
        <div class="flex h-10 font-bold bg-gray-200 rounded-full">
          <div
            class="flex items-center justify-center w-10 h-10 leading-5 rounded-full cursor-pointer hover:bg-red-300"
            @click="orderByPagination(1)"
            v-if="pagination.currentPage > 2"
          >
            1
          </div>
          <div
            class="flex items-center justify-center w-10 h-10 leading-5 rounded-full"
            v-if="pagination.currentPage > 2"
          >
            ...
          </div>
          <div
            class="flex items-center justify-center w-10 h-10 leading-5 rounded-full cursor-pointer hover:bg-red-300"
            @click="orderByPagination(pagination.currentPage - 1)"
            v-if="pagination.currentPage > 1"
          >
            {{ pagination.currentPage - 1 }}
          </div>
          <div
            class="flex items-center justify-center w-10 leading-5 text-white bg-red-500 rounded-full cursor-pointer"
            @click="orderByPagination(pagination.currentPage)"
          >
            {{ pagination.currentPage }}
          </div>
          <div
            class="flex items-center justify-center w-10 h-10 leading-5 rounded-full cursor-pointer hover:bg-red-300"
            @click="orderByPagination(pagination.currentPage + 1)"
            v-if="pagination.lastPage !== pagination.currentPage"
          >
            {{ pagination.currentPage + 1 }}
          </div>
          <div
            class="flex items-center justify-center w-10 h-10 leading-5 rounded-full"
            v-if="pagination.lastPage !== pagination.currentPage"
          >
            ...
          </div>
          <div
            class="flex items-center justify-center w-10 h-10 leading-5 rounded-full cursor-pointer hover:bg-red-300"
            @click="orderByPagination(pagination.lastPage)"
            v-if="pagination.lastPage !== pagination.currentPage"
          >
            {{ pagination.lastPage }}
          </div>
        </div>
        <div
          v-if="false"
          class="flex items-center justify-center w-10 h-10 ml-1 bg-gray-200 rounded-full cursor-pointer"
        >
          <svg
            xmlns="http://www.w3.org/2000/svg"
            width="100%"
            height="100%"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor"
            stroke-width="2"
            stroke-linecap="round"
            stroke-linejoin="round"
            class="w-6 h-6 feather feather-chevron-right"
          >
            <polyline points="9 18 15 12 9 6"></polyline>
          </svg>
        </div>
      </div>
    </div>

    <!-- pagination low number of pages -->
    <div
      class="flex flex-col items-center my-6"
      v-if="pagination.lastPage < 8 && !loading"
    >
      <div
        class="flex items-center h-12 px-4 font-bold text-gray-700 bg-gray-200 rounded-full"
      >
        <div
          v-for="n in pagination.lastPage"
          :key="n"
          class="flex items-center justify-center w-10 h-10 mx-1 leading-5 rounded-full cursor-pointer hover:bg-red-300"
          @click="orderByPagination(n)"
          :class="
            n === pagination.currentPage
              ? 'bg-red-500 text-white cursor-default hover:bg-red-500'
              : ''
          "
        >
          {{ n }}
        </div>
      </div>
    </div>

    <!-- cancel order modal  -->
    <Modal v-if="$store.state.modal.show === 'cancelOrder'" max_width="800">
      <!-- header -->
      <template slot="modal-header">
        <span class="px-1 py-1 font-bold text-gray-700">
          Order {{ activeOrder.id }} in Table #{{ activeOrder.table.number }}
        </span>
      </template>

      <section>
        This order cost

        <span class="font-bold text-red-500"> will be removed, </span>
        Are you sure?

        <div class="flex my-4">
          <div class="w-1/2">
            <textarea
              class="w-full p-3 text-sm text-gray-600 border rounded resize-none focus:outline-none"
              rows="5"
              v-model="cancelReason"
            ></textarea>
          </div>
          <div class="w-1/2 px-3">
            <button
              class="w-full py-3 my-1 text-sm text-gray-600 capitalize truncate rounded shadow-sm cursor-pointer hover:bg-gray-200"
              @click="cancelReason = $t('not_paid_reason')"
            >
              {{ $t("not_paid_reason") }}
            </button>
            <button
              class="w-full py-3 my-1 text-sm text-gray-600 capitalize truncate rounded shadow-sm cursor-pointer hover:bg-gray-200"
              @click="cancelReason = $t('customer_gone_reason')"
            >
              {{ $t("customer_gone_reason") }}
            </button>
          </div>
        </div>
      </section>

      <!-- footer -->
      <template slot="confirm-button">
        <button
          class="px-6 py-1 mx-1 text-sm text-white rounded-full"
          @click="changeOrderStatus(305)"
          :class="
            !cancelReason.length
              ? 'hover:bg-gray-300 bg-gray-300 text-gray-600'
              : 'bg-red-400 hover:bg-red-500'
          "
          :disabled="!cancelReason.length"
        >
          {{ $store.state.modal.confirm_button_text }}
        </button>
      </template>
    </Modal>

    <!--General Order side bar  -->
    <transition name="fade">
      <SideBarGeneralOrder
        v-if="
          $store.state.orders.activeGeneralOrder && !$store.state.modal.show
        "
      />
    </transition>
  </section>
</template>

<script>
import SideBarGeneralOrder from "~/components/orders/SideBarGeneralOrder";
import DatePicker from "vue2-datepicker";
import "vue2-datepicker/index.css";

export default {
  components: {
    SideBarGeneralOrder,
    DatePicker,
  },
  data() {
    return {
      loading: true,
      activeOrder: {},
      statusMenu: false,
      sortMenu: false,
      orderTypeMenu: false,
      orders: [],
      status: this.$t("status"),

      // type = 1 -> table
      filterObject: { type: "" },
      date: [],
      sort: "",
      search: "",
      pagination: {},
      cancelReason: "",
      orderType: this.$t("all_orders"),
    };
  },
  mounted() {
    const sound = new Audio(
      "https://smu-prod-app.ams3.digitaloceanspaces.com/sounds/notification1.mp3"
    );
    this.pusherChannel.bind("order.created", (data) => {
      this.getFilterOrders();
      sound.play();
    });

    //refresh orders while calling event
    this.$nuxt.$on("refreshOrders", () => {
      this.getGeneralOrders();
    });
  },
  destroyed() {
    this.pusherChannel.unbind();
  },
  fetch() {
    this.getGeneralOrders();
    this.sort = "date";
    this.filterObject.sort_type = "desc";
  },
  activated() {
    this.$fetch();
  },
  fetchOnServer: false,
  methods: {
    openCancelModal(order) {
      this.$store.commit("modal/set", ["cancelOrder", null, "Yes", null]);
      this.activeOrder = order;
    },
    getGeneralOrders() {
      const res = this.$axios
        .get("/orders?type=")
        .then((res) => {
          this.$store.commit("orders/storeGeneralOrders", res.data.data);
          this.orders = [...this.$store.state.orders.generalOrders];
          this.loading = false;

          this.pagination.currentPage = res.data.meta.current_page;
          this.pagination.lastPage = res.data.meta.last_page;
          return res;
        })
        .catch((err) => {
          this.loading = false;
          for (const error in err.response.data.errors) {
            this.$store.dispatch("noti/pushError", {
              body: err.response.data.errors[error][0],
            });
          }
          return err;
        });
      return res;
    },
    changeOrderStatus(status) {
      this.$axios
        .put("/kitchen/status_changes/" + this.activeOrder.id, {
          note: this.cancelReason,
          status,
        })
        .then(() => {
          this.$store.commit("modal/set", [false]);
          this.getFilterOrders();
        })
        .catch((err) => {
          for (const error in err.response.data.errors) {
            this.$store.dispatch("noti/pushError", {
              body: err.response.data.errors[error][0],
            });
          }
        });
    },
    ordersByStatus(statusWord) {
      this.status = this.$t(statusWord);
      let status = "";
      if (statusWord === "all") {
        status = "";
      }
      if (statusWord === "new") {
        status = 302;
      }
      if (statusWord === "cancelled") {
        status = 305;
      }
      if (statusWord === "done") {
        status = 308;
      }
      if (statusWord === "pending") {
        status = 301;
      }
      this.filterObject.status = status;
      this.getFilterOrders();
    },

    ordersByOrderType(type) {
      // empty => all
      // 1 => tables
      // 0 => pickup
      if (type === "") {
        this.orderType = this.$t("all");
      }
      if (type === 1) {
        this.orderType = this.$t("tables.tables");
      }
      if (type === 2) {
        this.orderType = this.$t("pickup");
      }
      this.filterObject.type = type;
      this.getFilterOrders();
    },

    ordersBySearch() {
      this.filterObject.search = this.search;
      this.getFilterOrders();
    },
    sortOrders(sort) {
      if (this.sort === sort && this.filterObject.sort_type === "asc") {
        this.filterObject.sort_type = "desc";
      } else {
        this.filterObject.sort_type = "asc";
      }
      this.sort = sort;
      this.filterObject.sort = this.sort;

      this.getFilterOrders();
    },
    orderByPagination(pageNumber) {
      this.filterObject.page = pageNumber;
      this.getFilterOrders();
    },
    switchOrders(status) {
      this.ordersStatus = status;
    },
    getFilterOrders() {
      this.loading = true;
      let filters = "";
      for (const key in this.filterObject) {
        filters = filters + `${key}=${this.filterObject[key]}&`;
      }
      filters = filters.slice(0, -1);
      return this.$axios
        .get("/orders?" + filters)
        .then((res) => {
          this.orders = res.data.data;
          this.loading = false;
          this.pagination.currentPage = res.data.meta.current_page;
          this.pagination.lastPage = res.data.meta.last_page;
          delete this.filterObject.page;

          return res;
        })
        .catch((err) => {
          this.$store.dispatch("noti/pushError", {
            body: "No orders found, Orders has been refreshed",
          });
          this.loading = false;
          this.sort = "";
          this.filterObject.sort = "";
          this.ordersStatus = "";
          this.getGeneralOrders();
        });
    },
  },
  watch: {
    search() {
      this.ordersBySearch();
    },
  },
};
</script>

<style>
</style>