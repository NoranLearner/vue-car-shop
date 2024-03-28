<template>

    <div class="container">

        <h1 class="text-center">Add New Car</h1>


        <div>

            <button @click="goHome()" class="btn btn-success float-start">Go Back</button>

            <div class="clearfix"></div>

        </div>

    </div>

</template>

<script>

export default {

    name: 'AddNewCar',

    methods:{
        goHome(){
            this.$router.push({name: "Home"});
        }
    }

}

</script>

<style lang="scss" scoped></style>