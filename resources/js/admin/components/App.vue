<template>
    <v-app id="inspire">
        <v-navigation-drawer
            v-model="drawer"
            app
            v-if="isAuth"
        >
            <v-list dense>
                <v-list-item
                    v-for="(link, i) in links"
                    :key="i"
                    :to="link.to"
                    exact
                    >
                    <v-list-item-action>
                        <v-icon>{{ link.icon }}</v-icon>
                    </v-list-item-action>
                    <v-list-item-content>
                        <v-list-item-title>{{ link.name }}</v-list-item-title>
                    </v-list-item-content>
                </v-list-item>
                <v-list-item v-if="isAuth" @click="logout">
                    <v-list-item-action>
                        <v-icon>mdi-account-off</v-icon>
                    </v-list-item-action>
                    <v-list-item-content>
                        <v-list-item-title>Выйти</v-list-item-title>
                    </v-list-item-content>
                </v-list-item>
            </v-list>
        </v-navigation-drawer>
        <v-app-bar
            app
            color="teal"
            dark
            v-if="isAuth"
        >
            <v-app-bar-nav-icon @click.stop="drawer = !drawer"></v-app-bar-nav-icon>
            <v-toolbar-title>«Anhalt» - панель администратора</v-toolbar-title>
        </v-app-bar>

        <v-content :class="isAuth ? '': ''">
            <v-container>
                <router-view></router-view>
            </v-container>
        </v-content>
        <v-footer
            color="teal"
            app
            v-if="isAuth"
        >
            <span class="white--text">&copy; 2019</span>
        </v-footer>
    </v-app>
</template>

<script>
    export default {
        name: "App",
        props: {
            source: String,
        },
        data () { return {
            drawer: null,
            links: [
                { name: 'Главная', icon: 'mdi-home', to: { name: 'home' } },
                { name: 'Номера', icon: 'mdi-hotel', to: { name: 'rooms' } }
            ]
        }},
        computed: {
            isAuth() {
                return this.$store.getters.IS_AUTHENTICATED;
            }
        },
        methods: {
            logout() {
                this.$store.dispatch('LOGOUT').then(() => {
                    this.$router.push({ name: 'login' });
                });
            }
        }
    }
</script>

<style scoped>

</style>
