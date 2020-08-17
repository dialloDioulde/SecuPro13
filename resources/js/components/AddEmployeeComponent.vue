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
                    <div class="modal-header bg-success">
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
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="e_last_name">Nom</label>
                                    <input type="text" name="e_last_name" class="form-control" id="e_last_name" v-model="e_last_name">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="e_first_name">Prénom</label>
                                    <input type="text" name="e_first_name" class="form-control" id="e_first_name" v-model="e_first_name">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="e_birthday_date">Date De Naissance</label>
                                    <input type="text" name="e_birthday_date" class="form-control" id="e_birthday_date" v-model="e_birthday_date">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="e_city_of_birth">Ville De Naissance</label>
                                    <input type="text" name="e_city_of_birth" class="form-control" id="e_city_of_birth" v-model="e_city_of_birth">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="e_city">Ville De Résidence</label>
                                    <input type="text" name="e_city" class="form-control" id="e_city" v-model="e_city">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="e_adress">Adresse</label>
                                    <input type="text" name="e_adress" class="form-control" id="e_adress" v-model="e_adress">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="e_postal_code">Code Postal</label>
                                    <input type="text" name="e_postal_code" class="form-control" id="e_postal_code" v-model="e_postal_code">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="e_email">Email</label>
                                    <input type="email" name="e_email" class="form-control" id="e_email" v-model="e_email">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="e_status">Statut</label>
                                    <input type="text" name="e_status" class="form-control" id="e_status" v-model="e_status">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="e_number">Numéro Tel</label>
                                    <input type="text" name="e_number" class="form-control" id="e_number" v-model="e_number">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">ANNULER</button>
                        <button type="button" class="btn btn-success" @click="addEmployee" data-dismiss="modal">INSCRIRE</button>
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
            }
        },
        methods: {
            addEmployee(){
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
                    .then(response => this.$emit('employee-added', response))
                    .catch(error => console.log(error));
            },

        },

        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
