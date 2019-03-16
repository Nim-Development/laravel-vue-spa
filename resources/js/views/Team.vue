<template>
    <div class="team">
        <h1 class="subheading grey--text">Dashboard</h1>

        <v-container class="my-5">
            <v-layout row wrap>
                <v-flex  v-for="(member, index) in team" :key="index" 
                     :class="member.flex">
                    <v-card flat class="ma-1 text-xs-center">

                        <!-- Responsive image -->
                        <v-responsive class="pt-4">
                            <v-avatar
                                color="grey lighten-4"
                                size="100px"
                                class="grey lighten-2"
                            >
                            <img :src="`/storage/images/${member.avatar}`" alt="avatar">
                            </v-avatar>
                        </v-responsive>
                        <v-card-text>
                            <div class="subheading">
                                {{ member.name }}
                            </div>
                            <div class="grey--text">
                                {{ member.role }}
                            </div>
                        </v-card-text>
                        <v-card-actions>
                            <v-btn flat color="grey">
                                <v-icon small left>message</v-icon>
                                <span>Message</span>
                            </v-btn>
                        </v-card-actions>
                    </v-card>
                </v-flex>
                <v-divider></v-divider>
            </v-layout>
        </v-container>
<!-- xs12 sm6 md4 lg3 -->
    </div>
</template>
<script>
export default {
    name: "Team",
    props: ['team']
}
</script>
