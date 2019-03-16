<template>
    <div class="projects">
        <h1 class="subheading grey--text">Projects</h1>

        <v-container class="my-5">
            <v-expansion-panel >
                <v-expansion-panel-content v-for="(project, index) in myProjects" :key="index">
                    <template v-slot:header>
                        <div>{{ project.title }}</div>
                    </template>
                    <v-card>
                        <v-card-text class="px-4 grey--text">
                            <div class="font-weight-bold">
                                {{ project.due }}
                            </div>
                            <div>Project Information</div>
                        </v-card-text>
                    </v-card>
                </v-expansion-panel-content>
            </v-expansion-panel>


        </v-container>    
    </div>
</template>
<script>
export default {
    name: "Projects",
    props: ["projects"],
    computed: {
        myProjects(){
            return this.projects.filter(project => {
                return project.member_id === 1;
            });
        }
    }
}
</script>
