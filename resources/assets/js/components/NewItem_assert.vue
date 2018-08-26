<template>
    <div class="justify-content-center row">
        <form class="form-inline">

            <label for="category" class="sr-only">{{ newItem.category }}</label>
            <select v-model="newItem.category" class="form-control mb-2 mr-sm-2" id="category">
                <option value="">Category</option>
                <option value="saving-account">Saving account</option>
                <option value="fixed-deposit">Fixed deposit</option>
                <option value="credit-card">Credit card</option>
                <option value="loan">Loan</option>
            </select>
            <!-- <input v-model="newItem.category" type="text" class="form-control mb-2 mr-sm-2" id="category" placeholder="Category"> -->

            <label for="name" class="sr-only">{{ newItem.name }}</label>
            <input v-model="newItem.name" type="text" class="form-control mb-2 mr-sm-2" id="name" placeholder="Name...">

            <label for="account_number" class="sr-only">{{ newItem.account_number }}</label>
            <input v-model="newItem.account_number" type="text" class="form-control mb-2 mr-sm-2" id="account_number" placeholder="Account_number">

            <label for="blance" class="sr-only">{{ newItem.blance }}</label>
            <input v-model="newItem.blance" style="width: 100px;" type="number" min="0" class="form-control mb-2 mr-sm-2" id="blance" placeholder="Blance">

            <div class="btn-group float-sm-right" role="group" aria-label="Buttons">
                <button @click="createItem()" type="button" class="btn btn-success mb-2" :disabled="isDisabled"><i class="fa fa-plus-circle fa-fw" aria-hidden="true"></i>Add new item</button>
            </div>
        </form>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                newItem: {
                    category: "",
                    name: "",
                    account_number: "",
                    blance: ""
                }
            };
        },
        methods: {
            createItem() {
                this.$emit("createEvent", this.newItem);
            }
        },
        computed: {
            isDisabled() {
                if (this.newItem.name.length < 3 || this.newItem.account_number.length < 1) {
                    return true;
                }
                return false;
            }
        }
    };
</script>