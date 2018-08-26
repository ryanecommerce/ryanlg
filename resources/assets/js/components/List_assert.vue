<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12 mx-auto">
                <div class="card card-default">
                    <div class="card-header">Shopping list</div>
                    <div class="card-body">
                        <app-item
                                v-for="item in items"
                                :item="item"
                                :key="item.id"
                                @deleteEvent="deleteItemHandler"
                                @updateEvent="updateItemHandler">
                        </app-item>
                        <hr>
                        <app-new-item
                                @createEvent="createEventHandler">
                        </app-new-item>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import appItem from "./Item_assert";
    import appNewItem from "./NewItem_assert";

    export default {
        data() {
            return {
                items: [],
                errors: []
            };
        },
        components: {
            appItem,
            appNewItem
        },
        created() {
            axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";

            axios
                .get("api/asserts")
                .then(response => {
                    this.items = response.data;
                })
                .catch(e => {
                    console.log(e.response);
                });
        },
        methods: {
            deleteItemHandler(id) {
                axios
                    .delete(`api/asserts/${id}`)
                    .then(response => {
                        console.log(response.data);
                    })
                    .catch(e => {
                        console.log(e.response);
                    });
                this.items = this.items.filter(item => {
                    return item.id !== id;
                });
            },
            createEventHandler(newItem) {
                console.log(newItem);
                axios
                    .post("api/asserts", newItem)
                    .then(response => {
                        console.log("stored");
                        this.items.push(response.data);
                        newItem.category = "";
                        newItem.name = "";
                        newItem.account_number = "";
                        newItem.blance = "";
                    })
                    .catch(e => {
                        console.log(e);
                    });
            },
            updateItemHandler(item) {
                axios
                    .put(`api/asserts/${item.id}`, item)
                    .then(response => {})
                    .catch(e => {
                        console.log(e);
                    });
            }
        }
    };
</script>
