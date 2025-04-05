<template>
    <Head>
        <title>Add New Category - Aplikasi Kasir</title>
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
                                    ><i class="fa fa-folder"></i> ADD NEW
                                    CATEGORY</span
                                >
                            </div>
                            <div class="card-body">
                                <form @submit.prevent="submit">
                                    <div class="mb-3">
                                        <input
                                            class="form-control"
                                            @input="
                                                form.IMAGE =
                                                    $event.target.files[0]
                                            "
                                            :class="{
                                                'is-invalid': errors.IMAGE,
                                            }"
                                            type="file"
                                        />
                                    </div>
                                    <div
                                        v-if="errors.IMAGE"
                                        class="alert alert-danger"
                                    >
                                        {{ errors.IMAGE }}
                                    </div>
                                    <div class="mb-3">
                                        <label class="fw-bold"
                                            >Category Name</label
                                        >
                                        <input
                                            class="form-control"
                                            v-model="form.NAME"
                                            :class="{
                                                'is-invalid': errors.NAME,
                                            }"
                                            type="text"
                                            placeholder="Category Name"
                                        />
                                    </div>
                                    <div
                                        v-if="errors.NAME"
                                        class="alert alert-danger"
                                    >
                                        {{ errors.NAME }}
                                    </div>
                                    <div class="mb-3">
                                        <label class="fw-bold"
                                            >Description</label
                                        >
                                        <textarea
                                            class="form-control"
                                            v-model="form.DESCRIPTION"
                                            :class="{
                                                'is-invalid':
                                                    errors.DESCRIPTION,
                                            }"
                                            type="text"
                                            rows="4"
                                            placeholder="Description"
                                        ></textarea>
                                    </div>
                                    <div
                                        v-if="errors.DESCRIPTION"
                                        class="alert alert-danger"
                                    >
                                        {{ errors.DESCRIPTION }}
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
//import layout App
import LayoutApp from "../../../Layouts/App.vue";

//import Heade and Link from Inertia
import { Head, Link, router } from "@inertiajs/vue3";

//import reactive from vue
import { reactive } from "vue";

//import sweet alert2
import Swal from "sweetalert2";

export default {
    //layout
    layout: LayoutApp,

    //register components
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
            NAME: "",
            IMAGE: "",
            DESCRIPTION: "",
        });

        //method "submit"
        const submit = () => {
            //send data to server
            router.post(
                "/apps/categories",
                {
                    //data
                    NAME: form.NAME,
                    IMAGE: form.IMAGE,
                    DESCRIPTION: form.DESCRIPTION,
                },
                {
                    onSuccess: () => {
                        //show success alert
                        Swal.fire({
                            title: "Success!",
                            text: "Category saved successfully.",
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
