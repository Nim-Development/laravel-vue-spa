<template>
    <v-dialog max-width="600px" v-model="dialog">
        <template v-slot:activator="{ on }">
            <v-btn 
                flat
                class="success"
                v-on="on"
            >
                Add New Project
            </v-btn>
        </template>
        <v-card>
            <v-card-title>
                <h2>Add A New Project</h2>
            </v-card-title>
            <v-card-text>
                <v-form class="px-3" ref="form">
                    <v-text-field label="title" prepend-icon="folder" v-model="title" :rules="inputRules"></v-text-field>
                    <v-textarea label="Information" prepend-icon="edit" v-model="content" :rules="inputRules"></v-textarea>

                    <v-menu>
                        <template v-slot:activator="{ on }">
                            <v-text-field 
                                label="Due Date"
                                prepend-icon="date_range"
                                v-on="on"
                                :value="formattedDate"
                                :rules="inputRules"
                            ></v-text-field>
                        </template>
                        <v-date-picker v-model="due">

                        </v-date-picker>
                        
                    </v-menu>

                    <v-btn flat class="success mx-0 mt-3" 
                        @click="submit"
                        :loading="loading"
                        >Add Project
                    </v-btn>
                </v-form>
            </v-card-text>
        </v-card>
    </v-dialog>
</template>
<script>
import format from "date-fns/format";
export default {
    name: 'Popup',
    data(){
        return {
            title: '',
            content: '',
            due: null,

            //These are form validation functions/rules
            inputRules: [
                (v) => v.length >= 3 || 'Minimum length is 3 characters'
            ],

            //btn loader
            loading: false,
            dialog: false
            
        }
    },
    methods:{
        submit(){
            

            //Check if form is valid 
            //refference form by template prop: ref="form"
            // validate() checks our vuetify inputRules to check if the form is valid !! :D :D
            if(this.$refs.form.validate()){

                //::nk Add API logics
                axios.post(`http://127.0.0.1:8000/api/add_project`, {
                    member_id: 1,
                    title: this.title,
                    due: this.due,
                    status: 'Unfinished'
                })
                .then(response => {
                    //switching on the loader
                    this.loading = false;

                    //Closing the dialog box
                    this.dialog = false;

                    //Emit an event to notify other components about the project upload
                    this.$emit('projectAdded')
                })
                .catch(e => {
                    this.errors.push(e)
                })
            }else{
                console.log('Form is not valid!');
            }  
        }
    },
    computed:{
        formattedDate(){
            return this.due ? format(this.due, 'Do MMM YYYY') : ''
        }
    }
}
</script>
