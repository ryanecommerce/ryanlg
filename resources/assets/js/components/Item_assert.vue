<template>
    <div>
        <div class="row justify-content-center">
            <form class="form-inline">

                <label for="category" class="sr-only">{{ item.category }}</label>
                <input @change="inputChanged()" type="text" class="form-control mb-2 mr-sm-2" id="category" v-model="item.category">

                <label for="name" class="sr-only">{{ item.name }}</label>
                <input @change="inputChanged()" type="text" class="form-control mb-2 mr-sm-2" id="name" v-model="item.name">

                <label for="account_number" class="sr-only">{{ item.account_number }}</label>
                <input @change="inputChanged()" type="text" class="form-control mb-2 mr-sm-2" id="name" v-model="item.account_number">

                <label for="blance" class="sr-only">{{ item.blance }}</label>
                <input @change="inputChanged()" type="number" pattern="-?[0-9]+[\,.]*[0-9]+" class="form-control mb-2 mr-sm-2" id="blance" v-model="item.blance">

                <div class="btn-group" role="group" aria-label="Buttons">
                    <button @click="updateItem()" type="button" class="btn btn-primary mb-2" :disabled="isDisabled"><i class="fa fa-pencil fa-fw" aria-hidden="true"></i> Update</button>
                    <button @click="deleteItem()" type="button" class="btn btn-danger mb-2"><i class="fa fa-remove fa-fw" aria-hidden="true"></i> Delete</button>
                </div>
            </form>
        </div>
        <hr class="d-block d-sm-none">
    </div>
</template>


<script>
    export default {
        props: {
            item: {}
        },
        data() {
            return {
                isDisabled: true
            };
        },
        methods: {
            deleteItem() {
                this.$emit("deleteEvent", this.item.id);
            },
            updateItem() {
                this.isDisabled = true;
                this.$emit("updateEvent", this.item);
            },
            inputChanged() {
                if (this.item.name.length < 3 || this.item.quantity < 1) {
                    this.isDisabled = true;
                } else {
                    this.isDisabled = false;
                }
            }
        },
    };
</script>
