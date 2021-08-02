<template>
   <div
      class="table border1 rounded flex flex-wrap justify-center items-center q-ma-sm"
      :class="
         table.status == 'active'
            ? 'active'
            : table.status == 'reserved'
            ? 'reserved'
            : table.status == 'pending'
            ? 'pending'
            : ''
      "
   >
      <p class="no-margin text-h4 text-bold text-grey-9 text-center">
         {{ table.number }}
         <span class="text-body2 text-bold block text-capitalize">{{
            table.status
         }}</span>
      </p>
   </div>
</template>

<script>
export default {
   props: {
      table: {
         type: Object,
      },
   },
};
</script>

<style scoped >
.table {
   /* width: 110px; */
   /* height: 130px; */
   perspective: 800px;
   width: 80px;
   height: 100px;
   background: white;
   cursor: pointer;
}
.table:hover {
   background: #e5e5e5;
}
.table.active {
   border: 2px dashed orange;
   background: rgb(255, 229, 180);
}
.table.active:hover {
   background: rgb(255, 213, 135);
}

.table.reserved {
   border: 2px dashed red;
   background: rgb(255, 190, 190);
}
.table.reserved:hover {
   background: rgb(255, 159, 159);
}

.table.pending {
   border: 2px dashed rgb(73, 255, 118);
   -webkit-animation: glow 1s ease-in-out infinite alternate;
   -moz-animation: glow 1s ease-in-out infinite alternate;
   animation: glow 0.8s ease-in-out infinite alternate;
   animation-name: glow-yellow;
}
.table.pending:hover {
   background: rgb(160, 255, 160);
}

@keyframes glow-yellow {
   from {
      background: rgb(180, 255, 180);
      transform: translate3d(0px, -4px, 50px);
   }
   to {
      transform: translate3d(0px, 4px, 50px);
      background: white;
   }
}
</style>