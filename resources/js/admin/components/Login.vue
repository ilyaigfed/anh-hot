<template>
    <v-dialog
        :value="true"
        max-width="300px"
        :persistent="true"
    >
        <v-form>
            <v-card :loading="loading" colo="tile">
                <v-card-title>
                    <span class="headline">Вход</span>
                </v-card-title>
                <v-card-text>
                    <v-container>
                        <v-row>
                            <v-text-field
                                v-model="credentials.email"
                                label="Email"
                                required
                            ></v-text-field>
                            <v-text-field
                                v-model="credentials.password"
                                label="Password"
                                required
                                type="password"
                            ></v-text-field>
                        </v-row>
                    </v-container>
                </v-card-text>
                <v-card-actions>
                    <v-btn
                        text
                        color="teal"
                        @click="login"
                    >Войти</v-btn>
                </v-card-actions>
            </v-card>
        </v-form>
    </v-dialog>
</template>

<script>
    export default {
        name: "Login",
        data() { return {
            credentials: {
                email: '',
                password: ''
            },
            loading: false
        }},
        methods: {
            login() {
                this.loading = true;

                this.$store.dispatch('LOGIN', this.credentials).then(() => {
                    this.$router.push({ name: 'home' });
                });
            }
        }
    }
</script>

<style scoped>

</style>
