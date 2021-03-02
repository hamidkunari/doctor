<template>
    <div>
        <div class="row">
            <router-link to="/store-doctor" class="btn btn-primary"
                >Add Doctor
            </router-link>
        </div>
        <br />
        <input
            type="text"
            v-model="searchTerm"
            class="form-control"
            style="width: 300px;"
            placeholder="Search Here"
        />

        <br />

        <div class="row">
            <div class="col-lg-12 mb-4">
                <!-- Simple Tables -->
                <div class="card">
                    <div
                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between"
                    >
                        <h6 class="m-0 font-weight-bold text-primary">
                            Doctor List
                        </h6>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th>Name</th>
                                    <th>Photo</th>
                                    <th>Speciality</th>
                                    <th>Status</th>
                                    <th>Joining Date</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr
                                    v-for="employee in filtersearch"
                                    :key="employee.id"
                                >
                                    <td>{{ employee.name }}</td>
                                    <td>
                                        <img
                                            :src="employee.photo"
                                            id="em_photo"
                                        />
                                    </td>
                                     <td>{{ employee.sname }}</td>
                                    <td v-if="employee.status =='Active'">
                                        <a class="btn btn-sm btn-success" style="color:black;">
                                    {{ employee.status }}
                                </a>
                            </td>
                             <td v-else="employee.status =='UnActive'">
                              <a class="btn btn-sm btn-warning" style="color:black;">
                                    {{ employee.status }}
                                </a>
                            </td>
                                    <td>{{ employee.date }}</td>
                                    <td class="text-right">
                                        <router-link
                                            :to="{
                                                name: 'view-doctor',
                                                params: { id: employee.id }
                                            }"
                                            class="btn btn-sm btn-info"
                                            ><i class="fas fa-user"></i></router-link
                                        >

                                        <router-link
                                            :to="{
                                                name: 'edit-doctor',
                                                params: { id: employee.id }
                                            }"
                                            class="btn btn-sm btn-primary"
                                            ><i class="fas fa-edit"></i></router-link
                                        >

                                        <a
                                            @click="deleteEmployee(employee.id)"
                                            class="btn btn-sm btn-danger"
                                            ><i class="fas fa-trash-alt"></i></a
                                        >
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer"></div>
                </div>
            </div>
        </div>
        <!--Row-->
    </div>
</template>

<script type="text/javascript">
export default {
    created() {
        if (!User.loggedIn()) {
            this.$router.push({ name: "/" });
        }
    },
    data() {
        return {
            employees: [],
            searchTerm: ""
        };
    },
    computed: {
        filtersearch() {
            return this.employees.filter(employee => {
                return employee.name.match(this.searchTerm);
            });
        }
    },

    methods: {
        allEmployee() {
            axios
                .get("/api/doctor/")
                .then(({ data }) => (this.employees = data))
                .catch();
        },
        deleteEmployee(id) {
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then(result => {
                if (result.value) {
                    axios
                        .delete("/api/doctor/" + id)
                        .then(() => {
                            this.employees = this.employees.filter(employee => {
                                return employee.id != id;
                            });
                        })
                        .catch(() => {
                            this.$router.push({ name: "doctor" });
                        });
                    Swal.fire(
                        "Deleted!",
                        "Your file has been deleted.",
                        "success"
                    );
                }
            });
        }
    },
    created() {
        this.allEmployee();
    }
};
</script>

<style type="text/css">
#em_photo {
    height: 40px;
    width: 40px;
    border-radius: 50px;
}
table td{
    color:black;
    font-family: inherit;
}
table th{
    color:black;
    font-weight: bold;
}
</style>
