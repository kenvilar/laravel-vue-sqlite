<template>
    <div>
        <h1>Add Contacts</h1>
        <form action="#" @submit.prevent="edit ? updateContact(contact.id) : createContact()">
            <div class="form-group">
                <label for="name">Name</label>
                <input v-model="contact.name" type="text" id="name" name="name" class="form-control">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input v-model="contact.email" type="email" id="email" name="email" class="form-control">
            </div>
            <div class="form-group">
                <label for="phone">Phone</label>
                <input v-model="contact.phone" type="text" id="phone" name="phone" class="form-control">
            </div>
            <div class="form-group">
                <button v-show="!edit" type="submit" class="btn btn-outline-primary">New Contact</button>
                <button v-show="edit" type="submit" class="btn btn-outline-primary">Update Contact</button>
            </div>
        </form>
        <h1>Contact List</h1>
        <ul class="list-group">
            <li class="list-group-item" v-for="contact in list">
                <strong>{{ contact.name }}</strong> {{ contact.email }} {{ contact.phone }}
                <button @click="deleteContact(contact.id)" type="button" class="btn btn-outline-danger btn-sm float-right">Delete</button>
                <button @click="showSingleContact(contact.id)" type="button" class="btn btn-outline-secondary btn-sm float-right">Update</button>
            </li>
        </ul>
    </div>
</template>

<script>
    export default {
        data: function () {
            return {
                edit: false,
                list: [],
                contact: {
                    id: '',
                    name: '',
                    email: '',
                    phone: ''
                }
            };
        },
        mounted: function () {
            console.log('Contacts Component Loaded!');
            this.pullContactLists();
        },
        methods: {
            pullContactLists: function () {
                console.log('Pulling Contacts...');
                axios.get(
                    'api/contacts'
                ).then((response) => {
                    console.log(response.data);
                    this.list = response.data;
                }).catch((error) => {
                    console.log(error);
                });
            },
            updateContact: function (id) {
                console.log('Update Contact');
                let self = this;
                let params = Object.assign({}, self.contact);

                axios.patch(
                    'api/contact/' + id,
                    params
                ).then(function () {
                    self.contact.name = '';
                    self.contact.email = '';
                    self.contact.phone = '';
                    self.edit = false;
                    self.pullContactLists();
                }).catch(function (error) {
                    console.log(error);
                });

                return false;
            },
            createContact: function () {
                console.log('Create Contact');
                let self = this;
                let params = Object.assign({}, self.contact);

                axios.post(
                    'api/contacts/store',
                    params
                ).then(function () {
                    self.contact.name = '';
                    self.contact.email = '';
                    self.contact.phone = '';
                    self.edit = false;
                    self.pullContactLists();
                }).catch(function (error) {
                    console.log(error);
                });
            },
            showSingleContact: function (id) {
                let self = this;
                axios.get(
                    'api/contact/' + id
                ).then(function (response) {
                    self.contact.id = response.data.id;
                    self.contact.name = response.data.name;
                    self.contact.email = response.data.email;
                    self.contact.phone = response.data.phone;
                });
                self.edit = true;
            },
            deleteContact: function (id) {
                let self = this;
                axios.delete(
                    'api/contact/' + id
                ).then(function () {
                    self.edit =  false;
                    self.pullContactLists();
                }).catch(function (error) {
                    console.log(error);
                });
            }
        }
    }
</script>
