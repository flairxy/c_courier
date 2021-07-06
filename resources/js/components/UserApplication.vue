<template>
    <div>
        <div>
            <form-wizard
                color="#240727"
                title="Application Approval"
                subtitle="Review and update application status"
                finishButtonText="Complete"
                @on-complete="thankYou"
            >
                <tab-content title="Personal Details" icon="fa fa-check">
                    <div class="row">
                        <div class="col-md-12 col-lg-12 mt-10">
                            <form class="js-validation-signin" autocomplete="">
                                <div>
                                    <div class="form-group row">
                                        <div class="col-lg-4">
                                            <label for="firstname"
                                                >FIRSTNAME</label
                                            >
                                            <input
                                                id="firstname"
                                                type="text"
                                                class="form-control"
                                                disabled
                                                name="firstname"
                                                autocomplete="phone"
                                                :value="application.firstname"
                                            />
                                        </div>
                                        <div class="col-lg-4">
                                            <label for="lastname"
                                                >LASTNAME</label
                                            >
                                            <input
                                                id="lastname"
                                                name="lastname"
                                                type="text"
                                                class="form-control"
                                                disabled
                                                autocomplete="phone"
                                                :value="application.lastname"
                                            />
                                        </div>
                                        <div class="col-lg-4">
                                            <label for="lastname"
                                                >OTHER NAMES</label
                                            >
                                            <input
                                                id="lastname"
                                                name="lastname"
                                                type="text"
                                                class="form-control"
                                                :value="application.othername"
                                                disabled
                                            />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-6">
                                            <label for="phonw">PHONE</label>
                                            <input
                                                id="phone"
                                                type="number"
                                                class="form-control"
                                                disabled
                                                autocomplete="phone"
                                                :value="application.phone"
                                            />
                                        </div>
                                        <div class="col-lg-6">
                                            <label for="email">EMAIL</label>
                                            <input
                                                id="email"
                                                type="text"
                                                class="form-control"
                                                disabled
                                                :value="application.email"
                                                disabled
                                            />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-6">
                                            <label for="gender">GENDER</label>
                                            <input
                                                id="email"
                                                type="text"
                                                class="form-control"
                                                disabled
                                                :value="application.gender"
                                                disabled
                                            />
                                        </div>
                                        <div class="col-lg-6">
                                            <label for="login-password"
                                                >DATE OF BIRTH</label
                                            >
                                            <input
                                                :value="application.dob"
                                                type="date"
                                                class="js-datepicker form-control"
                                                disabled
                                                id="example-datepicker3"
                                                name="example-datepicker3"
                                                data-week-start="1"
                                                data-autoclose="true"
                                                data-today-highlight="true"
                                                data-date-format="dd-mm-yyyy"
                                                placeholder="dd-mm-yyyy"
                                            />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-6">
                                            <label for="">State</label>
                                            <select
                                                name="account_type"
                                                id="account_type"
                                                class="form-control"
                                            >
                                                <option
                                                    selected
                                                    disabled
                                                    value=""
                                                >
                                                    {{ application.state }}
                                                </option>
                                            </select>
                                        </div>
                                        <div class="col-lg-6">
                                            <label for="gender">LGA</label>
                                            <select
                                                name="account_type"
                                                id="account_type"
                                                class="form-control"
                                            >
                                                <option
                                                    selected
                                                    disabled
                                                    value=""
                                                >
                                                    {{ application.lga }}
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </tab-content>
                <tab-content title="Other Information" icon="fa fa-check">
                    <div class="col-lg-12 mt-30">
                        <div class="form-group row">
                            <div class="col-lg-6">
                                <label for="">FATHER'S FIRSTNAME</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    disabled
                                    name="firstname"
                                    autocomplete="phone"
                                    :value="application.ffirstname"
                                />
                            </div>
                            <div class="col-lg-6">
                                <label for="">FATHER'S LASTNAME</label>
                                <input
                                    type="text"
                                    disabled
                                    class="form-control"
                                    name="firstname"
                                    autocomplete="phone"
                                    :value="application.flastname"
                                />
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-6">
                                <label for="">FATHER'S State</label>
                                <select
                                    name="account_type"
                                    id="account_type"
                                    class="form-control"
                                >
                                    <option
                                        selected
                                        disabled
                                        :value="application.fstate"
                                    >
                                        {{ application.fstate }}
                                    </option>
                                </select>
                            </div>
                            <div class="col-lg-6">
                                <label for="gender">FATHER'S LGA</label>
                                <select
                                    class="form-control"
                                    name="account_type"
                                    id="account_type"
                                >
                                    <option selected disabled value="">
                                        {{ application.flga }}
                                    </option>
                                </select>
                            </div>
                            <div class="col-lg-6">
                                <label for="phonw">FATHER'S PHONE</label>
                                <input
                                    id="phone"
                                    type="number"
                                    class="form-control"
                                    disabled
                                    autocomplete="phone"
                                    :value="application.fphone"
                                />
                            </div>
                        </div>
                    </div>
                </tab-content>
                <tab-content title="Upload Identification" icon="fa fa-check">
                    <div class="col-lg-10 mt-30">
                        <img
                            class="img-avatar img-avatar96"
                            :src="application.image_url"
                        />
                    </div>
                    <div class="container">
                        <button
                            @click.prevent="viewImage(application.image_url)"
                            class="mt-2"
                        >
                            view passport
                        </button>
                    </div>
                    <br />
                    <hr />
                    <div class="col-lg-10">
                        <img width="30%" :src="application.certificate_url" />
                    </div>
                    <div class="container mb-5">
                        <button
                            @click.prevent="
                                viewImage(application.certificate_url)
                            "
                            class="mt-2"
                        >
                            view certificate
                        </button>
                    </div>
                </tab-content>

                <tab-content title="Payment" icon="fa fa-check">
                    <div class="col-lg-12 mt-30">
                        <div class="py-30 text-center">
                            <Button
                                @click.prevent="
                                    updateApplication(application.id, 1)
                                "
                                class="btn btn-success"
                                >Approve Application</Button
                            >
                            <Button
                                @click.prevent="
                                    updateApplication(application.id, 2)
                                "
                                class="btn btn-danger"
                                >Reject Application</Button
                            >
                        </div>
                    </div>
                </tab-content>
            </form-wizard>
        </div>

        <div
            class="modal fade"
            id="modal-fadein"
            tabindex="-1"
            role="dialog"
            aria-labelledby="modal-fadein"
            style="display: none;"
            aria-hidden="true"
        >
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <img :src="image_url" alt="image" />
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import axios from "axios";
import Vue from "vue";
import FormWizard from "vue-form-wizard";
import "vue-form-wizard/dist/vue-form-wizard.min.css";
import swal from "sweetalert2";
import { format } from "date-fns";

