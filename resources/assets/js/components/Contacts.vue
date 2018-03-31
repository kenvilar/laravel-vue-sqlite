<template>
    <div>
        <h1>Contacts</h1>
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
        },
        methods: {
            updateContact: function (id) {
                console.log('Update Contact');
                return;
            },
            createContact: function () {
                console.log('Create Contact');
                return;
            }
        }
    }
</script>
