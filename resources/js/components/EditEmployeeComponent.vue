<template>
    <div>
        <!-- Modal -->
        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">ÉDITION DES INFORMATIONS DE {{this.employeesToEdit.e_last_name}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="e_card_id">Numéro d'Autorisation</label>
                                    <input type="text" name="e_card_id" class="form-control" id="e_card_id" v-model="employeesToEdit.e_card_id">
                                    <span v-if="errors.e_card_id" class="error text-danger">{{errors.e_card_id[0]}}</span>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="e_last_name">Nom</label>
                                    <input type="text" name="e_last_name" class="form-control" id="e_last_name" v-model="employeesToEdit.e_last_name">
                                    <span v-if="errors.e_last_name" class="error text-danger">{{errors.e_last_name[0]}}</span>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="e_first_name">Prénom</label>
                                    <input type="text" name="e_first_name" class="form-control" id="e_first_name" v-model="employeesToEdit.e_first_name">
                                    <span v-if="errors.e_first_name" class="error text-danger">{{errors.e_first_name[0]}}</span>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="e_birthday_date">Date De Naissance</label>
                                    <input type="text" name="e_birthday_date" class="form-control" id="e_birthday_date" v-model="employeesToEdit.e_birthday_date">
                                    <span v-if="errors.e_birthday_date" class="error text-danger">{{errors.e_birthday_date[0]}}</span>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="e_city_of_birth">Ville De Naissance</label>
                                    <input type="text" name="e_city_of_birth" class="form-control" id="e_city_of_birth" v-model="employeesToEdit.e_city_of_birth">
                                    <span v-if="errors.e_city_of_birth" class="error text-danger">{{errors.e_city_of_birth[0]}}</span>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="e_city">Ville De Résidence</label>
                                    <input type="text" name="e_city" class="form-control" id="e_city" v-model="employeesToEdit.e_city">
                                    <span v-if="errors.e_city" class="error text-danger">{{errors.e_city[0]}}</span>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="e_adress">Adresse</label>
                                    <input type="text" name="e_adress" class="form-control" id="e_adress" v-model="employeesToEdit.e_adress">
                                    <span v-if="errors.e_adress" class="error text-danger">{{errors.e_adress[0]}}</span>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="e_postal_code">Code Postal</label>
                                    <input type="text" name="e_postal_code" class="form-control" id="e_postal_code" v-model="employeesToEdit.e_postal_code">
                                    <span v-if="errors.e_postal_code" class="error text-danger">{{errors.e_postal_code[0]}}</span>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="e_email">Email</label>
                                    <input type="email" name="e_email" class="form-control" id="e_email" v-model="employeesToEdit.e_email">
                                    <span v-if="errors.e_email" class="error text-danger">{{errors.e_email[0]}}</span>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="e_status">Statut</label>
                                    <input type="text" name="e_status" class="form-control" id="e_status" v-model="employeesToEdit.e_status">
                                    <span v-if="errors.e_status" class="error text-danger">{{errors.e_status[0]}}</span>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="e_number">Numéro Tel</label>
                                    <input type="text" name="e_number" class="form-control" id="e_number" v-model="employeesToEdit.e_number">
                                    <span v-if="errors.e_number" class="error text-danger">{{errors.e_number[0]}}</span>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">ANNULER</button>
                        <button type="button" class="btn btn-success" @click="employeeUpdate">Mettre à Jour</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>

<script>
    export default {
        props: ['employeesToEdit'],
        data(){
            return {
                e_card_id: '',
                e_last_name: '',
                e_first_name: '',
                e_birthday_date: '',
                e_city_of_birth: '',
                e_number: '',
                e_email: '',
                e_city: '',
                e_adress: '',
                e_postal_code: '',
                e_status: '',
                errors: [],
            }
        },
        methods:{
            employeeUpdate(){
                this.errors = [];
                axios.patch('http://127.0.0.1:8000/employees/edit/' + this.employeesToEdit.id, {
                    e_card_id: this.employeesToEdit.e_card_id,
                    e_last_name: this.employeesToEdit.e_last_name,
                    e_first_name: this.employeesToEdit.e_first_name,
                    e_birthday_date: this.employeesToEdit.e_birthday_date,
                    e_city_of_birth: this.employeesToEdit.e_city_of_birth,
                    e_number: this.employeesToEdit.e_number,
                    e_email: this.employeesToEdit.e_email,
                    e_city: this.employeesToEdit.e_city,
                    e_adress: this.employeesToEdit.e_adress,
                    e_postal_code: this.employeesToEdit.e_postal_code,
                    e_status: this.employeesToEdit.e_status,
                })
                .then(response => {
                    this.$emit('employee-update', response);
                    window.location.reload(true);
                })
                .catch(error => {
                    if (error.response.status === 422){
                        this.errors = error.response.data.errors;
                    }
                });
            },
        }
    }
</script>

