<template>

  <div class="container">

    <h1 class="text-center">Car Shop</h1>

    <div>

      <button @click="viewAddNewCar()" class="btn btn-success float-end">Add New Car</button>

      <div class="clearfix"></div>

    </div>

  </div>

</template>

<script>

export default {

  name: 'HomeView',

  methods: {
    viewAddNewCar(){
      this.$router.push({name: "AddNewCar"});
    }
  },

}

</script>
