<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-sm">
                    <thead>
                    <tr>
                        <td class="my_table_header">ID</td>
                        <td class="my_table_header">Name</td>
                        <td class="my_table_header">E-mail</td>
                        <td class="my_table_header">Last Login</td>
                        <td class="my_table_header">Last IP</td>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="admin in admins">
                        <td>{{admin.id}}</td>
                        <td>{{admin.name}}</td>
                        <td>{{admin.email}}</td>
                        <td>{{admin.last_login_at}}</td>
                        <td>{{admin.last_login_ip}}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
    export default {

        props: [
          'admins'
        ],
        mounted() {
            console.log('Component mounted.')
            this.update()
        },
        methods: {
            update: function () {
                console.log(this.admins)
            }
        }
    }
</script>
