<template>
    <div class="container">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary my-3" data-toggle="modal" data-target="#addModal">
            INSCRIRE
        </button>

        <!-- Modal -->
        <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header bg-info">
                        <h5 class="modal-title text-white" id="addModalLabel">INSCRIPTION D'UN AGENT</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="e_card_id">Numéro d'Autorisation</label>
                                    <input type="text" name="e_card_id" class="form-control" id="e_card_id" v-model="e_card_id">
                                    <span v-if="errors.e_card_id" class="error">{{errors.e_card_id[0]}}</span>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="e_last_name">Nom</label>
                                    <input type="text" name="e_last_name" class="form-control" id="e_last_name" v-model="e_last_name">
                                    <span v-if="errors.e_last_name" class="error">{{errors.e_last_name[0]}}</span>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="e_first_name">Prénom</label>
                                    <input type="text" name="e_first_name" class="form-control" id="e_first_name" v-model="e_first_name">
                                    <span v-if="errors.e_first_name" class="error">{{errors.e_first_name[0]}}</span>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="e_birthday_date">Date De Naissance</label>
                                    <input type="text" name="e_birthday_date" class="form-control" id="e_birthday_date" v-model="e_birthday_date">
                                    <span v-if="errors.e_birthday_date" class="error">{{errors.e_birthday_date[0]}}</span>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="e_city_of_birth">Ville De Naissance</label>
                                    <input type="text" name="e_city_of_birth" class="form-control" id="e_city_of_birth" v-model="e_city_of_birth">
                                    <span v-if="errors.e_city_of_birth" class="error">{{errors.e_city_of_birth[0]}}</span>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="e_city">Ville De Résidence</label>
                                    <input type="text" name="e_city" class="form-control" id="e_city" v-model="e_city">
                                    <span v-if="errors.e_city" class="error">{{errors.e_city[0]}}</span>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="e_adress">Adresse</label>
                                    <input type="text" name="e_adress" class="form-control" id="e_adress" v-model="e_adress">
                                    <span v-if="errors.e_adress" class="error">{{errors.e_adress[0]}}</span>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="e_postal_code">Code Postal</label>
                                    <input type="text" name="e_postal_code" class="form-control" id="e_postal_code" v-model="e_postal_code">
                                    <span v-if="errors.e_postal_code" class="error">{{errors.e_postal_code[0]}}</span>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="e_email">Email</label>
                                    <input type="email" name="e_email" class="form-control" id="e_email" v-model="e_email">
                                    <span v-if="errors.e_email" class="error">{{errors.e_email[0]}}</span>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="e_status">Statut</label>
                                    <input type="text" name="e_status" class="form-control" id="e_status" v-model="e_status">
                                    <span v-if="errors.e_status" class="error">{{errors.e_status[0]}}</span>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="e_number">Numéro Tel</label>
                                    <input type="text" name="e_number" class="form-control" id="e_number" v-model="e_number">
                                    <span v-if="errors.e_number" class="error">{{errors.e_number[0]}}</span>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">ANNULER</button>
                        <button type="button" class="btn btn-success" @click="addEmployee" >INSCRIRE</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
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
        methods: {
            addEmployee(){
                this.errors = [];
                axios.post('http://127.0.0.1:8000/employeesLists', {
                    e_card_id: this.e_card_id,
                    e_last_name: this.e_last_name,
                    e_first_name: this.e_first_name,
                    e_birthday_date: this.e_birthday_date,
                    e_city_of_birth: this.e_city_of_birth,
                    e_number: this.e_number,
                    e_email: this.e_email,
                    e_city: this.e_city,
                    e_adress: this.e_adress,
                    e_postal_code: this.e_postal_code,
                    e_status: this.e_status,
                })
                    .then(response => {
                        this.$emit('employee-added', response);
                        this.e_card_id = '';
                        this.e_last_name = '';
                        this.e_first_name = '';
                        this.e_birthday_date = '';
                        this.e_city_of_birth = '';
                        this.e_number = '';
                        this.e_email = '';
                        this.e_city = '';
                        this.e_adress = '';
                        this.e_postal_code = '';
                        this.e_status = '';
                    })
                    .catch(error => {
                        if (error.response.status === 422){
                            this.errors = error.response.data.errors;
                        }
                    });
            },

        },

        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
