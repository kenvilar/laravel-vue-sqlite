<template>
    <div>
        <h1>Contacts</h1>
        <form action="#" @submit.prevent="edit ? updateContact(contact.id) : createContact()">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" class="form-control">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" class="form-control">
            </div>
            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" id="phone" name="phone" class="form-control">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-outline-primary">New Contact</button>
            </div>
        </form>
    </div>
</template>

<script>
    export default {
        data: function () {
            return {};
        },
        mounted: function () {
            console.log('Contacts Components Loaded!');
        }
    }
</script>