const toast = swal.mixin({
    toast: true,
    position: "top-end",
    showConfirmButton: false,
    timer: 3000
});

Vue.use(FormWizard);
export default {
    data() {
        return {
            format,
            application: {},
            image_url: "",
            status: false
        };
    },
    methods: {
        updateApplication(id, status) {
            swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, update it!"
            }).then(async result => {
                if (result.value) {
                    try {
                        await axios.post(
                            `/management/applications/update/${id}`,
                            { status }
                        );
                        this.status = true;
                        this.thankYou();
                        swal.fire(
                            "Updated!",
                            "Application status updated successfully",
                            "success"
                        );
                    } catch (error) {
                        swal(
                            "Failed!",
                            "There was something wrong.",
                            "warning"
                        );
                    }
                }
            });
        },
        viewImage(image_url) {
            this.image_url = image_url;
            $("#modal-fadein").modal("show");
        },
        thankYou() {
            if (!this.status) {
                console.log(toast.fire);
                toast.fire({
                    type: "error",
                    title: "You need to update the application status"
                });
                return false;
            }
            location.href = "/management/applications";
        },
        async getApplication() {
            try {
                let id = localStorage.getItem("application_id");
                let response = await axios.get(
                    `/management/applications/${id}`
                );
                let application = response.data;
                application.image_url = `/passports/${application.passport}`;
                application.certificate_url = `/certificates/${application.certificate}`;
                this.application = application;
            } catch (error) {
                console.log(error);
            }
        }
    },
    created() {
        this.getApplication();
    }
};
</script>
<style>
.error {
    border-color: #ef5350;
}
.pointer {
    cursor: pointer;
}
</style>
