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
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="e_last_name">Nom</label>
                                    <input type="text" name="e_last_name" class="form-control" id="e_last_name" v-model="employeesToEdit.e_last_name">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="e_first_name">Prénom</label>
                                    <input type="text" name="e_first_name" class="form-control" id="e_first_name" v-model="employeesToEdit.e_first_name">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="e_birthday_date">Date De Naissance</label>
                                    <input type="text" name="e_birthday_date" class="form-control" id="e_birthday_date" v-model="employeesToEdit.e_birthday_date">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="e_city_of_birth">Ville De Naissance</label>
                                    <input type="text" name="e_city_of_birth" class="form-control" id="e_city_of_birth" v-model="employeesToEdit.e_city_of_birth">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="e_city">Ville De Résidence</label>
                                    <input type="text" name="e_city" class="form-control" id="e_city" v-model="employeesToEdit.e_city">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="e_adress">Adresse</label>
                                    <input type="text" name="e_adress" class="form-control" id="e_adress" v-model="employeesToEdit.e_adress">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="e_postal_code">Code Postal</label>
                                    <input type="text" name="e_postal_code" class="form-control" id="e_postal_code" v-model="employeesToEdit.e_postal_code">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="e_email">Email</label>
                                    <input type="email" name="e_email" class="form-control" id="e_email" v-model="employeesToEdit.e_email">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="e_status">Statut</label>
                                    <input type="text" name="e_status" class="form-control" id="e_status" v-model="employeesToEdit.e_status">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="e_number">Numéro Tel</label>
                                    <input type="text" name="e_number" class="form-control" id="e_number" v-model="employeesToEdit.e_number">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">ANNULER</button>
                        <button type="button" class="btn btn-success" @click="employeeUpdate" data-dismiss="modal">Mettre à Jour</button>
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
            }
        },
        methods:{
            employeeUpdate(){
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
                .then(response => this.$emit('employee-update', response))
                .catch(error => console.log(error));
            },
        }
    }
</script>

