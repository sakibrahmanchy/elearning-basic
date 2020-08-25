<template>
    <div class="basic">
        <div class="form-group">
            <label>Select Course</label>
            <select class="form-control" v-model="course_id">
                <option v-for="option in JSON.parse(courses)" v-bind:value="option.id">
                    {{ option.title }}
                </option>
            </select>
        </div>
        <div class="form-group">
            <label for="title">Lesson Title</label>
            <input type="text" id="title" name="title" class="form-control" placeholder="Lesson Title" v-model="title">
        </div>
        <div class="form-group">
            <label for="description">Lesson Description</label>
           <textarea id="description" placeholder="Description" class="form-control" v-model="description">{{ description }}</textarea>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'basic-details',
        props: ['courses'],
        data: function() {
            return {
                title: '',
                description: '',
                course_id: 0,
            }
        },
        watch: {
          course_id: function() {
            this.isValid();
          },
          title: function() {
            this.isValid();
          },
          description: function() {
            this.isValid();
          },
        },
        methods: {
            isValid() {
                let valid = false;
                if (this.course_id && this.title !== '' && this.description!=='') {
                    valid = true;
                }

                if (valid) {
                    const data = {
                        title: this.title,
                        description: this.description,
                        course_id: this.course_id,
                    };
                    console.log('data in componetn');
                    console.log(data);
                    this.$store.commit('lesson/updateBasicDetails',data);
                }
                this.$emit('update', valid);
            }
        }
    }
</script>
<style scoped>
</style>
