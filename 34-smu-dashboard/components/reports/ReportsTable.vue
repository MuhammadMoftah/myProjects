<template>
   <main>
      <!-- filters section -->
      <section
         class="flex flex-wrap justify-between mt-4 -mx-2 lg:justify-start"
      >
         <!-- branches menu -->
         <div
            class="relative inline-block w-full h-10 mx-2 mb-3 align-top md:w-1/4"
            @mouseleave="branchesMenu = false"
         >
            <div
               class="flex items-center justify-between w-full h-10 px-4 text-gray-600 capitalize border rounded-lg shadow cursor-pointer hover:bg-gray-100"
               @click="branchesMenu = !branchesMenu"
            >
               <span>
                  <font-awesome-icon
                     :icon="['fas', 'store-alt']"
                     class="mx-1 transition-transform duration-200 transform fa-sm"
                  />
                  {{ branch }}
               </span>
               <font-awesome-icon
                  :icon="['fas', 'angle-down']"
                  class="transition-transform duration-200 transform"
                  :class="{ 'rotate-180': branchesMenu }"
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
                  v-show="branchesMenu"
                  class="absolute top-0 z-20 w-full pt-2 mt-8 text-center"
               >
                  <div
                     class="relative py-1 bg-white border border-gray-200 rounded-md shadow-xl"
                  >
                     <div class="relative">
                        <button
                           v-for="branch in branches"
                           :key="branch.id"
                           @click="ordersByBranch(branch)"
                           class="block w-full px-4 py-2 text-sm font-semibold text-gray-800 capitalize bg-transparent rounded md:mt-0 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                        >
                           {{ branch.name }}
                        </button>
                     </div>
                  </div>
               </div>
            </transition>
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
                     :icon="['fas', 'tag']"
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
                           v-if="false"
                           @click="ordersByStatus('new')"
                           class="block w-full px-4 py-2 text-sm font-semibold text-green-600 capitalize bg-transparent border-t rounded md:mt-0 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                        >
                           {{ $t("orders.new") }}
                        </button>
                        <button
                           v-if="false"
                           class="block w-full px-4 py-2 text-sm font-semibold text-orange-600 capitalize bg-transparent border-t rounded md:mt-0 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                           @click="ordersByStatus('pending')"
                        >
                           {{ $t("pending") }}
                        </button>
                        <button
                           class="block w-full px-4 py-2 text-sm font-semibold text-gray-600 capitalize bg-transparent border-t rounded md:mt-0 hover:bg-gray-200 focus:outline-none focus:shadow-outline"
                           @click="ordersByStatus('done')"
                        >
                           {{ $t("done") }}
                        </button>
                        <button
                           class="block w-full px-4 py-2 text-sm font-semibold text-red-600 capitalize bg-transparent border-t rounded md:mt-0 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                           @click="ordersByStatus('cancelled')"
                        >
                           {{ $t("cancelled") }}
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
                              v-if="
                                 sort === 'order' &&
                                 filterObject.sort_type === 'desc'
                              "
                              :icon="['fad', 'sort-up']"
                           />
                           <font-awesome-icon
                              v-else-if="
                                 sort === 'order' &&
                                 filterObject.sort_type === 'asc'
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
                              v-if="
                                 sort === 'table' &&
                                 filterObject.sort_type === 'desc'
                              "
                              :icon="['fad', 'sort-up']"
                           />
                           <font-awesome-icon
                              v-else-if="
                                 sort === 'table' &&
                                 filterObject.sort_type === 'asc'
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
                              v-if="
                                 sort === 'date' &&
                                 filterObject.sort_type === 'desc'
                              "
                              :icon="['fad', 'sort-up']"
                           />
                           <font-awesome-icon
                              v-else-if="
                                 sort === 'date' &&
                                 filterObject.sort_type === 'asc'
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
                              v-if="
                                 sort === 'cost' &&
                                 filterObject.sort_type === 'desc'
                              "
                              :icon="['fad', 'sort-up']"
                           />
                           <font-awesome-icon
                              v-else-if="
                                 sort === 'cost' &&
                                 filterObject.sort_type === 'asc'
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
                           {{ $t("status") }}
                           <font-awesome-icon
                              v-if="
                                 sort === 'status' &&
                                 filterObject.sort_type === 'desc'
                              "
                              :icon="['fad', 'sort-up']"
                           />
                           <font-awesome-icon
                              v-else-if="
                                 sort === 'status' &&
                                 filterObject.sort_type === 'asc'
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

         <!-- date range  -->
         <div class="inline-block w-full mx-2 mb-3 md:w-1/4">
            <date-picker
               v-model="date"
               range
               :placeholder="$t('select_date_range')"
               valueType="format"
            >
            </date-picker>
         </div>

         <!-- per page filter -->
         <div
            class="relative w-full h-10 mx-2 mb-3 align-top md:w-1/4"
            style="max-width: 130px"
            @mouseleave="perPageMenu = false"
         >
            <div
               class="flex items-center justify-between w-full h-10 px-4 text-gray-600 capitalize border rounded-lg shadow cursor-pointer hover:bg-gray-100"
               @click="perPageMenu = !perPageMenu"
            >
               <span class="text-xs"> {{ perPage }} {{ $t("per_page") }} </span>
               <font-awesome-icon
                  :icon="['fas', 'angle-down']"
                  class="transition-transform duration-200 transform"
                  :class="{ 'rotate-180': perPageMenu }"
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
                  v-show="perPageMenu"
                  class="absolute top-0 z-20 w-full pt-2 mt-8 text-center"
               >
                  <div
                     class="relative py-1 bg-white border border-gray-200 rounded-md shadow-xl"
                  >
                     <div class="relative">
                        <button
                           @click="OrderPerPage(15)"
                           class="block w-full px-4 py-2 text-sm font-semibold text-gray-800 capitalize bg-transparent border-b rounded md:mt-0 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                        >
                           15
                        </button>
                        <button
                           @click="OrderPerPage(40)"
                           class="block w-full px-4 py-2 text-sm font-semibold text-gray-800 capitalize bg-transparent border-b rounded md:mt-0 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                        >
                           40
                        </button>
                        <button
                           @click="OrderPerPage(70)"
                           class="block w-full px-4 py-2 text-sm font-semibold text-gray-800 capitalize bg-transparent border-b rounded md:mt-0 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                        >
                           70
                        </button>
                        <button
                           @click="OrderPerPage(100)"
                           class="block w-full px-4 py-2 text-sm font-semibold text-gray-800 capitalize bg-transparent border-b rounded md:mt-0 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                        >
                           100
                        </button>
                        <button
                           @click="OrderPerPage(200)"
                           class="block w-full px-4 py-2 text-sm font-semibold text-gray-800 capitalize bg-transparent border-b rounded md:mt-0 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                        >
                           200
                        </button>
                     </div>
                  </div>
               </div>
            </transition>
         </div>
      </section>

      <!-- action buttons -->
      <transition
         enter-active-class="transition duration-300 ease-out transform"
         enter-class="scale-95 -translate-y-3 opacity-0"
         enter-to-class="scale-100 translate-y-0 opacity-100"
         leave-active-class="transition duration-150 ease-in transform"
         leave-class="translate-y-0 opacity-100"
         leave-to-class="-translate-y-3 opacity-0"
         appear
         mode="out-in"
      >
         <section class="flex mb-3 -mx-2" v-if="selectedOrders.length > 1">
            <button
               class="px-4 py-2 mx-2 text-sm font-semibold text-gray-700 bg-gray-200 rounded shadow-md md:mt-0 hover:bg-gray-400 focus:bg-gray-400"
            >
               <font-awesome-icon
                  :icon="['fad', 'file-csv']"
                  class="relative mx-1"
               />
               CSV
            </button>
            <button
               class="px-4 py-2 mx-2 text-sm font-semibold text-gray-700 bg-gray-200 rounded shadow-md md:mt-0 hover:bg-gray-400 focus:bg-gray-400"
               @click="createPDF()"
            >
               <font-awesome-icon
                  :icon="['fad', 'file-pdf']"
                  class="relative mx-1"
               />
               PDF
            </button>
         </section>
      </transition>

      <!--orders table section -->
      <section
         class="hidden border border-b border-gray-200 shadow sm:rounded-lg md:block"
      >
         <table class="min-w-full divide-y divide-gray-200">
            <thead class="font-bold text-gray-700 bg-gray-200">
               <tr>
                  <th scope="col" class="relative max-w-xs">
                     <label
                        for="selectall"
                        class="absolute top-0 left-0 flex items-center justify-center w-full h-full cursor-pointer hover:bg-gray-300"
                     >
                        <input
                           id="selectall"
                           type="checkbox"
                           name="ReportsTableRowChk"
                           class="cursor-pointer"
                           @click="SelectAll($event)"
                        />
                     </label>
                  </th>
                  <th
                     scope="col"
                     class="w-20 px-3 py-3 text-xs font-bold tracking-wider text-left uppercase cursor-pointer hover:bg-gray-300"
                     @click="sortOrders('order')"
                  >
                     <span class="flex justify-between">
                        ID #

                        <font-awesome-icon
                           v-if="
                              sort === 'order' &&
                              filterObject.sort_type === 'desc'
                           "
                           :icon="['fad', 'sort-up']"
                        />
                        <font-awesome-icon
                           v-else-if="
                              sort === 'order' &&
                              filterObject.sort_type === 'asc'
                           "
                           :icon="['fad', 'sort-down']"
                        />
                        <font-awesome-icon v-else :icon="['fad', 'sort']" />
                     </span>
                  </th>

                  <th
                     scope="col"
                     class="px-6 py-3 text-xs font-bold tracking-wider text-left uppercase cursor-pointer hover:bg-gray-300"
                     @click="sortOrders('table')"
                  >
                     <span class="flex justify-between">
                        {{ $t("tables.table") }} / {{ $t("orders.order") }}
                        <font-awesome-icon
                           v-if="
                              sort === 'table' &&
                              filterObject.sort_type === 'desc'
                           "
                           :icon="['fad', 'sort-up']"
                        />
                        <font-awesome-icon
                           v-else-if="
                              sort === 'table' &&
                              filterObject.sort_type === 'asc'
                           "
                           :icon="['fad', 'sort-down']"
                        />
                        <font-awesome-icon v-else :icon="['fad', 'sort']" />
                     </span>
                  </th>

                  <th
                     scope="col"
                     class="px-6 py-3 text-xs font-bold tracking-wider text-left uppercase cursor-pointer hover:bg-gray-300"
                     @click="sortOrders('date')"
                  >
                     <span class="flex justify-between">
                        {{ $t("date") }}
                        <font-awesome-icon
                           v-if="
                              sort === 'date' &&
                              filterObject.sort_type === 'desc'
                           "
                           :icon="['fad', 'sort-up']"
                        />
                        <font-awesome-icon
                           v-else-if="
                              sort === 'date' &&
                              filterObject.sort_type === 'asc'
                           "
                           :icon="['fad', 'sort-down']"
                        />
                        <font-awesome-icon v-else :icon="['fad', 'sort']" />
                     </span>
                  </th>

                  <th
                     scope="col"
                     class="px-6 py-3 text-xs font-bold tracking-wider text-left uppercase cursor-pointer hover:bg-gray-300"
                     @click="sortOrders('cost')"
                  >
                     <span class="flex justify-between">
                        {{ $t("total_cost") }}
                        <font-awesome-icon
                           v-if="
                              sort === 'cost' &&
                              filterObject.sort_type === 'desc'
                           "
                           :icon="['fad', 'sort-up']"
                        />
                        <font-awesome-icon
                           v-else-if="
                              sort === 'cost' &&
                              filterObject.sort_type === 'asc'
                           "
                           :icon="['fad', 'sort-down']"
                        />
                        <font-awesome-icon v-else :icon="['fad', 'sort']" />
                     </span>
                  </th>
                  <th
                     scope="col"
                     class="px-6 py-3 text-xs font-bold tracking-wider text-left uppercase cursor-pointer hover:bg-gray-300"
                     @click="sortOrders('status')"
                  >
                     <span class="flex justify-between">
                        {{ $t("status") }}
                        <font-awesome-icon :icon="['fad', 'sort']" />
                     </span>
                  </th>

                  <th scope="col" class="relative px-6 py-3">
                     <span> </span>
                  </th>
               </tr>
            </thead>

            <tbody class="bg-white divide-y divide-gray-200" v-if="!loading">
               <ReportsTableRow
                  v-for="order in orders"
                  :key="order.id"
                  :order="order"
               />
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
            @click="getOrderDetails(order)"
         >
            <div class="flex justify-between px-1 py-3 text-gray-600 border-b">
               <span>
                  {{ order.created_at.slice(0, 10) }},
                  {{ order.created_at.slice(11, 16) }}
               </span>
               <span v-if="order.table">Table #{{ order.table.number }}</span>
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

            <div class="flex items-center justify-between px-3 py-3 ounded-lg">
               <span class="text-gray-700"> Ordered Items </span>
               <span class="font-bold text-gray-700">
                  {{ order.items.length }}
               </span>
            </div>

            <div
               class="flex items-center justify-between px-3 py-3 bg-gray-200 rounded-lg"
            >
               <span class="text-gray-700">Total Cost</span>
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
   </main>
