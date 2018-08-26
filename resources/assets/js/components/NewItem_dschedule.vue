<template>
    <div class="justify-content-center row">
        <form class="form-inline">
            <label for="name" class="sr-only">{{ newItem.name }}</label>
            <input v-model="newItem.name" type="text" class="form-control mb-2 mr-sm-2" id="name" placeholder="Name...">


            <label for="status" class="sr-only">{{ newItem.status }}</label>
            <select v-model="newItem.status" class="form-control mb-2 mr-sm-2" id="status">
                <option value="">Status</option>
                <option value="Pending">Pending</option>
                <option value="Processing">Processing</option>
                <option value="Complete">Complete</option>
            </select>

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
                    name: "",
                    status: "",
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
                if (this.newItem.name.length < 3) {
                    return true;
                }
                return false;
            }
        }
    };
</script>

