<template>
    <div>
        <div v-if="application" class="block-content">
            <p class="mb-30" v-if="application.is_paid === 0">
                You have a pending application. Click
                <a
                    class="text-danger pointer"
                    @click.prevent="showForm = true"
                    type="button"
                    >here</a
                >
                to contiue the application process.
            </p>
            <p class="mb-30" v-if="application.is_paid === 1">
                {{
                    application.is_approved === 0
                        ? "You have an application awaiting approval"
                        : application.is_approved === 1
                        ? "Your application has been approved."
                        : " Your application has been rejected. You do not meet the criteria for approval."
                }}
            </p>
        </div>
        <!-- table starts here -->
        <div v-if="application.is_paid === 1" class="table-responsive">
            <table class="table table-striped table-vcenter">
                <thead>
                    <tr>
                        <th>
                            <i class="si si-user"></i>
                        </th>
                        <th>Reference ID</th>
                        <th>Status</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <img
                                class="img-avatar img-avatar48"
                                :src="image_url"
                                alt=""
                            />
                        </td>
                        <td class="font-w600">
                            {{ application.reference }}
                        </td>

                        <td>
                            <span
                                v-if="application.is_approved === 0"
                                class="badge badge-warning"
                                >PENDING</span
                            >
                            <span
                                v-if="application.is_approved === 1"
                                class="badge badge-success"
                                >APPROVED</span
                            >
                            <span v-else class="badge badge-danger"
                                >REJECTED</span
                            >
                        </td>

                        <td>
                            {{
                                format(
                                    new Date(application.created_at),
                                    "dd MMM, yyyy"
                                )
                            }}
                        </td>
                        <td v-if="application.is_approved === 1">
                            <a href="/certificate/preview" class="btn">
                                <i class="si si-eye"></i> Preview</a
                            >
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- table ends here -->
        <div v-if="showForm || !application">
            <form-wizard
                :title="
                    application
                        ? 'Continue the application process'
                        : 'Start a new application'
                "
                :subtitle="
                    application
                        ? 'Kindly verify the provided details'
                        : 'Kindly provide the required details to proceed.'
                "
                color="#240727"
                :finishButtonText="processing ? 'Processing...' : 'Complete'"
                @on-complete="thankYou"
            >
                <tab-content
                    title="Personal Details"
                    icon="fa fa-check"
                    :before-change="setPersonal"
                >
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
                                                :class="{
                                                    error: isFirstNameError
                                                }"
                                                required
                                                name="firstname"
                                                autocomplete="phone"
                                                v-model="firstname"
                                            />
                                            <span
                                                v-if="isFirstNameError"
                                                class="text-danger"
                                            >
                                                The first name is required
                                            </span>
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
                                                :class="{
                                                    error: isLastNameError
                                                }"
                                                required
                                                autocomplete="phone"
                                                v-model="lastname"
                                            />
                                            <span
                                                v-if="isLastNameError"
                                                class="text-danger"
                                            >
                                                The last name is required
                                            </span>
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
                                                v-model="othername"
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
                                                :class="{ error: isPhoneError }"
                                                required
                                                autocomplete="phone"
                                                v-model="phone"
                                            />
                                            <span
                                                v-if="isPhoneError"
                                                class="text-danger"
                                            >
                                                {{ phoneMessage }}
                                            </span>
                                        </div>
                                        <div class="col-lg-6">
                                            <label for="email">EMAIL</label>
                                            <input
                                                id="email"
                                                type="text"
                                                class="form-control"
                                                required
                                                :value="email"
                                                disabled
                                            />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-6">
                                            <label for="gender">GENDER</label>
                                            <select
                                                v-model="gender"
                                                name="gender"
                                                id="gender"
                                                class="form-control"
                                                :class="{
                                                    error: isGenderError
                                                }"
                                            >
                                                <option
                                                    selected
                                                    disabled
                                                    value=""
                                                    >-- Choose Gender --</option
                                                >
                                                <option value="Male"
                                                    >Male</option
                                                >
                                                <option value="Female"
                                                    >Female</option
                                                >
                                            </select>
                                            <span
                                                v-if="isGenderError"
                                                class="text-danger"
                                            >
                                                The gender is required
                                            </span>
                                        </div>
                                        <div class="col-lg-6">
                                            <label for="login-password"
                                                >DATE OF BIRTH</label
                                            >
                                            <input
                                                v-model="dob"
                                                type="date"
                                                class="js-datepicker form-control"
                                                :class="{ error: isDOBError }"
                                                id="example-datepicker3"
                                                name="example-datepicker3"
                                                data-week-start="1"
                                                data-autoclose="true"
                                                data-today-highlight="true"
                                                data-date-format="dd-mm-yyyy"
                                                placeholder="dd-mm-yyyy"
                                            />
                                            <span
                                                v-if="isDOBError"
                                                class="text-danger"
                                            >
                                                {{ DOBMessage }}
                                            </span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-6">
                                            <label for="">State</label>
                                            <select
                                                @change.prevent="getLgas"
                                                name="account_type"
                                                id="account_type"
                                                class="form-control"
                                                :class="{ error: isStateError }"
                                            >
                                                <option value=""
                                                    >--select state--</option
                                                >
                                                <option
                                                    v-for="(state,
                                                    index) in states"
                                                    :key="index"
                                                    :value="state"
                                                >
                                                    {{ state }}
                                                </option>
                                            </select>
                                            <span
                                                v-if="isStateError"
                                                class="text-danger"
                                            >
                                                The state is required
                                            </span>
                                        </div>
                                        <div class="col-lg-6">
                                            <label for="gender">LGA</label>
                                            <select
                                                v-model="lga"
                                                name="account_type"
                                                id="account_type"
                                                class="form-control"
                                                :class="{ error: isLGAError }"
                                            >
                                                <option
                                                    v-for="(s_lga,
                                                    index) in lgas"
                                                    :key="index"
                                                    :value="s_lga"
                                                >
                                                    {{ s_lga }}
                                                </option>
                                            </select>
                                            <span
                                                v-if="isLGAError"
                                                class="text-danger"
                                            >
                                                The LGA is required
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </tab-content>
                <tab-content
                    title="Other Information"
                    icon="fa fa-check"
                    :before-change="setOthers"
                >
                    <div class="col-lg-12 mt-30">
                        <div class="form-group row">
                            <div class="col-lg-6">
                                <label for="">FATHER'S FIRSTNAME</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    :class="{ error: isFFirstNameError }"
                                    required
                                    name="firstname"
                                    autocomplete="phone"
                                    v-model="ffirstname"
                                />
                                <span
                                    v-if="isFFirstNameError"
                                    class="text-danger"
                                >
                                    The first name is required
                                </span>
                            </div>
                            <div class="col-lg-6">
                                <label for="">FATHER'S LASTNAME</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    :class="{ error: isFLastNameError }"
                                    required
                                    name="firstname"
                                    autocomplete="phone"
                                    v-model="flastname"
                                />
                                <span
                                    v-if="isFLastNameError"
                                    class="text-danger"
                                >
                                    The last name is required
                                </span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-6">
                                <label for="">FATHER'S State</label>
                                <select
                                    @change.prevent="getFLgas"
                                    v-model="fstate"
                                    name="account_type"
                                    id="account_type"
                                    class="form-control"
                                    :class="{ error: isStateError }"
                                >
                                    <option value="">--select state--</option>
                                    <option
                                        v-for="(state, index) in states"
                                        :key="index"
                                        :value="state"
                                    >
                                        {{ state }}
                                    </option>
                                </select>
                                <span v-if="isFStateError" class="text-danger">
                                    The state is required
                                </span>
                            </div>
                            <div class="col-lg-6">
                                <label for="gender">FATHER'S LGA</label>
                                <select
                                    v-model="flga"
                                    name="account_type"
                                    id="account_type"
                                    class="form-control"
                                    :class="{ error: isFLGAError }"
                                >
                                    <option
                                        v-for="(s_lga, index) in lgas"
                                        :key="index"
                                        :value="s_lga"
                                    >
                                        {{ s_lga }}
                                    </option>
                                </select>
                                <span v-if="isLGAError" class="text-danger">
                                    The LGA is required
                                </span>
                            </div>
                            <div class="col-lg-6">
                                <label for="phonw">FATHER'S PHONE</label>
                                <input
                                    id="phone"
                                    type="number"
                                    class="form-control"
                                    :class="{ error: isFPhoneError }"
                                    required
                                    autocomplete="phone"
                                    v-model="fphone"
                                />
                                <span v-if="isFPhoneError" class="text-danger">
                                    {{ fphoneMessage }}
                                </span>
                            </div>
                        </div>
                    </div>
                </tab-content>
                <tab-content
                    title="Upload Identification"
                    icon="fa fa-check"
                    :before-change="register"
                >
                    <div class="col-lg-10 mt-30">
                        <img
                            class="img-avatar img-avatar96"
                            :src="image_url ? image_url : default_image"
                        />
                        <form enctype="multipart/form-data">
                            <div class="form-group">
                                <label class="text-muted">
                                    Upload Passport
                                </label>
                                <small class="text-danger">required</small>

                                <div class="custom-file">
                                    <input
                                        type="file"
                                        ref="file"
                                        class="custom-file-input"
                                        id="example-file-input-custom"
                                        name="example-file-input-custom"
                                        data-toggle="custom-file-input"
                                        @change="onAvatarChanged"
                                        accept=".jpeg, .jpg, .png"
                                        required
                                    />
                                    <label
                                        class="custom-file-label"
                                        for="example-file-input-custom"
                                        >Choose File</label
                                    >
                                </div>
                            </div>
                        </form>
                    </div>
                    <br />
                    <hr />
                    <div class="col-lg-10">
                        <img width="30%" :src="certificate_url" />
                        <form enctype="multipart/form-data">
                            <div class="form-group">
                                <label class="text-muted">
                                    Upload BIRTH CERTIFICATE
                                </label>
                                <small class="text-danger">required</small>
                                <div class="custom-file">
                                    <input
                                        type="file"
                                        ref="file1"
                                        class="custom-file-input"
                                        name="example-file-input-custom"
                                        data-toggle="custom-file-input"
                                        @change="onFileChanged"
                                        required
                                    />
                                    <label
                                        class="custom-file-label"
                                        for="example-file-input-custom"
                                        >Choose File</label
                                    >
                                </div>
                            </div>
                        </form>
                    </div>
                </tab-content>

                <tab-content title="Payment" icon="fa fa-check">
                    <div class="col-lg-12 mt-30">
                        <div class="py-30 text-center">
                            <div v-if="!paymentCompleted">
                                <h3 class="h3 font-w700 base-color mb-10">
                                    Application has been intiated successfully!
                                </h3>
                                <h3 class="text-danger">
                                    {{ paymentMessage }}
                                </h3>
                                <paystack
                                    class="btn bg-flat-darker text-white"
                                    :amount="amount"
                                    :email="email"
                                    :paystackkey="paystackkey"
                                    :reference="reference"
                                    :callback="callback"
                                    :close="close"
                                    :embed="false"
                                >
                                    <i class="fas fa-money-bill-alt"></i>
                                    Make Payment
                                </paystack>
                            </div>
                            <div v-if="paymentCompleted">
                                <h3 class="h3 font-w700 text-success mb-10">
                                    Payment successful!
                                </h3>
                                <p>
                                    An email will be sent to
                                    <strong class="text-danger">{{
                                        email
                                    }}</strong>
                                    if application is approved! <br />
                                    Approval usually take up to 24hrs.
                                </p>
                            </div>
                        </div>
                    </div>
                </tab-content>
            </form-wizard>
        </div>
    </div>