</template>

<script>
import DatePicker from "vue2-datepicker";
import "vue2-datepicker/index.css";
import ReportsTableRow from "@/components/reports/ReportsTableRow.vue";
export default {
   components: {
      DatePicker,
      ReportsTableRow,
   },
   fetch() {
      this.getGeneralOrders();
      this.sort = "date";
      this.filterObject.sort_type = "desc";
   },
   fetchOnServer: false,
   activated() {
      this.$fetch();
   },
   data() {
      return {
         // orders table data
         loading: true,
         activeOrder: {},
         orders: [],

         // filters
         status: this.$t("status"),
         branch: this.$t("select_branch"),
         perPage: 15,
         perPageMenu: false,
         branchesMenu: false,
         statusMenu: false,
         sortMenu: false,
         date: [],
         sort: "",
         pagination: {},
         filterObject: {},
      };
   },
   computed: {
      branches() {
         const branches = this.$store.state.me.list.branches;
         return branches;
      },
      selectedOrders() {
         const arr = [...this.$store.state.orders.selectedOrders];
         return arr;
      },
   },
   methods: {
      getOrderDetails(order) {
         this.$axios
            .post(`/reports/print/`, {
               orders: [order.id],
            })
            .then((res) => {
               this.$store.commit("orders/openOrders", res.data.data[0]);
            });
      },
      SelectAll(e) {
         const arr = document.getElementsByName("ReportsTableRowChk");
         let selectedOrders = [];

         if (e.target.checked) {
            for (var i = 0; i < arr.length; i++) {
               arr[i].checked = true;
               selectedOrders.push(parseInt(arr[i].id));
            }
         } else {
            for (var i = 0; i < arr.length; i++) {
               arr[i].checked = false;
            }
         }

         this.$store.commit("orders/setSelectedOrders", selectedOrders);
      },
      getGeneralOrders() {
         this.$axios
            .get("/reports?")
            .then((res) => {
               this.$store.commit("orders/storeGeneralOrders", res.data.data);
               this.orders = [...this.$store.state.orders.generalOrders];
               this.loading = false;

               this.pagination.currentPage = res.data.meta.current_page;
               this.pagination.lastPage = res.data.meta.last_page;
               this.$emit("sendStats", res.data.statistics);
            })
            .catch((err) => {
               this.loading = false;
               for (const error in err.response.data.errors) {
                  this.$store.dispatch("noti/pushError", {
                     body: err.response.data.errors[error][0],
                  });
               }
            });
      },
      ordersByBranch(branch) {
         this.branch = branch.name;
         this.filterObject.branch = branch.id;
         this.getFilterOrders();
      },
      OrderPerPage(perPage) {
         this.perPage = perPage;
         this.filterObject.per_page = perPage;
         this.getFilterOrders();
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
      ordersByDate() {
         this.filterObject.from = this.date[0] ? this.date[0] : "";
         this.filterObject.to = this.date[1] ? this.date[1] : "";
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
      getFilterOrders() {
         this.loading = true;
         let filters = "";
         for (const key in this.filterObject) {
            filters = filters + `${key}=${this.filterObject[key]}&`;
         }
         filters = filters.slice(0, -1);
         this.$axios
            .get("/reports?" + filters)
            .then((res) => {
               this.orders = res.data.data;
               this.loading = false;
               this.pagination.currentPage = res.data.meta.current_page;
               this.pagination.lastPage = res.data.meta.last_page;
               delete this.filterObject.page;
               this.$emit("sendStats", res.data.statistics);

               //clear the selected orders
               const arr = document.getElementsByName("ReportsTableRowChk");
               this.$store.commit("orders/setSelectedOrders", []);
               for (var i = 0; i < arr.length; i++) {
                  arr[i].checked = false;
               }
            })
            .catch((err) => {
               this.$store.dispatch("noti/pushError", {
                  body: "No orders found, Orders has been refreshed",
               });

               this.sort = "";
               this.filterObject.sort = "";
               this.getGeneralOrders();
            });
      },
      createPDF() {
         this.$axios
            .post("reports/pdf/", {
               orders: this.selectedOrders,
            })
            .then((res) => {
               var downloadLink = document.createElement("a");
               downloadLink.target = "_blank";
               downloadLink.download = "name_to_give_saved_file.pdf";

               // convert downloaded data to a Blob
               var blob = new Blob([res.data], {
                  type: "application/pdf",
               });

               // create an object URL from the Blob
               var URL = window.URL || window.webkitURL;
               var downloadUrl = URL.createObjectURL(blob);

               // set object URL as the anchor's href
               downloadLink.href = downloadUrl;

               // append the anchor to document body
               document.body.append(downloadLink);

               // fire a click event on the anchor
               downloadLink.click();

               // cleanup: remove element and revoke object URL
               document.body.removeChild(downloadLink);
               URL.revokeObjectURL(downloadUrl);
            });
      },
   },
   destroyed() {
      //clear the selected orders
      this.$store.commit("orders/setSelectedOrders", []);
   },
   watch: {
      date() {
         this.ordersByDate();
      },
   },
};
</script>

<style scoped>
.mx-datepicker {
   width: 100%;
}
>>> .mx-input {
   height: 39px;
   border-radius: 10px;
   border: 1px solid #e7e7e7;
   box-shadow: 0 1px 3px 0 rgb(0 0 0 / 10%), 0 1px 2px 0 rgb(0 0 0 / 6%);
}
</style>