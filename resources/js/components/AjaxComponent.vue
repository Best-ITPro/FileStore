<!--
https://youtu.be/UAxNcJprLA0s
-->
<template>
    <div class="container">
        <div class="row">
            <button class="btn btn-primary text mb-1" v-on:click="update" v-if="!is_refresh">Обновить - {{ id }}</button>
            <span class="badge badge-primary mb-1" v-if="is_refresh">Обновление...</span>
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

        data: function () {
          return {
              admins: [],
              is_refresh: false,
              id: 0
          }
        } ,
        mounted() {
            this.update()
        },
        methods: {
            update: function () {
                this.is_refresh = true
                axios.get('/admin/settings').then((response) =>{
                    this.admins = response.
                    console.log(response)
                    this.is_refresh = false
                    this.id++
                });


            }
        }
    }
</script>
