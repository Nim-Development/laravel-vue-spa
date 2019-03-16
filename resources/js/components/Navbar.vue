<template>
    <nav>
        <!-- Snackbar -->
        <v-snackbar 
            v-model="snackbar"
            :timeout="3000"
            top
            color="success"
            >
            <span>Awesome! You added a new project.</span>
            <v-btn 
                flat color="white"
                @click="snackbar = false"
                >Close</v-btn>
        </v-snackbar>

        <v-toolbar flat app>
            <v-toolbar-side-icon class="grey--text" @click="collapse_drawer">
            </v-toolbar-side-icon>
            <v-toolbar-title class="text-uppercase grey--text">
                <span class="font-weight-light">Vuetify</span>
                <span>Todo</span>
            </v-toolbar-title>
            <v-spacer></v-spacer>
            <!-- Dropdown nav btn -->
            <v-menu offset-y>
                <template v-slot:activator="{ on }">
                    <v-btn
                    color="grey"
                    flat
                    dark
                    v-on="on"
                    >
                    <v-icon left>
                        expand_more
                    </v-icon>
                    <span>Menu</span>
                    </v-btn>
                </template>
                <v-list>
                    <v-list-tile
                    v-for="(link, index) in links"
                    :key="index"
                    router :to="link.route"
                    
                    >
                        <v-icon left color="grey">{{link.icon}}</v-icon>
                        <v-list-tile-title>{{ link.text }}</v-list-tile-title>
                    </v-list-tile>
                </v-list>
            </v-menu>

            <!-- Dropdown nav btn -->

            <v-btn flat dark color="grey">
                <span class="font-weight-bold">
                    Sign Out
                </span>
                <v-icon right>
                    exit_to_app
                </v-icon>
            </v-btn>
        </v-toolbar>

        <!-- Sidenav -->
        <v-navigation-drawer app v-model="drawer" class="primary">
            <v-layout column align-center>
                <v-flex class="mt-5 mb-1">
                    <v-avatar
                        color="grey lighten-4"
                        size="100px"
                        class="grey lighten-2 align-center"
                        >
                        <img :src="`/storage/images/avatar-1.png`" alt="avatar">
                    </v-avatar>
                    <p class="white--text subheading mt-1 text-xs-center">
                        Nick Knierim
                    </p>
                </v-flex>
                <v-flex class="mt-4 mb3">
                    <Popup @projectAdded="project_added"/>
                </v-flex>
            </v-layout>

            <!-- Nav items -->
            <v-list>
                <v-list-tile v-for="(link, index) in links" v-bind:key="index" router :to="link.route" >

                    <v-list-tile-action route to="/projects">
                        <v-icon color="white">{{link.icon}}</v-icon>
                    </v-list-tile-action>

                    <v-list-tile-content>
                        <v-list-tile-title class="white--text" >
                            {{link.text}}
                        </v-list-tile-title>
                    </v-list-tile-content>

                </v-list-tile>
            </v-list>

        </v-navigation-drawer>
    </nav>
</template>

<script>
import Popup from "./Popup.vue";
export default {
    name: "Navbar",
    components:{
        Popup,
    },
    data(){
        return {
            drawer: false,
            links: [
                {icon: 'dashboard', text: 'Dashboard', route: '/'},
                {icon: 'folder', text: 'My Projects', route: '/projects'},
                {icon: 'person', text: 'Team', route: '/team'}
            ],
            snackbar: false
        }
    },
    methods:{
        collapse_drawer(){
            this.drawer = !this.drawer
        },
        project_added(){
            console.log('henkie');
            this.snackbar = true;
            this.$emit('projectAdded');
        }
    }
}
</script>