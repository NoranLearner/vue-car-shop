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
                                v-model.trim="carName" @input="validateCarName($event)"
                                @change="validateCarName($event)">

                            <label for="carShopName">Car Name</label>

                            <span class="error-feedback" v-if="carNameErr">{{ carNameMsg }}</span>

                        </div>

                    </div>

                </div>

                <!-- Car Price -->

                <div class="row g-3 align-items-center mb-3">

                    <div class="col-auto d-block mx-auto">

                        <div class="form-floating" :class="{ 'form-data-error': carPriceErr }">

                            <input type="text" class="form-control w300" id="carShopPrice" placeholder="Car Price"
                                v-model.trim="carPrice" @input="validateCarPrice($event)"
                                @change="validateCarPrice($event)">

                            <label for="carShopPrice">Car Price</label>

                            <span class="error-feedback" v-if="carPriceErr">{{ carPriceMsg }}</span>

                        </div>

                    </div>

                </div>

                <!-- Car Model Year -->

                <div class="row g-3 align-items-center mb-3">

                    <div class="col-auto d-block mx-auto">

                        <div class="form-floating" :class="{ 'form-data-error': carModelYearErr }">

                            <input type="text" class="form-control w300" id="carShopModelYear"
                                placeholder="Car Model Year" v-model.trim="carModelYear"
                                @input="validateCarModelYear($event)" @change="validateCarModelYear($event)">

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
                                placeholder="Car Image" ref="carImg" @input="validateCarImage()"
                                @change="validateCarImage()" @click="validateCarImage()">

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
                                v-model.trim="carDesc" @input="validateCarDesc($event)"
                                @change="validateCarDesc($event)"></textarea>

                            <label for="carShopDesc">Car Description</label>

                            <span class="error-feedback" v-if="carDescErr">{{ carDescMsg }}</span>

                        </div>

                    </div>

                </div>

                <!-- Add Car Button -->

                <div class="row d-grid g-2 w300 col-auto d-block mx-auto mb-3">

                    <button class="btn btn-outline-success" @click.prevent="addNewCar()">Add New Car</button>

                    <button type="reset" class="btn btn-outline-primary" @click="resetFormErr()">Reset</button>

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
            isCarNameValidated: false,
            carPrice: "",
            carPriceErr: false,
            // carPriceMsg: "Enter Car Price",
            carPriceMsg: "",
            isCarPriceValidated: false,
            carModelYear: "",
            carModelYearErr: false,
            // carModelYearMsg: "Enter Car Model Year",
            carModelYearMsg: "",
            isCarModelYearValidated: false,
            carImg: "",
            carImageErr: false,
            // carImageMsg: "Select Car Image",
            carImageMsg: "",
            isCarImageValidated: false,
            carDesc: "",
            carDescErr: false,
            // carDescMsg: "Enter Car Description",
            carDescMsg: "",
            isCarDescValidated: false,
            resultSuccess: false,
            resultSuccessMsg: "",
            resultErr: false,
            resultErrMsg: "",
        }
    },

    mounted() {
        // console.log(this.$refs.carImg.files[0]);
    },

    methods: {

        // Go To Home Page
        goHome() {
            this.$router.push({ name: "Home" });
        },

        // Car Name
        validateCarName(e) {
            let val = e.target.value;
            // console.log(e);
            // console.log(val);
            this.validateCarNameInput(val);
        },
        validateCarNameInput(val) {
            // Not Value in Name Input
            if (val == "") {
                this.carNameErr = true;
                this.isCarNameValidated = false;
                this.carNameMsg = "Must Enter Car Name";
            } else if (val != "" && !isNaN(val)) {
                this.carNameErr = true;
                this.isCarNameValidated = false;
                this.carNameMsg = "Car Name Must be Real Text";
            } else if (val.length > 20) {
                this.carNameErr = true;
                this.isCarNameValidated = false;
                this.carNameMsg = "Car Name Must be 20 chars or less";
            } else {
                this.carNameErr = false;
                this.isCarNameValidated = true;
                this.carNameMsg = "";
            }
        },

        // Car Price
        validateCarPrice(e) {
            let val = e.target.value;
            this.validateCarPriceInput(val);
        },
        validateCarPriceInput(val) {
            // Not Value in Price Input
            if (val == "") {
                this.carPriceErr = true;
                this.isCarPriceValidated = false;
                this.carPriceMsg = "Must Enter Car Price";
            } else if (val != "" && isNaN(val)) {
                this.carPriceErr = true;
                this.isCarPriceValidated = false;
                this.carPriceMsg = "Car Price has to be a number";
            } else if (val < 0) {
                this.carPriceErr = true;
                this.isCarPriceValidated = false;
                this.carPriceMsg = "Car Price can not be negative";
            } else if (val == 0 || val === 0.0) {
                this.carPriceErr = true;
                this.isCarPriceValidated = false;
                this.carPriceMsg = "Car Price can not be zero";
            } else {
                this.carPriceErr = false;
                this.isCarPriceValidated = true;
                this.carPriceMsg = "";
            }
        },

        // Car Model Year
        validateCarModelYear(e) {
            let val = e.target.value;
            this.validateCarModelYearInput(val);
        },
        validateCarModelYearInput(val) {
            // Not Value in ModelYear Input
            if (val == "") {
                this.carModelYearErr = true;
                this.isCarModelYearValidated = false;
                this.carModelYearMsg = "Must Enter Car Model Year. Ex: 2006";
            } else if (/^[0-9]+$/.test(val) === false) {
                this.carModelYearErr = true;
                this.isCarModelYearValidated = false;
                this.carModelYearMsg = "Only Numbers. Ex: 2006";
            }
            else if (val.length < 4 || val.length > 4) {
                this.carModelYearErr = true;
                this.isCarModelYearValidated = false;
                this.carModelYearMsg = "Must Enter Valid Year";
            }
            else {
                this.carModelYearErr = false;
                this.isCarModelYearValidated = true;
                this.carModelYearMsg = "";
            }
        },

        // Car Description
        validateCarDesc(e) {
            let val = e.target.value;
            this.validateCarDescInput(val);
        },
        validateCarDescInput(val) {
            if (val == "") {
                this.carDescErr = true;
                this.isCarDescValidated = false;
                this.carDescMsg = "Must Enter Car Description";
            } else if (val.length > 100) {
                this.carDescErr = true;
                this.isCarDescValidated = false;
                this.carDescMsg = "Car Description Must be 100 chars or less";
            } else {
                this.carDescErr = false;
                this.isCarDescValidated = true;
                this.carDescMsg = "";
            }
        },

        // Car Image
        validateFileExtension(id) {
            let fileInput = document.getElementById(id);
            let filePath = fileInput.value;
            //Allowing File Type
            let allowExtensions = /(\.jpg|\.png|\.jpeg|\.gif)$/i;
            if (!allowExtensions.exec(filePath)) {
                return false;
            } else {
                return true;
            }
        },
        validateCarImage() {
            if (this.$refs.carImg.files[0]) {
                if (this.validateFileExtension("carShopImage") == true) {
                    this.carImageErr = false;
                    this.isCarImageValidated = true;
                    this.carImageMsg = "";
                } else {
                    this.carImageErr = true;
                    this.isCarImageValidated = false;
                    this.carImageMsg = "Car Image has to be: jpg, png, jpeg, or gif";
                }
            } else {
                this.carImageErr = true;
                this.isCarImageValidated = false;
                this.carImageMsg = "Must Select Car Image";
            }
        },

        // Add New Car Method
        addNewCar() {

            // console.log("Add New Car");

            // If All Validated Successfully
            if (this.isCarNameValidated && this.isCarPriceValidated && this.isCarModelYearValidated && this.isCarImageValidated && this.isCarDescValidated) {
                // console.log("Validated Successfully");
                this.resultSuccess = true;
                this.resultSuccessMsg = "Validated Successfully";
                this.resultErr = false;
                this.resultErrMsg = "";
            } else {
                // console.log("Failed Validating Form");
                this.resultErr = true;
                this.resultErrMsg = "Failed Validating Form";
                this.resultSuccess = false;
                this.resultSuccessMsg = "";
                // Car Name Validate
                this.validateCarNameInput(this.carName);
                // Car Price Validate
                this.validateCarPriceInput(this.carPrice);
                // Car Model Year Validate
                this.validateCarModelYearInput(this.carModelYear);
                // Car Description Validate
                this.validateCarDescInput(this.carDesc);
                // Car Image Validate
                this.validateCarImage();
            }

        },

        // Reset Method
        resetFormErr() {
            this.carNameErr = false,
                this.carNameMsg = "",
                this.carPriceErr = false,
                this.carPriceMsg = "",
                this.carModelYearErr = false,
                this.carModelYearMsg = "",
                this.carImageErr = false,
                this.carImageMsg = "",
                this.carDescErr = false,
                this.carDescMsg = "",
                this.resultSuccess = false,
                this.resultSuccessMsg = "",
                this.resultErr = false,
                this.resultErrMsg = ""
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
    font-size: 0.9rem;
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