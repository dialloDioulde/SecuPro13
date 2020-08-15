<template>
    <div class="container">

            <ul class="list-group">
                <li class="list-group-item" v-for="employee in employees" :key="employee.id">
                    <a href="#">{{employee.e_last_name}} -- {{employee.e_first_name}} -- {{employee.e_email}}</a>
                </li>
            </ul>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                employees: {},
            }
        },
        created() {
            axios.get('http://127.0.0.1:8000/employeesLists')
            .then(response => this.employees = response.data)
            .catch(error => console.log(error));
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
