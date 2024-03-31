<template>

    <div class="container">

        <br />

        <button @click="goHome()" class="btn btn-success">Go Back</button>

        <h1 class="text-center">Add New Car</h1>

        <div>

            <!-- Add New Car Form -->

            <form method="post" action="#" enctype="multipart/form-data">

                <!-- Car Name -->

                <div class="row g-3 align-items-center mb-3">

                    <div class="col-auto d-block mx-auto">

                        <div class="form-floating" :class="{ 'form-data-error': carNameErr }">

                            <input type="text" class="form-control w300" id="carShopName" placeholder="Car Name"
                                v-model.trim="carName">

                            <label for="carShopName">Car Name</label>

                            <span class="error-feedback" v-if="carNameErr">{{ carNameMsg }}</span>

                        </div>

                    </div>

                </div>

                <!-- Car Price -->

                <div class="row g-3 align-items-center mb-3">

                    <div class="col-auto d-block mx-auto">

                        <div class="form-floating" :class="{ 'form-data-error': carPriceErr }">

                            <input type="number" class="form-control w300" id="carShopPrice" placeholder="Car Price"
                                v-model.trim="carPrice">

                            <label for="carShopPrice">Car Price</label>

                            <span class="error-feedback" v-if="carPriceErr">{{ carPriceMsg }}</span>

                        </div>

                    </div>

                </div>

                <!-- Car Model Year -->

                <div class="row g-3 align-items-center mb-3">

                    <div class="col-auto d-block mx-auto">

                        <div class="form-floating" :class="{ 'form-data-error': carModelYearErr }">

                            <input type="number" class="form-control w300" id="carShopModelYear"
                                placeholder="Car Model Year" v-model.trim="carModelYear">

                            <label for="carShopModelYear">Car Model Year</label>

                            <span class="error-feedback" v-if="carModelYearErr">{{ carModelYearMsg }}</span>

                        </div>

                    </div>

                </div>

                <!-- Car Image -->

                <div class="row g-3 align-items-center mb-3">

                    <div class="col-auto d-block mx-auto">

                        <div class="form-floating" :class="{ 'form-data-error': carImageErr }">

                            <input type="file" class="form-control w300 customFileField" id="carShopImage"
                                placeholder="Car Image" ref="carImg">

                            <label for="carShopImage">Car Image</label>

                            <span class="error-feedback" v-if="carImageErr">{{ carImageMsg }}</span>

                        </div>

                    </div>

                </div>

                <!-- Car Description -->

                <div class="row g-3 align-items-center mb-3">

                    <div class="col-auto d-block mx-auto">

                        <div class="form-floating" :class="{ 'form-data-error': carDescErr }">

                            <textarea class="form-control w300 h125" id="carShopDesc" placeholder="Car Description"
                                v-model.trim="carDesc"></textarea>

                            <label for="carShopDesc">Car Description</label>

                            <span class="error-feedback" v-if="carDescErr">{{ carDescMsg }}</span>

                        </div>

                    </div>

                </div>

                <!-- Add Car Button -->

                <div class="row d-grid g-2 w300 col-auto d-block mx-auto mb-3">

                    <button class="btn btn-outline-success" @click.prevent="addNewCar()">Add New Car</button>

                    <button type="reset" class="btn btn-outline-primary">Reset</button>

                </div>

                <!-- Alert -->

                <div class="row d-grid g-2 w300 col-auto d-block mx-auto mb-3">

                    <div class="alert alert-success" role="alert" v-if="resultSuccess">{{ resultSuccessMsg }}</div>

                    <div class="alert alert-danger" role="alert" v-if="resultErr">{{ resultErrMsg }}</div>

                </div>

            </form>

        </div>

    </div>

</template>

<script>

export default {

    name: 'AddNewCar',

    data() {
        return {
            carName: "",
            carNameErr: false,
            // carNameMsg: "Enter Car Name",
            carNameMsg: "",
            carPrice: "",
            carPriceErr: false,
            // carPriceMsg: "Enter Car Price",
            carPriceMsg: "",
            carModelYear: "",
            carModelYearErr: false,
            // carModelYearMsg: "Enter Car Model Year",
            carModelYearMsg: "",
            carImg: "",
            carImageErr: false,
            // carImageMsg: "Select Car Image",
            carImageMsg: "",
            carDesc: "",
            carDescErr: false,
            // carDescMsg: "Enter Car Description",
            carDescMsg: "",
            resultSuccess: "",
            resultSuccessMsg: "Add Car Successfully",
            resultErr: "",
            resultErrMsg: "Failed, Try Again.",
        }
    },

    methods: {
        goHome() {
            this.$router.push({ name: "Home" });
        },
        addNewCar(){
            console.log("Add New Car");
        },
    }

}

</script>

<style lang="scss" scoped>
.w300 {
    width: 300px !important;
}

.form-data-error {
    color: red;
}

.form-data-error input,
.form-data-error textarea {
    border-color: red;
}

.error-feedback {
    padding-left: 3px;
}

.customFileField {
    padding-left: 24px !important;
    padding-top: 38px !important;
    padding-bottom: 10px !important;
    height: 75px !important;
}

.h125 {
    height: 125px !important;
}
</style>