</template>
<script>
import axios from "axios";
import Vue from "vue";
import FormWizard from "vue-form-wizard";
import "vue-form-wizard/dist/vue-form-wizard.min.css";
import NaijaStates from "naija-state-local-government";
import swal from "sweetalert2";
import paystack from "vue-paystack";
import { format } from "date-fns";

const toast = swal.mixin({
    toast: true,
    position: "top-end",
    showConfirmButton: false,
    timer: 3000
});

Vue.use(FormWizard);
export default {
    props: ["group", "email"],
    components: { paystack },
    data() {
        return {
            format,
            paystackkey: "pk_test_796a000f2a13fb933d98186483637964b83dc72f",
            showForm: false,
            application: null,
            states: NaijaStates.states(),
            lgas: [],
            processing: false,
            fstate: "",
            state: "",
            ffirstname: "",
            firstname: "",
            lastname: "",
            flastname: "",
            othername: "",
            flga: "",
            lga: "",
            fphone: "",
            phone: "",
            dob: "",
            gender: "",
            passport: "",
            certificate: "",
            default_image: "/img/avatar9.jpg",
            image_url: "",
            certificate_url: "",
            DOBMessage: "The date of birth is required",
            phoneMessage: "The phone number is required",
            fphoneMessage: "The phone number is required",
            isDOBError: true,
            isGenderError: true,
            isFPhoneError: true,
            isPhoneError: true,
            isStateError: true,
            isFStateError: true,
            isLGAError: true,
            isFLGAError: true,
            isFirstNameError: true,
            isLastNameError: true,
            isFLastNameError: true,
            isFFirstNameError: true,
            amount: null,
            transaction_id: null,
            application_id: null,
            paymentCompleted: false,
            paymentMessage: "",
            showTable: false
        };
    },
    methods: {
        computed: {
            reference() {
                let text = "";
                let possible =
                    "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

                for (let i = 0; i < 10; i++)
                    text += possible.charAt(
                        Math.floor(Math.random() * possible.length)
                    );

                return text;
            }
        },
        callback: async function(response) {
            try {
                if (
                    response.message === "Approved" &&
                    response.status === "success"
                ) {
                    this.paymentCompleted = true;
                    await axios.post(
                        `/user/application/payment/confirm/${this.application.id}`,
                        { reference: response.reference }
                    );
                } else {
                    this.paymentMessage = "Payment failed. Try again";
                }
            } catch (error) {
                console.log(error);
            }
        },
        close: function() {
            console.log("Payment closed");
        },
        getLgas(e) {
            let state = e.target.value;
            this.state = state;
            this.lgas = NaijaStates.lgas(state).lgas;
        },
        getFLgas() {
            let state = e.target.value;
            this.fstate = state;
            this.lgas = NaijaStates.lgas(state).lgas;
        },
        onAvatarChanged() {
            var uploadedFile = this.$refs.file.files[0];
            this.passport = uploadedFile;
            this.image_url = URL.createObjectURL(uploadedFile);
            return;
        },
        onFileChanged() {
            var uploadedFile = this.$refs.file1.files[0];
            this.certificate = uploadedFile;
            this.certificate_url = URL.createObjectURL(uploadedFile);
            return;
        },
        setPersonal() {
            if (
                this.firstname &&
                this.lastname &&
                this.phone &&
                this.state &&
                this.lga &&
                this.dob &&
                this.gender
            ) {
                toast.fire({
                    type: "success",
                    title: "Information saved successfully"
                });
                return true;
            } else {
                toast.fire({
                    type: "error",
                    title: "Ensure all fields are filled"
                });
                return false;
            }
        },
        setOthers() {
            if (
                this.ffirstname &&
                this.flastname &&
                this.fphone &&
                this.fstate &&
                this.flga
            ) {
                toast.fire({
                    type: "success",
                    title: "Information saved successfully"
                });
                return true;
            } else {
                toast.fire({
                    type: "error",
                    title: "Ensure all fields are filled"
                });
                return false;
            }
        },
        async register() {
            if (!this.passport && !this.application) {
                toast.fire({
                    type: "error",
                    title: "Upload a passport"
                });
                return false;
            }
            if (!this.certificate && !this.application) {
                toast.fire({
                    type: "error",
                    title: "Upload birth certificate"
                });
                return false;
            }

            try {
                this.processing = true;

                var formData = new FormData();
                formData.append("passport", this.passport);
                formData.append("certificate", this.certificate);
                formData.append("firstname", this.firstname);
                formData.append("lastname", this.lastname);
                formData.append("dob", this.dob);
                formData.append("othername", this.othername);
                formData.append("lga", this.lga);
                formData.append("gender", this.gender);
                formData.append("phone", this.phone);
                formData.append("state", this.state);
                formData.append("ffirstname", this.ffirstname);
                formData.append("flastname", this.flastname);
                formData.append("flga", this.flga);
                formData.append("fphone", this.fphone);
                formData.append("ffirstname", this.phone);

                let response;
                if (this.application) {
                    response = await axios.post(
                        `/user/application/apply/update/${this.application.id}`,
                        formData
                    );
                } else {
                    response = await axios.post(
                        "/user/application/apply",
                        formData
                    );
                }

                this.amount = response.data.amount;
                this.transaction_id = response.data.transaction_id;
                this.application_id = response.data.application_id;

                toast.fire({
                    type: "success",
                    title: "Application initiated"
                });
                this.processing = false;
                return true;
            } catch (error) {
                this.processing = false;
                if (error.response.status == 422) {
                    toast.fire({
                        type: "error",
                        title: error.response.data.errors.email[0]
                    });
                } else {
                    toast.fire({
                        type: "error",
                        title: "Something went wrong"
                    });
                }
            }
        },
        thankYou() {
            window.location.reload();
        },
        async getApplication() {
            try {
                let response = await axios.get("/application");
                let application = response.data;
                this.application = application;
                this.ffirstname = application.ffirstname;
                this.firstname = application.firstname;
                this.lastname = application.lastname;
                this.flastname = application.flastname;
                this.othername = application.othername;
                this.fphone = application.fphone;
                this.phone = application.phone;
                this.dob = application.dob;
                this.gender = application.gender;
                this.passport = application.passport;
                this.certificate = application.certificate;
                this.image_url = `/passports/${application.passport}`;
                this.certificate_url = `/certificates/${application.certificate}`;
            } catch (error) {
                console.log(error);
            }
        }
    },
    created() {
        this.getApplication();
    },
    watch: {
        firstname(data) {
            this.isFirstNameError = data.length > 1 ? false : true;
        },
        lastname(data) {
            this.isLastNameError = data.length > 1 ? false : true;
        },
        ffirstname(data) {
            this.isFFirstNameError = data.length > 1 ? false : true;
        },
        flastname(data) {
            this.isFLastNameError = data.length > 1 ? false : true;
        },
        othernames(data) {
            this.isLastNameError = data.length > 1 ? false : true;
        },
        gender(data) {
            this.isGenderError = data.length > 1 ? false : true;
        },
        state(data) {
            this.isStateError = data.length > 1 ? false : true;
        },
        lga(data) {
            this.isLGAError = data.length > 1 ? false : true;
        },
        fstate(data) {
            this.isFStateError = data.length > 1 ? false : true;
        },
        flga(data) {
            this.isFLGAError = data.length > 1 ? false : true;
        },
        phone(data) {
            this.isPhoneError = data.length === 11 ? false : true;
            if (data.length > 11 || data.length < 11) {
                this.phoneMessage = "Invalid phone number";
                this.isPhoneError = true;
                return;
            }
        },
        fphone(data) {
            this.isFPhoneError = data.length === 11 ? false : true;
            if (data.length > 11 || data.length < 11) {
                this.fphoneMessage = "Invalid phone number";
                this.isFPhoneError = true;
                return;
            }
        },
        dob(data) {
            let thisYear = new Date().getFullYear();
            let otherYear = new Date(data).getFullYear();
            let isDOBError = data.length === 10 ? false : true;
            if (!isDOBError) {
                if (thisYear - otherYear > 100) {
                    this.DOBMessage = "Age cannot be greater than 100";
                    this.isDOBError = true;
                    return;
                }
                if (thisYear - otherYear < 16) {
                    this.DOBMessage = "Age cannot be less than 16";
                    this.isDOBError = true;
                    return;
                }
                this.isDOBError = false;
            }
            this.DOBMessage = "The date of birth is required";
        }
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
