<template>
    <Head>
        <title>Add New Permissions - Aplikasi Kasir</title>
    </Head>
    <main class="c-main">
        <div class="container-fluid">
            <div class="fade-in">
                <div class="row">
                    <div class="col-md-12">
                        <div
                            class="card border-0 rounded-3 shadow border-top-purple"
                        >
                            <div class="card-header">
                                <span class="font-weight-bold"
                                    ><i class="fa fa-shield-alt"></i> ADD
                                    PERMISSIONS</span
                                >
                            </div>
                            <div class="card-body">
                                <form @submit.prevent="submit">
                                    <div class="mb-3">
                                        <label class="fw-bold"
                                            >Permissions Name</label
                                        >
                                        <input
                                            class="form-control"
                                            v-model="form.name"
                                            :class="{
                                                'is-invalid': errors.name,
                                            }"
                                            type="text"
                                            placeholder="Permissions Name"
                                        />

                                        <div
                                            v-if="errors.name"
                                            class="alert alert-danger"
                                        >
                                            {{ errors.name }}
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label class="fw-bold"
                                            >Guard Name</label
                                        >
                                        <select
                                            name="guard_name"
                                            id="guardName"
                                            class="form-select"
                                            v-model="form.guard_name"
                                            :class="{
                                                'is-invalid': errors.guard_name,
                                            }"
                                            aria-label="Disabled select example"
                                        >
                                            <option value="web">Web</option>
                                            <option value="phone">Phone</option>
                                        </select>

                                        <div
                                            v-if="errors.guard_name"
                                            class="alert alert-danger"
                                        >
                                            {{ errors.guard_name }}
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12">
                                            <button
                                                class="btn btn-primary shadow-sm rounded-sm"
                                                type="submit"
                                            >
                                                SAVE
                                            </button>
                                            <button
                                                class="btn btn-warning shadow-sm rounded-sm ms-3"
                                                type="reset"
                                            >
                                                RESET
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</template>

<script>
import LayoutApp from "../../../Layouts/App.vue";

//import Heade and useForm from Inertia
import { Head, Link, router } from "@inertiajs/vue3";

//import reactive from vue
import { reactive } from "vue";

//import sweet alert2
import Swal from "sweetalert2";

export default {
    //layout
    layout: LayoutApp,

    //register component
    components: {
        Head,
        Link,
    },

    //props
    props: {
        errors: Object,
    },

    //composition API
    setup() {
        //define form with reactive
        const form = reactive({
            name: "",
            guard_name: "",
        });

        //method "submit"
        const submit = () => {
            //send data to server
            router.post(
                "/apps/permissions/store",
                {
                    //data
                    name: form.name,
                    guard_name: form.guard_name,
                },
                {
                    onSuccess: () => {
                        //show success alert
                        Swal.fire({
                            title: "Success!",
                            text: "Permission saved successfully.",
                            icon: "success",
                            showConfirmButton: false,
                            timer: 2000,
                        });
                    },
                }
            );
        };

        return {
            form,
            submit,
        };
    },
};
</script>

<style></style>
