<template>
    <div class="container">

        <div class="form-row">
            <div class="col-row col-md-12">
                <input type="text" class="form-control ml-3 mt-3" placeholder="Rechercher...">
            </div>
        </div>

        <add-employee @employee-added="employeesRefresh"></add-employee>

        <table class="table table-hover  table-responsive ml-3">
            <thead class="bg-info">
            <tr style="font-size: 16px">
                <th scope="row">ID</th>
                <th scope="col">AUTO</th>
                <th scope="col">NOM</th>
                <th scope="col">PRENOM</th>
                <th scope="col">EMAIL</th>
                <th scope="col">VILLE</th>
                <th scope="col">STATUT</th>
                <th scope="col">ACTIONS</th>
            </tr>
            </thead>

            <tbody v-for="employee in employees.data" :key="employee.id">
            <tr>
                <td>{{employee.id}}</td>
                <td>{{employee. e_card_id}}</td>
                <td>{{employee.e_last_name}}</td>
                <td>{{employee.e_first_name}}</td>
                <td>{{employee.e_email}}</td>
                <td>{{employee.e_city}}</td>
                <td>{{employee.e_status}}</td>
                <td class="d-flex">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary mr-2 " data-toggle="modal" data-target="#editModal">
                        VOIR
                    </button>
                    <button type="button" class="btn btn-warning " data-toggle="modal" data-target="#editModal"
                            @click="getEmployee(employee.id)">
                        EDITER
                    </button>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-danger ml-2" data-toggle="modal" data-target="#deleteModal">
                        SUPPRIMER
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel"
                         aria-hidden="true">
                        <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                                <div class="modal-body" style="font-size: 18px">

                                    Confirmer la Suppression ?

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" @click="deleteEmployee(employee.id)"
                                            data-dismiss="modal">OUI
                                    </button>
                                    <button type="button" class="btn btn-primary" data-dismiss="modal">NON
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                </td>

            </tr>
            </tbody>
            <pagination :data="employees" @pagination-change-page="getResults"
                        class="mt-2 justify-content-center"></pagination>

        </table>
        <edit-employee v-bind:employeesToEdit="employeesToEdit" @employee-update="employeesRefresh"></edit-employee>
    </div>


</template>

<script>
    export default {
        data() {
            return {
                employees: {},
                employeesToEdit: {},
            }
        },
        created() {
            axios.get('http://127.0.0.1:8000/employeesLists')
                .then(response => this.employees = response.data)
                .catch(error => console.log(error));
        },
        methods: {
            getResults(page = 1) {
                axios.get('http://127.0.0.1:8000/employeesLists?page=' + page)
                    .then(response => {
                        this.employees = response.data;
                    });
            },
            getEmployee(id) {
                axios.get('http://127.0.0.1:8000/employees/edit/' + id)
                    .then(response => this.employeesToEdit = response.data)
                    .catch(error => console.log(error));
            },
            deleteEmployee(id) {
                axios.delete('http://127.0.0.1:8000/employees/' + id)
                    .then(response => this.employees = response.data)
                    .catch(error => console.log(error));
            },
            employeesRefresh(employees) {
                this.employees = employees.data;
            }
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
