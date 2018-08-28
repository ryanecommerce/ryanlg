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

            <label for="year" class="sr-only">{{ newItem.year }}</label>
            <select v-model="newItem.year" class="form-control mb-2 mr-sm-2" id="year">
                <option value="">Year</option>
                <option value="2018-35">2018-35</option>
                <option value="2019-36">2019-36</option>
                <option value="2020-37">2020-37</option>
                <option value="2021-38">2021-38</option>
                <option value="2022-39">2022-39</option>
                <option value="2023-40">2023-40</option>
                <option value="2024-41">2024-41</option>
                <option value="2025-42">2025-42</option>
                <option value="2026-43">2026-43</option>
                <option value="2027-44">2027-44</option>
                <option value="2028-45">2028-45</option>
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
                    year: "",
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
