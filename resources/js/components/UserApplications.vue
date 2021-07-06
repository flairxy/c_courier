<template>
    <div>
        <nav class="breadcrumb bg-white push">
            <a class="breadcrumb-item" href="javascript:void(0)">Dashboard</a>
            <span class="breadcrumb-item active">Applications</span>
        </nav>
        <div class="block">
            <div class="block-content block-content-full">
                <!-- DataTables functionality is initialized with .js-dataTable-simple class in js/pages/be_tables_datatables.min.js which was auto compiled from _es6/pages/be_tables_datatables.js -->
                <div
                    id="DataTables_Table_0_wrapper"
                    class="dataTables_wrapper dt-bootstrap4 no-footer"
                >
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <div
                                id="DataTables_Table_1_filter"
                                class="dataTables_filter"
                            >
                                <label>
                                    Search:
                                    <input
                                        type="search"
                                        class="form-control form-control-sm"
                                        placeholder="Search transaction reference"
                                        aria-controls="DataTables_Table_1"
                                        v-model="search"
                                    />
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 table-responsive">
                            <table
                                class="table table-bordered table-striped table-vcenter js-dataTable-simple dataTable no-footer"
                                id="DataTables_Table_0"
                                role="grid"
                                aria-describedby="DataTables_Table_0_info"
                            >
                                <thead>
                                    <tr role="row">
                                        <th class="text-center" tabindex="0">
                                            #
                                        </th>

                                        <th>Reference</th>
                                        <th>Status</th>
                                        <th
                                            class="text-center"
                                            style="width: 15%;"
                                            rowspan="1"
                                            colspan="1"
                                        >
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr
                                        role="row"
                                        class="odd"
                                        v-for="(application,
                                        index) in filteredApplications"
                                    >
                                        <td class="text-center sorting_1">
                                            {{ index + 1 }}
                                        </td>
                                        <td>
                                            <a href>{{
                                                application.reference
                                            }}</a>
                                        </td>
                                        <td>
                                            <span
                                                v-if="
                                                    application.is_approved ===
                                                        0
                                                "
                                                class="badge badge-warning"
                                            >
                                                PENDING
                                            </span>
                                            <span
                                                v-if="
                                                    application.is_approved ===
                                                        1
                                                "
                                                class="badge badge-success"
                                            >
                                                APPROVED
                                            </span>
                                            <span
                                                v-if="
                                                    application.is_approved ===
                                                        2
                                                "
                                                class="badge badge-danger"
                                            >
                                                REJECTED
                                            </span>
                                        </td>
                                        <td class="text-center">
                                            <button
                                                type="button"
                                                class="btn btn-success"
                                                @click.prevent="
                                                    openApplication(
                                                        application.id
                                                    )
                                                "
                                            >
                                                <i class="fa fa-eye"></i>
                                            </button>
                                            <button
                                                type="button"
                                                class="btn btn-danger"
                                                @click.prevent="
                                                    deleteApplication(
                                                        application.id
                                                    )
                                                "
                                            >
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";
import swal from "sweetalert2";
export default {
    data() {
        return {
            processing: false,
            search: "",
            applications: []
        };
    },
    methods: {
        openApplication(id) {
            localStorage.setItem("application_id", id);
            location.href = `/management/applications/edit`;
        },
        async getApplications() {
            try {
                let response = await axios.get("/management/applications/all");
                this.applications = response.data;
            } catch (error) {
                console.log(error);
            }
        },
        deleteApplication(id) {
            swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then(async result => {
                if (result.value) {
                    try {
                        await axios.delete(
                            `/management/applications/delete/${id}`
                        );
                        await this.getApplications();
                        swal.fire(
                            "Deleted!",
                            "Application deleted successfully",
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
        }
    },
    created() {
        this.getApplications();
    },
    computed: {
        filteredApplications() {
            return this.applications.filter(application => {
                return application.reference
                    .toLowerCase()
                    .includes(this.search.toLowerCase());
            });
        }
    }
};
</script>
