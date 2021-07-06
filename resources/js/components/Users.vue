<template>
    <div>
        <nav class="breadcrumb bg-white push">
            <a class="breadcrumb-item" href="javascript:void(0)">Dashboard</a>
            <span class="breadcrumb-item active">Users</span>
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
                                        placeholder="Search by email or name"
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

                                        <th>Name</th>
                                        <th>Email</th>
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
                                        v-for="(user, index) in filteredUsers"
                                    >
                                        <td class="text-center sorting_1">
                                            {{ index + 1 }}
                                        </td>
                                        <td>
                                            <a href>{{ user.name }}</a>
                                        </td>
                                        <td @click.prevent="">
                                            {{ user.email }}
                                        </td>
                                        <td class="text-center">
                                            <button
                                                type="button"
                                                class="btn btn-danger"
                                                @click.prevent="
                                                    deleteUser(user.id)
                                                "
                                            >
                                                <i class="fa fa-trash"></i>
                                                Delete
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
            users: [],
        };
    },
    methods: {
        async getUsers() {
            try {
                let response = await axios.get("/management/users/all");
                this.users = response.data;
            } catch (error) {
                console.log(error);
            }
        },
        deleteUser(id) {
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
                        await axios.delete(`/management/users/delete/${id}`);
                        await this.getUsers();
                        swal.fire(
                            "Deleted!",
                            "User deleted successfully",
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
        this.getUsers();
    },
    computed: {
        filteredUsers() {
            return this.users.filter(user => {
                return (
                    user.name
                        .toLowerCase()
                        .includes(this.search.toLowerCase()) ||
                    user.email.toLowerCase().includes(this.search.toLowerCase())
                );
            });
        }
    }
};
</script>
